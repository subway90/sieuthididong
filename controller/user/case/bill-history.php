<?php
$previewBill = false;
$listDetailBill = [];
require_once "../../view/user/header.php";
#  XEM CHI TIẾT
if(isset($arrayURL[1]) && !empty($arrayURL[1])){
    # ĐÃ ĐĂNG NHẬP
    if($_SESSION['user']) $idUser = $_SESSION['user']['id'];
    # CHƯA ĐĂNG NHẬP
    else $idUser = 0;
    # KIỂM TRA HÓA ĐƠN TỒN TẠI
    $getBill = getOneFieldByCustom('bill','*','token = "'.$arrayURL[1].'" AND idUser = '.$idUser);
    if($getBill){
        # THÔNG TIN HÓA ĐƠN CHI TIẾT
        extract($getBill);
        # THÔNG TIN HÓA ĐƠN CHI TIẾT
        $arrayDetail = getAllFieldByCustom('billdetail','idColor, quantity','tokenBill = "'.$token.'"');
        if($arrayDetail) {
            for ($i=0; $i < count($arrayDetail); $i++) $listDetailBill += getProduct('c.id = '.$arrayDetail[$i]['idColor']);
        }
        # SHOW TRẠNG THÁI   
        $showNotifyStatusBill = notifyBill($status);
        # RENDER VIEW
        require_once "../../view/user/bill-detail.php";
    }else require_once "../../view/user/404.php";
}else{
    //DANH SÁCH BILL
    if(!empty($_SESSION['user'])) {
        $listBill = getAllFieldByCustom('bill','*','token = "'.$arrayURL[1].'" AND idUser = '.$_SESSION['user']['id']);
        require_once "../../view/user/bill-history.php";
    }else{
        $previewBill = true;
        $token = "";
        if(isset($_POST['token'])  && !empty($_POST['token'])) {
            $token = $_POST['token'];
            $Bill = getOneFieldByCustom('bill','*','token = "'.moveCharSpecial($_POST['token']).'" AND idUser = 0');
            if(!empty($Bill)) {
                extract($Bill);
                $listDetail = getDetailBillByToken($token);
                $previewBill = false;
            }else addAlert('danger','TOKEN '.$token.' không hợp lệ');
        }
        require_once "../../view/user/header.php";
        require_once "../../view/user/bill-detail.php";
    }
}

if(1==2){
    $previewBill = true;
    $token = "";
    if(isset($_POST['token'])  && !empty($_POST['token'])) {
        $token = $_POST['token'];
        $Bill = getOneFieldByCustom('bill','*','token = "'.moveCharSpecial($_POST['token']).'" AND idUser = 0');
        if(!empty($Bill)) {
            extract($Bill);
            $listDetail = getDetailBillByToken($token);
            $previewBill = false;
        }else addAlert('danger','TOKEN '.$token.' không hợp lệ');
    }
    require_once "../../view/user/header.php";
    require_once "../../view/user/bill-detail.php";
}