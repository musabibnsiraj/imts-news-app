<?php
require_once('./../layouts/header.php');
require_once __DIR__ . './../../models/Category.php';
require_once __DIR__ . './../../models/Post.php';

$catId = $_GET['categoryId'] ?? null;

//if category id not found
if (!$catId) die('Category Not Found');

$cat = new Category();
$category = $cat->getById($catId);

$pst = new Post();
$posts = $pst->getByCatId($catId);

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
            echo $category['name'];
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
      <div class="card-body">
        <div class="row">
          <?php
          if (isset($posts))
            foreach ($posts as $post) {
          ?>
            <!-- /.col-md-6 -->
            <div class="col-lg-4 ">

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
    </div><!-- /.container-fluid -->
  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('./../layouts/footer.php'); ?>