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

# [VARIABLE]
$arr_error = [];
$point_valid = 0;
$edit = false;
$subURL = '';
$status = 1;

# [Authorization]
if(empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) show404('user');
else{
    # [FILE MODEL]
    require_once "../../model/pdo.php";
    require_once "../../model/admin/series.php";
    require_once "../../model/admin/detail.php";
    require_once "../../model/admin/model.php";
    require_once "../../model/admin/author.php";
    require_once "../../model/admin/bill.php";

    //controller
    if(isset($_GET['act'])){
        $act=$_GET['act'];
            switch ($act) {

                // [SERIES SHOW - HIDE]
                case "series":
                    $title="Quản lí series";
                    require_once "case/series.php";
                    break;
                // [SERIES ADD - EDIT]
                case "series-add":
                    $title="Thêm danh mục";
                    require_once "case/series-add.php";
                    break;
                // [MODEL SHOW - HIDE]
                case "model":
                    $title="Quản lí NXB";
                    require_once "case/model.php";
                    break;
                // [MODEL ADD - EDIT]
                case "model-add":
                    $title="Thêm NXB";
                    require_once "case/model-add.php";
                    break;

                // [DETAIL SHOW - HIDE]
                case "detail":
                    $title="Danh sách sản phẩm";
                    require_once "case/detail.php";
                    break;
                // [DETAIL ADD - EDIT]
                case "detail-add":
                    $title="Thêm sản phẩm";
                    require_once "case/detail-add.php";
                    break;
                // [SỬA SP]
                case "product-edit":
                    $title="Sửa sản phẩm";
                    require_once "case/product-edit.php";
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