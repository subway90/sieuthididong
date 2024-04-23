<?php
# ẨN / HIỆN
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) {
    updateStatusById('products',$_GET['id'],$_GET['delete']);
    addAlert('success','<i class="fas fa-check-circle"></i> Thay đổi trạng thái thành công !');
    header('Location: '.ACT_ADMIN.'series');
    exit;
}

# RENDER VIEW
$listSeries = getAll('products',0);
require_once "../../view/admin/header.php";
require_once "../../view/admin/series.php";