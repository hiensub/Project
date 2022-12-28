<?php
use App\Models\Post;
use App\Libraries\PhanTrang;
use App\Libraries\Mystring;

$args_post = [
    ['status', '=', 1],
    ['type', '=', 'post']

];
$page = PhanTrang::pageCurrent();
$limit = 8; //số mẫu tin trên 1 trang
$offset = PhanTrang::pageOffset($page, $limit);

//lấy ra tổng số mẫu tin
$total = Post::where($args_post)->count();

$list_post = Post::where($args_post)
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->take($limit)
    ->get();

?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent my-3">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="listcategory mb-4">
                        <?php require_once('views/frontend/mod_listcategory.php'); ?>
                    </div>
                    <div class="post-news">
                        <?php require_once('views/frontend/mod_listbrand.php'); ?>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <h2 class="text-center">Tất cả bài viết</h2>
                <?php foreach ($list_post as $post): ?>
                <div class="col-md-9">
                    <div class="post-image">
                        <a href="index.php?option=post&id=<?= $post->slug; ?>">
                            <img src="public/images/post/<?= $post->image; ?>" class="img-fluid card-img-top"
                                alt="<?= $post->image; ?>">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <h3>
                            <a href="index.php?option=post&id=<?= $post->slug; ?>">
                                <?= $post->title; ?>
                            </a>
                        </h3>
                        <p style="width:1000px ;">
                            <?= $post->detail; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
                <div>
                    <?= PhanTrang::pageLinks($total, $page, $limit, 'index.php?option=post'); ?>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>