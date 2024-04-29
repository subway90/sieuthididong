<?php
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('news_category',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'news-category');
    exit;
}
# RENDER VIEW
$title = 'danh sách loại tin tức';
$listCate = getAllFieldByCustom('news_category','*','1');
require_once "../../view/admin/header.php";
require_once "../../view/admin/news-category.php";