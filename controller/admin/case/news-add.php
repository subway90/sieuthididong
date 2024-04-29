<?php
# VARIABLE
$titleNews = $oldImage = $shortDecribe  = $showInputCateNews = $decribe = "";
$idCate = -1;
$image = $errorImage = false;

#  EDIT TRUE
if(isset($_GET['edit']) && $_GET['edit']) {
    $newsEdit = getOneFieldByCustom('news','idCate, id, title titleNews,imageTitle oldImage,shortDecribe,decribe,status','id ='.$_GET['edit']);
    if($newsEdit) {
        $edit = true;
        $subURL = '&edit='.$_GET['edit'];
        extract($newsEdit);
        $title = 'Sửa bài viết '.$titleNews;
    }else show404('admin');
}else $title = 'Tạo vài viết mới';

# SUBMIT
if(isset($_POST['submit'])) {
    $titleNews = $_POST['titleNews'];   
    $idCate = $_POST['idCate'];
    $status = $_POST['status'];
    $decribe = $_POST['decribe'];
    $shortDecribe = $_POST['shortDecribe'];
    # IMAGE VALIDATION
    ## có up file hình mới
    if(!empty($_FILES['image']['name'])){
        $image = true;
        $checkImage = checkImage($_FILES['image'],1);
        if($checkImage === true) {
            if(!empty($oldImage))unlink(PATH_UPLOAD_IMAGE_NEWS.$oldImage);    
            move_uploaded_file($_FILES["image"]["tmp_name"], PATH_UPLOAD_IMAGE_NEWS.basename($_FILES["image"]["name"]));
            $oldImage = $_FILES['image']['name'];
        }else $errorImage = true;
    }
    ## không up file hình mới
    else{
        if($oldImage) $image = true;
    }
    if($titleNews) {
        if($decribe) {
            # EDIT SUBMIT
            if($edit === true) {
                editNews($id,$title,$idCate,$oldImage,$shortDecribe,$decribe,$status);
                addAlert('primary',ICON_CHECK.'Sửa bài viết thành công !');
            # ADD SUBMIT
            }else {
                addNews($title,$idCate,$oldImage,$shortDecribe,$decribe,$status);
                addAlert('success',ICON_CHECK.'Thêm bài viết mới thành công !');
            }
            header('Location: '.ACT_ADMIN.'news');
            exit;
        }else addAlert('danger',ICON_CLOSE.'Chưa nhập mô tả');
    }else addAlert('danger',ICON_CLOSE.'Chưa nhập tên Style');
}

# RENDER VIEW
$listCateNews = getAllFieldByCustom('news_category','id,name','status = 1');
for ($i=0; $i < count($listCateNews); $i++) { 
    extract($listCateNews[$i]);
    $showInputCateNews .= '
    <option '.matchSelected($idCate,$id).' value="'.$id.'">'.$name.'</option>
    ';
}
require_once "../../view/admin/header.php";
require_once "../../view/admin/news-add.php";