<?php
use App\Models\User;

include 'config/database.php';

if (isset($_POST['name'])) {

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

}
?>

<?php require_once('views/frontend/header.php'); ?>
<form method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Đăng kí khách hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Đăng kí khách hàng</li>
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
                            <button name="Them" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Đăng kí
                            </button>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name"> Tên người dùng </label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="username"> Tên đăng nhập </label>
                                <input name="username" id="username" type="text" class="form-control" required
                                    placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="password"> Mật khẩu </label>
                                <input name="password" id="password" type="text" class="form-control" required
                                    placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="email"> Email </label>
                                <input name="email" id="email" type="text" class="form-control" required
                                    placeholder="Điền dạng: abc@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="phone"> Số điện thoại </label>
                                <input name="phone" id="phone" type="text" class="form-control" required placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="gender"> Giới tính </label>
                                <input name="gender" id="gender" type="text" class="form-control" required
                                    placeholder="1:Nam, 2:Nữ">
                            </div>

                            <div class=" mb-3">
                                <label for="roles"> Phân quyền </label>
                                <input name="roles" id="roles" type="text" class="form-control" required
                                    placeholder="Điền: 0">
                            </div>
                            <div class="mb-3">
                                <label for="image"> Hình </label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="address"> Địa chỉ </label>
                                <input name="address" id="address" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status"> Trạng thái </label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>

<?php require_once('views/frontend/footer.php'); ?>