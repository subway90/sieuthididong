<?php
function updateAccount($id,$user,$fullName,$phone,$email,$image,$address,$status,$role){
    $sql = "UPDATE accounts SET user = '".$user."',fullName = '".$fullName."',phone = '".$phone."',email = '".$email."',image = '".$image."',address = '".$address."',status =".$status.",role =".$role.",dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_query($sql);
}