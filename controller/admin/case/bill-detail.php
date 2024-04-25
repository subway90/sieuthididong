<?php

# DATA
if(isset($_GET['token']) && !empty($_GET['token'])){
    $getBill = getOneFieldByCustom('bill','*','token = "'.$_GET['token'].'"');
    if(!empty($getBill)){
        extract($getBill);
        $listBillDetail = getAllFieldByCustom('billdetail','idProduct,idModel,idColor,price,quantity quantityBill','tokenBill = "'.$_GET['token'].'"');
    }else show404('admin');
}else show404('admin');

# RENDER VIEW
if($status==1) $showStatus = '<div class="badge badge-sa-warning">Đơn còn sử dụng</div>';
if($status==2) $showStatus = '<div class="badge badge-sa-success">Đơn đã xong</div>';
if($status==3) $showStatus = '<div class="badge badge-sa-dark">Đơn đã hủy đơn</div>';

if($statusDelivery==1) $showStatusDelivery = '<div class="badge badge-sa-secondary">Chưa giao hàng</div>';
if($statusDelivery==2) $showStatusDelivery = '<div class="badge badge-sa-warning">Đang giao hàng</div>';
if($statusDelivery==3) $showStatusDelivery = '<div class="badge badge-sa-success">Đã giao hàng</div>';


if($statusPay==1) $showStatusPay = '<div class="badge badge-sa-danger">Chưa thanh toán</div>';
if($statusPay==2) $showStatusPay = '<div class="badge badge-sa-primary">Đã thanh toán</div>';

if($typePay==1) $showTypePay = '<div class="badge badge-sa-success">Tiền mặt (COD)</div>';
if($typePay==2) $showTypePay = '<div class="badge badge-sa-ìnof">Ebanking</div>';

$title = 'Hóa đơn chi tiết - '.$token;
require_once '../../view/admin/header.php';
require_once '../../view/admin/bill-detail.php';