<?php
if(!empty($_SESSION['user'])){
    if($arrayURL[0] == 'thong-bao'){
        #XỬ LÍ Ở index.php - line 22
        require_once "../../view/user/header.php";
        require_once "../../view/user/notifycation.php";
    }
    elseif($arrayURL[0] == 'danh-gia'  && !empty($arrayURL[1]) && !empty($arrayURL[2]) && ($arrayURL[2] == $_SESSION['user']['id'])){
        #XỬ LÍ Ở index.php - line 22
        updateSttUser($arrayURL[1]);
        $getFB  = getOneFieldByID('feedback','idBillDetail,dateCreate',$arrayURL[1],1);
        $getBD  = getOneFieldByID('billdetail','tokenBill,idProduct,price,quantity,dateCreate',$getFB['idBillDetail'],0);
        $getPRO = getOneFieldByID('products','image,name',$getBD['idProduct'],0);
        require_once "../../view/user/header.php";
        require_once "../../view/user/feedback.php";
    }else{
        require_once "../../view/user/header.php";
        require_once "../../view/user/404.php";
    }
    
}else {
    require_once "../../view/user/header.php";
    require_once "../../view/user/404.php";
}