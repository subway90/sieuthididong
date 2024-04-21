<?php
require_once '../../view/admin/header.php';

if(isset($_GET['token']) && !empty($_GET['token'])){
    $bill = getBillByToken($_GET['token'],0);
    if(!empty($bill)){
        extract($bill);
        $listInvoice = getBillDetailByToken('*',$_GET['token'],0);
        require_once '../../view/admin/bill-detail.php';
    }else require_once '../../view/404.php';
}else require_once '../../view/404.php';