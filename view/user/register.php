    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-5">Đăng kí tài khoản</h1></div>
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-12 col-md-12 col-lg-5 wow fadeIn text-center" data-wow-delay="0.1s">
                    <img src="<?=URL?>/uploads/system/kablam-welcome.png" alt="LOGO WELCOM" class="w-50">
                </div>
                <?php
                if($susscess == true){
                    ?>
                <div class="col-12 col-md-12 col-lg-7 wow fadeIn pt-lg-5" data-wow-delay="0.3s">
                    <div class="alert alert-success">
                        Tài khoản đã đăng kí thành công | <a href="<?=ACT.'dang-nhap'?>" class="alert-link px-1">&rarr; Đăng nhập</a>
                        <div>
                            <span class="fw-bold text-success">Tài khoản:</span> <?=$user?>
                        </div>
                        <div>
                            <span class="fw-bold text-success">Mật khẩu:</span> <?=$pass?>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                    ?>
                <div class="col-12 col-md-12 col-lg-7 wow fadeIn" data-wow-delay="0.3s">
                    <div class="fs-6 mb-2">Đã có tài khoản <a href="<?=ACT?>dang-nhap">&rarr; Đăng nhập</a></div>
                    <div class="fs-6"><span class="text-danger">&#10039;</span>: Thông tin bắt buộc điền</div>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form action="<?=ACT?>dang-ky" method="post">
                            <div class="row g-3 align-items-center">
                                <div class="col-12">
                                    <?php
                                    for ($i=1; $i < count($arr_error); $i++) { 
                                    ?>
                                        <div class="text-danger small mb-2">
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                <?php print_r($arr_error[$i])?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-floating">
                                        <input name="user" value="<?=$user?>" type="text"class="form-control" id="email" placeholder="">
                                        <label for="user">Tài khoản đăng nhập <span class="text-danger">&#10039;</span></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-floating">
                                        <input name="pass" value="<?=$pass?>" type="password" class="form-control" id="pass" placeholder="">
                                        <label for="pass">Mật khẩu <span class="text-danger">&#10039;</span></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-floating">
                                        <input name="email" value="<?=$email?>" type="text" class="form-control" id="email" placeholder="">
                                        <label for="email">Email <span class="small text-primary">(để lấy lại mật khẩu)</span></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-floating">
                                        <input name="verifypass" value="<?=$verifypass?>" type="password" class="form-control" id="veryfypass" placeholder="">
                                        <label for="veryfypass">Xác thực mật khẩu <span class="text-danger">&#10039;</span></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-floating">
                                        <input name="hovaten" value="<?=$hovaten?>" type="text" class="form-control" id="hovaten" placeholder="">
                                        <label for="hovaten">Họ và tên <span class="text-danger">&#10039;</span></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-floating">
                                        <input name="sodienthoai" value="<?=$sodienthoai?>" type="tel" class="form-control" id="phone" placeholder="">
                                        <label for="phone">Số điện thoại <span class="text-danger">&#10039;</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="diachi" value="<?=$diachi?>" type="text" class="form-control" id="address" placeholder="">
                                        <label for="address">Địa chỉ <span class="text-danger">&#10039;</span></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                        <button class="btn btn-primary w-25 py-lg-3 py-2" type="submit">Đăng ký</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Contact End -->
        