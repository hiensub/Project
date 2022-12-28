<?php
use App\Models\Slider;

$list = Slider::where('status', '!=', '0')->get();
$html_parent_id = '';
$html_sort_order = '';
foreach ($list as $item) {
    $html_parent_id .= " <option value ='" . $item->id . "'>" . $item->name . " </option> ";
    $html_sort_order .= " <option value ='" . ($item->sort_order + 1) . "'>Sau : " . $item->name . " </option> ";
}
?>

<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=slider&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm Slider</li>
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
                            <a class="btn btn-sm btn-info" href="index.php?option=slider">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name"> Tên Slider </label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="link"> Liên kết </label>
                                <textarea name="link" id="link" type="text" class="form-control" required
                                    placeholder=""></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="position"> Chức vụ </label>
                                <input name="position" id="position" type="text" class="form-control" required
                                    placeholder="Điền: slideshow">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="sort_order"> Vị trí </label>
                                <select id="sort_order" name="sort_order" class="form-control">
                                    <option value="0">--Chọn vị trí--</option>
                                    <?= $html_sort_order; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image"> Hình </label>
                                <input name="image" id="image" type="file" class="form-control">
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

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="col-md-12 text-right">
                    <button name="Them" type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i> Lưu thêm
                    </button>
                    <a class="btn btn-sm btn-info" href="index.php?option=slider">
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