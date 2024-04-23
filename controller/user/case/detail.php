<?php
$route = false;
$message = "";
$checkedModel = $checkedColor = -1;
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
        $listModel = getAllFieldByCustom('product_model','model, id idModel','idProduct='.$id.' AND status = 1');
        # COLOR PRODUCT
        for ($i=0; $i < count($listModel); $i++) { 
            $listColor[$i] = getAllFieldByCustom('product_color','id idColor,color,image,quantity,price,priceSale','idModel='.$listModel[$i]['idModel'].' AND status = 1');
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
        
        # [MUA NGAY TỪ CHI TIẾT]
        if(isset($_POST['addProduct'])){
            if(isset($_POST['idModel'])){
                $checkedModel = $_POST['idModel'];
                if(isset($_POST['idColor'])){
                $checkedColor = $_POST['idColor'];
                    # Trường hợp CHƯA ĐĂNG NHẬP (GUEST)
                    if(empty($_SESSION['user'])){
                        $check = checkCart($_POST['idColor']);
                        if($check == -1) {
                            $_SESSION['cart'][] = ['idProduct' => $_POST['idProduct'],'idModel' => $_POST['idModel'],'idColor' => $_POST['idColor'],'quantity' => 1];
                            $route = true;
                        }
                        else addAlert('warning','<i class="fas fa-vote-yea"></i> Sản phẩm này đã có trong giỏ hàng.');
                    }
                    # Trường hợp ĐÃ ĐĂNG NHẬP (USER)
                    else{ 
                        $check = checkCartByID($_POST['idColor']);
                        if(empty($check)) {
                            addCart($_SESSION['user']['id'],$_POST['idProduct'],$_POST['idModel'],$_POST['idColor'],1);
                            $route = true;
                        }
                        else addAlert('warning','<i class="fas fa-vote-yea"></i> Sản phẩm này đã có trong giỏ hàng.');
                    }
                    // di chuyển ROUTE 
                    if($route == true) header('Location:'.URL.'gio-hang');
                }else  addAlert('danger','Vui lòng chọn màu sản phẩm');
            }else addAlert('danger','Vui lòng chọn loại sản phẩm');
        }
        # [RENDER VIEW]
        $title = $name;
        require_once "../../view/user/header.php";
        require_once "../../view/user/detail.php";
    }else { require_once "../../view/user/header.php";require_once "../../view/user/404.php";}
}else { require_once "../../view/user/header.php";require_once "../../view/user/404.php";}
