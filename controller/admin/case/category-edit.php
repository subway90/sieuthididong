<?php
require_once "../../view/admin/header.php";
$arr_error = [];
if(isset($_GET['id']) && !empty($_GET['id'])){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $status = $_POST['status'];
        $id = $_GET['id'];
        if(!empty($name)) editCate($id,$name,$status);
        else $arr_error[] = "Chưa nhập tên danh mục";
        require_once "../../view/admin/category-edit.php";
    }else{
        $cate = getOneByID('category',$_GET['id'],0);
        if(!empty($cate)){
            extract($cate);
            require_once "../../view/admin/category-edit.php";
        }else require_once "../../view/404.php";
    }
}else require_once "../../view/404.php";
