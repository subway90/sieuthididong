<?php
function addSeries($slug,$name,$decribe,$idBrand,$idType,$idStyle,$status){
    $sql = "INSERT INTO products(slug,name,decribe,status,idBrand,idType,idStyle) values('$slug','$name','$decribe','$status','$idBrand','$idType','$idStyle')";
    pdo_execute($sql);
}

function updateSeries($slug,$name,$decribe,$idBrand,$idType,$idStyle,$status,$id){
    $sql = 'UPDATE products SET slug ="'.$slug.'",name="'.$name.'",decribe="'.$decribe.'",status='.$status.',idBrand='.$idBrand.',idType='.$idType.',idStyle='.$idStyle.',dateUpdate = current_timestamp() WHERE id ='.$id;
    pdo_execute($sql);
}

function editCate($id,$name,$status){
    $sql = "UPDATE category SET name = '".$name."',status =".$status." WHERE id = ".$id;
    pdo_query($sql);
    addAlert('success','<i class="fas fa-check-circle"></i> TSửa danh mục thành công !');
    header("Location:".ACT_ADMIN."category-edit&id=".$id);

}
