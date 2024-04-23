<?php
# VARIBLE
$showInputType = $showInputStyle = $showInputBrand = "";

# EDIT
if(isset($_GET['edit']) && ($_GET['edit'])) {
    $subURL .= '&edit='.$_GET['edit'];
    $seriesEdit = getOneFieldByCustom('products','name,decribe,idBrand,idStyle,idType,status','id ='.$_GET['edit']);
    if($seriesEdit) extract($seriesEdit);
    else show404('admin');
# ADD 
}else {
    $name = $decribe = "";
    $idBrand = $idStyle = $idType = $status = 1;
}
# VALIDATION
if(isset($_POST['submit'])) {
    if(isset($_GET['edit']) && $_GET['edit']) {
        if(getOneFieldByCustom('products','id','id ='.$_GET['edit'])) $edit = true;
        else show404('admin');
    }
    $name    = $_POST['name'];
    $status  = $_POST['status'];
    $decribe = $_POST['decribe'];
    $idType  = $_POST['idType'];
    $idBrand = $_POST['idBrand'];
    $idStyle = $_POST['idStyle'];
    if($name) {
        if($edit === true) $conditionCheckSlug = ' id !='.$_GET['edit'];
        else $conditionCheckSlug = '1';
        $slug = createSlug($name);
        $check = getOneFieldByCustom('products','slug','slug = "'.$slug.'" AND '.$conditionCheckSlug);
        if(!$check) {
            if($decribe) {
                if($edit === true) {
                    updateSeries($slug,$name,$decribe,$idBrand,$idType,$idStyle,$status,$_GET['edit']);
                    addAlert('primary','Chỉnh sửa thành công !');
                }
                else {
                    addSeries($slug,$name,$decribe,$idBrand,$idType,$idStyle,$status);
                    addAlert('success','Thêm Series mới thành công !');
                }
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