<?php

use App\Models\Post;

$id = $_REQUEST['id'];
$row = Post::find($id);
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = $_SESSION['user_id']; //id người đăng nhập
$row->save();
header('location: index.php?option=post');