<?php

use App\Models\Topic;

$id = $_REQUEST['id'];
$row = Topic::find($id);
$row->status = 2;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = $_SESSION['user_id']; //id người đăng nhập
$row->save();
header('location: index.php?option=topic&cat=trash');