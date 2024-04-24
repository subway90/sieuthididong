<?php
$showInputSeries = "";
$name = $decribe = "";
$status = $idProduct = 1;
#  EDIT TRUE
if(isset($_GET['edit']) && $_GET['edit']) {
    $styleEdit = getOneFieldByCustom('product_style','id,name,decribe,status','id ='.$_GET['edit']);
    if($styleEdit) {
        $edit = true;
        $subURL = '&edit='.$_GET['edit'];
        extract($styleEdit);
    }
    else show404('admin');
}
# SUBMIT
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $decribe = $_POST['decribe'];
    if($name) {
        if($decribe) {
            # EDIT SUBMIT
            if($edit === true) {
                editStyle($id,$name,$decribe,$status);
                addAlert('primary',ICON_CHECK.'Sửa Style thành công !');
            # ADD SUBMIT
            }else {
                addStyle($name,$decribe,$status);
                addAlert('success',ICON_CHECK.'Thêm Style mới thành công !');
            }
            header('Location: '.ACT_ADMIN.'style');
            exit;
        }else addAlert('danger',ICON_CLOSE.'Chưa nhập mô tả');
    }else addAlert('danger',ICON_CLOSE.'Chưa nhập tên Style');
}

# RENDER VIEW
$title = 'Thêm mới Style';
require_once "../../view/admin/header.php";
require_once "../../view/admin/style-add.php";