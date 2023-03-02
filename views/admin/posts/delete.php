<?php

require_once '../../../models/Post.php';
$c = new Post();
$result = $c->deleteRec($_GET['id']);
if($result != -1)
{
    header('location: list.php');
}
?>