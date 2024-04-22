<?php
# MẢNG
$listBrand = getAllFieldByCustom('product_brands','id,name','status = 1');
$listStyle = getAllFieldByCustom('product_style','id,name','status = 1');
# BIẾN
$checkedBrand = $checkedStyle = $checkedColor = $checkedPrice = $checkedSorts = -1;
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

# LỌC TÌM KIẾM
if(isset($arrayURL[1]) && $arrayURL[1] == 'loc'){
    $filter = "";
    # Thương hiệu
    if(isset($_GET['Brand']) && $_GET['Brand']){
      for ($i=0; $i < count($listBrand); $i++) { 
        if($listBrand[$i]['id'] == $_GET['Brand']) {
          $filter .= "idBrand = ".$_GET['Brand']." AND ";
          $checkedBrand = $i;
        }
      }
    }
    # Phong cách
    if(isset($_GET['Style']) && $_GET['Style']){
      for ($i=0; $i < count($listStyle); $i++) { 
        if($listStyle[$i]['id'] == $_GET['Style']) {
          $filter .= "idStyle = ".$_GET['Style']." AND ";
          $checkedStyle = $i;
        }
      }
    }
    # Loại
    if(isset($_GET['Type']) && $_GET['Type']){
      $filter .= "idType = ".$_GET['Type']." AND ";
    }
    # Màu
    if(isset($_GET['Color']) && $_GET['Color']){
      for ($i=0; $i < count(COLOR_FILTER); $i++) {
          if($_GET['Color'] == COLOR_FILTER[$i]) {
            $filter .= 'color like "%'.COLOR_FILTER[$i].'%"'." AND ";
            $checkedColor = $i;
          }
      }
    }
    # Giá
    if(isset($_GET['Price']) && $_GET['Price']){
      for ($i=0; $i < count(PRICE_FILTER); $i++) {
          if($_GET['Price'] == PRICE_FILTER[$i][0]) {
            $filter .= 'c.priceSale > '.(PRICE_FILTER[$i][2]*1000).' AND c.priceSale < '.(PRICE_FILTER[$i][3]*1000).' AND ';
            $checkedPrice = $i;
          }
      }
    }
    # Sắp xếp
    if(isset($_GET['Sorts']) && $_GET['Sorts']){
      $sort = false;
      for ($i=0; $i < count(SORTS_FILTER); $i++) {
          if($_GET['Sorts'] == SORTS_FILTER[$i][0]) {
            $filter .= ' 1 '.SORTS_FILTER[$i][2];
            $sort = true;
            $checkedSorts = $i;
            break;
          }
      }if(!$sort) $filter .="1";
    }else $filter .="1";
    $listProduct = getProduct($filter);
}else $listProduct = getProduct('');
# Select Default
$showSelectBrand = '<option value="0">Tất cả</option>';
$showSelectColor = '<option value="0">Tất cả</option>';
$showSelectStyle = '<option value="0">Tất cả</option>';
$showSelectPrice = '<option value="0">Tất cả</option>';
$showSelectSorts = '<option value="0">Không</option>';

# Select Brand
for ($i=0; $i < count($listBrand); $i++) { 
  extract($listBrand[$i]);
  $showSelectBrand .='<option '.matchSelected($i,$checkedBrand).' value="'.$id.'">'.$name.'</option>';
}

# Select Style
for ($i=0; $i < count($listStyle); $i++) { 
  extract($listStyle[$i]);
  $showSelectStyle .='<option '.matchSelected($i,$checkedStyle).' value="'.$id.'">'.$name.'</option>';
}
# Select Color
for ($i=0; $i < count(COLOR_FILTER); $i++) { 
$showSelectColor .='
<option '.matchSelected($i,$checkedColor).' value="'.COLOR_FILTER[$i].'">'.COLOR_FILTER[$i].'</option>';
}
# Select Price
for ($i=0; $i < count(PRICE_FILTER); $i++) { 
$showSelectPrice .='
<option '.matchSelected($i,$checkedPrice).' value="'.PRICE_FILTER[$i][0].'">'.PRICE_FILTER[$i][1].'</option>';
}
# Select Sorts
for ($i=0; $i < count(SORTS_FILTER); $i++) { 
  $showSelectSorts .='
  <option '.matchSelected($i,$checkedSorts).' value="'.SORTS_FILTER[$i][0].'">'.SORTS_FILTER[$i][1].'</option>';
  }
  
// [RENDER VIEW]
require_once "../../view/user/header.php";
require_once "../../view/user/product.php";