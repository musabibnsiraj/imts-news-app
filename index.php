<?php
require_once('views/layouts/header.php');
require_once __DIR__ . '/models/Post.php';

$pst = new Post();
$posts = $pst->getLatest();
?>


<!-- Content Wrapper. Contains page content -->
<div class="container">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Latest News</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            if (isset($posts))
              foreach ($posts as $post) {
            ?>
              <!-- /.col-md-6 -->
              <div class="col-lg-3">

                <div class="card card-primary card-outline">
                  <div class="card-body">
                    <h6 class="card-title"> <?= $post['title']; ?></h6>

                    <div class="m-2">
                      <img class="img-fluid rounded mx-auto d-block " src="<?= asset('assets/img/post-images/' . $post['image']) ?>">
                    </div>

                    <p class="card-text"><?= $post['summary']; ?></p>
                    <a href="<?= url('views/pages/news_page.php?postId=' . ($post['id'] ?? null)) ?>" class="btn btn-primary">View News</a>
                  </div>
                </div>

              </div>
            <?php
              }
            ?>
            <!-- /.col-md-6 -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php require_once(BASE_PATH . '/views/layouts/footer.php'); ?>