<?php
function updateSttUser($id,$status){
    $sql = "UPDATE feedback SET statusUser ='".$status."' WHERE id=".$id;
    pdo_execute($sql);
}