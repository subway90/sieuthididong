<?php
require_once "../../view/admin/header.php";
$name = "";$trangthai = 1;$arr_error[] = array(); $point_valid = 0;
if(isset($_REQUEST['add'])) {
    $name = $_POST['name'];
    $trangthai = $_POST['trangthai'];
    if(empty($name)) $arr_error[] = 'Chưa nhập tên NXB';
    else $point_valid++;
    if($point_valid==1) addPublishing($name,$trangthai);
}
require_once "../../view/admin/publishing-add.php";