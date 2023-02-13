<?php
include 'AppManager.php';
$sm = AppManager::getSM();
$sm->setAttribute("KEY1", "value 1");

echo "set session";
?>