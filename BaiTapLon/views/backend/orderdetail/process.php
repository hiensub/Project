<?php
use App\Models\Orderdetail;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['Them'])) {
    $row = new Orderdetail();
    $row->order_id = $_POST['order_id'];
    $row->product_id = $_POST['product_id'];
    $row->price = $_POST['price'];
    $row->qty = $_POST['qty'];
    $row->amount = $_POST['amount'];
    //$row->image = $_POST['image'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=orderdetail');

}
if (isset($_POST['Capnhat'])) {
    $id = $_POST['id'];
    $row = Orderdetail::find($id);
    $row->order_id = $_POST['order_id'];
    $row->product_id = $_POST['product_id'];
    $row->price = $_POST['price'];
    $row->qty = $_POST['qty'];
    $row->amount = $_POST['amount'];
    //$row->image = $_POST['image'];

    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header('location: index.php?option=orderdetail');

}