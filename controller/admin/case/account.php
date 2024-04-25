<?php
$errorUploadImage = false;
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('accounts',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'account');
    exit;
}

# EDIT
if(isset($_GET['detail']) && $_GET['detail']) {
    $getAccount = getOneFieldByCustom('accounts','*','id = '.$_GET['detail'].' AND status = 1');
    if($getAccount) {
        extract($getAccount);
        $oldImage = $image;
        $subURL = '&detail='.$id;
        $title = 'Chi tiết tài khoản '.$user;
        # SUBMIT
        if(isset($_POST['submit'])) {
            $user = $_POST['user'];
            $fullName = $_POST['fullName'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $status = $_POST['status'];
            $role = $_POST['role'];
            # IMAGE VALIDATION
            ## có up file hình mới
            if(!empty($_FILES['image']['name'])){
                $checkImage = checkImage($_FILES['image'],1);
                if($checkImage === true) {
                    $_FILES["image"]["name"] = hashImage($_FILES['image']['name']);
                    if(!empty($oldImage))unlink(PATH_UPLOAD_IMAGE_AVATAR.$oldImage);
                    move_uploaded_file($_FILES["image"]["tmp_name"], PATH_UPLOAD_IMAGE_AVATAR.basename($_FILES["image"]["name"]));
                    $oldImage = $_FILES['image']['name'];
                }else $errorUploadImage = true;
            }else {
                $checkImage = true;
            }
            if($user) {
                if(checkUserExist($user,2)) {
                    if($checkImage === true) {
                        updateAccount($id,$user,$fullName,$phone,$email,$oldImage,$address,$status,$role);
                        addAlert('success',ICON_CHECK.'Cập nhật thành công !');
                        header('Location:'.ACT_ADMIN.'account');
                        exit;
                    }else addAlert('danger',ICON_CLOSE.$checkImage);
                }else addAlert('danger',ICON_CLOSE.'username đã tồn tại.');
            }else addAlert('danger',ICON_CLOSE.'Chưa nhập username.');
            
        }
        # RENDER VIEW
        if($type == 1) $showType = '<span class="badge badge-sa-success">Tài khoản đăng ký</span>';
        if($type == 2) $showType = '<span class="badge badge-sa-primary">'.ICON_FACEBOOK.'Tài khoản facebook</span>';
        if($type == 3) $showType = '<span class="badge badge-sa-success">'.ICON_GOOGLE.'Tài khoản google</span>';
        if($role == 2) $showRole = '<span class="badge badge-sa-secondary">Thành viên</span>';
        if($role == 1) $showRole = '<span class="badge badge-sa-danger">Admin</span>';
        if($role == 3) $showRole = '<span class="badge badge-sa-warning">Mod</span>';
        require_once "../../view/admin/header.php";
        require_once "../../view/admin/account-detail.php";
        require_once "../../view/admin/footer.php";
        exit;
    }else show404('admin');
}

# RENDER VIEW
function showType($type,$fullName) {
    if($type == 2) return '<div class="badge badge-sa-primary">'.ICON_FACEBOOK.$fullName.'</div>';
    elseif($type == 3) return '<div class="badge badge-sa-danger"'.ICON_GOOGLE.$fullName.'</div>';
    else return $fullName;
}

if(isset($_GET['blocklist'])) {
    $title = 'danh sách chặn tài khoản';
    $showNavList = '<span class="text-danger">Danh sách tài khoản bị cấm</span>';
    $listAccount = getAllFieldByCustom('accounts','*','id > 1 AND status = 2');
}else {
    $title = 'danh sách tài khoản';
    $showNavList = '<span class="text-success">Danh sách tài khoản hoạt động</span>';
    $listAccount = getAllFieldByCustom('accounts','*','id > 1 AND status = 1');
}
require_once "../../view/admin/header.php";
require_once "../../view/admin/account.php";