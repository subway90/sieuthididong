<?php
function addNews($idUser,$title,$slug,$idCate,$imageTitle,$shortDecribe,$decribe,$status){
    $sql = "INSERT INTO news(idUser,title,slug,idCate,imageTitle,shortDecribe,decribe,status) values('$idUser','$title','$slug',$idCate,'$imageTitle','$shortDecribe','$decribe','$status')";
    pdo_execute($sql);
}
function editNews($idUser,$id,$title,$slug,$idCate,$imageTitle,$shortDecribe,$decribe,$status){
    $sql = "UPDATE news SET idUser = '".$idUser."',title = '".$title."',slug = '".$slug."',idCate = '".$idCate."',imageTitle = '".$imageTitle."',shortDecribe = '".$shortDecribe."',decribe = '".$decribe."',status =".$status.",dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_query($sql);
}
function addNewsCategory($name,$decribe,$status){
    $sql = "INSERT INTO news_category(name,decribe,status) values('$name','$decribe',$status)";
    pdo_execute($sql);
}
function editNewsCategory($id,$name,$decribe,$status){
    $sql = "UPDATE news_category SET name = '".$name."',decribe = '".$decribe."',status =".$status.",dateUpdate = current_timestamp() WHERE id = ".$id;
    pdo_query($sql);
}