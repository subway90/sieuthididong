<?php
require_once "../../view/user/header.php";
show_alert($_SESSION['alert']);
$message = "";
$arr_error = [];
if(isset($arrayURL[1]) && !empty($arrayURL[1])) { //có REQUEST[1]
    $san_pham = detailProductBySlug($arrayURL[1]); //SELECT database SP
    if(!empty($san_pham)){ //nếu sản phẩm có
        extract($san_pham);
        if(!empty($priceSale)){
            $priceDel = $price;     //giá gốc
            $price = $priceSale;    //giá hiện tại
        }
        $nameCate = getOneFieldByID('category','name',$idCategory,1);
        $listProductHint = getListHint($id,$idCategory);
        $listComment = getListCmt($id);
        # [THÊM BÌNH LUẬN]
        if(isset($_POST['comment'])){
            $message = moveCharSpecial($_POST['message']);
            if(!empty($message)){
                addComment($_SESSION['user']['id'],$id,$message);
                $message = "";
                $_SESSION['alert'] ='ĐĂNG BÌNH LUẬN THÀNH CÔNG';
                header("Location:".ACT."chi-tiet/".$arrayURL[1]);
            }else $arr_error[] = "Vui lòng nhập nội dung bình luận";
        }
        # [RENDER VIEW]
        require_once "../../view/user/detail.php";
    }else require_once "../../view/user/404.php";
}else require_once "../../view/user/404.php";
