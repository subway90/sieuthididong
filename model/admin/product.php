<?php
function getAllProduct(){
    $sql = "SELECT sp_nxb.*,tg.name tentacgia
    FROM 
    (
        SELECT sp.*, sp.idAuthor id_tg, sp.id id_sp, nxb.name nhaxuatban
        FROM products sp
        JOIN publishing nxb
        ON sp.idPublishing = nxb.id
    ) sp_nxb
    JOIN author tg
    ON sp_nxb.id_tg = tg.id";
    $list = pdo_query($sql);
    return $list;
}
function addProduct($tensp,$slug,$ngayxuatban,$giasp,$giasale,$soluong,$motasp,$filename,$iddm,$idnxb,$idtg){
    $sql = "INSERT INTO products(name,slug,price,priceSale,quantity,datePublish,image,decribe,status,idCategory,idPublishing,idAuthor) values('$tensp','$slug','$giasp','$giasale','$soluong','$ngayxuatban','$filename','$motasp',1,'$iddm','$idnxb','$idtg')";
    pdo_execute($sql);
    addAlert('success','<i class="fas fa-check-circle"></i> Tạo sản phẩm thành công !');
    header("Location:".ACT_ADMIN."product");
};

function editProduct($name,$slug,$datePublish,$price,$priceSale,$quantity,$decribe,$image,$idCategory,$idPublishing,$idAuthor,$id){
    $sql = "UPDATE products
    SET name = '".$name."',slug = '".$slug."',datePublish = '".$datePublish."',price = ".$price.",priceSale = ".$priceSale.",quantity = ".$quantity.",decribe = '".$decribe."',image = '".$image."',idCategory = ".$idCategory.",idPublishing = ".$idPublishing.",idAuthor = ".$idAuthor.", dateCreate = current_timestamp() WHERE id=".$id;
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
