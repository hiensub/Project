<?php
use App\Models\Post;
use App\Models\Topic;

$id = $_REQUEST['id'];
$row = Post::find($id);

$list_post = Post::where('status', '!=', '0')->get();
$list_topic = Topic::where('status', '!=', '0')->get();
$html_post_id = '';
$html_topic_id = '';

foreach ($list_post as $post) {
    $html_post_id .= " <option value ='" . $post->id . "'>" . $post->titile . " </option> ";

}


foreach ($list_topic as $topic) {
    if ($topic->id == $row->topic_id) {
        $html_topic_id .= " <option selected value ='" . $topic->id . "'>" . $topic->name . " </option> ";
    } else {
        $html_topic_id .= " <option value ='" . $topic->id . "'>" . $topic->name . " </option> ";
    }


}
?>

<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cập nhật bài viết</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Cập nhật bài viết</li>
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
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
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
                                <label for="title"> Tiêu đề bài viết </label>
                                <input name="title" value="<?= $row['title']; ?>" id="title" type="text"
                                    class="form-control" required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="detail"> Chi tiết bài viết </label>
                                <textarea name="detail" id="detail" type="text" class="form-control" required
                                    placeholder=""><?= $row['detail']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc"> Mô tả(SEO) </label>
                                <textarea name="metadesc" id="metadesc" type="text" class="form-control" required
                                    placeholder=""><?= $row['metadesc']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metakey"> Từ khóa(SEO) </label>
                                <textarea name="metakey" id="metakey" type="text" class="form-control" required
                                    placeholder=""><?= $row['metakey']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="type"> Kiểu bài viết </label>
                                <input name="type" value="<?= $row['type']; ?>" id="type" type="text"
                                    class="form-control" required placeholder="Điền page hoặc post">
                            </div>

                            <div class="mb-3">
                                <label for="topic_id"> Chủ đề bài viết </label>
                                <select id="topic_id" name="topic_id" class="form-control" required>
                                    <option value="">--Chọn chủ đề--</option>
                                    <?= $html_topic_id; ?>
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="image"> Hình </label>
                                <input name="image" id="image" type="file" class="form-control">

                            </div>
                            <div class="mb-3">
                                <label for="status"> Trạng thái </label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2" <?=($row->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản
                                    </option>
                                    <option value="1" <?=($row->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                                </select>

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
                        <a class="btn btn-sm btn-info" href="index.php?option=post">
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