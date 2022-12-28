<?php
use App\Models\Product;
use App\Models\Category;

$slug = $_REQUEST['id'];
$row_product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();


$list_category_id = array();
array_push($list_category_id, $row_product->category_id);
$list_category1 = Category::where([['status', '=', 1], ['parent_id', '=', $row_product->id]])
    ->get(
    );
if (count($list_category1) > 0) {
    foreach ($list_category1 as $row_cat1) {
        array_push($list_category_id, $row_cat1->id);
        $list_category2 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat1->id]])
            ->get(
            );
        if (count($list_category2) > 0) {
            foreach ($list_category2 as $row_cat2) {
                array_push($list_category_id1, $row_cat2->id);
                $list_category3 = Category::where([['status', '=', 1], ['parent_id', '=', $row_cat2->id]])
                    ->get(
                    );
                if (count($list_category3) > 0) {
                    foreach ($list_category3 as $row_cat3) {
                        array_push($list_category_id2, $row_cat3->id);
                    }
                }
            }

        }
    }
}
$product_list = Product::where([['status', '=', 1], ['id', '!=', $row_product->id]])
    ->whereIn(
        'category_id',
        $list_category_id
    )
    ->orderBy(
        'created_at',
        'DESC'
    )
    ->take(
        8
    )
    ->get(
    );
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&addcat=<?= $row_product->id ?>" method="Post">
    <section class="maincontent">
        <div class="container">
            <div class="row product-header">
                <div class="col-md-6">
                    <img src="public/images/product/<?= $row_product->image; ?>" class="img-fluid card-img-top"
                        alt="<?= $row_product->image; ?>">
                </div>
                <div class="col-md-6">

                    <h1 class="product-name text-center">
                        Tên sản phẩm: <?= $row_product->name; ?>
                    </h1>
                    <h2 class="product-detail text-center">
                        Chi tiết sản phẩm: <?= $row_product->detail; ?>
                    </h2>
                    <h2 class="product-price text-center">Giá: <?= number_format($row_product->price); ?><sup>đ</sup>
                    </h2>
                    <h2 class="product-price text-center">Giá bán: <?= number_format($row_product->pricesale); ?>
                        <sup>đ</sup>
                    </h2>
                    <div class="input-group mb-3">
                        <input type="number" value="1" class="form-control" aria-describedby="basic-addon2">
                        <button name="ADDCART" type="submit" class="input-group-text" id="basic-addon2">Đặt mua</button>
                    </div>
                </div>
            </div>
            <div class="row product-detail">
                <div class="col-12">
                    <h3>Chi tiết sản phẩm</h3>
                    <p>
                        <?= $row_product->detail; ?>
                    </p>
                </div>
            </div>
            <h3>Sản phẩm cùng loại</h3>
            <div class="row product-other">
                <?php foreach ($product_list as $product): ?>
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 100%">
                        <div class="product-image">
                            <a href="index.php?option=product&id=<?= $product->slug; ?>">
                                <img src="public/images/product/<?= $product->image; ?>" class="img-fluid card-img-top"
                                    alt="<?= $product->image; ?>">
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
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>