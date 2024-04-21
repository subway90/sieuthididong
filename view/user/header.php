<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FontAwesome -->
    <link rel="stylesheet" href="<?=URL?>publics/fonts/css/all.min.css">
    <!-- Bootstrap -->
    <script src="<?=URL?>publics/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="<?=URL?>publics/css/bootstrap.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="<?=URL?>publics/css/custom.css">
    <script src="<?=URL?>publics/js/countdown-time.js"></script>
    <!-- Icon - Title -->
    <link rel="shortcut icon" href="<?=URL?>/publics/img/logo.png" type="image/x-icon">
    <title>Vũ Trụ Mobile</title>
    <!-- SCRIPT -->
</head>
<?=showAlert()?>
<?php show_alert_2()?>
<body class="bg-secondary bg-opacity-10">
    <nav class="sticky-top navbar navbar-expand-lg navbar-light bg-success" data-bs-theme="dark">
        <div class="container p-0">
          <a class="navbar-brand text-light" href="#">Vũ Trụ Mobile</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=URL?>san-pham">Sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=URL?>gio-hang">Giỏ hàng</a>
              </li>
            <li class="nav-item dropdown" data-bs-theme="light">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tài khoản
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?=URL?>dang-nhap">Đăng nhập</a></li>
                    <li><a class="dropdown-item" href="<?=URL?>dang-ki">Đăng kí</a></li>
                    
                </ul>
                </li>
            </ul>
            <form class="d-flex" data-bs-theme="light">
              <input class="form-control me-2" type="search" placeholder="Nhập tên sản phẩm..." aria-label="Search">
              <button class="btn btn-outline-light w-50" type="submit">Tìm kiếm</button>
            </form>
          </div>
        </div>
    </nav>