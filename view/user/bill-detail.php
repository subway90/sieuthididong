<?php if ($previewBill === true) { ?>
    <div class="container mt-3 bg-light rounded pt-3 pb-1">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>" class="text-decoration-none text-dark">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Tra đơn hàng</li>
            </ol>
        </nav>
    </div>
    <div class="container bg-success-subtle my-5 py-5 d-flex justify-content-center">
        <div class="col-12 col-md-12 col-lg-4 py-5 ">
            <label for="token">Nhập mã TOKEN</label>
            <form method="post">
                <div class="input-group">
                    <input type="text" name="token" id="token" class="form-control" value="<?= $token ?>">
                    <button type="submit" class="btn btn-outline-light">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="container mt-3 bg-light rounded pt-3 pb-1">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>" class="text-decoration-none text-dark">Trang chủ</a>
                </li>
                <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>lich-su-mua-hang"
                        class="text-decoration-none text-dark">Lịch sử mua hàng</a></li>
                <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">token <?= $token ?></li>
            </ol>
        </nav>
    </div>
    <div class="container my-5 wow fadeIn">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="h6">Trạng thái đơn:</div> <?= $showNotifyStatusBill ?>
                <?php if($idUser = $_SESSION['user']['id']) {?>
                <div class="h6 my-3">Hành động: <a href="<?=URL?>lich-su-mua-hang/<?=$token?>&huy" class="btn btn-sm btn-outline-danger"><small><i class="fas fa-trash"></i> Hủy đơn hàng</small></a></div>
                <?php }?>
            </div>
            <div class="col-12 col-md-12 col-lg-4 mb-3">
                <button id="autoButton" class="border-0 h6 text-success p-0 m-0" type="button" data-bs-toggle="collapse" data-bs-target="#infoBill" aria-expanded="false" aria-controls="infoBill">
                    Thông tin đơn hàng <i><small>(nhấn để ẩn/ hiện)</small></i>
                </button>
                <div class="collapse" id="infoBill">
                    <table class="table table-hover table-light table-bordered text-end small">
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Tên người nhận </td>
                            <td> <?= $fullName ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Số điện thoại </td>
                            <td> <?= $phone ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Địa chỉ </td>
                            <td> <?= $address ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Email </td>
                            <td> <?= $email ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Lời nhắn </td>
                            <td> <?= $message ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Ngày tạo </td>
                            <td> <?= formatTime($dateCreate, 'hh giờ mm phút - ngày DD/MM/YYYY') ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Phương thức thanh toán </td>
                            <td> <?= $showTypePay ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Trạng thái thanh toán </td>
                            <td> <?= $showNotifyStatusPay ?> </td>
                        </tr>
                        <tr class="align-middle">
                            <td class="text-start fw-bold"> Trạng thái giao hàng </td>
                            <td> <?= $showNotifyStatusDelivery ?> </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
                <div class="h6">Danh sách</div>
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
                        if (count($listDetailBill) == 0) { ?>
                            <tr>
                                <td colspan="7" class="text-center py-3">Bạn chưa có hóa đơn nào.</td>
                            </tr>
                        <?php } else {
                            for ($i = 0; $i < count($listDetailBill); $i++) {
                                extract($listDetailBill[$i]);
                                ?>
                                <tr>
                                    <th class="text-start"><?= $i + 1 ?></th>
                                    <td class="text-start">
                                        <img width="40px" src="<?= URL_IMAGE_PRODUCT . $image ?>" alt="PRODUCT IMAGE">
                                        <span><a class="text-decoration-none text-success fw-semi"
                                                href="<?= URL ?>chi-tiet/<?= $slug ?>"><?= $name ?></a></span>
                                    </td>
                                    <td class="text-center"><?= number_format($priceSale) ?> đ</td>
                                    <td class="text-center"><?= $arrayDetail[$i]['quantity'] ?></td>
                                    <td class="text-end"><?= number_format($priceSale * $arrayDetail[$i]['quantity']) ?> đ</td>
                                </tr>
                            <?php }
                        } ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-end">
                            <td class="py-2 h6" colspan="5">Tổng : <?= number_format($total) ?> đ</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<script>
    document.querySelector('#autoButton').click()
</script>