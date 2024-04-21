<?php
/**
 * @param int $limit giới hạn sản phẩm
 */
function getProductNews($limit){
    $sql = "SELECT * FROM products WHERE status = 1 order by dateCreate desc LIMIT ".$limit;
    $list = pdo_query($sql);
    return $list;
}
function detailProductBySlug($slug){
    $sql = "SELECT sp_nxb.*,tg.name tentacgia
    FROM 
    (
        SELECT sp.*, sp.idAuthor id_tg, sp.id id_sp, nxb.name nhaxuatban
        FROM products sp
        JOIN publishing nxb
        ON sp.idPublishing = nxb.id
    ) sp_nxb
    JOIN author tg
    ON sp_nxb.idAuthor = tg.id
    WHERE sp_nxb.slug ='".$slug."'
    AND sp_nxb.status = 1";
    $product = pdo_query_one($sql);
    return $product;
}
/**
 * Hàm này để lấy tất cả dòng từ $table và điều kiện $status
 * @param $table bảng cần thực thi
 * @param $idCate IDCatecần select
 * @param $status (1: hiện | 2: ẩn | 0: không điều kiện)
 */
function getAllCateByIDCate($table,$idCate,$status){
    if($status==1) $status = "status = 1";
    if($status==2) $status = "status = 2";
    if($status==0) $status = "1";
    $sql = "SELECT *
    FROM ".$table." WHERE idCate =".$idCate." AND ".$status;
    $result = pdo_query($sql);
    return $result;
}
function getListHint($id,$idCate){
    $sql = "SELECT * FROM products WHERE idCategory = ".$idCate." AND status = 1 AND id !=".$id;
    $list = pdo_query($sql);
    return $list;
}
function getListCmt($id){
    $sql = "SELECT * FROM comments WHERE idProduct = ".$id." AND status = 1 ORDER BY dateCreate desc";
    $list = pdo_query($sql);
    return $list;
}
function addComment($idUser,$idProduct,$message){
    $sql = "INSERT INTO comments(idUser,idProduct,message) values('$idUser','$idProduct','$message')";
    pdo_execute($sql);
}