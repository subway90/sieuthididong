<?php
function getProduct($filter){
    $sql = "
    SELECT pm.idProduct, pm.idModel, pm.idBrand, pm.idType, pm.idStyle, pm.slug, pm.name, pm.idModel, pm.model, c.*
    FROM product_color c
    JOIN (
        SELECT p.name, p.idBrand, p.idType, p.idStyle, p.slug, p.id idProduct, m.id idModel, m.model
        FROM products p
        JOIN product_model m
        ON m.idProduct = p.id
        ) pm
    ON pm.idModel = c.idModel
    WHERE c.status = 1 AND ";
    if($filter) $sql .= $filter;
    else $sql .=" 1 ORDER BY c.priceSale ASC";
    $list = pdo_query($sql);
    return $list;
}
function getOneProduct($filter){
    $sql = "
    SELECT pm.idProduct, pm.idModel, pm.idBrand, pm.idType, pm.idStyle, pm.slug, pm.name, pm.idModel, pm.model, c.*
    FROM product_color c
    JOIN (
        SELECT p.name, p.idBrand, p.idType, p.idStyle, p.slug, p.id idProduct, m.id idModel, m.model
        FROM products p
        JOIN product_model m
        ON m.idProduct = p.id
        ) pm
    ON pm.idModel = c.idModel
    WHERE c.status = 1 AND ".$filter;
    $list = pdo_query_one($sql);
    return $list;
}

/**
 * @param int $limit giới hạn sản phẩm
 */
function getProductNews($limit){
    $sql = "SELECT * FROM products WHERE status = 1 order by dateCreate desc LIMIT ".$limit;
    $list = pdo_query($sql);
    return $list;
}
function detailProductBySlug($slug){
    $sql = "SELECT * FROM products
    WHERE slug ='".$slug."'
    AND status = 1";
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
    $sql = "
    SELECT c.message, c.dateCreate, a.image, a.type, a.fullName
    FROM comments c
    JOIN accounts a
    ON c.idUser = a.id
    WHERE c.idProduct = ".$id." 
    AND c.status = 1 
    ORDER BY c.dateCreate desc";
    $list = pdo_query($sql);
    return $list;
}
function addComment($idUser,$idProduct,$message){
    $sql = "INSERT INTO comments(idUser,idProduct,message) values('$idUser','$idProduct','$message')";
    pdo_execute($sql);
}

function saleProduct($price,$priceSale) {
    return 100-ceil(($priceSale/$price)*100);
}