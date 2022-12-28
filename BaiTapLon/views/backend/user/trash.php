<?php
use App\Models\User;

//select * from db_user
$list = User::where('status', '=', '0')->orderBy('created_at', 'DESC')->get();
?>

<?php require_once('../views/backend/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng rác thành viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thùng rác thành viên</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-12 text-right">
                        <a class="btn btn-sm btn-info" href="index.php?option=user">
                            <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:20px">#</th>
                            <th>Tên thành viên</th>
                            <th class="text-center" style="width:360px">Tên đăng nhập/th>
                            <th class="text-center" style="width:160px">Email</th>
                            <th class="text-center" style="width:200px">Chức năng</th>
                            <th class="text-center" style="width:20px">ID</th>
                        </tr>
                    </thead>
                    <tbody <?php foreach ($list as $row): ?> <tr>
                        <td class="text-center"><input type="checkbox"></td>
                        <td>
                            <?= $row['name'] ?>
                        </td>
                        <td class="text-center">
                            <?= $row['username'] ?>
                        </td>
                        <td class="text-center">
                            <?= $row['email'] ?>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary"
                                href="index.php?option=user&cat=restore&id=<?= $row['id'] ?>">
                                <i class="fas fa-undo-alt"></i>
                            </a>
                            <a class="btn btn-sm btn-danger"
                                href="index.php?option=user&cat=destroy&id=<?= $row['id'] ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <?= $row['id'] ?>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php require_once('../views/backend/footer.php'); ?>