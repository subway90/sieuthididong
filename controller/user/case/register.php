<?php
$subURL = '';
if(isset($_GET['addCart'])) $subURL = 'addCart';
$user = $pass = $verifypass = $fullName =  $email =  $phone =  $address = "";$checkVeryfyPass = false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $verifypass = $_POST['verifypass'];
    if(!empty($user)){
        if(strlen($user) >= 4){
            $check = checkUserExist($user);
            if($check === true) {
                if(!empty($pass)) {
                    $checkPass = checkPass($pass);
                    if($checkPass === true) {
                        if(!empty($fullName)) {
                            if(!empty($email)){
                                $check = checkEmail($email);
                                if($check === true) {
                                    if(!empty($phone)){
                                        $check = checkPhone($phone);
                                        if($check === true) {
                                            if(!empty($address)) {
                                                if(!empty($verifypass)){
                                                    if($verifypass === $pass) {
                                                        # thêm tài khoản
                                                        addAccount(1,$user,md5($pass),$fullName,$email,$phone,$address,'user_default.jpg');
                                                        # tự động đăng nhập
                                                        autoLogin($user,md5($pass));
                                                        # lưu cookie
                                                        setcookie('username',str_replace(['"',"'"],'',$_SESSION['user']['user']),time()+86400*365);
                                                        setcookie('password',md5($_SESSION['user']['pass']),time()+86400*365);
                                                        # chuyển giỏ hàng từ session
                                                        if(isset($_GET['addCart'])) {
                                                            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                                                                extract($_SESSION['cart'][$i]);
                                                                addCart($_SESSION['user']['id'],$idProduct,$idModel,$idColor,$quantity);
                                                            }
                                                            unset($_SESSION['cart']);
                                                            header('Location:'.URL.'gio-hang&continue');
                                                            exit;
                                                        # quay về trang chủ
                                                        }else {
                                                            addAlert('success','Đăng kí tài khoản thành công !');
                                                            header('Location: '.URL);
                                                            exit;
                                                        }
                                                    }
                                                    else addAlert('danger','Mật khẩu xác thực không đúng.');
                                                }else addAlert('danger','Chưa nhập xác thực mật khẩu.');
                                            }else addAlert('danger','Chưa nhập địa chỉ.');
                                        }else  addAlert('danger','Số điện thoại không hợp lệ.');
                                    }else addAlert('danger','Chưa nhập số điện thoại.');
                                }else addAlert('danger','Email không hợp lệ.');
                            }else addAlert('danger','Chưa nhập email.');
                        }else addAlert('danger','Chưa nhập họ và tên.');
                    }else addAlert('danger',$checkPass); 
                }else addAlert('danger','Chưa nhập mật khẩu.');
            }else addAlert('danger','Tài khoản này đã tồn tại.');
        }else addAlert('danger','Tài khoản phải từ 4 kí tự trở lên.');
    }else addAlert('danger','Tài khoản này đã tồn tại.');
    if($point_valid==7){
        addAccount(1,$user,md5($pass),$fullName,$email,$phone,$address,'user_default.jpg');
        $susscess = true;
    }
}
require_once "../../view/user/header.php";
require_once "../../view/user/register.php";