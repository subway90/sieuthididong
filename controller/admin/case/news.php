<?php
# SHOW / HIDE
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('news',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi thành công !');
    header('Location: '.ACT_ADMIN.'news');
    exit;
}
# RENDER VIEW
if(isset($_GET['blocklist'])) {
    $title = 'Danh sách bài viết đã xóa';
    $showNav = '<span class="text-danger">Danh sách bài viết đã xóa</span>';
    $showBtn = '<a href="'.ACT_ADMIN.'news" class="btn btn-outline-success me-3">Bài viết hoạt động</a>';
    $listNews = getAllFieldByCustom('news','*','status = 2');
}else {
    $title = 'Danh sách bài viết';
    $showNav = '<span class="text-success">Danh sách bài viết hoạt động</span>';
    $showBtn = '<a href="'.ACT_ADMIN.'news&blocklist" class="btn btn-outline-danger me-3">Bài viết đã xóa</a>';
    $listNews = getAllFieldByCustom('news','*','status =1');
}
require_once "../../view/admin/header.php";
require_once "../../view/admin/news.php";