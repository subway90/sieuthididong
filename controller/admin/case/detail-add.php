<?php
$target_dir = "../../uploads/product/";
$hinhcu = $color = $decribe = "";
$inputIdModel = $inputIdSeries  = $price = $priceSale = $quantity = 0;
$image = $errorImage = $errorModel = false;
# SUBMIT
if(isset($_POST['submit'])) {
    # có POST ảnh cũ
    if(isset($_POST['hinhcu'])) $hinhcu = $_POST['hinhcu'];
    # POST
    $price = $_POST['price'];
    $color = $_POST['color'];
    $status = $_POST['status'];
    $decribe = $_POST['decribe'];
    $quantity = $_POST['quantity'];
    $priceSale = $_POST['priceSale'];
    # PriceSale default
    if(!$priceSale) $priceSale = $price;
    # Series - Model input
    if(isset($_POST['idModel']) && $_POST['idModel']) {
        $idModel = $_POST['idModel'];
        $arrayId = explode('/',$idModel);
        $inputIdSeries = $arrayId[0];
        $inputIdModel = $arrayId[1];
    }else $errorModel = true;
        # IMAGE VALIDATION
        ## có up file hình mới
        if(!empty($_FILES['image']['name'])){
            $image = true;
            $checkImage = checkImage($_FILES['image'],1);
            if($checkImage === true) {
                if(!empty($hinhcu))unlink($target_dir.$hinhcu);    
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $hinhcu = $_FILES['image']['name'];
            }else $errorImage = true;
        }
        ## không up file hình mới
        else{
            if($hinhcu) $image = true;
        }
        # VALIDATION
        if($color) {
            if($decribe) {
                if($quantity) {
                    if($quantity > 0 && $quantity <= MAX_QUANTITY_PRODUCT) {
                        if($price) {
                            if($price > 0 && $price <= MAX_PRICE_PRODUCT) {
                                if($priceSale > 0 && $priceSale <= $price) {
                                    if($image) {
                                        if(!$errorImage) {
                                            if(!$errorModel){
                                                        addProduct($inputIdModel,$color,$hinhcu,$quantity,$price,$priceSale,$status);
                                                        addAlert('success',ICON_CHECK.'Thêm mới thành công');
                                                        header('Location:'.ACT_ADMIN.'detail');
                                                        exit;
                                            }else addAlert('danger',ICON_CLOSE.'Chưa chọn series và phiên bản.');
                                        }else addAlert('danger',ICON_CLOSE.$checkImage);
                                    }else addAlert('danger',ICON_CLOSE.'Chưa có <strong>ảnh sản phẩm</strong>.');
                                }else addAlert('danger',ICON_CLOSE.'Giá SALE trong phạm vi <strong>[ 1 &rarr; giá gốc ('.number_format($price).') ] (VNĐ)</strong>.');
                            }else addAlert('danger',ICON_CLOSE.'Giá gốc trong phạm vi <strong>[ 1 &rarr; '.number_format(MAX_PRICE_PRODUCT).' ] (VNĐ)</strong>.');
                        }else addAlert('danger',ICON_CLOSE.'Chưa nhập <strong>giá gốc (VNĐ)</strong>.');
                    }else addAlert('danger',ICON_CLOSE.'Số lượng trong phạm vi <strong>[1 &rarr; '.number_format(MAX_QUANTITY_PRODUCT).']</strong>.');
                }else addAlert('danger',ICON_CLOSE.'Chưa nhập <strong>số lượng sản phẩm</strong>.');
            }else addAlert('danger',ICON_CLOSE.'Chưa nhập <strong>mô tả chi tiết</strong>.');
        }else addAlert('danger',ICON_CLOSE.'Chưa nhập <strong>tên màu</strong>.');
    }
# RENDER VIEW
$showInputSeriesModel = '<div class="accordion card" id="series">';
$listSeries = getAllFieldByCustom('products','name,id idSeries','status = 1');
for ($i=0; $i < count($listSeries); $i++) { 
    extract($listSeries[$i]);
    $showInputSeriesModel .=
    '<div class="accordion-item">
        <h2 class="accordion-header"">
            <button class="accordion-button sa-hover-area" type="button" data-bs-toggle="collapse" data-bs-target="#series'.$i.'"> 
                <span class="accordion-sa-icon"></span>'.$name.'
            </button>
        </h2>
        <div id="series'.$i.'" class="accordion-collapse  '.matchCollapse($inputIdSeries,$idSeries).' data-bs-parent="series">
            <div class="accordion-body">';
            $listModel = getAllFieldByCustom('product_model','model,id idModel','idProduct ='.$idSeries.' AND status = 1');
            if($listModel){
                for ($j=0; $j < count($listModel); $j++) { 
                    extract($listModel[$j]);
                    $showInputSeriesModel .=
                '<label class="form-check">
                        <input '.matchValue('checked',$inputIdModel,$idModel).' name="idModel" value="'.$idSeries.'/'.$idModel.'" type="radio" class="form-check-input"/>
                        <span class="form-check-label">'.$model.'</span>
                    </label>';
                }
            }else $showInputSeriesModel .= 'Chưa có phiên bản nào.<a class="ms-2" href="'.ACT_ADMIN.'model-add">&rarr; Thêm phiên bản</a>';
    $showInputSeriesModel .='
            </div>
        </div>
    </div>';
}
$showInputSeriesModel .='</div>';
require_once "../../view/admin/header.php";
require_once "../../view/admin/detail-add.php";
