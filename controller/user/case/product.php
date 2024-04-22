<?php
$product = getAll('products', 1);   
# LỌC TÌM KIẾM
if(isset($arrayURL[1]) && $arrayURL[1] == 'loc'){
    $filterBrand = $_GET['Brand'];
    $filterColor = $_GET['Color'];
    $filterStyle = $_GET['Style'];
    $filterPrice = $_GET['Price'];
    $filterSorts = $_GET['Sorts'];
}else {

}


# THÊM SP VÀO GIỎ HÀNG
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
    addAlert('success','<i class="fas fa-check-circle"></i> Thêm sản phẩm thành công !');
    header("Location:".URL."san-pham");
}
$listProduct = getAll('products', 1);
# Show Select
$showSelectBrand = '<option value="all">Tất cả</option>';
$showSelectColor = '<option value="all">Tất cả</option>';
$showSelectStyle = '<option value="all">Tất cả</option>';
$showSelectPrice = '<option value="all">Tất cả</option>';
$showSelectSorts = '<option value="all">Không</option>';
# Select Brand
$listBrand = getAllFieldByCustom('product_brands','id,name','status = 1');
foreach($listBrand as $Brand){ 
extract($Brand);
  $showSelectBrand .='<option value="'.$id.'">'.$name.'</option>';
}
# Select Style
$showSelectStyle = '<option value="all">Tất cả</option>';
$listStyle = getAllFieldByCustom('product_style','id,name','status = 1');
foreach($listStyle as $Style){ 
extract($Style);
  $showSelectStyle .='<option value="'.$id.'">'.$name.'</option>';
}
$showSelectColor .='
<option value="'.'color'.'">'.'color'.'</option>'
;

// [RENDER VIEW]
require_once "../../view/user/header.php";
require_once "../../view/user/product.php";