<?php
if($_SESSION['user'] && $_SESSION['user']['role'] == 1) $verify = true;
else $verify = false;
if(isset($_POST['password'])){
    if($_POST['password']) {
        $password = $_POST['password'];
        $hash = '$2y$10$cIZ1S2bdRTPJ0qQ6/yzTr.63FfFSqM2hN/vOsXTljDClT1Uv7/BOO';
        #PASS: HieuTest79@@
        if(password_verify($password, $hash)) $verify = true;
        else addAlert('danger',ICON_CLOSE.'Mật khẩu sai.');
    }else addAlert('danger',ICON_CLOSE.'Vui lòng nhập mật khẩu.');
    delayTime(1);
}
#RENDER VIEW
require_once "../../view/user/header.php";
require_once "../../view/test.php";

