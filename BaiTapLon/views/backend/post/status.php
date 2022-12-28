<?php

use App\Models\Post;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Post::find($id);
if ($row == null) {
    MessageArt::set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
    header('location: index.php?option=post');
}
$row->status = ($row['status'] == 1) ? 2 : 1;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = $_SESSION['user_id']; //id người đăng nhập
$row->save();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công']);

header('location: index.php?option=post');