<?php
require_once('./../layouts/header.php');
require_once __DIR__ . './../../models/Post.php';
$postId = $_GET['postId'] ?? null;

//if category id not found
if (!$postId) die('Post Not Found');

$cat = new Post();
$post = $cat->getById($postId);

?>
<!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            <?= $post['title']; ?>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">News</li>
          </ol>
        </div>

        <!-- /.col-md-6 -->
        <div class="col-lg-12">

          <div class="card card-primary card-outline">
            <div class="card-body">
              <h6 class="card-title"> <?= $post['title']; ?></h6>

              <div class="col-3 m-2">
                <img class="img-fluid rounded mx-auto d-block " src="<?= asset('assets/uploads/' . $post['image']) ?>">
              </div>

              <p class="card-text"><?= $post['summary']; ?></p>
              <p class="card-text">  <?= $post['body']; ?></p>
            </div>
          </div>

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('./../layouts/footer.php'); ?>