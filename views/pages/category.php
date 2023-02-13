<?php
require_once('./../layouts/header.php');
$catId = $_GET['categoryId'] ?? null;

//if category id not found
if (!$catId) die('Category Not Found');
?>
<!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category
            <?php
            echo $catId;
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