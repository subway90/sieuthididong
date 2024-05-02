<?php
function getProductAdmin($filter){
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
    WHERE ";
    if($filter) $sql .= $filter;
    else $sql .=" 1 ORDER BY c.priceSale ASC";
    $list = pdo_query($sql);
    return $list;
}

function addProduct($idModel,$color,$image,$quantity,$price,$priceSale,$decribe,$status){
    $sql = "INSERT INTO product_color(idModel,color,image,quantity,price,priceSale,decribe,status) values('$idModel','$color','$image','$quantity','$price','$priceSale','$decribe','$status')";
    pdo_execute($sql);
};

function updateProduct($id,$idModel,$color,$image,$quantity,$price,$priceSale,$decribe,$status){
    $sql = "UPDATE product_color
    SET idModel = ".$idModel.",color = '".$color."',image = '".$image."',quantity = ".$quantity.",price = ".$price.",priceSale = ".$priceSale.",decribe = '".$decribe."',status = ".$status.", dateCreate = current_timestamp() WHERE id=".$id;
    pdo_execute($sql);
}
function checkSlug($slug,$id){
    if(!empty($id)) $select =  " AND id!=".$id;
    else $select = "";
    $sql = "SELECT id FROM products WHERE slug ='".$slug."'".$select;
    $result = pdo_query_one($sql);
    if(!empty($result)) return false;
    else return true;
}

function bgNumber($quantity) {
    if($quantity <= 0) return 'danger';
    else return 'primary';
}
function matchCollapse($a,$b) {
    if($a == $b) return 'show';
    else return 'collapse';
}

function updateFlashSale($id,$type){
    $sql = "UPDATE product_color SET flashsale ='".$type."' WHERE id=".$id;
    pdo_execute($sql);
}