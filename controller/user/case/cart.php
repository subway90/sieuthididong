<?php
# [AUTO CLICK THANH TOÁN]
if(isset($_GET['continue']) && $total) $activeModal = 'onload';
# [MUA NGAY]
if(isset($_GET['add'])){
    if(empty($_SESSION['user'])){ // nếu CHƯA ĐĂNG NHẬP (GUEST)
        $check = checkCart($_GET['idProduct']);
        if($check == -1) $_SESSION['cart'][] = ['idProduct' => $_GET['idProduct'],'idModel' => $_GET['idModel'],'idColor' => $_GET['idColor'],'quantity' => $_GET['quantity']]; // nếu không trùng ID-> thêm SP vào CART
        else  $_SESSION['cart'][$check]['quantity']++; // nếu trùng ID-> thêm số lượng (+1) vào ID đã trùng
    }else{ // nếu ĐÃ ĐĂNG NHẬP (USER)
        $check = checkCartByID($_GET['idProduct']);
        if(empty($check)) addCart($_SESSION['user']['id'],$_GET['idProduct'],$_GET['idModel'],$_GET['idColor'],$_GET['quantity']);
        else updateQuantity($check,'quantity+1');
    }
    // di chuyển ROUTE 
    if($_GET['add'] == 1) header('Location:'.URL.'gio-hang');
}
# [XÓA 1 SP TRONG CART]
if(isset($_GET['delete']) && !empty($_GET['delete'])) {
    --$_GET['delete'];
    if(empty($_SESSION['user'])) array_splice($_SESSION['cart'],$_GET['delete'],1);
    else deleteCart($_GET['delete']);
    header("Location:".URL."gio-hang");
}

# [XÓA TẤT CẢ SP TRONG CART]
if(isset($_GET['close'])){
    if(empty($_SESSION['user'])) unset($_SESSION['cart']); //nếu chưa đăng nhập -> hủy SESSION CART
    else deleteAllCart($_SESSION['user']['id']); //nếu đã đăng nhập -> thực thi SQL Delete dữ liệu
    if($_GET['close']){
        addAlert('success','Đơn hàng đã được tạo thành công, vui lòng chờ xác nhận !');
        header("Location:".URL."lich-su-mua-hang/".$_GET['close']);
        exit;
    }else header("Location:".URL."gio-hang");
}

# [THÊM SỐ LƯỢNG SP]
if(isset($_POST['quantity']) && !empty($_POST['quantity'])){
        //Nếu chưa đăng nhập -> Sửa ở SESSION
        if(empty($_SESSION['user'])) $_SESSION['cart'][$_POST['idCart']]['quantity'] = $_POST['quantity'];
         //Nếu đã đăng nhập -> Sửa ở Database
        else updateQuantity($_POST['idCart'],$_POST['quantity']);
        header("Location:".URL."gio-hang");
}


# [THÔNG TIN THANH TOÁN]
if(!empty($_SESSION['user'])){ // nếu đã đăng nhập -> load thông tin có sẵn từ USER
    $user = getOneByID('accounts',$_SESSION['user']['id'],0);
    extract($user);
    $mess = "";
    $pay=1;
}else{ //nếu chưa đăng nhập
    $fullName = "";$phone = "";$email = ""; $address = "";$mess = "";$pay=1;
}

# [THANH TOÁN]
$point_valid=0;
if(isset($_REQUEST['thanhtoan']) && $total !=0){
    
    $pay = $_POST['pay'];

    $fullName = $_POST['fullName'];
    if(empty($fullName)) $arr_error[] = "Chưa nhập họ và tên";
    else $point_valid++;

    $phone = $_POST['phone'];
    if(empty($phone)) $arr_error[] = "Chưa nhập SĐT";
    else {
        $checkPhone = checkPhone($phone);
        if($checkPhone == false) $arr_error[] = "SĐT không hợp lệ";
        else $point_valid++;
    }

    $address = $_POST['address'];
    if(empty($address)) $arr_error[] = "Chưa nhập địa chỉ";
    else $point_valid++;

    $email = $_POST['email'];
    if(!empty($email)) {
        if(checkEmail($email) == false) {
            $point_valid--;
            $arr_error[] = "Email không hợp lệ";
        }
    }
    $mess = $_POST['mess'];
    if($point_valid < 3) $activeModal = 'onload'; //Load lại PAY-MODAL ở CART
    else{
        #tạo mã TOKEN
        $token = createTokenChar(10);
        # xác định ID & typeBill
        if(!empty($_SESSION['user'])) $idUser = $_SESSION['user']['id'];
        else $idUser = 0;
        #tạo HÓA ĐƠN
        addBill($token,$idUser,$total,$fullName,$phone,$email,$address,$pay);
        #tạo HÓA ĐƠN CHI TIẾT
        for($i=0; $i < count($listCart); $i++){ //thêm hóa đơn chi tiết
            extract($listCart[$i]);
            addBillDetail($token,$idProduct,$idModel,$idColor,$priceSale,$quantity); 
        }
        header("Location:".URL."gio-hang&close=".$token);
    }
}

show_alert();
include "../../view/user/header.php";
include "../../view/user/cart.php";