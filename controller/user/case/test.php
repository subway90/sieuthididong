<?php
require_once "../../view/user/header.php";
$verify = false;
if(isset($_POST['password']) && !empty($_POST['password'])){
    $password = $_POST['password'];
    $hash = '$2y$10$cIZ1S2bdRTPJ0qQ6/yzTr.63FfFSqM2hN/vOsXTljDClT1Uv7/BOO';
    #PASS: HieuTest79@@
    if(password_verify($password, $hash)) $verify = true;
    else alert('Mật khẩu sai');
}
require_once "../../view/test.php";
