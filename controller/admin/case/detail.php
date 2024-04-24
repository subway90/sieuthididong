<?php

# HIDE / SHOW
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('product_color',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi trạng thái thành công !');
    header('Location: '.ACT_ADMIN.'detail');
    exit;
}

# THÊM SẢN PHẨM
if(isset($_REQUEST['success'])) addAlert('success','<i class="fas fa-check-circle"></i> Đăng sản phẩm thành công !');

# RENDER VIEW
$listProduct = getProductAdmin('');
require_once "../../view/admin/header.php";
require_once "../../view/admin/detail.php";