<?php
use App\Models\Slider;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['Them'])) {
    $row = new Slider();
    $row->name = $_POST['name'];
    $row->link = $_POST['link'];
    $row->position = $_POST['position'];
    $row->sort_order = $_POST['sort_order'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $path_dir = "../public/images/slider/";
    $file = $_FILES["image"];
    $path_file = $path_dir . basename($file["name"]);
    $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
    if (in_array($file_extension, ['png', 'gif', 'jpg'])) {
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;

        //end upload
        $row->save();
        MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
        header('location: index.php?option=slider');
    } else {
        MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Kiểu ảnh không hợp lệ']);
        header('location: index.php?option=slider&cat=create');
    }
}
if (isset($_POST['Capnhat'])) {
    $id = $_POST['id'];
    $row = Slider::find($id);
    $row->name = $_POST['name'];
    $row->link = $_POST['link'];
    $row->position = $_POST['position'];
    $row->sort_order = $_POST['sort_order'];
    $row->status = $_POST['status'];
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $row->updated_at = date('Y-m-d H:i:s');
    $row->updated_by = $_SESSION['user_id'];
    if (strlen($_FILES["image"]['name']) != 0) {
        $path_dir = "../public/images/slider/";
        $file = $_FILES["image"];
        $path_file = $path_dir . basename($file["name"]);
        $file_extension = strtolower(pathinfo($path_file, PATHINFO_EXTENSION));
        if (!in_array($file_extension, ['png', 'gif', 'jpg'])) {
            MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Kiểu ảnh không hợp lệ']);
            header('location: index.php?option=slider&cat=edit');
        }
        $path_file = $path_dir . $row->slug . "." . $file_extension;
        $path_delete = $path_dir . $row->image;
        if (file_exists($path_delete)) {
            unlink($path_delete);
        }
        move_uploaded_file($file['tmp_name'], $path_file);
        $row->image = $row->slug . "." . $file_extension;
    }
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=slider');

}