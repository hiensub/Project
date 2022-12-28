<?php

use App\Models\Topic;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Topic::find($id);
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi cơ sở dữ liệu thành công']);
header('location: index.php?option=topic&cat=trash');