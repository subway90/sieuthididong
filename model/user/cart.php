<?php
function addCart($idUser,$idProduct,$quantity){
    $sql = "INSERT INTO cart(idUser,idProduct,quantity,dateCreate,status) values('$idUser','$idProduct','$quantity',current_timestamp(),1)";
    pdo_execute($sql);
}
function checkCart($input){
    for($i = 0 ; $i < sizeof($_SESSION['cart']) ; $i++){
        if($_SESSION['cart'][$i]['id'] == $input) return $i; //nếu ID input trùng ID đã có trong CART -> trả về vị trí của SP trùng đó trong CART
    }return -1;
}
function checkCartByID($input){
    $input = str_replace([' ','"',"'","-","."],"",$input);
    $sql = "SELECT id FROM cart WHERE idProduct = ".$input." AND idUser = ".$_SESSION['user']['id'];
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
    if(!empty($_SESSION['user'])) { //Trường hợp ĐÃ ĐĂNG NHẬP
        $listIdProInCart = getAllFieldByCustom('cart','id idCart, idProduct, quantity','idUser = '.$_SESSION['user']['id']);
        if(!empty($listIdProInCart)) {
            for ($i=0; $i < count($listIdProInCart); $i++) { 
                extract($listIdProInCart[$i]);
                $getProduct = getOneFieldByCustom('products','name,image,price,priceSale,quantity quantityMax','id = '.$idProduct.' AND status = 1');
                if(!empty($getProduct)) {
                    extract($getProduct);
                    # SỐ LƯỢNG
                    $countProInCart++;
                    # TỔNG TIỀN
                    if(!empty($priceSale)) $totalCart+=$quantity*$priceSale;
                    else $totalCart+=$quantity*$price;
                    # DATA
                    $listCart[] = ['idCart' => $idCart,'quantity'=>$quantity,'idProduct' => $idProduct,'name'=>$name,'image'=>$image,'price'=>$price,'priceSale'=>$priceSale,'quantityMax'=>$quantityMax];
                }
            }
        }
    }
    else { //Trường hợp CHƯA ĐĂNG NHẬP
        if(!empty($_SESSION['cart'])) {
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                extract($_SESSION['cart'][$i]);
                $getProduct = getOneFieldByCustom('products','name,image,price,priceSale,quantity quantityMax','id = '.$id.' AND status = 1');
                if(!empty($getProduct)) {
                    extract($getProduct);
                    # SỐ LƯỢNG
                    $countProInCart++;
                    #TỔNG TIỀN
                    if(!empty($priceSale)) $totalCart+=$quantity*$priceSale;
                    else $totalCart+=$quantity*$price;
                    # DATA
                    $listCart[] = ['idCart' => $i,'quantity'=>$quantity,'idProduct' => $id,'name'=>$name,'image'=>$image,'price'=>$price,'priceSale'=>$priceSale,'quantityMax'=>$quantityMax];
                }
            }
        }
    }
    
    if($type ==1) return $countProInCart;
    elseif($type ==2) return $listCart;
    elseif($type ==3) return $totalCart;
    else return alert("Lỗi function showCart /LINE 31/ model/user/cart.php");
}