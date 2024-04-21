<?php
require_once "../../view/admin/header.php";

#XÓA SẢN PHẨM
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('products',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'product');
}

#THÊM SẢN PHẨM
if(isset($_REQUEST['success'])) addAlert('success','<i class="fas fa-check-circle"></i> Đăng sản phẩm thành công !');

require_once "../../view/admin/product.php";