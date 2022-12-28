<?php
use App\Models\Post;
use App\Models\Topic;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['Them'])) {
    $row = new Post();
    $row->title = $_POST['title'];
    $row->detail = $_POST['detail'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->topic_id = $_POST['topic_id'];

    //$row->image = $_POST['image'];
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['title']);
    $row->created_at = date('Y-m-d H:i:s');
    $row->created_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=post');

}
if (isset($_POST['Capnhat'])) {
    $id = $_POST['id'];
    $row = Post::find($id);
    $row->title = $_POST['title'];
    $row->detail = $_POST['detail'];
    $row->metadesc = $_POST['metadesc'];
    $row->metakey = $_POST['metakey'];
    $row->topic_id = $_POST['topic_id'];
    //$row->image = $_POST['image'];
    $row->status = $_POST['status'];
    $row->slug = Mystring::str_slug($_POST['title']);
    $row->updated_at = date('Y-m-n H:i:s');
    $row->updated_by = $_SESSION['user_id'];
    $row->save();
    MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
    header('location: index.php?option=post');

}