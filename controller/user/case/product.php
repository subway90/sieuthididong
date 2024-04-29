<?php
# MẢNG
$listBrand = getAllFieldByCustom('product_brands','id,name','status = 1');
$listStyle = getAllFieldByCustom('product_style','id,name','status = 1');

# BIẾN
$checkedBrand = $checkedStyle = $checkedColor = $checkedPrice = $checkedSorts = -1;
$filter = "";
$route = false;

# LOẠI HIỂN THỊ
if(isset($arrayURL[2]) && $arrayURL[2] == 'series') {
  $showNav = '<li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Series</li>';
  $showType = 'series';
}else $showType = 'detail';

# [MUA NGAY TỪ SẢN PHẨM]
if(isset($_POST['addNowProduct'])) $route = true;
if(isset($_POST['addProduct']) || $route){
  # Trường hợp CHƯA ĐĂNG NHẬP (GUEST)
  if(empty($_SESSION['user'])){
      $check = checkCart($_POST['idColor']);
      if($check == -1) {
          $_SESSION['cart'][] = ['idProduct' => $_POST['idProduct'],'idModel' => $_POST['idModel'],'idColor' => $_POST['idColor'],'quantity' => 1];
          addAlert('success',ICON_CHECK.'Thêm sản phẩm vào giỏ hàng thành công !');
      }else addAlert('warning','<i class="fas fa-vote-yea"></i> Sản phẩm này đã có trong giỏ hàng.');
  }
  # Trường hợp ĐÃ ĐĂNG NHẬP (USER)
  else{ 
      $check = checkCartByID($_POST['idColor']);
      if(empty($check)) {
          addCart($_SESSION['user']['id'],$_POST['idProduct'],$_POST['idModel'],$_POST['idColor'],1);
          addAlert('success',ICON_CHECK.'Thêm sản phẩm vào giỏ hàng thành công !');
      }
      else addAlert('warning','<i class="fas fa-vote-yea"></i> Sản phẩm này đã có trong giỏ hàng.');
  }
  # Route
  if($route) header('Location:'.URL.'gio-hang');
}

# LỌC TÌM KIẾM
if(isset($arrayURL[1]) && $arrayURL[1]){
  # FILTER CASE
  if($arrayURL[1] === 'loc'){
    #Nav
    if($showType !== 'series') $showNav = '<li class="breadcrumb-item fw-bold"><a href="'.URL.'san-pham" class="text-decoration-none text-dark">Điện thoại</a></li>';
      # Thương hiệu
      if(isset($_GET['Brand']) && $_GET['Brand']){
        for ($i=0; $i < count($listBrand); $i++) { 
          if($listBrand[$i]['id'] == $_GET['Brand']) {
            $filter .= "idBrand = ".$_GET['Brand']." AND ";
            $checkedBrand = $i;
            $nameBrand = getOneFieldByCustom('product_brands','name','id ='.$_GET['Brand'])['name'];
            $showNav .= '<li class="breadcrumb-item fw-bold"><a href="'.URL.'san-pham/loc/?Brand='.$_GET['Brand'].'" class="text-decoration-none text-dark">'.$nameBrand.'</a></li>';
          }
        }
      }
      # Màu
      if(isset($_GET['Color']) && $_GET['Color']){
        for ($i=0; $i < count(COLOR_FILTER); $i++) {
            if($_GET['Color'] == COLOR_FILTER[$i]) {
              $filter .= 'color like "%'.COLOR_FILTER[$i].'%"'." AND ";
              $checkedColor = $i;
              $showNav .= '<li class="breadcrumb-item fw-bold"><a href="'.URL.'san-pham/loc/?Brand='.$_GET['Brand'].'&Color='.$_GET['Color'].'" class="text-decoration-none text-dark">màu '.$_GET['Color'].'</a></li>';
            }
        }
      }
      # Phong cách
      if(isset($_GET['Style']) && $_GET['Style']){
        for ($i=0; $i < count($listStyle); $i++) { 
          if($listStyle[$i]['id'] == $_GET['Style']) {
            $filter .= "idStyle = ".$_GET['Style']." AND ";
            $checkedStyle = $i;
            $nameStyle = getOneFieldByCustom('product_style','name','id ='.$_GET['Style'])['name'];
            $showNav .= '<li class="breadcrumb-item fw-bold"><a href="'.URL.'san-pham/loc/?Brand='.$_GET['Brand'].'&Color='.$_GET['Color'].'&Style='.$_GET['Style'].'" class="text-decoration-none text-dark">'.$nameStyle.'</a></li>';
          }
        }
      }
      # Loại (chưa dùng)
      if(isset($_GET['Type']) && $_GET['Type']){
        $filter .= "idType = ".$_GET['Type']." AND ";
      }
      # Giá
      if(isset($_GET['Price']) && $_GET['Price']){
        for ($i=0; $i < count(PRICE_FILTER); $i++) {
            if($_GET['Price'] == PRICE_FILTER[$i][0]) {
              $filter .= 'c.priceSale > '.(PRICE_FILTER[$i][2]*1000).' AND c.priceSale < '.(PRICE_FILTER[$i][3]*1000).' AND ';
              $checkedPrice = $i;
              $showNav .= '<li class="breadcrumb-item fw-bold"><a href="'.URL.'san-pham/loc/?Brand='.$_GET['Brand'].'&Color='.$_GET['Color'].'&Style='.$_GET['Style'].'&Price='.$_GET['Price'].'" class="text-decoration-none text-dark">'.PRICE_FILTER[$i][1].'</a></li>';
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
              $showNav .= '<li class="breadcrumb-item fw-bold"><a href="'.URL.'san-pham/loc/?Brand='.$_GET['Brand'].'&Color='.$_GET['Color'].'&Style='.$_GET['Style'].'&Price='.$_GET['Price'].'&Sorts='.SORTS_FILTER[$i][0].'" class="text-decoration-none text-dark">'.SORTS_FILTER[$i][1].'</a></li>';
              break;
            }
        }if(!$sort) $filter .="1";
      }else $filter .="1";
      $listProduct = getProduct($filter);
  }
  # SEARCH
  else if($arrayURL[1] === 'tim-kiem'){
    #Nav
    if($showType !== 'series') $showNav = '<li class="breadcrumb-item fw-bold text-success">Tìm kiếm từ khóa : '.showKeyWordSearch().'</li>';
    if(isset($_POST['search']) && $_POST['search']) {
      $search = 'pm.name LIKE "%'.moveCharSpecial($_POST['search']).'%"';
    }
    else show404('user');
    $listProduct = getProduct($search);
    delayTime(1);
  }
}else {
  $listProduct = getProduct('');
  $showNav = '<li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Điện thoại</li>';
}

