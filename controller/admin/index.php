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
                    require_once "case/series.php";
                    break;
                // [SERIES ADD - EDIT]
                case "series-add":
                    require_once "case/series-add.php";
                    break;
                // [MODEL SHOW - HIDE]
                case "model":
                    require_once "case/model.php";
                    break;
                // [MODEL ADD - EDIT]
                case "model-add":
                    require_once "case/model-add.php";
                    break;
                // [DETAIL SHOW - HIDE]
                case "detail":
                    require_once "case/detail.php";
                    break;
                // [DETAIL ADD - EDIT]
                case "detail-add":
                    require_once "case/detail-add.php";
                    break;
                // [HÓA ĐƠN]
                case "bill":
                    require_once "case/bill.php";
                    break;
                case "bill-detail":
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