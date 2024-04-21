<?php
function addCategory($ten_danhmuc,$trangthai){
    $sql = "INSERT INTO category(name,status,dateCreate) values('$ten_danhmuc',$trangthai,current_timestamp())";
    pdo_execute($sql);
    addAlert('success','<i class="fas fa-check-circle"></i> Tạo danh mục thành công !');
    header("Location:".ACT_ADMIN."category");
}
function getAllCateByJoinIdCate($table,$idCate,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT *
    FROM ".$table." WHERE idCate =".$idCate." AND ".$status;
    $result = pdo_query($sql);
    return $result;
}
function editCate($id,$name,$status){
    $sql = "UPDATE category SET name = '".$name."',status =".$status." WHERE id = ".$id;
    pdo_query($sql);
    addAlert('success','<i class="fas fa-check-circle"></i> TSửa danh mục thành công !');
    header("Location:".ACT_ADMIN."category-edit&id=".$id);

}