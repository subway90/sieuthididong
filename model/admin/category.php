<?php
function addType($name,$decribe,$status){
    $sql = "INSERT INTO product_Type(name,decribe,status) values('$name','$decribe',$status)";
    pdo_execute($sql);
}
function editType($id,$name,$decribe,$status){
    $sql = "UPDATE product_Type SET name = '".$name."',decribe = '".$decribe."',status =".$status.",dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_query($sql);
}