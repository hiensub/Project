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
    $html_topic_id .= " <option value ='" . $topic->id . "'>" . $topic->name . " </option> ";

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
                        <h1>Chi tiết bài viết</h1>
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
                            <a class="btn btn-sm btn-info" href="index.php?option=post">
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
                                <td>Tên bài viết</td>
                                <td>
                                    <?= $row['title']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Tên kế thừa</td>
                                <td>
                                    <?= $row['slug']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Chủ đề bài viết</td>
                                <td>
                                    <?= $row['topic_id']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Từ khóa</td>
                                <td>
                                    <?= $row['metakey']; ?>
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