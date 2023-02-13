<!-- Include Config -->
<?php
require_once __DIR__ . '/../../config.php';
require_once __DIR__ . './../../models/Category.php';

$cat = new Category();
$categories = $cat->getAll();
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
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?= url('/') ?>" class="nav-link">
            <div class="text-center">
              <img src="<?= asset('assets/img/logo.png') ?>" alt="Your Logo" class="img-fluid logo" />
            </div>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= url('/') ?>" class="nav-link">Home</a>
        </li>
        <?php
        if (isset($categories))
          foreach ($categories as $category) {
        ?>
          <li class="nav-item">
            <a href="<?= url('views/pages/category.php?categoryId=' . ($category['id'] ?? null)) ?>" class="nav-link">
              <?php
              echo $category['name'];
              ?>
            </a>
          </li>
        <?php
          }
        ?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= url('views/pages/contact-us.php') ?>" class="nav-link">Contact US</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= url('views/pages/faq.php') ?>" class="nav-link">FAQ</a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->