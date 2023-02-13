<?php
include 'AppManager.php';
$sm = AppManager::getSM();
echo $sm->getAttribute("KEY1");
?>