<?php

use App\Models\Menu;

$id = $_REQUEST['id'];
$row = Menu::find($id);
$row->status = 0;
$row->updated_at = date('Y-m-d H:i:s');
$row->updated_by = 1; //id người đăng nhập
$row->save();
header('location: index.php?option=menu');