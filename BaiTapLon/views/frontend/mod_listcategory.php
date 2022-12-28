<?php
use App\Models\Category;

$args_mod_listat = [
    ['status', '=', 1],
    ['parent_id', '=', 0],
];
$mod_list_category = Category::where($args_mod_listat)->orderBy('sort_order')->get();
?>


<div class="card" style="width: 100%;">
    <div class="card-header bd-green-500">
        DANH MỤC SẢN PHẨM
    </div>
    <ul class="list-group list-group-flush">
        <?php foreach ($mod_list_category as $mod_row_listcat): ?>
        <li class="list-group-item">
            <a href="index.php?option=product&cat=<?= $mod_row_listcat->slug; ?> ">
                <?= $mod_row_listcat->name; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>