# Select Default
$showSelectBrand = '<option value="0">Tất cả</option>';
$showSelectColor = '<option value="0">Tất cả</option>';
$showSelectStyle = '<option value="0">Tất cả</option>';
$showSelectPrice = '<option value="0">Tất cả</option>';
$showSelectSorts = '<option value="0">Không</option>';

// [RENDER VIEW]

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
  $showSelectColor .='<option '.matchSelected($i,$checkedColor).' value="'.COLOR_FILTER[$i].'">'.COLOR_FILTER[$i].'</option>';
}
# Select Price
for ($i=0; $i < count(PRICE_FILTER); $i++) { 
  $showSelectPrice .='<option '.matchSelected($i,$checkedPrice).' value="'.PRICE_FILTER[$i][0].'">'.PRICE_FILTER[$i][1].'</option>';
}
# Select Sorts
for ($i=0; $i < count(SORTS_FILTER); $i++) { 
  $showSelectSorts .='<option '.matchSelected($i,$checkedSorts).' value="'.SORTS_FILTER[$i][0].'">'.SORTS_FILTER[$i][1].'</option>';
}
 
# List Series Product
$showListSeries = '';
# list ID Series
$listIdSeries = getAllFieldByCustom('products','id,name','status = 1');
for ($i=0; $i < count($listIdSeries); $i++) { 
  $showListImageSeries = '';
  $listProductSeries = getProduct('pm.idProduct ='.$listIdSeries[$i]['id'].' ORDER BY c.priceSale ASC');
  if(!$listProductSeries) continue;
  $nameSeries = $listIdSeries[$i]['name'];
  $priceSeries = $listProductSeries[0]['priceSale'];
  $listImageSeries[$i] = [];
  for ($j=0; $j < count($listProductSeries); $j++) { 
    extract($listProductSeries[$j]);
    if(!in_array($image,$listImageSeries[$i])) $listImageSeries[$i][] = $image;
  }
  for ($j=0; $j < count($listImageSeries[$i]); $j++) { 
    $showListImageSeries .='
    <img width="40" src="'.URL_IMGER_PRODUCT.$listImageSeries[$i][$j].'" alt="'.$listImageSeries[$i][$j].'">';
  }
  #var_dump($showListImageSeries);exit;
  $showListSeries .='
<div class="col-12 col-md-6 col-lg-4 pb-3 pb-md-4 pb-lg-4">
    <div class="card shadow py-3">
        <div class="row">
            <div class="col-6">
                <div class="position-relative hover-trigger">
                    <img src="'.URL_IMGER_PRODUCT.$listImageSeries[$i][0].'" class="card-img img-product" alt="'.$listImageSeries[$i][0].'">
                    <span class="show-hover position-absolute end-0 bottom-0 w-100">
                        <div class="d-flex justify-content-evenly">
                            <button name="" type="submit" class="btn btn-success">
                                <div class="fs-6 small" ><small>xem chi tiết</small></div>
                            </button>
                        </div>
                    </span>
                </div>
            </div>
            <div class="col-6">
                <a href="'.URL.'chi-tiet/'.$slug.'" class="text-decoration-none text-green fw-bold">'. $nameSeries .'</a>
                <div class="d-flex mt-3">
                    '.$showListImageSeries.'
                </div>
                <div class="text-danger mt-3"><span class="fs-6"><small>giá chỉ từ </small></span><span class="fw-bold fs-5">'. number_format($priceSeries) .' đ</span></div>
            </div>
        </div>
    </div>
</div>';
}
require_once "../../view/user/header.php";
require_once "../../view/user/product.php";
