<?php
require_once "../../view/admin/header.php";
$idtg = 1;$idnxb = 1;$tensp = "";$ngayxuatban="2004-05-31";$hinhcu="";$giasp =1000;$giasale =0;$soluong =1;$motasp = "";$arr_error[] = array(); $point_valid = 0;$arrCateInput = []; $cate_3_input = ""; $cate_1_input = ""; $cate_2_input = "";$idCategory = 0;
if(isset($_REQUEST['add'])) {
    $idCategory = $_POST['idCategory'];
    $idtg = $_POST['idtg'];
    $idnxb = $_POST['idnxb'];
    $tensp = $_POST['tensp'];
    if(empty($tensp)) {
        $arr_error[] = 'Chưa nhập tên sản phẩm';
    }else{
        $slug = createSlug($tensp);
        if(checkSlug($slug,0) == true) $point_valid++;
        else $arr_error[] = 'Tên sản phẩm đã tồn tại';
    }
    $ngayxuatban = $_POST['ngayxuatban'];
    if(empty($ngayxuatban)) {
        $arr_error[] = 'Chưa nhập ngày xuất bản';
    }else{
        $point_valid++;
    }
    $giasp = $_POST['giasp'];
    if(empty($giasp)) {
        $arr_error[] = 'Chưa nhập giá gốc';
    }else{
        $point_valid++;
    }
    $giasale = $_POST['giasale'];
    if(empty($giasale)) {
        $giasale = 0;
        $point_valid++;

    }else{
        if($giasale >= $giasp) $arr_error[] = 'Giá sale phải nhỏ hơn giá gốc';
        else{
            $point_valid++;
        }
    }
    $soluong = $_POST['soluong'];
    if(empty($soluong)) {
        $arr_error[] = 'Chưa nhập số lượng';
    }else{
        $point_valid++;
    }
    $motasp = $_POST['motasp'];
    if(empty($motasp)) {
        $arr_error[] = 'Chưa nhập mô tả';
    }else{
        $point_valid++;
    }
    if(isset($_POST['hinhcu'])){
        $hinhcu = $_POST['hinhcu'];
    }

    $target_dir = "../../uploads/product/";
    if(!empty($_FILES['hinhsp']['name'])){  //có up file hình mới
        if(isset($hinhcu) && !empty($hinhcu)){ //có hình cũ -> gỡ hình cũ và up hình mới
            unlink($target_dir.$hinhcu);    //gỡ hình cũ
            $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
            move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file); //up hình mới
            $filename = $_FILES['hinhsp']['name'];
            $hinhcu = $filename;
            $point_valid++;
        }else{  //ko có hình cũ -> up hình mới
            $target_file = $target_dir . basename($_FILES["hinhsp"]["name"]);
            move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $target_file); //up hình mới
            $filename = $_FILES['hinhsp']['name'];
            $hinhcu = $filename;
            $point_valid++;
        }
    }
    if(empty($_FILES['hinhsp']['name'])){ //không up hình mơi
        if(isset($hinhcu) && !empty($hinhcu)){ //nếu có hình cũ -> vẫn có dữ liệu hình cũ (sẵn sàng thực thi SQL)
            $filename = $hinhcu;
            $point_valid++;
        }else{ //thông báo chưa up hình gì cả
            $arr_error[] = 'Chưa nhập ảnh sản phẩm';
        }
    }
    if($point_valid==7) addProduct($tensp,$slug,$ngayxuatban,$giasp,$giasale,$soluong,$motasp,$filename,$cate_3_input,$idnxb,$idtg);
}
require_once "../../view/admin/product-add.php";