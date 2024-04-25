<?php
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('accounts',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'account');
    exit;
}
# RENDER VIEW
function showType($type,$fullName) {
    if($type == 2) return '<div class="badge badge-sa-primary">'.ICON_FACEBOOK.$fullName.'</div>';
    elseif($type == 3) return '<div class="badge badge-sa-danger"'.ICON_GOOGLE.$fullName.'</div>';
    else return $fullName;
}

$title = 'danh sách tài khoản';
$listAccount = getAllFieldByCustom('accounts','*','id > 0');
require_once "../../view/admin/header.php";
require_once "../../view/admin/account.php";