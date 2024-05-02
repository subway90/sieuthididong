<?php

$listCate = getAllFieldByCustom('news_category','id,name','status = 1 ORDER BY dateCreate DESC');
$search = $detail = $category = false;
$activeCate = -1;
$keyword = $offsetLimit = "";
#SEARCH CASE
if(isset($_GET['tim-kiem']) && $_GET['tim-kiem']){
    $keyword = $_GET['tim-kiem'];
    $search = true;
    $countNews = getOneFieldByCustom('news','COUNT(id) quantity','title LIKE "%'.moveCharSpecial($keyword).'%" AND status = 1 ORDER BY dateCreate DESC ');
}

if(isset($arrayURL[1]) && $arrayURL[1]) {

    #ALL NEWS
    if($arrayURL[1] === 'tat-ca') {
        $activeCate = 0;
        $countNews = getOneFieldByCustom('news','COUNT(id) quantity','status = 1 ORDER BY dateCreate DESC ');
    }else {
        #CATEGORY CASE
        for ($i=0; $i < count($listCate); $i++) { 
            extract($listCate[$i]);
            if(moveSlug($arrayURL[1]) == moveSlug(createSlug($name))) {
                $title = $name;
                $countNews = getOneFieldByCustom('news','COUNT(id) quantity','idCate ='.$id.' AND status = 1 ORDER BY dateCreate DESC ');
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
    #PAGINATION
    if(!$detail) {
        if(isset($arrayURL[2]) && $arrayURL[2] && substr($arrayURL[2],0,6) === 'trang-') $pageActive = substr($arrayURL[2],6);
        else $pageActive = 1;
        $maxPage = ceil(($countNews['quantity'])/LIMIT_NEWS_IN_PAGE);
        if(checkNumber($pageActive) || !$pageActive) {
            if($pageActive <= $maxPage) {
                $offsetLimit = ' LIMIT '.(($pageActive-1) * LIMIT_NEWS_IN_PAGE ).','.( LIMIT_NEWS_IN_PAGE * $pageActive );
            }else show404('user');
        }else show404('user');
    }
    
}else header('Location: '.URL.'tin-tuc/tat-ca');

#RENDER VIEW
//echo $_SERVER['REQUEST_URI'];
//LIST NEWS
if($search) $listNews = getAllFieldByCustom('news','slug,title,dateCreate,idUser,imageTitle','title LIKE "%'.moveCharSpecial($keyword).'%" AND status = 1 ORDER BY dateCreate DESC '.$offsetLimit);
else if($category) $listNews = getAllFieldByCustom('news','slug,title,dateCreate,idUser,imageTitle','idCate ='.$id.' AND status = 1 ORDER BY dateCreate DESC '.$offsetLimit);
else $listNews = getAllFieldByCustom('news','slug,title,dateCreate,idUser,imageTitle','status = 1 ORDER BY dateCreate DESC '.$offsetLimit);

//FILTER BY CATEGORY
$showFilterCategoryNews = '<a href="'.URL.'tin-tuc/tat-ca/trang-1" class="btn btn-sm btn-outline-success me-1 mt-1 '.matchValue('active',0,$activeCate).'"><small>Tất cả</small></a>';
for ($i=0; $i < count($listCate); $i++) { 
    extract($listCate[$i]);
    $showFilterCategoryNews .= '<a href="'.URL.'tin-tuc/'.createSlug($name).'/trang-1" class="btn btn-sm btn-outline-success me-1 mt-1 '.matchValue('active',$id,$activeCate).'"><small>'.$name.'</small></a>';  
}
//PAGING SHOW
if(!$detail) {
    $showPagingNews = '<a href="'.URL.'tin-tuc/tat-ca/trang-'.($pageActive-1).'" class="btn btn-sm btn-outline-success  border-end-0 '.matchValue('disabled',1,$pageActive).'">Trước</a>';
    for ($i=1; $i <= $maxPage; $i++) $showPagingNews .= '<a href="'.URL.'tin-tuc/tat-ca/trang-'.$i.'" class="btn btn-sm btn-outline-success border-end-0 '.matchValue('active',$i,$pageActive).'">'.$i.'</a>';
    $showPagingNews .= '<a href="'.URL.'tin-tuc/tat-ca/trang-'.($pageActive+1).'" class="btn btn-sm btn-outline-success '.matchValue('disabled',$maxPage,$pageActive).'">Sau</a>';
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