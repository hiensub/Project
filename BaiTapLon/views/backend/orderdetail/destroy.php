<?php

use App\Models\Orderdetail;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Orderdetail::find($id);
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi cơ sở dữ liệu thành công']);
header('location: index.php?option=orderdetail&cat=trash');