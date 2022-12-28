<?php
use App\Models\User;

$id = $_REQUEST['id'];
$row = User::find($id);
$list = User::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    if ($item->id == $row->parent_id) {
        $html_parent_id .= " <option selected value ='" . $item->id . "'>" . $item->name . " </option> ";
    } else {
        $html_parent_id .= " <option value ='" . $item->id . "'>" . $item->name . " </option> ";
    }
    if ($item->sort_oder == $row->sort_oder) {
        $html_sort_order .= " <option selected value ='" . ($item->sort_order + 1) . "'>Sau : " . $item->name . " </option> ";
    } else {
        $html_sort_order .= " <option value ='" . ($item->sort_order + 1) . "'>Sau : " . $item->name . " </option> ";
    }
}
?>

<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chi tiết danh mục</li>
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
                    <div class="row">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:120px">Tên trường</th>
                                <td>Nội dung</td>
                            </tr>
                            <tr>
                                <td>Tên người dùng</td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td>
                                    <?= $row['username']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <?= $row['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td>
                                    <?= $row['address']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Ngày tạo</td>
                                <td>
                                    <?= $row['created_at']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Ngày sửa</td>
                                <td>
                                    <?= $row['updated_at']; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Trạng thái</td>
                                <td>
                                    <?= $row['status']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="col-md-12 text-right">

                        <a class="btn btn-sm btn-info" href="index.php?option=user">
                            <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>

<?php require_once('../views/backend/footer.php'); ?>