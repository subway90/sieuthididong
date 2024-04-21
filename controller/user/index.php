<?php

# [FILES]
require_once "../../config/APP.php";
require_once "../../config/URL.php";
require_once "../../model/pdo.php";
require_once "../../model/function.php";
require_once "../../model/user/product.php";
require_once "../../model/user/user.php";
require_once "../../model/user/cart.php";
require_once "../../model/user/bill.php";
require_once "../../model/user/notifycation.php";

# [FUNCTION]
ob_start(); 
session_start();
show_alert();

# [SESSION]
if(!isset($_SESSION['user'])) $_SESSION['user'] = [];
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if(!isset($_SESSION['alert'])) $_SESSION['alert'] = "";
if(!isset($_SESSION['alert_2'])) $_SESSION['alert_2'] = "";
if(!isset($_SESSION['alert_3'])) $_SESSION['alert_3'] = [];
if(!isset($_SESSION['user_google'])) $_SESSION['user_google'] = [];
if(!isset($_SESSION['user_facebook'])) $_SESSION['user_facebook'] = [];

# [COOKIE]
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) autoLogin($_COOKIE['username'],$_COOKIE['password']);

# [VARIBLE START]
if(!empty($_SESSION['user'])){
$bellActive = false; $notify = 0;
$listFB = getAllByIdUser('feedback',$_SESSION['user']['id'],1);
    $countNotify = count($listFB);
    for ($i=0; $i < $countNotify; $i++) { 
        extract($listFB[$i]);
        if($statusUser == 1) {
            $notify++;
            $bellActive = true;
        }
    }
}
$point_valid=0;
$arr_error = [];
$activeModal = 'hide';
$countProductInCart = showCart(1);
$listCart = showCart(2);
$total = showCart(3);

# [CASE]
if(isset($_GET['act'])){
    $arrayURL = explode('/',$_GET['act']);
    $act=$arrayURL[0];
    ##UPDATE
    if(PAGE_UPDATE === true) require_once 'case/update.php';
        switch($act) {
            case "app":
                require_once 'case/app.php';
                break;
            case "trang-chu":
                $title='Trang chủ';
                require_once 'case/home.php';
                break;
            case "chi-tiet":
                $title='Chi tiết sản phẩm';
                require_once 'case/detail.php';
                break;
            case "dang-nhap":
                $title='Đăng nhập';
                require_once 'case/login.php';
                break;
            case "dang-ky":
                $title = "Đăng kí tài khoản";
                require_once 'case/register.php';
                break;
            case "dang-xuat":
                require_once 'case/logout.php';
                break;
            case "gio-hang":
                $title='Giỏ hàng';
                require_once 'case/cart.php';
                break;
            case "san-pham":
                $title = "Sản phẩm";
                require_once 'case/product.php';
                break;
            case "lich-su-mua-hang":
                $title = "Lịch sử mua hàng";
                require_once 'case/bill-history.php';
                break;
            case "thong-tin":
                $title = "Thông tin cá nhân";
                require_once 'case/info.php';
                break;
            case "thong-bao":
                $title = "Thông báo";
                require_once 'case/notifycation.php';
                break;
            case "danh-gia":
                $title = "Đánh giá sản phẩm";
                require_once 'case/notifycation.php';
                break;
            case "test":
                $title = '&#9760; BUG &#9760;';
                require_once 'case/test.php';
                break;
            default:
                $title = "404 NOT FOUND";
                include "../../view/user/header.php";
                include "../../view/user/404.php";
                break;
        }
}else{
    $title = "Trang chủ";
    require_once "../../view/user/header.php";
    require_once "../../view/user/home.php";
}
# [LAYOUT]
require_once "../../view/user/footer.php";
