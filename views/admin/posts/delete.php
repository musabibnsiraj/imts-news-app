<?php

require_once '../../../models/Category.php';
$c = new Category();
$result = $c->deleteRec($_GET['id']);
if($result != -1)
{
    header('location: list.php');
}
?>