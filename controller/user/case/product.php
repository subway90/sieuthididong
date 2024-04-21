<?php
include "../../view/user/header.php";
include "../../view/user/product.php";
if(isset($_GET['add'])){
    if(empty($_SESSION['user'])){ // nếu CHƯA ĐĂNG NHẬP (GUEST)
        $check = checkCart($_GET['id']);
        if($check == -1) $_SESSION['cart'][] = ['id' => $_GET['id'],'quantity' => $_GET['quantity']]; // nếu không trùng ID-> thêm SP vào CART
        else  $_SESSION['cart'][$check]['quantity']++; // nếu trùng ID-> thêm số lượng (+1) vào ID đã trùng
    }else{ // nếu ĐÃ ĐĂNG NHẬP (USER)
        $check = checkCartByID($_GET['id']);
        if(empty($check)) addCart($_SESSION['user']['id'],$_GET['id'],$_GET['quantity']);
        else updateQuantity($check,'quantity+1');
    }
    addAlert('success','<i class="fas fa-check-circle"></i> Thêm sản phẩm thành công ! <a href="'.ACT.'gio-hang">&rarr; Giỏ hàng</a>');
    header("Location:".ACT."san-pham");
}