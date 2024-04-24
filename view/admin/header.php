<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>MS | <?php if(isset($title) && $title) echo $title; else echo 'NO TITLE' ?> </title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="<?=URL?>/uploads/logo.png" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="<?=URL?>/publics/admin/css/style.css" />
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
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>series" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Series</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>model" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                        <i class="fas fa-microchip"></i>
                                        </span>
                                        <span class="sa-nav__title">Model</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>detail" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                        <i class="fa fa-mobile"></i>
                                        </span>
                                        <span class="sa-nav__title">Detail</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>style" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                        <i class="fas fa-swatchbook"></i>
                                        </span>
                                        <span class="sa-nav__title">Style</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>category" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                        <i class="fas fa-stream"></i>
                                        </span>
                                        <span class="sa-nav__title">Category</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                        <span class="sa-nav__title">Invoice</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="sa-nav__title">Account</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-poll-h"></i>
                                        </span>
                                        <span class="sa-nav__title">Feedback</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-comment"></i>
                                        </span>
                                        <span class="sa-nav__title">Comment</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                        <span class="sa-nav__title">Interface</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=ACT_ADMIN?>bill" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user-shield"></i>
                                        </span>
                                        <span class="sa-nav__title">Adminitrator</span>
                                    </a>
                                </li>
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
                                <a class="dropdown-item text-danger" href="<?=URL."dang-xuat"?>">Thoát</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>

<!-- function show alert -->
<?=showAlert('top: 30px')?>