<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--FontAwesome -->
  <link rel="stylesheet" href="<?= URL ?>publics/fonts/css/all.min.css">
  <!-- Bootstrap -->
  <script src="<?= URL ?>publics/js/bootstrap.bundle.js"></script>
  <link rel="stylesheet" href="<?= URL ?>publics/css/bootstrap.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="<?= URL ?>publics/css/custom.css">
  <!-- Icon - Title -->
  <link rel="shortcut icon" href="<?= URL ?>/publics/img/logo.png" type="image/x-icon">
  <title> <?php if (isset($title))
    echo $title;
  else
    echo WEB_TITLE ?> </title>
    <!-- SCRIPT -->
  </head>
<?= showAlert('') ?>
<?php show_alert_2() ?>
<?php show_delayTime() ?>

<body class="bg-secondary bg-opacity-10">
  <nav class="sticky-top navbar navbar-expand-lg navbar-light bg-success" data-bs-theme="dark">
    <div class="container p-lg-0">
      <a class="navbar-brand text-light" href="<?= URL ?>"><?= WEB_TITLE ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= URL ?>trang-chu">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>san-pham">Sản phẩm</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>gio-hang">Giỏ hàng</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>tin-tuc/tat-ca">Tin tức</a>
          </li>
          <?php if ($_SESSION['user']) { ?>
            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img width="30" class="" src="<?= pathImage($_SESSION['user']['image']) ?>"
                  alt="<?= $_SESSION['user']['image'] ?>">
                <?= $_SESSION['user']['fullName'] ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if ($_SESSION['user']['role'] == 1) { ?>
                  <li><a class="dropdown-item text-danger fw-bold" href="<?= URL_ADMIN ?>">Quản lí</a></li>
                  <li><a class="dropdown-item text-danger" href="<?= URL ?>test">Test Area</a></li>
                  <hr class="border-2 btn-dark my-2">
                <?php } ?>
                <li><a class="dropdown-item text-success" href="<?= URL ?>lich-su-mua-hang">Lịch sử mua hàng</a></li>
                <li><a class="dropdown-item text-warning" href="<?= URL ?>thong-tin">Cập nhật thông tin</a></li>
                <hr class="border-2 btn-dark my-2">
                <li><a class="dropdown-item text-danger" href="<?= URL ?>dang-xuat">Đăng xuất</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav-item dropdown" data-bs-theme="light">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Tài khoản
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= URL ?>lich-su-mua-hang">Tra đơn hàng</a></li>
                <li><a class="dropdown-item" href="<?= URL ?>dang-nhap">Đăng nhập</a></li>
                <li><a class="dropdown-item" href="<?= URL ?>dang-ky">Đăng ký</a></li>

              </ul>
            </li>
          <?php } ?>
        </ul>
        <form action="<?= URL ?>san-pham/tim-kiem" method="post" class="d-flex" data-bs-theme="light">
          <input name="search" value="<?= showKeyWordSearch() ?>" class="form-control me-2" type="search"
            placeholder="Nhập tên sản phẩm..." aria-label="Search">
          <button class="btn btn-outline-light w-50" type="submit">Tìm kiếm</button>
        </form>
      </div>
    </div>
  </nav>