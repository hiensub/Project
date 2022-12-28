<?php
use App\Models\Order;

$list = Order::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    $html_parent_id .= " <option value ='" . $item->id . "'>" . $item->name . " </option> ";
    $html_sort_order .= " <option value ='" . ($item->sort_order + 1) . "'>Sau : " . $item->name . " </option> ";
}
?>

<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm danh mục</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm danh mục</li>
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
                                <i class="fas fa-save"></i> Lưu thêm
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=order">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="code"> Mã đơn hàng </label>
                                <input name="code" id="code" type="text" class="form-control" required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="deliveryaddress"> Địa chỉ </label>
                                <input name="deliveryaddress" id="deliveryaddress" type="text" class="form-control"
                                    required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="deliveryname"> Tên khách hàng </label>
                                <input name="deliveryname" id="deliveryname" type="text" class="form-control" required
                                    placeholder="">
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="deliveryphone"> Số điện thoại </label>
                                <input name="deliveryphone" id="deliveryphone" type="text" class="form-control" required
                                    placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="deliveryemail"> Email</label>
                                <input name="deliveryemail" id="deliveryemail" type="text" class="form-control" required
                                    placeholder=""></input>
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
                    <div class="col-md-12 text-right">
                        <button name="Them" type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i> Lưu thêm
                        </button>
                        <a class="btn btn-sm btn-info" href="index.php?option=order">
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