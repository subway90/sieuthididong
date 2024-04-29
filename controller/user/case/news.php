<?php
$listNews = getAllFieldByCustom('news','*','status = 1');

#RENDER VIEW
require_once '../../view/user/header.php';
//SHOW
if(isset($arrayURL[1]) && $arrayURL[1]) {
    require_once '../../view/user/news-detail.php';
//INDEX
}else{
    require_once '../../view/user/news.php';
}
