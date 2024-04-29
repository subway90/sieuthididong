<?php
$listNews = getAllFieldByCustom('news','*','status = 1');

#RENDER VIEW
//SHOW
if(isset($arrayURL[1]) && $arrayURL[1]) {
    $getNews = getOneFieldByCustom('news','*','slug ="'.$arrayURL[1].'"');
    if($getNews) {
        #DATA BLOG
        extract($getNews);
        #DATA COMMENT
        $listComment = getAllFieldByCustom('news_comment','idUser,message,dateCreate','idNews ='.$id.' AND status = 1');
        require_once '../../view/user/header.php';
        require_once '../../view/user/news-detail.php';
    }
    else show404('user');
//INDEX
}else{
    require_once '../../view/user/header.php';
    require_once '../../view/user/news.php';
}
