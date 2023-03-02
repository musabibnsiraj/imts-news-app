<!-- Include Config -->
<?php
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . '/../../../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>News App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= asset('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset('assets/css/adminlte.css') ?>">
  <style>
    .logo {
      width: 100px;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper container m-5">

 