<?php
use App\Models\Post;

$slug = $_REQUEST['cat'];
$args_page = [
    ['status', '=', 1],
    ['type', '=', 'page'],
    ['slug', '=', $slug]
];
$row_post = Post::where($args_page)->first();
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent">
    <div class="container">
        <?= $row_post->title; ?>
        <p>
            <?= $row_post->detail; ?>
        </p>
    </div>
</section>
<?php require_once('views/frontend/footer.php'); ?>