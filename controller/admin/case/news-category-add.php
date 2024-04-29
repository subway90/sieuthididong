<?php
# VARIABLE
$name = $decribe = "";
$idProduct = 1;

#  EDIT TRUE
if(isset($_GET['edit']) && $_GET['edit']) {
    $newsCategoryEdit = getOneFieldByCustom('news_category','id,name,decribe,status','id ='.$_GET['edit']);
    if($newsCategoryEdit) {
        $edit = true;
        $subURL = '&edit='.$_GET['edit'];
        extract($newsCategoryEdit);
        $title = 'Sửa loại '.strtoupper($name);
    }else show404('admin');
}else $title = 'Thêm mới loại tin tức';

# SUBMIT
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $decribe = $_POST['decribe'];
    if($name) {
        if($decribe) {
            # EDIT SUBMIT
            if($edit === true) {
                editNewsCategory($id,$name,$decribe,$status);
                addAlert('primary',ICON_CHECK.'Sửa loại tin tức thành công !');
            # ADD SUBMIT
            }else {
                addNewsCategory($name,$decribe,$status);
                addAlert('success',ICON_CHECK.'Thêm loại tin tức mới thành công !');
            }
            header('Location: '.ACT_ADMIN.'news-category');
            exit;
        }else addAlert('danger',ICON_CLOSE.'Chưa nhập mô tả');
    }else addAlert('danger',ICON_CLOSE.'Chưa nhập tên loại tin tức');
}

# RENDER VIEW
require_once "../../view/admin/header.php";
require_once "../../view/admin/news-category-add.php";