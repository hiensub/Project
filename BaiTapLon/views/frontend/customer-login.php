<?php require_once('views/frontend/header.php');?>
<?php

use App\Models\User;
if(isset($_POST['dangnhap'])){
    $message_alert ="";
    $username = $_POST['username'];
    $password = sha1( $_POST['password']);
    $args =null;
    if(filter_var($username, FILTER_VALIDATE_EMAIL)){
         $args = [
            ['email','=',$username],
            ['roles','=', 0],
            ['status','=', 1]
         ];
    }
    else{ 
        $args = [
            ['email','=',$username],
            ['roles','=', 0],
            ['status','=', 1]
    ];
    }
    $user = User::where( $args)->first();
    if ($user != null) {
        if ($user->password == $password) {
            $_SESSION['logincustomer'] = sha1($username);
            $_SESSION['name'] = $user->name;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['image'] = isset($user->image) ? $user->image : 'admin.jpg';
            
        } else {
            $error_login = "Mật khẩu không chính xác";
        }
    } else {
        $error_login = "Tên đăng nhập không tồn tại";
    }
}
?>
<section class="maincontent clearfix">
    <form method="POST">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="category-title position-relative">
                        <h2 class="text-center">ĐĂNG NHẬP THÀNH VIÊN</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <form action="" method="POST">
                                <?php if(!isset($_SESSION['logincustomer'])):?>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Tên đăng nhập hoặc email</label>
                                    <input class="form-control" style="width:650px" id="username" name="username"
                                        type="text" placeholder="Tên đăng nhập">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input class="form-control" style="width:650px" id="password" name="password"
                                        type="text" placeholder="Mật khẩu">
                                </div>
                                <div class="mb-3">
                                    <button name="dangnhap" type="submit" class="btn btn-success">ĐĂNG NHẬP</button>
                                </div>
                                <?php else :?>

                                <div class="input-group mb-3">
                                    <div class="alert alert-info" style="width:650px">Bạn đã đăng nhập thành công</div>
                                </div>
                                <?php endif ;?>
                            </form>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end col-md-12 col-lg-12-->
            </div>
        </div>

    </form>
</section>
<?php require_once('views/frontend/footer.php');?>