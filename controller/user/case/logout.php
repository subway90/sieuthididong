<?php
include "../../view/user/header.php";
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    setcookie('username','',time()-1);
    setcookie('password','',time()-1);
}
unset($_SESSION['user']);
unset($_SESSION['user_facebook']);
unset($_SESSION['user_google']);
unset($_SESSION['access_token']);
header("Location: ".URL);