<?php
function colorEyeActive($status){
    if($status ==1) return 'warning';
    else return 'success';
}
function colorTextRow($status){
    if($status ==1) return 'text-dark';
    else return 'text-muted';
}
function updateSttUser($id){
    $sql = "UPDATE feedback SET statusUser = 2 WHERE id=".$id;
    pdo_execute($sql);
}
