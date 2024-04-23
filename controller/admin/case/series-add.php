<?php
$showInputType = $showInputStyle = $showInputBrand = $name = $decribe = "";
$idBrand = $idStyle = $idType = $status = 1;

# ADD NEW
if(isset($_GET['add'])) {
    $name = $_POST['name'];
    $status  = $_POST['status'];
    $decribe = $_POST['decribe'];
    $idType  = $_POST['idType'];
    $idBrand = $_POST['idBrand'];
    $idStyle = $_POST['idStyle'];
    if($name) {
        $slug = createSlug($name);
        $check = checkSeries($slug);
        if($check) {
            if($decribe) {
                addSeries($slug,$name,$decribe,$idBrand,$idType,$idStyle,$status);
                addAlert('success','Thêm Series mới thành công !');
                header('Location: '.ACT_ADMIN.'series');
                exit;
            }else addAlert('danger','Vui lòng nhập mô tả.');
        }else addAlert('danger','Tên Series này đã tồn tại.');
    }else addAlert('danger','Vui lòng nhập tên Series.');
}

# RENDER VIEW
$listIdType = getAllFieldByCustom('product_type','name,id','status = 1');
for ($i=0; $i < count($listIdType); $i++) { 
    $showInputType .='<option '.matchSelected($listIdType[$i]['id'],$idType).' value="'.$listIdType[$i]['id'].'">'.$listIdType[$i]['name'].'</option>';
}
$listIdBrand = getAllFieldByCustom('product_brands','name,id','status = 1');
for ($i=0; $i < count($listIdBrand); $i++) { 
    $showInputBrand .='<option '.matchSelected($listIdBrand[$i]['id'],$idBrand).' value="'.$listIdBrand[$i]['id'].'">'.$listIdBrand[$i]['name'].'</option>';
}
$listIdStyle = getAllFieldByCustom('product_style','name,id','status = 1');
for ($i=0; $i < count($listIdStyle); $i++) { 
    $showInputStyle .='<option '.matchSelected($listIdStyle[$i]['id'],$idStyle).' value="'.$listIdStyle[$i]['id'].'">'.$listIdStyle[$i]['name'].'</option>';
}
require_once "../../view/admin/header.php";
require_once "../../view/admin/series-add.php";