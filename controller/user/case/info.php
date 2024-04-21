<?php
if(!empty($_SESSION['user'])){
    $passOld = ""; $passNew = "";
    $getUser = getOneByID('accounts',$_SESSION['user']['id'],'1');
    extract($getUser);

    # [CẬP NHẬT THÔNG TIN: name, email, phone, address]
    if(isset($_POST['info'])){
        $fullName = $_POST['fullName'];
        if(!empty($fullName)) $point_valid++;
        else $arr_error[] = "Tên không được để trống.";

        $email = $_POST['email'];
        if(!empty($email)){
            if(checkEmail($email)==true) $point_valid++;
            else $arr_error[] = "Email không hợp lệ.";
        }
        else $arr_error[] = "Email không được để trống.";
        
        $phone = $_POST['phone'];
        if(!empty($phone)){
            if(checkPhone($phone)==true) $point_valid++;
            else $arr_error[] = "SĐT không hợp lệ.";
        }
        else $arr_error[] = "SĐT không được để trống.";

        $address = $_POST['address'];
        if(!empty($address)) $point_valid++;
        else $arr_error[] = "Địa chỉ không được để trống.";

        if($point_valid==4){
            addAlert('success','<i class="fas fa-check-circle"></i> Cập nhật <strong>thông tin</strong> thành công !');
            updateUser($fullName,$email,$phone,$address,$_SESSION['user']['id']); //update lên database
            $_SESSION['user'] = getOneByID('accounts',$_SESSION['user']['id'],1); //reload lại thông tin user
        }
    }

    # [THAY ẢNH ĐẠI DIỆN]
    if(isset($_POST['img'])){
        $image = $_FILES['image'];
        if(empty(basename($_FILES['image']['name']))) addAlert('danger','<i class="fas fa-times-circle"></i> Vui lòng <strong>chọn ảnh</strong> trước khi thay.');
        else{
            $checkImage = checkImage($image,2); //kiểm tra điều kiện file ảnh có hợp lệ hay không
            if($checkImage === true){
                $hash_name_image =  createTokenChar(16); //mã hóa tên ảnh 
                $image['name'] = $hash_name_image.'.'.substr($image['type'],6); //định dạng lại tên file
                # REMOVE ẢNH CŨ
                if($_SESSION['user']['image'] != 'user_default.jpg' && strstr($_SESSION['user']['image'],'http') == false) unlink("../../uploads/user/avatar/".$_SESSION['user']['image']);
                move_uploaded_file($image["tmp_name"], "../../uploads/user/avatar/".$image["name"]); //up hình mới
                updateAvatar($image['name'],$_SESSION['user']['id']); //update lên database
                addAlert('success','<i class="fas fa-check-circle"></i> Cập nhật <strong>ảnh đại diện</strong> thành công !');
                $_SESSION['user'] = getOneByID('accounts',$_SESSION['user']['id'],1); //reload lại thông tin user
            }else addAlert('danger','<i class="fas fa-times-circle"></i> <strong>Lỗi: </strong> '.$checkImage.' !');

        }
    }

    # [THAY ĐỔI MẬT KHẨU]
    if(isset($_POST['changePassword'])) {
        ## Mật khẩu cũ
        $passOld = $_POST['passOld'];
        if(!empty($passOld)) {
            if(md5($passOld) === $_SESSION['user']['pass']){
                ## Mật khẩu mới
                $passNew = $_POST['passNew'];
                if(!empty($passNew)) {
                    $checkPass = checkPass($passNew);
                    if($checkPass === true) {
                        ## Xác thực mật khẩu mới
                        $passVerify = $_POST['passVerify'];
                        if(!empty($passVerify)) {
                            if($passVerify === $passNew) $point_valid++;
                            else $arr_error[] = "Xác thực mật khẩu mới không chính xác.";
                        }else $arr_error[] = "Vui lòng điền xác thực mật khẩu mới.";
                    }else $arr_error[] = $checkPass;
                }else $arr_error[] = "Vui lòng điền mật khẩu mới.";
            }else $arr_error[] = "Mật khẩu cũ không chính xác.";
        }else $arr_error[] = "Vui lòng điền mật khẩu cũ.";
        
        ## Thay đổi
        if($point_valid==1){
            updatePass(md5($passNew),$_SESSION['user']['id']);
            addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi <strong>mật khẩu</strong> thành công !');
        }else $activeModal = "onload"; //auto open modal
    }


    require_once '../../view/user/header.php';
    require_once '../../view/user/info.php';
}else{
    include "../../view/user/header.php";
    require_once '../../view/user/404.php';
}
?>
