<?php
require_once '../../models/Category.php';
//
$category = new Category();
$category->id = $_POST['id'] ?? '';
$category->name = $_POST['name'];
$category->mobile = $_POST['mobile'];
$result = $category->save();
if($result != -1)
{
    header('location: list.php');
}
?>