<?php
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('product_type',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'type');
    exit;
}
# RENDER VIEW
$title = 'danh sách Loại sản phẩm';
$listType = getAllFieldByCustom('product_type','*','1');
require_once "../../view/admin/header.php";
require_once "../../view/admin/category.php";