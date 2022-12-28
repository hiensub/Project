<?php
use Illuminate\Support\Facades\App;
use App\Models\Product;
$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<?php require_once('views/frontend/header.php'); ?>
<form action="index.php?option=cart" method="POST">
    <section class="maincontent">
        <div class="container">
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
                    <th>Xóa</th>
                </tr>
                <?php $total_money =0 ;?>
                <?php foreach($content_cart as $cart):?>
                <?php 
                    $product = Product:: find($cart['id']);
                    ?>
                <tr>
                    <th>
                        <?= $cart['id']; ?>
                    </th>
                    <th><a href="index.php?option=product&id=<?= $product->slug; ?>">
                            <img src="public/images/product/<?= $product->image; ?>" class="img-fluid card-img-top"
                                alt="<?= $product->image; ?>">
                        </a></th>
                    <th>
                        <?=$product->name;?>
                    </th>
                    <th>
                        <?= number_format($cart['price']) . "VNĐ"; ?>
                    </th>
                    <th>
                        <input style="width:50px" min="1" type="number" name="qty[<?= $cart['id'];?>]"
                            value="<?= $cart['qty']; ?>" />
                    </th>
                    <th>
                        <?= number_format($cart['amount']) . "VNĐ"; ?>
                    </th>
                    <th class="text-center">
                        <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=<?= $cart['id']; ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </th>
                </tr>
                <?php $total_money += $cart['amount']; ?>
                <?php endforeach;?>
                <tr>
                    <th colspan="4">
                        <a class="btn btn-sm btn-danger" href="index.php?option=cart&delcart=all">
                            Xóa tất cả
                        </a>
                        <input type="submit" name="updateCart" class="btn btn-sm btn-info" value="Cập nhật" />
                        <a class="btn btn-sm btn-success" name="checkout"
                            href="index.php?option=cart&checkout=true">Thanh toán</a>
                    </th>
                    <th colspan=" 3" class="text-end">
                        <strong>Tổng tiền : <?=number_format($total_money) . "VNĐ";?></strong>
                    </th>
                </tr>
            </table>
            <?php else:?>
            <h3>Chưa có sản phẩm</h3>
            <?php endif ;?>
        </div>
    </section>
</form>
<?php require_once('views/frontend/footer.php'); ?>