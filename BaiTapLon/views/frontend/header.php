<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    <link rel="shortcut icon" href="public/ico/favicon.png">
    <link rel="shortcut icon" href="favicon.ico">
    -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">

    <link rel="stylesheet" href="public/css/layout.css">
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/all.min.js"></script>


    <title>Hiddel Shop</title>
</head>

<body>
    <header>
        <section class="topbar clearfix bd-green-500">
            <div class="container py-1">
                <div class="row">
                    <div class="col-md-6">
                        Chào mừng bạn đến với <strong>HDL</strong>Shop
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="nav justify-content-end py-0">
                            <?php if (!isset($_SESSION['logincustomer'])): ?>
                            <li class="nav-item">
                                <a class="nav-link py-0 text-light" href="index.php?option=customer&f=register"><i
                                        class="fas fa-user"></i> Đăng
                                    ký</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-0 text-light" href="index.php?option=customer&f=login"> <i
                                        class="fas fa-user"></i> Đăng
                                    nhập</a>
                            </li>
                            <?php else: ?>
                            <a class="nav-link py-0 text-light" href="index.php?option=customer&f=logout"> <i
                                    class="fas fa-user"></i> Đăng
                                xuất</a>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="header clearfix">
            <div class="container my-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="public/images/logo.png" class="img-fluid" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <!-- <select name="" class="form-select border-right-0" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <option value="">Danh mục sản phẩm</option>
                                <option value="">Thời trang nam</option>
                                <option value="">Thời trang nữ</option>
                                <option value="">Thời trang bé trai</option>
                                <option value="">Thời trang bé nữ</option>
                                <option value="">Thời trang thể thao</option>
                            </select>
                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                <i class="fas fa-search"></i>
                            </button> -->
                        </div>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="index.php?option=cart" class="btn btn-success position-relative">
                            <i class="fas fa-shopping-bag"></i>
                            <!-- <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                <span class="visually-hidden">unread messages</span>
                            </span> -->
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="mainmenu clearfix bd-green-500">
            <div class="container">
                <?php require_once("views/frontend/mod_mainmenu.php"); ?>
            </div>
        </section>

        <!-- end slideshow-->
    </header>