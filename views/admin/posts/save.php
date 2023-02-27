<?php
require_once '../../../models/Post.php';
//
$post = new Post();
$post->id = $_POST['id'] ?? '';
$post->title = $_POST['title'];
$post->summary = $_POST['summary'];
$post->body = $_POST['body'];
$post->breaking_news = $_POST['breaking_news'] ?? 0;
$post->user_id = $_POST['user_id'];
$post->cat_id = $_POST['cat_id'];
$post->status = $_POST['status'] ?? 'disable';
$post->selected = $_POST['selected'] ?? 0;
// print_r($_FILES["image"]);
if ($_FILES["image"]) {
    $target_dir = "/../../../assets/uploads/";
    $target_file = __DIR__ . $target_dir . basename($_FILES["image"]["name"]);
    $imageName = basename($_FILES["image"]["name"]) ?? "";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
            $post->image = $imageName;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$result = $post->save();

if ($result != -1) {
    header('location: list.php');
}
