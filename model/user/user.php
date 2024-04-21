<?php
require_once '../../model/function.php';
require_once '../../config/URL.php';

function login($user,$pass){
    $sql = "SELECT * FROM accounts WHERE user= '".$user."' AND pass ='".$pass."' AND status = 1";
    return pdo_query_one($sql);
}

function autoLogin($user,$pass){
    if(!empty($pass)) $passSelect = "AND pass ='".$pass."'";
    $sql = "SELECT * FROM accounts WHERE user= '".$user."' ".$passSelect." AND status = 1";
    $result = pdo_query_one($sql);
    if(!empty($result)) $_SESSION['user'] = $result;
}

function addAccount($type,$user,$pass,$fullName,$email,$phone,$address,$image){
    $sql = "INSERT INTO accounts(type,user,pass,fullName,email,phone,address,image,role,status,dateCreate) values('$type','$user','$pass','$fullName','$email','$phone','$address','$image',2,1,current_timestamp())";
    pdo_execute($sql);
}

/**
 * @param string $input nhập username
 * Trả về TRUE nếu không tồn tại, ngược lại trả về FALSE
 */
function checkUserExist($input){
    $sql = "SELECT id FROM accounts WHERE user = '".$input."' AND status = 1";
    if(empty(pdo_query_one($sql))) return true;
    else return false;
}
function updateUser($fullName,$email,$phone,$address,$id){
    $sql = "UPDATE accounts SET fullName = '".$fullName."',email = '".$email."',phone = '".$phone."',address = '".$address."',dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_execute($sql);
}
function updateAvatar($image,$id){
    $sql = "UPDATE accounts SET image = '".$image."',dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_execute($sql);
}

function updatePass($pass,$id){
    $sql = "UPDATE accounts SET pass = '".$pass."',dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_execute($sql);
}

/**
 * Trả về đường dẫn ảnh phụ thuộc vào USER[type]
 */
function urlPath(){
    if($_SESSION['user']['type'] != 1){
        if(strstr($_SESSION['user']['image'],'http')) return '';
    }
    return URL.'/uploads/user/avatar/';
}

/**
 * Kiểm tra về validation của PASSWORD
 * Trả về TRUE nếu hợp lệ, ngược lại trả về chuỗi thông báo lỗi
 * @param string $input Mật khẩu cần kiểm tra
 */
function checkPass($input) {
    $arr_input = mb_str_split(strtolower($input)); //tạo chuỗi thành mảng và đổi chữ in hoa -> thường
    if(count(array_diff($arr_input,['!','@','#','$','%','^','&','*','(',')','-','+','=','.',0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'])) == 0){
        if(strlen($input) >= 8){ //hàm strlen: đếm kí tự trong chuỗi
            $word_0 = substr($input,0,1); //hàm substr: cắt chuỗi tại vị trí 0 và độ dài là 1 (cắt 1 kí tự)
            if($word_0 === strtoupper($word_0)){
                return true;
            }return 'Mật khẩu phải viết hoa chữ cái đầu.';
        }return 'Mật khẩu phải từ 8 kí tự trở lên.';
    }else return 'Có kí tự không hợp lệ trong mật khẩu';
}

/**
 * Hàm để tự động đăng nhập của Account Social
 * @param int $type 2: FACEBOOK, 3:GOOGLE
 */
function loginSocial($type){
    if($type===2 || $type===3){
        if($type===2) extract($_SESSION['user_facebook']);
        if($type===3) extract($_SESSION['user_google']);
        if(checkUserExist($username) === true) {
            addAccount($type,$username,'',$fullName,$email,'','',$image);
        }
        #tự động ĐĂNG NHẬP 
        autoLogin($username,'');
        addAlert('success','<i class="fas fa-check-circle"></i> Chào mừng bạn đến với <strong>muasach.net</strong> !');
        header('Location: '.ACT.'trang-chu');
    }else {
        addAlert('danger','<i class="fas fa-times"></i> <strong>Lỗi nghiêm trọng : loginSocial() is not valid $type</strong> !');
        header('Location: '.ACT.'trang-chu');
    }
}