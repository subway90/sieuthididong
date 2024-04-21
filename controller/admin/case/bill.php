<?php
require_once '../../view/admin/header.php';
$list = getAll('bill',0);
# [THAY ĐỔI TRẠNG THÁI ĐƠN HÀNG]
if(isset($_GET['edit']) && !empty($_GET['edit']) && isset($_GET['token']) && !empty($_GET['token'])){
    if($_GET['edit'] == 1) {
        //NẾU xác nhận đơn hàng (trường hợp đơn hàng hợp lệ và có thể giao)
        if($_GET['stt'] == 2){
            $listBillDetail = getBillDetailByToken('idProduct,quantity',$_GET['token'],0);
            for ($i=0; $i < count($listBillDetail); $i++) { 
                extract($listBillDetail[$i]);
                editQuantity($idProduct,$quantity);
            }
        }
        $nameStatus = 'status';$date='dateUpdate';
    }
    if($_GET['edit'] == 2) {$nameStatus = 'statusDelivery';$date='dateDelivery';}
    if($_GET['edit'] == 3) {$nameStatus = 'statusPay';$date='datePay';}
    if($_GET['edit'] == 4 && !empty($_GET['idUser'])) {
        $arrIdBillDetail = getBillDetailByToken('id',$_GET['token'],0);
        for ($i=0; $i < count($arrIdBillDetail); $i++) addFeedback($_GET['idUser'],$arrIdBillDetail[$i][0]);
        $nameStatus = 'statusPay';$date='dateUpdate';
    }
    editStatus($nameStatus,$_GET['token'],$_GET['stt'],$date);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi trạng thái thành công !');
    header('Location:'.ACT_ADMIN.'bill');
}
require_once '../../view/admin/bill.php';