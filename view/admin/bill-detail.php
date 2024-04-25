<div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a href="<?=ACT_ADMIN?>bill">Quản lí hóa đơn</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Hóa đơn chi tiết</li>
                                        </ol>
                                    </nav>
                                    
                                </div>
                                <div class="col-auto d-flex">
                                <a href="<?=ACT_ADMIN?>bill" class="btn btn-secondary">Quay về</a>
                                </div>
                            </div>
                        </div>
                        <div class="sa-page-meta mb-5">
                            <div class="sa-page-meta__body">
                                <div class="sa-page-meta__list">
                                    <div class="sa-page-meta__item">Tổng : <?= number_format($total) ?> vnđ</div>
                                    <div class="sa-page-meta__item">Time : <?= formatTime($dateCreate,'hh:mm:ss DD/MM/YYYY') ?></div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <div class="badge badge-sa-info">Token: <?=$token?></div>
                                    </div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?= $showStatus ?>
                                    </div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?= $showTypePay ?>
                                    </div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?= $showStatusPay ?>
                                    </div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?= $showStatusDelivery ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card mt-0">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Thông tin đơn hàng</h2>
                                        </div>
                                        <!-- [HÓA ĐƠN] -->
                                        <div class="table-responsive">
                                            <table class="sa-table">
                                                <tbody>
                                                    <!-- [HEADER INVOICE] -->
                                                    <tr>
                                                        <td class="min-w-20x">
                                                            <div class="d-flex align-items-center">Sản phẩm</div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                Giá
                                                            </div>
                                                        </td>
                                                        <td class="text-end">Số lượng</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                Tổng
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!-- [INVOICE] -->
                                                    <?php
                                                    for ($i=0; $i < count($listBillDetail); $i++) { 
                                                        extract($listBillDetail[$i]);
                                                        extract(getProductAdmin('c.id ='.$idColor)[0]);
                                                    ?>
                                                    <tr>
                                                        <td class="min-w-20x">
                                                            <div class="d-flex align-items-center">
                                                                <img src="<?=URL_IMGER_PRODUCT.$image?>" class="me-4" width="40" height="40" alt="product"/>
                                                                <a href="app-product.html" class="text-reset"></span><?=$name?></a>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($priceSale)?> đ</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end"><?=$quantityBill?></td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($quantityBill*$priceSale)?> đ</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                    <!-- [TOTAL] -->
                                                    <tr>
                                                        <td class="text-end fw-bold" colSpan="3">Tổng hóa đơn</td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol"><?=number_format($total)?> đ</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- [THANH TOÁN] -->
                                    <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Thông tin thanh toán</h2>
                                         </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>Trạng thái</td>
                                                        <td class="text-end">
                                                            <?= $showStatusPay ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phương thức</td>
                                                        <td class="text-end">
                                                                <div class="sa-price">
                                                                    <?= $showTypePay ?>
                                                                </div>
                                                            </td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số tiền cần thanh toán</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($total)?> đ</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thời gian cập nhật trạng thái</td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=$datePay?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- [GIAO HÀNG] -->
                                    <div class="card mt-5">
                                        <div
                                            class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                            <h2 class="mb-0 fs-exact-18 me-4">Thông tin giao hàng</h2>
                                         </div>
                                        <div class="table-responsive">
                                            <table class="sa-table text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Trạng thái
                                                        </td>
                                                        <td class="text-end">
                                                            <?= $showStatusDelivery ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Thời gian cập nhật trạng thái
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price"><span
                                                                    class="sa-price__symbol"><?=$dateDelivery?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- [THÔNG TIN KHÁCH HÀNG] -->
                                <div class="sa-entity-layout__sidebar">
                                    <!-- [USER IN ACCOUNT] -->
                                    <?php
                                    if($idUser){
                                        $getUser = getOneFieldByID('accounts','fullName,email,phone,address,id,image',$idUser,0);
                                    ?>
                                    <div class="card mb-5">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">THÔNG TIN USER - ID: <?=$getUser['id']?></h2>
                                            <a href="#" class="text-danger">Xem chi tiết</a>
                                        </div>
                                        <div class="card-body d-flex align-items-center pt-4">
                                            <div class="mb-auto sa-symbol sa-symbol--shape--circle sa-symbol--size--lg">
                                                <img src="<?=URL?>/uploads/user/avatar/<?=$getUser['image']?>" width="40" height="40" alt="image user" />
                                            </div>
                                            <div class="ms-3 ps-2">
                                                <div class="fs-exact-14  fw-medium"><?=$getUser['fullName']?></div>
                                                <div class="fs-exact-13 text-muted"><?=$getUser['email']?></div>
                                                <div class="fs-exact-13 text-muted"><?=$getUser['phone']?></div>
                                                <div class="fs-exact-13 text-muted"><?=$getUser['address']?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <!-- [USER IN BILL] -->
                                    <div class="card">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">THÔNG TIN GIAO HÀNG</h2>
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">Họ và tên</div>
                                                <div class="text-end text-muted"><?=$fullName?></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">Số điện thoại</div>
                                                <div class="text-end text-muted"><?=$phone?></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">Email</div>
                                                <div class="text-end text-muted"><?=$email?></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">Địa chỉ</div>
                                                <div class="text-end text-muted"><?=$address?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- [MESSAGE] -->
                                    <div class="card mt-5">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">LỜI NHẮN</h2>
                                        </div>
                                        <div class="card-body pt-4 fs-exact-14">
                                            <div class="mb-2"><?=$message?></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>