<?php

use App\Models\Slider;
use App\Libraries\MessageArt;

$id = $_REQUEST['id'];
$row = Slider::find($id);
$row->delete();
MessageArt::set_flash('message', ['type' => 'success', 'msg' => 'Xóa khỏi cơ sở dữ liệu thành công']);
header('location: index.php?option=slider&cat=trash');