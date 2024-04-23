<?php
$showInputSeries = "";
$model = $decribeModel = "";
$status = $idProduct = 1;
#  EDIT TRUE
if(isset($_GET['edit']) && $_GET['edit']) {
    $modelEdit = getOneFieldByCustom('product_model','id,idProduct,model,decribeModel,status','id ='.$_GET['edit']);
    if($modelEdit) {
        $edit = true;
        $subURL = '&edit='.$_GET['edit'];
        extract($modelEdit);
    }
    else show404('admin');
}
# SUBMIT
if(isset($_POST['submit'])) {
    $model = $_POST['model'];
    $status = $_POST['status'];
    $idProduct = $_POST['idProduct'];
    $decribeModel = $_POST['decribeModel'];
    if(!$model) addAlert('danger','Chưa nhập tên Model');
    else {
        # EDIT SUBMIT
        if($edit === true) {
            editModel($_GET['edit'],$idProduct,$model,$decribeModel,$status);
            addAlert('primary','Sửa Models thành công !');
        # ADD SUBMIT
        }else {
            addModel($idProduct,$model,$decribeModel,$status);
            addAlert('success','Thêm Models mới thành công !');
        }
        header('Location: '.ACT_ADMIN.'model');
        exit;

    }
}

# RENDER VIEW
$listSeries = getAllFieldByCustom('products','name,id','status = 1');
for ($i=0; $i < count($listSeries); $i++) { 
    extract($listSeries[$i]);
    $showInputSeries .= '<option '.matchSelected($idProduct,$id).' value="'.$id.'">'.$name.'</option>';
}
require_once "../../view/admin/header.php";
require_once "../../view/admin/model-add.php";