<?php
function addStyle($name,$decribe,$status){
    $sql = "INSERT INTO product_style(name,decribe,status) values('$name','$decribe',$status)";
    pdo_execute($sql);
}
function editStyle($id,$name,$decribe,$status){
    $sql = "UPDATE product_style SET name = '".$name."',decribe = '".$decribe."',status =".$status.",dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_query($sql);
}