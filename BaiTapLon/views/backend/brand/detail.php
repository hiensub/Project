<?php
use App\Models\Brand;

$id = $_REQUEST['id'];
$row = Brand::find($id);
$list = Brand::where('status', '!=', '0')->get();
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
<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết thương hiệu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Chi tiết thương hiệu</li>
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
                            <a class="btn btn-sm btn-info" href="index.php?option=brand">
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
                                <td>Tên thương hiệu</td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tên kế thừa</td>
                                <td>
                                    <?= $row['slug']; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>Từ khóa</td>
                                <td>
                                    <?= $row['metakey']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tên ảnh</td>
                                <td>
                                    <?= $row['image']; ?>
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

                        <a class="btn btn-sm btn-info" href="index.php?option=brand">
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