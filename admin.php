<?php

session_start();

if(isset($_SESSION['username']))
{
    header('location: views/admin/dashboard.php');
}   
else
{
    header('location: views/admin/auth/login.php');
}
