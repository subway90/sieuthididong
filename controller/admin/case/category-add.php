<?php
require_once "../../view/admin/header.php";
$ten_danhmuc = "";$trangthai = 1;$arr_error[] = array(); $point_valid = 0;
if(isset($_REQUEST['add'])) {
    $ten_danhmuc = $_POST['ten_danhmuc'];
    $trangthai = $_POST['trangthai'];
    if(empty($ten_danhmuc)) $arr_error[] = 'Chưa nhập tên danh mục';
    else $point_valid++;
    if($point_valid==1) addCategory($ten_danhmuc,$trangthai);
}
require_once "../../view/admin/category-add.php";