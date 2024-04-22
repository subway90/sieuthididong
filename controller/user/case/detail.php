<?php
$message = "";
$listColor = [];
$listImage = [];
$arrayColor = [];

if(isset($arrayURL[1]) && !empty($arrayURL[1])) {
    $oneProduct = getOneFieldByCustom('products','id,idBrand, name','slug = "'.moveCharSpecial($arrayURL[1]).'" AND status =1');
    if(!empty($oneProduct)){
        # INFO PRODUCT
        extract($oneProduct);
        # NAME BRAND
        $selectBrand = getOneFieldByCustom('product_brands','name,id','id ='.$idBrand);
        # MODEL PRODUCT
        $listModel = getAllFieldByCustom('product_model','model, id','idProduct='.$id.' AND status = 1');
        # COLOR PRODUCT
        for ($i=0; $i < count($listModel); $i++) { 
            $listColor[$i] = getAllFieldByCustom('product_color','color,image,quantity,price,priceSale','idModel='.$listModel[$i]['id'].' AND status = 1');
        }
        # IMAGE LIST
        for ($i=0; $i < count($listColor); $i++) {
            for ($j = 0; $j < count($listColor[$i]); $j++) { 
                extract($listColor[$i][$j]);
                if(in_array($color,$arrayColor)) continue;
                else {
                    $arrayColor[] = $color;
                    $listImage[] = $image;
                }
            }
        }
        # LIST PRODUCT HINT
        $listProductHint = getProduct('pm.idBrand = '.$idBrand.' AND pm.idProduct !='.$id.' ORDER BY c.priceSale  ASC LIMIT 6');
        # LIST COMMENT
        $listComment = getListCmt($id);
        # [THÊM BÌNH LUẬN]
        if(isset($_POST['comment'])){
            $message = moveCharSpecial($_POST['message']);
            if(!empty($message)){
                addComment($_SESSION['user']['id'],$id,$message);
                $message = "";
                addAlert("success","<i class='fas fa-check-circle'></i> Đăng bình luận thành công");
                header("Location:".URL."chi-tiet/".$arrayURL[1]);
                exit;
            }else addAlert("danger","<i class='fas fa-exclamation-triangle'></i> Vui lòng nhập nội dung bình luận");
        }
        # [RENDER VIEW]
        require_once "../../view/user/header.php";
        require_once "../../view/user/detail.php";
    }else{require_once "../../view/user/header.php";require_once "../../view/user/404.php";}
}else require_once "../../view/user/404.php";
