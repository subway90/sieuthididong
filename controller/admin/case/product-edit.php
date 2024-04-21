<?php
require_once "../../view/admin/header.php";
if(isset($_GET['id']) && !empty($_GET['id'])){ // nếu có GET id
    $product = getOneByID('products',$_GET['id'],0); //select SP cần Edit
    
    if(!empty($product)){ //nếu SP có tồn tại
        extract($product);
        $arr_error[] = array(); $point_valid = 0;
        $hinhcu = $image; //hình cũ (hình hiện tại có trên Database)
        if(isset($_GET['edit']) && isset($_POST['name'])) { //nếu có REQUEST edit
            $idCategory = $_POST['idCategory'];
            $idAuthor = $_POST['idAuthor'];
            $idPublishing = $_POST['idPublishing'];
            $name = $_POST['name'];
            $datePublish = $_POST['datePublish'];
            $price = $_POST['price'];
            $priceSale = $_POST['priceSale'];
            $quantity = $_POST['quantity'];
            $decribe = $_POST['decribe'];

            if(empty($name)) $arr_error[] = 'Chưa nhập tên sản phẩm';
            else{
                $slug = createSlug($name);
                if(checkSlug($slug,$_GET['id'])==false) $arr_error[] = 'Tên sản phẩm đã tồn tại';
                else $point_valid++;
            }

            if(empty($datePublish)) $arr_error[] = 'Chưa nhập ngày xuất bản';
            else $point_valid++;

            if(empty($price)) $arr_error[] = 'Chưa nhập giá gốc';
            else $point_valid++;

            if(empty($priceSale)) { //nếu giá SALE trống -> SP không cần giá SALE
                $giasale = 0;
                $point_valid++;
            }else{  //ngược lại, cần giá SALE cho SP
                if($priceSale >= $price) $arr_error[] = 'Giá sale phải nhỏ hơn giá gốc';
                else $point_valid++;
            }
            
            if(empty($quantity)) $arr_error[] = 'Chưa nhập số lượng';
            else $point_valid++;
            
            if(empty($decribe)) $arr_error[] = 'Chưa nhập mô tả';
            else $point_valid++;
            
            if(isset($_POST['hinhcu'])) $hinhcu = $_POST['hinhcu']; // nếu có POST hinhcu -> không có up file hình mới

            $target_dir = "../../uploads/product/";
            if(!empty($_FILES['hinhsp']['name'])){  //có up file hình mới
                if(isset($hinhcu) && !empty($hinhcu)) unlink($target_dir.$hinhcu);  //gỡ hình cũ
                    $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
                    move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file); //up hình mới
                    $filename = $_FILES['hinhsp']['name'];
                    $hinhcu = $filename;
                    $point_valid++;
            }
            if(empty($_FILES['hinhsp']['name'])){ //không up file hình mới
                if(isset($hinhcu) && !empty($hinhcu)){ //nếu có hình cũ -> vẫn có dữ liệu hình cũ
                    $filename = $hinhcu;
                    $point_valid++;
                }else{ // không có hình cũ -> thông báo chưa up hình gì cả
                    $arr_error[] = 'Chưa nhập ảnh sản phẩm';
                }
            }
            if($point_valid==7){
                editProduct($name,$slug,$datePublish,$price,$priceSale,$quantity,$decribe,$hinhcu,$idCategory,$idPublishing,$idAuthor,$id);
                addAlert('success','<i class="fas fa-check-circle"></i> Sửa sản phẩm thành công !');
                header("Location:".ACT_ADMIN."product-edit&id=".$id);
            }
        }
        require_once "../../view/admin/product-edit.php";
    }else require_once "../../view/404.php"; //nếu SP không tồn tại
}else require_once "../../view/404.php"; //nếu không có GET id
    