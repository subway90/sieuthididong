<?php if($previewBill === true) {?>
<div class="container deal bg-primary py-5 d-flex justify-content-center">
    <div class="col-12 col-md-12 col-lg-4 py-5 ">
        <label for="token">Nhập mã TOKEN</label>
        <form method="post">
            <div class="input-group">
                <input type="text" name="token" id="token" class="form-control" value="<?=$token?>">
                <button type="submit" class="btn btn-outline-light">Tìm kiếm</button>
            </div>
        </form>
    </div>
</div>
<?php }else{?>
<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item fw-bold"><a href="<?=URL?>lich-su-mua-hang" class="text-decoration-none text-dark">Lịch sử mua hàng</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">token <?= $token ?></li>
        </ol>
    </nav>
</div>
<div class="container my-5 wow fadeIn">
    <div class="row">
        <div class="col-12 mb-4">
            <?php
            if($typePay == 1) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-success">Thanh toán tiền mặt (COD)</span>';
            if($typePay == 2) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-info">Thanh toán ebanking</span>';

            if($statusPay == 1) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-danger">Chưa thanh toán</span>';
            if($statusPay == 2) echo'<span class="mb-2 me-2 btn btn-sm btn-outline-success">Đã thanh toán</span>';

            if($statusDelivery == 1) echo'<span class="mb-2 btn btn-sm btn-outline-secondary">Chưa giao hàng</span>';
            if($statusDelivery == 2) echo'<span class="mb-2 btn btn-sm btn-outline-warning">Đang giao hàng</span>';
            if($statusDelivery == 3) echo'<span class="mb-2 btn btn-sm btn-outline-success">Đã giao hàng</span>';
            ?>
        <span class="ms-2">Ngày tạo: <?=$dateCreate?></span>
        </div>
        <div class="col-12 col-md-12 col-lg-4 mb-3">
            <div class="h6">Trạng thái đơn:</div>
            <?= $showNotifyStatusBill ?>
        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="text-start">STT</th>
                        <th class="text-start">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-end">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    if(count($listDetailBill)==0){ ?>
                    <tr>
                        <td colspan="7" class="text-center py-3">Bạn chưa có hóa đơn nào.</td>
                    </tr>
                    <?php }
                    else{
                    for ($i=0; $i < count($listDetailBill); $i++){ 
                        extract($listDetailBill[$i]) ;
                    ?>
                    <tr>
                        <th class="text-start"><?=$i+1?></th>
                        <td class="text-start">
                            <img width="40px" src="<?=URL_IMGER_PRODUCT.$image?>" alt="PRODUCT IMAGE">
                            <span><a class="text-decoration-none text-success fw-semi" href="<?=URL?>chi-tiet/<?=$slug?>"><?=$name?></a></span>
                        </td>
                        <td class="text-center"><?=number_format($priceSale)?> đ</td>
                        <td class="text-center"><?=$arrayDetail[$i]['quantity']?></td>
                        <td class="text-end"><?=number_format($priceSale*$arrayDetail[$i]['quantity'])?> đ</td>
                    </tr>
                    <?php }}?>
                </tbody>
                <tfoot>
                    <tr class="text-end">
                        <td class="py-2 h6" colspan="5">Tổng : <?=number_format($total)?> đ</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php }?>