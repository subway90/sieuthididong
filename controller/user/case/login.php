<?php
if(empty($_SESSION['user'])){
    #LOGIN GOOGLE SUCCESS
    if(!empty($_SESSION['user_google'])) {
        extract($_SESSION['user_google']);
        if(checkUserExist($username) === true) {
            addAccount(3,$username,'',$fullName,$email,'','',$image);
        }
        #tự động ĐĂNG NHẬP 
        autoLogin($username,'');
        addAlert('success','<i class="fas fa-check-circle"></i> Chào mừng bạn đến với <strong>muasach.net</strong> !');
        header('Location: '.ACT.'trang-chu');
    }else{
        if(LOGIN_GOOGLE) require_once '../../API/google/google_source.php';
    } 
    #LOGIN FACEBBOK SUCCESS
    if(!empty($_SESSION['user_facebook'])){
        extract($_SESSION['user_facebook']);
        if(checkUserExist($username) === true) {
            addAccount(2,$username,'',$fullName,'','','',$image);
        }
        #tự động ĐĂNG NHẬP 
        autoLogin($username,'');
        addAlert('success','<i class="fas fa-check-circle"></i> Chào mừng bạn đến với <strong>muasach.net</strong> !');
        header('Location: '.ACT.'trang-chu');
        exit;
    }else{
        if(LOGIN_FACEBOOK) require_once '../../API/facebook/facebook_source.php';
    }

    # Báo lỗi login FACEBOOK (bad request)
    if(isset($_GET['failed_connect_fb'])) {
        addAlert('danger','<i class="fas fa-times-circle"></i> Đăng nhập không thành công.');
        header('Location:'.ACT.'dang-nhap');
        exit;
    }

    # BIẾN KHỞI TẠO
    $subURL = "";
    $remember = "";
    $username = "";
    # GHI NHỚ TÀI KHOẢN
    if(isset($_POST['rememberUser'])) $remember = "checked";
    # ĐƯỜNG DẪN PHỤ
    if(isset($_GET['addCart'])) $subURL .= '&addCart';
    # ĐĂNG NHẬP
    if(isset($_POST['user']) && isset($_POST['password'])){
        $username = $_POST['user'];
        $password = $_POST['password'];
        if(!empty($username)) {
            if(!empty($password)) {
                $result = login(str_replace(['"',"'"],'',$_POST['user']),md5($_POST['password']));
                if(!empty($result)){
                    #Data
                    $_SESSION['user'] = $result;
                    #Add Cart
                    if(isset($_GET['addCart'])) {
                        if(!empty($_SESSION['cart'])) {
                            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                                extract($_SESSION['cart'][$i]);
                                $check = checkCartByID($id);
                                if(empty($check)) addCart($_SESSION['user']['id'],$id,$quantity);
                                else updateQuantity($check,'quantity+1');
                            }
                            unset($_SESSION['cart']);
                        }
                    }
                    # Cookie users
                    if(!empty($remember)) {
                        setcookie('username',str_replace(['"',"'"],'',$_POST['user']),time()+86400*365);
                        setcookie('password',md5($_POST['password']),time()+86400*365);
                    }
                    #Authorization
                    if($_SESSION['user']['role'] != 1){
                        addAlert('success','<i class="fas fa-check-circle"></i> Chào mừng bạn đến với <strong>muasach.net</strong> !');
                        header("Location:".URL);
                        exit;
                    }
                    else header("Location: ".URL."/controller/admin");
                }else addAlert('danger','Tài khoản hoặc mật khẩu không chính xác.');
            }else $arr_error[] = 'Vui lòng nhập mật khẩu';
        }else $arr_error[] = 'Vui lòng nhập tài khoản';
    }
    require_once "../../view/user/header.php";
    require_once "../../view/user/login.php";
}else header("Location:".URL);