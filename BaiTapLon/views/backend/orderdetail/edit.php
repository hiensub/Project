<?php
use App\Models\Orderdetail;

$id = $_REQUEST['id'];
$row = Orderdetail::find($id);
$list = Orderdetail::where('id', '!=', '0')->get();
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
<form action="index.php?option=orderdetail&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật chi tiết đơn hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Cập nhật chi tiết đơn hàng</li>
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
                            <button name="Capnhat" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu [Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-info" href="index.php?option=orderdetail">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <label for="order_id"> Mã đơn hàng </label>
                                <input name="order_id" value="<?= $row['order_id']; ?>" id="order_id" type="text"
                                    class="form-control" required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="product_id"> Mã sản phẩm </label>
                                <input name="product_id" value="<?= $row['product_id']; ?>" id="product_id" type="text"
                                    class="form-control" required placeholder=""></input>
                            </div>
                            <div class="mb-3">
                                <label for="price"> Gía </label>
                                <input name="price" value="<?= $row['price']; ?>" id="price" type="text"
                                    class="form-control" required placeholder=""></input>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="qty"> Số lượng </label>
                                <input name="qty" value="<?= $row['qty']; ?>" id="qty" type="text" class="form-control"
                                    required placeholder=""></input>
                            </div>
                            <div class="mb-3">
                                <label for="amount"> Thành tiền </label>
                                <input name="amount" value="<?= $row['amount']; ?>" id="amount" type="text"
                                    class="form-control" required placeholder=""></input>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="col-md-12 text-right">
                        <button name="Capnhat" type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i> Lưu [Cập nhật]
                        </button>
                        <a class="btn btn-sm btn-info" href="index.php?option=orderdetail">
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