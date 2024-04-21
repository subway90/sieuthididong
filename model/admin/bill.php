<?php
function getBillByToken($token,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT *
    FROM bill WHERE token ='".$token."' AND ".$status;
    $result = pdo_query_one($sql);
    return $result;
}
function getBillDetailByToken($field,$token,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT ".$field."
    FROM billdetail WHERE tokenBill ='".$token."' AND ".$status;
    $result = pdo_query($sql);
    return $result;
}
function editStatus($nameStatus,$token,$status,$date){
    $sql = "UPDATE bill SET ".$nameStatus."=".$status.", ".$date."=current_timestamp() WHERE token='".$token."'";
    pdo_execute($sql);
}
function editQuantity($idProduct,$quantity){
    $sql = "UPDATE products SET quantity = quantity-".$quantity." WHERE id = ".$idProduct;
    pdo_execute($sql);
}
function addFeedback($idUser,$idBillDetail){
    $sql = "INSERT INTO feedback(idUser,idBillDetail,status) values('$idUser','$idBillDetail',1)";
    pdo_execute($sql);
};