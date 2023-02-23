<?php
require_once('../layouts/header.php');
require_once __DIR__ . '../../../../models/Category.php';
$c = new Category();
$categories = $c->getAll();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Category</a></li>
                        <li class="breadcrumb-item active"><a href="#">List</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content container">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th style="width: 40px">Active</th>
                                <th style="width: 200px">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categories as $c) {
                            ?>
                                <tr>
                                    <td><?= $c['id']; ?></td>
                                    <td><?= $c['name']; ?></td>
                                    <td>
                                        <div class="m-2">
                                            <?php if ($c['active'] == 1) { ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge bg-danger">Deactive</span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a class="btn btn-sm btn-info m-2" href="frm_edit_category.php?id=<?php echo $c['id']; ?>">Edit</a>
                                            <a class="btn btn-sm btn-danger m-2" href="delete.php?id=<?php echo $c['id']; ?>">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

</div>
<?php require_once('../layouts/footer.php'); ?>