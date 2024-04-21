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
function addAuthor($name,$status){
    $sql = "INSERT INTO author(name,status,dateCreate) values('$name',$status,current_timestamp())";
    pdo_execute($sql);
    addAlert('success','<i class="fas fa-check-circle"></i> Thêm tác giả mới thành công !');
    header("Location:".ACT_ADMIN."author");
}
function editAuthor($id,$name,$status){
    $sql = "UPDATE author SET name = '".$name."',status =".$status." WHERE id = ".$id;
    pdo_query($sql);
    addAlert('success','<i class="fas fa-check-circle"></i> Sửa tác giả thành công ! !');
    header("Location:".ACT_ADMIN."author-edit&id=".$id);

}