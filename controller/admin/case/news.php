<?php
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('news',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'news');
    exit;
}
# RENDER VIEW
$title = 'Danh sách bài viết';
$listNews = getAllFieldByCustom('news','*','1');
require_once "../../view/admin/header.php";
require_once "../../view/admin/news.php";