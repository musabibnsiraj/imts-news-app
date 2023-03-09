<?php
require_once('views/layouts/header.php');
require_once __DIR__ . '/models/Post.php';

$pst = new Post();
$latestPosts = $pst->getLatest();
$posts = $pst->getAll();
?>


<!-- Content Wrapper. Contains page content -->
<div class="container">


  <!-- Main content -->
  <div class="content mt-5">
    <div class="container-fluid">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">Latest News</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            if (isset($latestPosts))
              foreach ($latestPosts as $post) {
            ?>
              <!-- /.col-md-6 -->
              <div class="col-lg-3">

                <div class="card card-primary card-outline">
                  <div class="card-body">
                    <h6 class="card-title"> <?= $post['title']; ?></h6>

                    <div class="m-2 d-none">
                      <img class="img-fluid rounded mx-auto d-block " src="<?= asset('assets/uploads/' . $post['image']) ?>">
                    </div>

                    <p class="card-text d-none"><?= $post['summary']; ?></p>
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

  <!-- Main content -->
  <div class="content mt-5">
    <div class="container-fluid">
      <div class="card card-primary card-outline">
        <div class="row">
          <?php
          if (isset($posts))
            foreach ($posts as $post) {
          ?>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">

              <div class="card card-primary card-outline">
                <div class="card-body">
                  <h6 class="card-title"> <?= $post['title']; ?></h6>

                  <div class="m-2">
                    <img class="img-fluid rounded mx-auto d-block " src="<?= asset('assets/uploads/' . $post['image']) ?>">
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
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php require_once(BASE_PATH . '/views/layouts/footer.php'); ?>