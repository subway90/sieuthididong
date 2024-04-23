<?php
// function getAllCategory(){
//     $sql = "SELECT dm.*, count(dm.id) soluong_sp
//     FROM danhmuc dm
//     JOIN sanpham sp
//     ON dm.id = sp.id_danhmuc
//     GROUP BY dm.id";
//     $list = pdo_query($sql);
//     return $list;
// }
function addModel($id,$model,$decribeModel,$status){
    $sql = "INSERT INTO product_model(idProduct,model,status,decribeModel) values($id,'$model','$decribeModel',$status)";
    pdo_execute($sql);
}
function editModel($id,$idProduct,$model,$decribeModel,$status){
    $sql = "UPDATE product_model SET model = '".$model."',decribeModel = '".$decribeModel."',idProduct = ".$idProduct.",status =".$status.",dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_query($sql);
}