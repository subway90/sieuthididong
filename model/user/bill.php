<?php
function addBill($token,$idUser,$total,$fullName,$phone,$email,$address,$typePay){
    $sql = "INSERT INTO bill(token,idUser,total,fullName,phone,email,address,typePay,statusPay,statusDelivery,datePay,dateDelivery,dateCreate,status) 
    values('$token','$idUser','$total','$fullName','$phone','$email','$address','$typePay',1,1,'','',current_timestamp(),1)";
    pdo_execute($sql);
}
function addBillDetail($token,$idProduct,$idModel,$idColor,$price,$quantity){
    $sql = "INSERT INTO billdetail(tokenBill,idProduct,idModel,idColor,price,quantity,dateCreate,status) 
    values('$token','$idProduct','$idModel','$idColor','$price','$quantity',current_timestamp(),1)";
    pdo_execute($sql);
}
function getDetailBillByToken($token){
    if($_SESSION['user']) $idUser = $_SESSION['user']['id'];
    else $idUser = '';
    $sql = "SELECT bd.*, b.idUser idUser
    FROM billdetail bd
    JOIN bill b
    ON bd.tokenBill = b.token
    WHERE tokenBill ='".$token."' AND bd.status = 1 AND idUser = ".$idUser;
    $result = pdo_query($sql);
    return $result;
}
function notifyBill($status){
        if($status == 1) return '
        <div class="text-warning fs-5 mb-2">
            <i class="fas fa-exclamation-circle"></i> Đơn hàng đang chờ để xác nhận !
        </div>
        <div class="text-muted text-start">Đơn hàng sẽ được xác nhận trong vòng 24 tiếng kể từ khi tạo đơn hàng. <strong>Hotline hỗ trợ: '.WEB_PHONE.'</strong></div>
        ';
        if($status == 2) return '
        <div class="text-success fs-5 mb-2">
            <i class="fas fa-check-circle"></i> Đơn hàng đã được xác nhận
        </div>
        <div class="text-muted text-start">Đơn hàng đang được sắp xếp giao đến cho bạn. <strong>Hotline hỗ trợ: '.WEB_PHONE.'</strong></div>
        ';
        if($status == 3) return '
        <div class="text-danger fs-5 mb-2">
        <i class="fas fa-times-circle"></i> Đơn hàng đã hủy!
        </div>
        <div class="text-muted text-start">Đơn hàng đã bị hủy. <strong>Hotline hỗ trợ: '.WEB_PHONE.'</strong></div>
        ';
        if($status == 4) return '
        <div class="text-primary fs-5 mb-2">
            <i class="fas fa-exclamation-circle"></i> Đơn hàng đã hoàn thành !
        </div>
        <div class="text-muted text-start">Cảm ơn quý khách đã ủng hộ chúng tôi. <strong>Hotline hỗ trợ: '.WEB_PHONE.'</strong></div>
        ';
}