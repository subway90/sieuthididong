<div class="container mt-lg-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-5 p-0 bg-success-subtle text-center pt-4">
            <img class="w-50" src="/publics/img/system/login-bg.png" alt="LOGIN">
        </div>

        <div class="col-12 col-md-12 col-lg-7 bg-light p-0 py-3">
            <div class="row px-4">
                <div class="col-12">
                    <div class="text-success h4 text-center mb-4">Đăng nhập</div>
                </div>
                <form ng-submit="login()">
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-75">
                            <input type="text" ng-model="username" class="form-control bg-success-subtle" id="floatingInput" placeholder="Nhập TK" required>
                            <label for="floatingInput">Tài khoản đăng nhập</label>
                        </div>
                    </div>
                    <div class="col-12 text-center d-flex justify-content-center">
                        <div class="form-floating mb-3 w-75">
                            <input type="password" ng-model="password" class="form-control bg-success-subtle" id="floatingInput" placeholder="MK" required>
                            <label for="floatingInput">Mật khẩu</label>
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
                <div class="col-6">
                    <a href="#" class="w-100 btn btn-outline-primary">
                        <i class="fab fa-facebook"></i>
                        tiếp tục với Facebook
                    </a>
                </div>
                <div class="col-6">
                    <a href="#" class="w-100 btn btn-outline-danger">
                        <i class="fab fa-google"></i>
                        tiếp tục với Google
                    </a>
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