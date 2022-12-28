<?php include_once('header.html');?>
    <!--.end header-->
    <section class="maincontent clearfix">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="category-title position-relative">
                        <h2 class="text-center">GIỎ HÀNG</h2>
                    </div>
                    <div class="row">
                        <form action="" method="POST">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr class="bg-success text-light">
                                        <th style="width:20px;" class="text-center">ID</th>
                                        <th style="width:100px;" class="text-center">Hình</th>
                                        <th>Tên sản phẩm</th>
                                        <th style="width:100px;" class="text-center">Số lượng</th>
                                        <th style="width:120px;" class="text-center">Giá</th>
                                        <th style="width:140px;" class="text-center">Thành tiền</th>
                                        <th style="width:100px;"></th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td class="text-center">12</td>
                                        <td>
                                            <img class="img-fluid" src="assets/images/product/the-thao-02.jpg"
                                                alt="Hình">
                                        </td>
                                        <td>Áo thể thao</td>
                                        <td class="text-center">
                                            <input class="form-control" name="qty[]" type="number" min="0" value="0">
                                        </td>
                                        <td class="text-center">
                                            290000
                                        </td>
                                        <td class="text-center">
                                            580000
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">19</td>
                                        <td>
                                            <img class="img-fluid" src="assets/images/product/the-thao-02.jpg"
                                                alt="Hình">
                                        </td>
                                        <td>Áo thể thao</td>
                                        <td class="text-center">
                                            <input class="form-control" name="qty[]" type="number" min="0" value="0">
                                        </td>
                                        <td class="text-center">
                                            290000
                                        </td>
                                        <td class="text-center">
                                            580000
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <a class="btn btn-sm btn-primary" href="#">Mua thêm sả phẩm</a>
                                            <a class="btn btn-sm btn-success" href="#">Thanh toán</a>
                                            <button type="submit" class="btn btn-sm btn-info">Cập nhật</button>
                                        </td>
                                        <td class="text-right" colspan="2"><strong>Tổng tiền: 1.000.000</strong>
                                            <sup>đ</sup></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                    <!--end row-->
                </div>
                <!--end col-md-12 col-lg-12-->
            </div>
        </div>
    </section>
    <!--end maincontent-->
    <?php include_once('footer.html');?>