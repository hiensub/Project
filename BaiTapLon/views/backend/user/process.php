<?php
use App\Models\User;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['Them'])) {
    $row = new User();
    $row->name = $_POST['name'];
    $row->username = $_POST['username'];
    $row->password = $_POST['password'];
    $row->email = $_POST['email'];
    $row->gender = $_POST['gender'];
    //$row->image = $_POST['image'];
    $row->status = $_POST['status'];
    $row->phone = $_POST['phone'];
    $row->roles = $_POST['roles'];
    $row->address = $_POST['address'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=user');

}
if (isset($_POST['Capnhat'])) {
    $id = $_POST['id'];
    $row = User::find($id);
    $row->name = $_POST['name'];
    $row->username = $_POST['username'];
    $row->password = $_POST['password'];
    $row->email = $_POST['email'];
    $row->gender = $_POST['gender'];
    //$row->image = $_POST['image'];
    $row->status = $_POST['status'];
    $row->phone = $_POST['phone'];
    $row->roles = $_POST['roles'];
    $row->address = $_POST['address'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=user');

}