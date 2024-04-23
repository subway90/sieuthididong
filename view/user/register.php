<div class="container mt-lg-5">
    <div class="row">

        <div class="col-12 col-md-12 col-lg-5 p-0 bg-success-subtle text-center pt-4">
            <img class="w-50" src="/publics/img/system/login-bg.png" alt="LOGIN">
        </div>

        <div class="col-12 col-md-12 col-lg-7 bg-light p-0 py-3">
            <form action="<?=URL?>dang-ky&<?=$subURL?>" method="post">
            <div class="row px-4">
                <div class="col-12">
                    <div class="text-success h4 text-center mb-4">Đăng ký tài khoản</div>
                </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="user" value="<?=$user?>" type="text" class="form-control bg-success-subtle" id="user" placeholder="name@example.com">
                            <label for="user">Tài khoản</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="pass" value="<?=$pass?>" type="password" class="form-control bg-success-subtle" id="pass" placeholder="name@example.com">
                            <label for="pass">Mật khẩu</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="fullName" value="<?=$fullName?>" type="text" class="form-control bg-success-subtle" id="birthday" placeholder="name@example.com">
                            <label for="birthday">Họ và tên</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="phone" value="<?=$phone?>" type="text" class="form-control bg-success-subtle" id="phone" placeholder="name@example.com">
                            <label for="phone">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="email" value="<?=$email?>" type="text" class="form-control bg-success-subtle" id="birthday" placeholder="name@example.com">
                            <label for="birthday">Email</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="verifypass" value="<?=$verifypass?>" type="password" class="form-control bg-success-subtle" id="phone" placeholder="name@example.com">
                            <label for="phone">Xác thực mật khẩu</label>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-100">
                            <input name="address" value="<?=$address?>" type="text" class="form-control bg-success-subtle" id="address" placeholder="name@example.com">
                            <label for="address">Địa chỉ nhận hàng</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <?= showError($arr_error) ?>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-outline-success">
                            Đăng ký
                        </button>
                    </div>
            </form>
                <div class="col-12">
                    <div class="py-3 small fw-semi text-secondary text-center">hoặc</div>
                </div>
                <div class="col-12">
                    <div class="text-center">
                        <a class="text-decoration-none text-success" href="<?=URL?>dang-nhap">Đăng nhập tài khoản</a>
                    </div>
                </div>
        </div>
        </div>

    </div>
</div>