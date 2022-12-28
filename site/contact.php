<?php include_once('header.html');?>
    <section class="maincontent clearfix">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="category-title position-relative">
                        <h2 class="text-center">LIÊN HỆ</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            GOOGLE
                        </div>
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <h3>THÔNG TIN LIÊN HỆ</h3>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Họ tên</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Họ tên"
                                        aria-describedby="fullname">
                                    <div id="fullname" class="form-text">Ví dụ: Nguyễn Văn An</div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="email" class="form-control" id="email" placeholder="E-Mail"
                                        aria-describedby="email">
                                    <div id="email" class="form-text">Ví dụ: nguyenvanan@gmail.com</div>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Điện thoại</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Điện thoại"
                                        aria-describedby="phone">
                                    <div id="phone" class="form-text">Ví dụ: 0987654321</div>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Tiêu đề"
                                        aria-describedby="title">
                                    <div id="title" class="form-text">Ví dụ: Cho hỏi về cộng tác viên</div>
                                </div>
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Nội dung</label>
                                    <textarea class="form-control" id="fullname" rows="3" placeholder="Nội dung"
                                        aria-describedby="detail"></textarea>
                                    <div id="detail" class="form-text">Ví dụ: Cho </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">GỬI LIÊN HỆ</button>
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