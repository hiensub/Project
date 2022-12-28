<?php
session_start();

require_once('vendor/autoload.php');
require_once('config/database.php');


use App\Libraries\Route; //goi tap tin lop

Route::route_site();