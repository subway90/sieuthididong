<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>MS | <?php if(isset($title) && !empty($title)) echo($title); else echo'404 NOT FOUND'?></title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="<?=URL?>/uploads/system/logo-muasach-1000x1000.png" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="<?=URL?>/assets/admin/css/style.css" />
    <!-- cdn google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    
</head>

<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header bg-success bg-opacity-50">
                    <a class="sa-sidebar__logo" href="<?=URL_ADMIN?>">
                        <!-- logo -->
                        <div class="sa-sidebar-logo">
                            <span class="text-light">Hệ thống quản lí MS</span>
                        </div>
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body bg-success bg-opacity-10" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <!-- <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>admin-dashboard" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí doanh thu</span>
                                    </a>
                                </li> -->
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>product" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí sách</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>category" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí danh mục</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>publishing" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fa fa-certificate" aria-hidden="true"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí nhà xuất bản</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>author" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-marker"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí tác giả</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí hóa đơn</span>
                                    </a>
                                </li>
                                <!--<li class="sa-nav__menu-item sa-nav__menu-item--has-icon"
                                    data-sa-collapse-item="sa-nav__menu-item--open"><a href="#" class="sa-nav__link"
                                        data-sa-collapse-trigger="">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí loại hàng</span>
                                            <span class="sa-nav__arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                                <path d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z">
                                                </path>
                                                </svg></span></a>
                                    <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                        <li class="sa-nav__menu-item"><a href="<?=ACT_ADMIN?>admin-category-v1"
                                                class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Loại hàng mẹ (Lv1)</span></a></li>
                                        <li class="sa-nav__menu-item"><a href="<?=ACT_ADMIN?>admin-category"
                                                class="sa-nav__link"><span
                                                    class="sa-nav__menu-item-padding"></span><span
                                                    class="sa-nav__title">Loại hàng con (Lv2)</span></a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>admin-accounts" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí tài khoản</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="sa-toolbar__item">
                        Hệ thống quản lí Thế giới Sách
                    </div>
                    <div class="mx-auto"></div>

                    <div class="dropdown sa-toolbar__item">
                        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            data-bs-offset="0,1" aria-expanded="false">
                            <span class="sa-toolbar-user__info">
                                <span class="sa-toolbar-user__title <?=role_text($_SESSION['user']['role'])?>">
                                <?=$_SESSION['user']['fullName']?>
                                </span>
                                <span class="sa-toolbar-user__subtitle">
                                <?=$_SESSION['user']['email']?>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="<?=URL?>">Trang chủ</a>
                                <a class="dropdown-item text-danger" href="<?=ACT."dang-xuat"?>">Thoát</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>

<!-- function show alert -->
<?=showAlert()?>