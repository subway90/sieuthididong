<?php
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('product_style',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'style');
    exit;
}
# RENDER VIEW
$title = 'danh sách Style';
$listStyle = getAllFieldByCustom('product_style','*','1');
require_once "../../view/admin/header.php";
require_once "../../view/admin/style.php";