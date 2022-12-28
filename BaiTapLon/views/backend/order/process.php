<?php
use App\Models\Order;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['Them'])) {
    $row = new Order();
    $row->code = $_POST['code'];
    $row->user_id = $_POST['user_id'];
    $row->deliveryaddress = $_POST['deliveryaddress'];
    $row->deliveryname = $_POST['deliveryname'];
    $row->deliveryphone = $_POST['deliveryphone'];
    $row->deliveryemail = $_POST['deliveryemail'];
    //$row->image = $_POST['image'];
    $row->status = $_POST['status'];
    //$row->slug = Mystring::str_slug($_POST['name']);
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=order');

}
if (isset($_POST['Capnhat'])) {
    $id = $_POST['id'];
    $row = Order::find($id);
    $row->code = $_POST['code'];
    $row->user_id = $_POST['user_id'];
    $row->deliveryaddress = $_POST['deliveryaddress'];
    $row->deliveryname = $_POST['deliveryname'];
    $row->deliveryphone = $_POST['deliveryphone'];
    $row->deliveryemail = $_POST['deliveryemail'];
    //$row->image = $_POST['image'];
    $row->status = $_POST['status'];
    //$row->slug = Mystring::str_slug($_POST['name']);
    $row->updated_at = date('Y-m-n H:i:s');
    $row->updated_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header('location: index.php?option=order');

}