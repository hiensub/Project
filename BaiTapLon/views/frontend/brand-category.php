<?php
use App\Models\Brand;
use App\Models\Product;
use App\Libraries\PhanTrang;


$slug = $_REQUEST['cat'];
$row_brand = Brand::where([['status', '=', 1], ['slug', '=', $slug]])->first();
$brand_id = $row_brand->id;

//xử lý phân trang
$page = PhanTrang::pageCurrent();
$limit = 8; //số mẫu tin trên 1 trang
$offset = PhanTrang::pageOffset($page, $limit);
$total = Product::where([['status', '=', 1], ['brand_id', '=', $brand_id]])->count();


$list_product = Product::where([['status', '=', 1], ['brand_id', '=', $brand_id]])
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->take($limit)
    ->get();
;
?>
<?php require_once('views/frontend/header.php'); ?>
<section class="maincontent">
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
                <h2 class="text-center">Thương hiệu <?= $row_brand->name; ?>
                </h2>
                <div class="row">
                    <?php foreach ($list_product as $product): ?>
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 100%">
                            <div class="product-image">
                                <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <img src="public/images/product/<?= $product->image; ?>"
                                        class="img-fluid card-img-top" alt="<?= $product->image; ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                        <?= $product->name; ?>
                                    </a>
                                </h5>
                                <h5 class="text-center">
                                    <strong class="text-success">
                                        <?= number_format($product->pricesale); ?>
                                        <sup>đ</sup>
                                    </strong>
                                    <del><span class="text-danger">
                                            <?= number_format($product->price); ?>
                                        </span></del><sup>đ</sup>
                                </h5>
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    <a href="index.php?option=cart&addcat=<?= $product->id; ?>"
                                        class="btn btn-outline-info"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="index.php?option=product&id=<?= $product->slug; ?>"
                                        class="btn btn-outline-success"><i class="far fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div>
                    <?= PhanTrang::pageLinks($total, $page, $limit, 'index.php?option=brand&cat=' . $slug); ?>
                </div>
            </div>

        </div>

    </div>

    </div>
</section>

<?php require_once('views/frontend/footer.php'); ?>