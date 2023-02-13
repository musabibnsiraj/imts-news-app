<?php
require_once('./../layouts/header.php');
require_once __DIR__ . './../../models/Category.php';
$catId = $_GET['categoryId'] ?? null;

//if category id not found
if (!$catId) die('Category Not Found');

$cat = new Category();
$category = $cat->getById($catId);

?>
<!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> 
            <?php
            echo 'Id: '.$category['id'];
            ?>
          </h1>
          <h1> 
            <?php
            echo 'Name: '.$category['name'];
            ?>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('./../layouts/footer.php'); ?>