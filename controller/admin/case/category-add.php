<?php
# VARIABLE
$name = $decribe = "";
$idProduct = 1;

#  EDIT TRUE
if(isset($_GET['edit']) && $_GET['edit']) {
    $typeEdit = getOneFieldByCustom('product_type','id,name,decribe,status','id ='.$_GET['edit']);
    if($typeEdit) {
        $edit = true;
        $subURL = '&edit='.$_GET['edit'];
        extract($typeEdit);
        $title = 'Sửa loại '.strtoupper($name);
    }else show404('admin');
}else $title = 'Thêm mới loại';

# SUBMIT
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $decribe = $_POST['decribe'];
    if($name) {
        if($decribe) {
            # EDIT SUBMIT
            if($edit === true) {
                editType($id,$name,$decribe,$status);
                addAlert('primary',ICON_CHECK.'Sửa loại <strong>'.$name.'</strong> thành công !');
            # ADD SUBMIT
            }else {
                addType($name,$decribe,$status);
                addAlert('success',ICON_CHECK.'Thêm mới thành công !');
            }
            header('Location: '.ACT_ADMIN.'category');
            exit;
        }else addAlert('danger',ICON_CLOSE.'Chưa nhập mô tả');
    }else addAlert('danger',ICON_CLOSE.'Chưa nhập tên loại');
}

# RENDER VIEW
require_once "../../view/admin/header.php";
require_once "../../view/admin/category-add.php";