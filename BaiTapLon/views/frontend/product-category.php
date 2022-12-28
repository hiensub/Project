<?php
use App\Models\Category;
use App\Models\Product;
use App\Libraries\PhanTrang;

$slug = $_REQUEST['cat'];
$row_cat = Category::where([['status', '=', 1], ['slug', '=', $slug]])->first();

$list_category_id = array();
array_push($list_category_id, $row_cat->id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat->id]])
    ->get();
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat1->id]])
            ->get();
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_category_id1, $row_cat2->id);
                $list_category3 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat2->id]])
                    ->get();
                if (count($list_category3) > 0) {
                    foreach ($list_category3 as $row_cat3) {
                        array_push($list_category_id2, $row_cat3->id);
                    }
                }
            }

        }
    }
}
//xử lý phân trang
$page = PhanTrang::pageCurrent();
$limit = 8; //số mẫu tin trên 1 trang
$offset = PhanTrang::pageOffset($page, $limit);

//lấy ra tổng số mẫu tin
$total = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)->count();
//end
$product_list = Product::where('status', '=', 1)->whereIn('category_id', $list_category_id)
    ->orderBy('created_at', 'DESC')
    ->skip($offset)
    ->take($limit)
    ->get();
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
                <h2 class="text-center">
                    <?= $row_cat->name; ?>
                </h2>
                <div class="row">
                    <?php foreach ($product_list as $product): ?>
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
                    <?= PhanTrang::pageLinks($total, $page, $limit, 'index.php?option=product&cat=' . $slug); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php require_once('views/frontend/footer.php'); ?>