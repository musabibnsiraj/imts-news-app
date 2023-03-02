<?php
require_once '../../../models/Post.php';


$post = new Post();
$edit = false;
if (isset($_POST['id'])) {
    $exist = $post->getById($_POST['id']);
    $edit = true;
}

$post->id = $_POST['id'] ?? '';
$post->title = $_POST['title'];
$post->summary = $_POST['summary'];
$post->body = $_POST['body'];
$post->breaking_news = $_POST['breaking_news'] ?? 0;
$post->user_id = $_POST['user_id'];
$post->cat_id = $_POST['cat_id'];
$post->status = $_POST['status'] ? 'enable': 'disable';
$post->selected = $_POST['selected'] ?? 0;


if (isset($_FILES["image"]) && $_FILES['image']['error'] == 0) {
    $target_dir = "/../../../assets/uploads/";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
    $imageName = time() . '.' . $imageFileType;
    $target_file = __DIR__ . $target_dir . $imageName;

    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    // Check file size -> 500KB
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            if ($edit) {
                $exist_file_dir = __DIR__ . $target_dir . $exist['image'];
                if (file_exists($exist_file_dir)) {
                    if (unlink($exist_file_dir)) {
                        echo "File deleted successfully.";
                    } else {
                        echo "File deletion failed.";
                    }
                }
            }

            $post->image = $imageName;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}elseif($edit){
    $post->image = $exist['image'];
}else{
    die('Image file is required!');
}

$result = $post->save();

if ($result != -1) {
    header('location: list.php');
}
