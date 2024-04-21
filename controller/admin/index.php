<?php
# [FILE CONFIG]
require_once "../../config/URL.php";
require_once "../../config/APP.php";
require_once "../../model/function.php";

# [FUNCTION]
session_start();
ob_start();
show_alert();

# [SESSION]
if(!isset($_SESSION['alert'])) $_SESSION['alert'] = [];

# [Authorization]
if(empty($_SESSION['user']) || $_SESSION['user']['role'] != 1){
    require_once "../../view/header.php";
    require_once "../../view/404.php";
    require_once "../../view/footer.php";
    exit;
}else{
    # [FILE MODEL]
    require_once "../../model/pdo.php";
    require_once "../../model/admin/product.php";
    require_once "../../model/admin/category.php";
    require_once "../../model/admin/publishing.php";
    require_once "../../model/admin/author.php";
    require_once "../../model/admin/bill.php";

    //controller
    if(isset($_GET['act'])){
        $act=$_GET['act'];
            switch ($act) {

                // [SẢN PHẨM - SP]
                case "product":
                    $title="Danh sách sản phẩm";
                    require_once "case/product.php";
                    break;
                // [THÊM SP]
                case "product-add":
                    $title="Thêm sản phẩm";
                    require_once "case/product-add.php";
                    break;
                // [SỬA SP]
                case "product-edit":
                    $title="Sửa sản phẩm";
                    require_once "case/product-edit.php";
                    break; 
                // [DANH MỤC - DM]
                case "category":
                    $title="Quản lí danh mục";
                    require_once "case/category.php";
                    break;
                // [THÊM DM]
                case "category-add":
                    $title="Thêm danh mục";
                    require_once "case/category-add.php";
                    break;
                // [SỬA SP]
                case "category-edit":
                    $title="Sửa danh mục";
                    require_once "case/category-edit.php";
                    break; 
                // [NHÀ XUẤT BẢN - NXB]
                case "publishing":
                    $title="Quản lí NXB";
                    require_once "case/publishing.php";
                    break;
                // [THÊM NXB]
                case "publishing-add":
                    $title="Thêm NXB";
                    require_once "case/publishing-add.php";
                    break;
                // [SỬA NXB]
                case "publishing-edit":
                    $title="Sửa NXB";
                    require_once "case/publishing-edit.php";
                    break;
                // [TÁC GIẢ - TG]
                case "author":
                    $title="Quản lí Tác giả";
                    require_once "case/author.php";
                    break;
                // [THÊM TÁC GIẢ]
                case "author-add":
                    $title="Thêm tác giả";
                    require_once "case/author-add.php";
                    break;
                // [SỬA TÁC GIẢ]
                case "author-edit":
                    $title="Sửa tác giả";
                    require_once "case/author-edit.php";
                    break;
                // [HÓA ĐƠN]
                case "bill":
                    $title="Quản lí hóa đơn";
                    require_once "case/bill.php";
                    break;
                case "bill-detail":
                    $title="Hóa đơn chi tiết";
                    require_once "case/bill-detail.php";
                    break;
                // [404]
                default:
                    require_once "../../view/admin/header.php";
                    require_once "../../view/404.php";
                    break;
            }
    }else{
        // [DOANH THU]
        require_once "../../view/admin/header.php";
        require_once "../../view/admin/statistical.php";
    }
    require_once "../../view/admin/footer.php";
}