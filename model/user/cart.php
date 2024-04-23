<?php
function addCart($idUser,$idProduct,$idModel,$idColor,$quantity){
    $sql = "INSERT INTO cart(idUser,idProduct,idModel,idColor,quantity,dateCreate,status) values('$idUser','$idProduct','$idModel','$idColor','$quantity',current_timestamp(),1)";
    pdo_execute($sql);
}
function checkCart($idColor){
    for($i = 0 ; $i < sizeof($_SESSION['cart']) ; $i++){
        if($_SESSION['cart'][$i]['idColor'] == $idColor) return $i; //nếu ID input trùng ID đã có trong CART -> trả về vị trí của SP trùng đó trong CART
    }return -1;
}
function checkCartByID($idColor){
    $idColor = str_replace([' ','"',"'","-","."],"",$idColor);
    $sql = "SELECT id FROM cart WHERE idColor = ".$idColor." AND idUser = ".$_SESSION['user']['id'];
    $result = pdo_query_one($sql);
    return $result['id'];
}
function updateQuantity($id,$input){
    $sql = "UPDATE cart SET quantity = ".$input.", dateCreate = current_timestamp() WHERE id=".$id;
    pdo_execute($sql);
}
function deleteCart($input){
    $input = str_replace([' ','"',"'","-","."],"",$input);
    if(!empty($_SESSION['user'])) $sql = "DELETE FROM cart WHERE id=".$input." AND idUser = ".$_SESSION['user']['id'];
    pdo_execute($sql);
}
function deleteAllCart($input){
    if(!empty($_SESSION['user'])) $sql = "DELETE FROM cart WHERE idUser=".$input;
    pdo_execute($sql);
}

function showCart($type) {
    $countProInCart = 0;
    $totalCart = 0;
    $listCart = [];
    # Trường hợp ĐÃ ĐĂNG NHẬP
    if(!empty($_SESSION['user'])) { 
        $listIdProInCart = getAllFieldByCustom('cart','id idCart, idProduct, idModel, idColor, quantity quantityCart','idUser = '.$_SESSION['user']['id']);
        if(!empty($listIdProInCart)) {
            for ($i=0; $i < count($listIdProInCart); $i++) { 
                extract($listIdProInCart[$i]);
                $getProduct = getProduct('c.id ='.$idColor)[0];
                if(!empty($getProduct)) {
                    extract($getProduct);
                    # SỐ LƯỢNG
                    $countProInCart++;
                    # TỔNG TIỀN
                    $totalCart+=$quantityCart*$priceSale;
                    # DATA
                    $listCart[] = ['idCart' => $idCart,'quantity'=>$quantityCart,'idProduct'=>$idProduct,'idModel'=>$idModel,'idColor'=>$idColor,'name'=>$name,'image'=>$image,'price'=>$price,'priceSale'=>$priceSale,'quantityMax'=>$quantity];
                }
            }
        }
    }
    #Trường hợp CHƯA ĐĂNG NHẬP
    else { 
        if(!empty($_SESSION['cart'])) {
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                $getProduct = getProduct('c.id ='.$_SESSION['cart'][$i]['idColor'])[0];
                if(!empty($getProduct)) {
                    extract($getProduct);
                    # SỐ LƯỢNG
                    $countProInCart++;
                    #TỔNG TIỀN
                    $totalCart+=$_SESSION['cart'][$i]['quantity']*$priceSale;
                    # DATA
                    $listCart[] = ['idCart' => $i,'quantity'=>$_SESSION['cart'][$i]['quantity'],'idProduct'=>$idProduct,'idModel'=>$_SESSION['cart'][$i]['idModel'],'idColor'=>$_SESSION['cart'][$i]['idColor'],'name'=>$name,'image'=>$image,'price'=>$price,'priceSale'=>$priceSale,'quantityMax'=>$quantity];
                }
            }
        }
    }
    
    if($type ==1) return $countProInCart;
    elseif($type ==2) return $listCart;
    elseif($type ==3) return $totalCart;
    else return alert("Lỗi function showCart /LINE 31/ model/user/cart.php");
}