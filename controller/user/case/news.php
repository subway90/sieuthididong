<?php
$listNews = getAllFieldByCustom('news','slug,title,dateCreate,idUser,imageTitle','status = 1');
$listCate = getAllFieldByCustom('news_category','id,name','status = 1 ORDER BY dateCreate DESC');
$search = $detail = $category = false;
$activeCate = -1;
$keyword = "";
#SEARCH CASE
if(isset($_GET['tim-kiem']) && $_GET['tim-kiem']){
    $keyword = $_GET['tim-kiem'];
    $search = true;
    $listNews = getAllFieldByCustom('news','slug,title,dateCreate,idUser,imageTitle','title LIKE "%'.moveCharSpecial($keyword).'%" AND status = 1');
}

#CATEGORY CASE
if(isset($arrayURL[1]) && $arrayURL[1]) {
    for ($i=0; $i < count($listCate); $i++) { 
        extract($listCate[$i]);
        if(moveSlug($arrayURL[1]) == moveSlug(createSlug($name))) {
            $title = $name;
            $listNews = getAllFieldByCustom('news','slug,title,dateCreate,idUser,imageTitle','idCate ='.$id.' AND status = 1');
            $category = true;
            $activeCate = $id;
            break;
        }
    }
    #DETAIL CASE
    if($category == false) {
        $getNews = getOneFieldByCustom('news','*','slug ="'.$arrayURL[1].'"');
        if($getNews) {
            //DATA BLOG
            extract($getNews);
            //DATA COMMENT
            $listComment = getAllFieldByCustom('news_comment','idUser,message,dateCreate','idNews ='.$id.' AND status = 1');
            $detail = true;
        }else show404('user');
    }
}

#RENDER VIEW

//FILTER BY CATEGORY
$showFilterCategoryNews = '<a href="'.URL.'tin-tuc/" class="btn btn-sm btn-outline-success me-1 mt-1 '.matchValue('active',-1,$activeCate).'"><small>Tất cả</small></a>';
for ($i=0; $i < count($listCate); $i++) { 
    extract($listCate[$i]);
    $showFilterCategoryNews .= '<a href="'.URL.'tin-tuc/'.createSlug($name).'" class="btn btn-sm btn-outline-success me-1 mt-1 '.matchValue('active',$id,$activeCate).'"><small>'.$name.'</small></a>';  
}
//VIEW DETAIL
if($detail) {
    require_once '../../view/user/header.php';
    require_once '../../view/user/news-detail.php';
}
// VIEW INDEX
else {
    if(!$category) $title = 'Tin tức';
    require_once '../../view/user/header.php';
    require_once '../../view/user/news.php';
}