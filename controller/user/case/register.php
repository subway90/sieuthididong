<?php
include "../../view/user/header.php";

$user = ""; $pass = "";$verifypass=""; $hovaten = ""; $email = ""; $sodienthoai = ""; $diachi = ""; $point_valid_register=0;$checkVeryfyPass = false;$susscess = false;
$arr_error[] = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = $_POST['user'];
        if(!empty($user)){
            $check = checkUserExist($user);
            if($check == true) $point_valid_register++;
            else $arr_error[] = 'Tài khoản này đã tồn tại.';
        }else $arr_error[] = 'Chưa nhập tài khoản đăng nhập.';

    $pass = $_POST['pass'];
        if(!empty($pass)){
            $checkPass = checkPass($pass);
            if($checkPass==true) $point_valid_register++;
            else $arr_error[] = $checkPass; 
        }else $arr_error[] = 'Chưa nhập mật khẩu.';

    $hovaten = $_POST['hovaten'];
        if(!empty($hovaten)) $point_valid_register++;
        else $arr_error[] = 'Chưa nhập họ và tên.';

    $email = $_POST['email'];
        if(!empty($email)){
            $check = checkEmail($email);
            if($check == true)  $point_valid_register++;
            else $arr_error[] = 'Email không hợp lệ.';
        }else $arr_error[] = 'Chưa nhập email.';

    $sodienthoai = $_POST['sodienthoai'];
        if(!empty($sodienthoai)){
            $check = checkPhone($sodienthoai);
            if($check == true) $point_valid_register++;
            else  $arr_error[] = 'SĐT không hợp lệ.';
        }else $arr_error[] = 'Chưa nhập số điện thoại.';

    $diachi = $_POST['diachi'];
        if(!empty($diachi)) $point_valid_register++;
        else $arr_error[] = 'Chưa nhập địa chỉ.';

    $verifypass = $_POST['verifypass'];
        if($checkVeryfyPass == true){
            if(!empty($verifypass)){
                if($verifypass === $pass)$point_valid_register++;
                else $arr_error[] = 'Mật khẩu xác thực không đúng.';
            }else $arr_error[] = 'Chưa nhập xác thực mật khẩu.';
        }else $verifypass = "";
    if($point_valid_register==7){
        addAccount(1,$user,md5($pass),$hovaten,$email,$sodienthoai,$diachi,'user_default.jpg');
        $susscess = true;
    }
}
include "../../view/user/register.php";