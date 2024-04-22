<div class="container mt-lg-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-5 p-0 bg-success-subtle text-center pt-4">
            <img class="w-50" src="<?=URL?>publics/img/system/login-bg.png" alt="login-bg.png">
        </div>

        <div class="col-12 col-md-12 col-lg-7 bg-light p-0 py-3">
            <div class="row px-4">
                <div class="col-12">
                    <div class="text-success h4 text-center mb-4">Đăng nhập</div>
                </div>
                <form  action="<?=URL?>dang-nhap<?=$subURL?>" method="post">
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" name="user" value="<?=$username?>" class="form-control bg-success-subtle" id="floatingInput" placeholder="Nhập TK">
                            <label for="floatingInput">Tài khoản đăng nhập</label>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-75">
                            <input type="password" name="password" class="form-control bg-success-subtle" id="floatingInput" placeholder="MK">
                            <label for="floatingInput">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="col-12 text-start d-flex justify-content-center">
                        <div class="form-check form-switch w-50">
                            <input <?=$remember?> class="form-check-input border-success bg-success" name="rememberUser" role="switch" type="checkbox" value="checked" id="rememberUser">
                            <label class="form-check-label text-success" for="rememberUser">Ghi nhớ tài khoản</label>
                        </div>
                        <div class="w-25 text-end">
                            <a class="nav-link text-danger" href="#"><i class="fas fa-question-circle"></i> Quên mật khẩu</a>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success">
                            Đăng nhập
                        </button>
                    </div>
                </form>
                <div class="col-12">
                    <div class="py-3 small fw-semi text-secondary text-center">hoặc</div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php if(LOGIN_FACEBOOK) {?>
                    <div class="col-6 mx-1">
                        <a href="<?=$loginUrl?>" class="w-100 btn btn-outline-primary">
                            <i class="fab fa-facebook me-1"></i>
                            đăng nhập với Facebook
                        </a>
                    </div>
                    <?php } if(LOGIN_GOOGLE) {?>
                    <div class="col-6 mx-1">
                        <a href="<?=$authUrl?>" class="w-100 btn btn-outline-danger">
                            <i class="fab fa-google me-1"></i>
                            đăng nhập với Google
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <div class="text-center py-3">
                        <a class="text-decoration-none text-success" href="<?=URL?>dang-ky">Đăng ký tài khoản</a>
                    </div>
                </div>
        </div>
        </div>

    </div>
</div>