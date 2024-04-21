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
                                    <h1 class="h3 m-0">Chi tiết hóa đơn</h1>
                                    <span class="badge badge-sa-info me-2">Token: <?=$token?></span>
                                </div>
                                <div class="col-auto d-flex">
                                <a href="<?=ACT_ADMIN?>bill" class="btn btn-secondary">Quay về</a>
                                </div>
                            </div>
                        </div>
                        <div class="sa-page-meta mb-5">
                            <div class="sa-page-meta__body">
                                <div class="sa-page-meta__list">
                                    <div class="sa-page-meta__item">Tổng : <?=number_format($total)?> vnđ</div>
                                    <div class="sa-page-meta__item">Time : <?=$dateCreate?></div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?php
                                        if($status==1) echo '<div class="badge badge-sa-warning">Đơn còn sử dụng</div>';
                                        if($status==2) echo '<div class="badge badge-sa-success">Đơn đã xong</div>';
                                        if($status==3) echo '<div class="badge badge-sa-dark">Đơn đã hủy đơn</div>';
                                        ?>
                                    </div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?php
                                        if($statusPay==1) echo '<div class="badge badge-sa-danger">Chưa thanh toán</div>';
                                        if($statusPay==2) echo '<div class="badge badge-sa-primary">Đã thanh toán</div>';
                                        ?>
                                    </div>
                                    <div class="sa-page-meta__item d-flex align-items-center fs-6">
                                        <?php
                                        if($statusDelivery==1) echo '<div class="badge badge-sa-secondary">Chưa giao hàng</div>';
                                        if($statusDelivery==2) echo '<div class="badge badge-sa-warning">Đang giao hàng</div>';
                                        if($statusDelivery==3) echo '<div class="badge badge-sa-success">Đã giao hàng</div>';
                                        ?>
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
                                                    for ($i=0; $i < count($listInvoice); $i++) {
                                                        extract($listInvoice[$i]);
                                                        $product = getOneFieldByID('products','image,name',$idProduct,0);
                                                        extract($product);
                                                    ?>
                                                    <tr>
                                                        <td class="min-w-20x">
                                                            <div class="d-flex align-items-center">
                                                                <img src="<?=URL?>/uploads/product/<?=$image?>" class="me-4" width="40" height="40" alt="product"/>
                                                                <a href="app-product.html" class="text-reset"></span><?=$name?></a>
                                                            </div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($price)?> đ</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-end"><?=$quantity?></td>
                                                        <td class="text-end">
                                                            <div class="sa-price">
                                                                <span class="sa-price__symbol"><?=number_format($quantity*$price)?> đ</span>
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
                                                            <?php
                                                            if($statusPay==1) echo '<div class="badge badge-sa-danger">Chưa thanh toán</div>';
                                                            if($statusPay==2) echo '<div class="badge badge-sa-success">Đã thanh toán</div>';
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phương thức</td>
                                                        <td class="text-end">
                                                                <div class="sa-price">
                                                                    <?php
                                                                    if($typePay==1) echo '<div class="badge badge-sa-success">Tiền mặt (COD)</div>';
                                                                    if($typePay==2) echo '<div class="badge badge-sa-ìnof">Ebanking</div>';
                                                                    ?>
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
                                                            <?php
                                                            if($statusDelivery==1) echo '<div class="badge badge-sa-secondary">Chưa giao hàng</div>';
                                                            if($statusDelivery==2) echo '<div class="badge badge-sa-warning">Đang giao hàng</div>';
                                                            if($statusDelivery==3) echo '<div class="badge badge-sa-success">Đã giao hàng</div>';
                                                            ?>
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
                                    if($typeBill !=0){
                                        $getUser = getOneFieldByID('accounts','fullName,email,phone,address,id,image',$idUser,0);
                                    ?>
                                    <div class="card mb-5">
                                        <div
                                            class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                            <h2 class="fs-exact-16 mb-0">THÔNG TIN USER - ID: <?=$getUser['id']?></h2>
                                        </div>
                                        <div class="card-body d-flex align-items-center pt-4">
                                            <div class="mb-auto sa-symbol sa-symbol--shape--circle sa-symbol--size--lg">
                                                <img src="<?=URL?>/uploads/user/avatar/<?=$getUser['image']?>" width="40" height="40" alt="image user" />
                                            </div>
                                            <div class="ms-3 ps-2">
                                                <div class="fs-exact-14 fw-medium"><?=$getUser['fullName']?></div>
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
                                    <!-- [USER] -->
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