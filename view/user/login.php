    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-5">Đăng nhập tài khoản</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn text-center" data-wow-delay="0.5s">
                    <img src="<?=URL?>/uploads/system/kablam-welcome.png" alt="LOGO WELCOM" class="w-50">
                </div>
                <div class="col-lg-7 wow fadeIn pt-lg-5" data-wow-delay="0.1s">
                    <p class="mb-4">Bạn chưa có tài khoản <a href="<?=ACT?>dang-ky">&rarr; Đăng kí</a></p>
                    <?=showError($arr_error)?>
                    <div class="wow fadeIn" data-wow-delay="0.3s">
                        <form action="<?=ACT?>dang-nhap<?=$subURL?>" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="user" value="<?=$username?>" type="text"class="form-control" id="email" placeholder="Your Email">
                                        <label for="user">Tài khoản đăng nhập</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="password" value="" type="password" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input <?=$remember?> class="form-check-input" name="rememberUser" type="checkbox" value="checked" id="rememberUser">
                                        <label class="form-check-label" for="rememberUser">Ghi nhớ tài khoản</label>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-lg-start justify-content-between align-items-center">
                                        <button class="btn btn-primary " type="submit">Đăng nhập</button>
                                        <small class="mx-3 text-muted">hoặc với</small>
                                        <span class="">
                                            <!-- Google Login -->
                                            <?php if(LOGIN_GOOGLE) { ?>
                                            <a href="<?=$authUrl?>" class="btn border-1 btn-outline-danger">
                                                <div class="d-flex align-items-center"><i class="fab fa-google me-2"></i><small>google</small></div>
                                            </a>
                                            <?php } if(LOGIN_FACEBOOK){ ?>
                                            <!-- Facebook Login -->
                                            <a href="<?=$loginUrl?>" class="btn border-1 btn-outline-blue">
                                                <div class="d-flex align-items-center"><i class="fab fa-facebook me-2"></i><small>facebook</small></div>
                                            </a>
                                            <?php } ?>
                                        </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
        