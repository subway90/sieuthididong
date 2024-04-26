<?php
$route = false;
$message = "";
$checkedModel = $checkedColor = -1;
$listColor = [];
$listImage = [];
$arrayColor = [];
$checkedModel = -1;

# SELECT DETAIL BY SLUG
if(isset($arrayURL[1]) && !empty($arrayURL[1])) {
    # SELECT DETAIL BY MODEL & COLOR
    if(isset($arrayURL[2]) && !empty($arrayURL[2]) && isset($arrayURL[3]) && !empty($arrayURL[3])) {
        $checkInput = getOneProduct('pm.idModel ='.$arrayURL[2].' AND c.id ='.$arrayURL[3]);
        if($checkInput) {
            $checkedModel = $arrayURL[2];
            $checkedColor = $arrayURL[3];
        }else show404('user');
    }
    # INFO SERIES
    $oneProduct = getOneFieldByCustom('products','id,idBrand, name','slug = "'.moveCharSpecial($arrayURL[1]).'" AND status = 1');
    if(!empty($oneProduct)){
        extract($oneProduct);
        # NAME BRAND
        $selectBrand = getOneFieldByCustom('product_brands','name,id','id ='.$idBrand);
        # MODEL PRODUCT
        $listModel = getAllFieldByCustom('product_model','model, id idModel','idProduct='.$id.' AND status = 1');
        if(!$listModel) show404('user');
        # COLOR PRODUCT
        for ($i=0; $i < count($listModel); $i++) { 
            $selectColor = getAllFieldByCustom('product_color','id idColor,color,image,quantity,price,priceSale','idModel='.$listModel[$i]['idModel'].' AND status = 1');
            # Nếu màu có tồn tại -> thêm vào mảng màu
            if($selectColor) $listColor[] = $selectColor;
        }
        if(!$listColor) show404('user');
        # IMAGE LIST
        $k = 0;
        for ($i=0; $i < count($listColor); $i++) {
            for ($j = 0; $j < count($listColor[$i]); $j++) { 
                extract($listColor[$i][$j]);
                if(in_array($color,$arrayColor)) {
                    $listImage[$k-1]['arrayID'] .= '/'.$idColor;
                }
                else {
                    $arrayColor[] = $color;
                    $listImage[$k]['name'] = $image;
                    $listImage[$k]['arrayID'] = $idColor;
                    ++$k;
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
                    if(getOneProduct('pm.idModel ='.$checkedModel.' AND c.id ='.$checkedColor)){
                        # Trường hợp CHƯA ĐĂNG NHẬP (GUEST)
                        if(empty($_SESSION['user'])){
                            $check = checkCart($_POST['idColor']);
                            if($check == -1) $_SESSION['cart'][] = ['idProduct' => $_POST['idProduct'],'idModel' => $checkedModel,'idColor' => $checkedColor,'quantity' => 1];
                        }
                        # Trường hợp ĐÃ ĐĂNG NHẬP (USER)
                        else{ 
                            $check = checkCartByID($checkedColor);
                            if(empty($check)) addCart($_SESSION['user']['id'],$_POST['idProduct'],$checkedModel,$checkedColor,1);
                        }
                        // di chuyển ROUTE 
                        header('Location:'.URL.'gio-hang');
                        exit;
                    }else addAlert('danger','Sản phẩm không tồn tại.');
                }else addAlert('danger','Vui lòng chọn màu sản phẩm');
            }else  addAlert('danger','Vui lòng chọn phiên bản.');
        }
        # [RENDER VIEW]
        $title = $name;
        require_once "../../view/user/header.php";
        require_once "../../view/user/detail.php";
    }else show404('user');
}else show404('user');