<?php
use App\Models\Brand;

$mod_list_brand = Brand::where('status', '=', 1)->orderBy('sort_order')->get();
?>

<div class="list-group">
    <div class="card-header bd-green-500">
        THƯƠNG HIỆU
    </div>
    <div class="list-group-item">
        <?php foreach ($mod_list_brand as $mod_row_listbrand): ?>
        <div class="row mb-3">
            <div class="col-sm-4">
                <img src="public/images/post/<?= $mod_row_listbrand->image; ?>" class="img-fluid"
                    alt="<?= $mod_row_listbrand->image; ?>" srcset="">
            </div>
            <div class="col-sm-8 pr-0 mr-0">
                <h4 class="post-title">
                    <a href="index.php?option=brand&cat=<?= $mod_row_listbrand->slug; ?>">
                        <?= $mod_row_listbrand->name; ?>
                    </a>
                </h4>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>