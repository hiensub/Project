<?php
use Illuminate\Support\Facades\App;
use App\Models\Product;

if (!isset($_SESSION['logincustomer'])) {
    header('location:index.php?option=customer&f=login');
}

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart&checkoutCart=true" method="POST">
    <section class="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="text-center">Giỏ hàng của bạn</h1>
                    <?php if($content_cart !=null) :?>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th style="width:100px">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Gía</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        <?php $total_money =0 ;?>
                        <?php foreach($content_cart as $cart):?>
                        <?php $product = Product:: find($cart['id']);?>
                        <tr>
                            <th>
                                <?= $cart['id']; ?>
                            </th>
                            <th><a href="index.php?option=product&id=<?= $product->slug; ?>">
                                    <img src="public/images/product/<?= $product->image; ?>"
                                        class="img-fluid card-img-top" alt="<?= $product->image; ?>">
                                </a></th>
                            <th>
                                <?=$product->name;?>
                            </th>
                            <th>
                                <?= number_format($cart['price']) . "VNĐ"; ?>
                            </th>
                            <th>
                                <?= $cart['qty'];?>
                            </th>
                            <th>
                                <?= number_format($cart['amount']) . "VNĐ"; ?>
                            </th>

                        </tr>
                        <?php $total_money += $cart['amount']; ?>
                        <?php endforeach;?>

                    </table>
                    <?php else:?>
                    <h3>Bạn đã thanh toán</h3>
                    <?php endif ;?>
                </div>
                <div class="col-md-3">
                    <p> Thêm một số thông tin </p>
                    <button type="submit">Thanh toán</button>
                    <input name="deliveryname" type="text" class="form-control" placeholder="Ho tên">
                    <input name="deliveryaddress" type="text" class="form-control" placeholder="Địa chỉ">
                    <input name="deliveryphone" type="text" class="form-control" placeholder="Số điện thoại">
                    <input name="deliveryemail" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>