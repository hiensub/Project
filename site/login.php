<?php include_once('header.html');?>
    <section class="maincontent clearfix">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="category-title position-relative">
                        <h2 class="text-center">ĐĂNG NHẬP THÀNH VIÊN</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Tên đăng nhập hoặc email</label>
                                    <input class="form-control" id="username" name="username" type="text" placeholder="Tên đăng nhập">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input class="form-control" id="password" name="password" type="text" placeholder="Mật khẩu">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">ĐĂNG NHẬP</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!--end row-->
                </div>
                <!--end col-md-12 col-lg-12-->
            </div>
        </div>
    </section>
    <!--end maincontent-->
   <?php include_once('footer.html');?>