<?php
use App\Models\Product;
use App\Libraries\Cart;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\User;

//them
if (isset($_REQUEST['addcat'])) {
    $id = $_REQUEST['addcat'];
    //chi tiết
    $product = Product::find($id);
    //tao mang
    $cart_item = array(
        'id' => $product->id,
        'price' => $product->price,
        'qty' => 1,
        'amount' => $product->price
    );

    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        if (Cart::cart_exists($carts, $id) == true) {
            $carts = Cart::cart_update($carts, $id, 1);

        } else {
            $carts[] = $cart_item;
        }
        $_SESSION['contentcart'] = $carts;

    } else {
        $carts[] = $cart_item;
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");
}
if (isset($_REQUEST['delcart'])) {
    $id = $_REQUEST['delcart'];
    if (isset($_SESSION['contentcart'])) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_delete($carts, $id);
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");

}
if (isset($_POST['updateCart'])) {

    $arr_qty = $_POST['qty'];
    foreach ($arr_qty as $id => $number) {
        $carts = $_SESSION['contentcart'];
        $carts = Cart::cart_update($carts, $id, $number, "update");
        $_SESSION['contentcart'] = $carts;
    }
    header("location:index.php?option=cart");

}
if (isset($_REQUEST['checkoutCart'])) {
    $user = User::find($_SESSION['user_id']);
    $date = getdate();
    $order = new Order();
    $order->code = $date[0];
    $order->user_id = $_SESSION['user_id'];
    $order->deliveryaddress = (isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress'] : $user['address']);
    $order->deliveryname = (isset($_POST['deliveryname']) ? $_POST['deliveryname'] : $user['name']);
    $order->deliveryphone = (isset($_POST['deliveryphone']) ? $_POST['deliveryphone'] : $user['name']);
    $order->deliveryemail = (isset($_POST['deliveryemail']) ? $_POST['deliveryemail'] : $user['email']);
    $order->created_at = date('Y-m-d H:i:s');
    $order->status = 2;
    if ($order->save()) {
        $carts = $_SESSION['contentcart'];
        foreach ($carts as $cart) {
            $orderdetail = new Orderdetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['amount'];
            $orderdetail->save();
        }
    }
    unset($_SESSION['contentcart']);
    header("location:index.php?option=cart");
}
if (isset($_REQUEST['checkout'])) {
    require_once('views/frontend/cart-checkout.php');

} else {
    require_once('views/frontend/cart-content.php');
}