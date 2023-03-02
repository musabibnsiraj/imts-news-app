<?php
require_once('../layouts/header.php');
require_once __DIR__ . '../../../../models/Category.php';
require_once __DIR__ . '../../../../models/Post.php';
$c = new Category();
$pst = new Post();
$post =  $pst->getById($_GET['id']);
$categories = $c->getAllActive();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">News</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">News</a></li>
                        <li class="breadcrumb-item active"><a href="#">List</a></li>
                        <li class="breadcrumb-item active"><a href="#">Create News</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content container">
        <div class="container-fluid">

            <!-- /.card-header -->
            <div class="card-body p-0">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create News</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="save.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="1" name="user_id">
                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titile</label>
                                <input required type="text" value="<?= $post['title'] ?>" name="title" class="form-control" id="title" placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label>Summary</label>
                                <textarea required class="form-control" name="summary" rows="3" placeholder="Enter ..."><?= $post['summary'] ?></textarea>
                            </div>
                            <textarea id="summernote" name="body"><?= $post['body']; ?></textarea>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" required name="cat_id">
                                    <option default> </option>
                                    <?php
                                    foreach ($categories as $c) {
                                    ?>
                                        <option <?= $post['cat_id'] == $c['id'] ? 'selected' : ''; ?> value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="image">
                                <img src="<?= asset('assets/uploads/' . $post['image']) ?>" class="img-circle elevation-2" alt="User Image" style="width:100px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile" accept="image/*">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" required name="status"">
                                <option default></option>
                                    <option <?= $post['status'] == 'enable' ? 'selected' : ''; ?> value="enable"> Active </option>
                                    <option <?= $post['status'] == 'disable' ? 'selected' : ''; ?> value="disable"> Deactive </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" name="breaking_news" value="1" id="customSwitch4" <?= $post['breaking_news'] != 0 ? 'checked' : ''; ?>>
                                    <label class="custom-control-label" for="customSwitch4">Breaking News </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" name="selected" value="1" id="customSwitch5" <?= $post['selected'] != 0 ? 'checked' : ''; ?> >
                                    <label class="custom-control-label" for="customSwitch5">Seleted </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>

        </div>
    </section>
</div>

<?php require_once('../layouts/footer.php'); ?>