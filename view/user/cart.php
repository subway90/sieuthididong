<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
          <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Giỏ hàng</li>
        </ol>
      </nav>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-8 p-0">
            <div class="table-responsive-sm">
                <table class="table table-hover rounded-3 small">
                    <thead class="align-middle text-end">
                        <th class="text-start">Sản phẩm</th>
                        <th>Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody class="align-middle text-end">
                        <?php if($listCart){ for ($i=0; $i < count($listCart); $i++) { extract($listCart[$i]) ?>
                        <tr class="align-middle">
                            <td class="text-start d-flex align-items-center"> 
                                <div><img width="50" src="<?=URL_IMAGE_PRODUCT.$image?>" alt="<?=$image?>"></div>
                                <div>
                                    <span class="text-success fw-bold"><?= $name ?> </span>
                                    <div class="small text-muted">
                                        <?=getOneFieldByCustom('product_model','model','id ='.$idModel)['model'].' - màu '.getOneFieldByCustom('product_color','color','id ='.$idColor)['color']?>
                                    </div>
                                </div>
                            </td>
                            <td> <?= number_format($priceSale) ?> đ</td>
                            <td>
                                <form method="post">
                                <input type="hidden" name="idCart" value="<?=$idCart?>">
                                <div class="btn-group d-flex align-items-center mx-auto w-25 justify-content-center">
                                    <button name="quantity" value="<?=$quantity-1?>" class="btn btn-success btn-sm" <?php if($quantity==1) echo'disabled'?>><i class="fas fa-minus"></i></button>
                                        <span class="mx-2"> <?= $quantity ?> </span>
                                    <button name="quantity" value="<?=$quantity+1?>" class="btn btn-success btn-sm" <?php if($quantity==$quantityMax) echo'disabled'?>><i class="fas fa-plus"></i></button>
                                </div>
                                </form>
                            </td>
                            <td class="text-end"><?= number_format($quantity*$priceSale) ?> đ</td>
                            <td><a href="<?=URL?>gio-hang&delete=<?=$idCart+1?>" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php } ?>
                        <tfoot>
                            <tr>
                                <td colspan="5" class="text-end">
                                    <a href="<?=URL?>gio-hang&close" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i> tất cả</a>
                                </td>
                            </tr>
                        </tfoot>
                        <?php }else{?>
                        <tr>
                            <td colspan="6" class="text-center">Chưa có sản phẩm nào <a class="nav-link text-success" href="<?=URL?>san-pham">&rarr; Cửa hàng</a></td>
                        </tr>
                        <?php }?>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 p-0 ps-lg-3">
            <form action="<?=URL?>gio-hang&voucher" method="get">
                <label for="voucher">Mã giảm giá</label>
                <div class="input-group mt-1">
                    <input type="text" name="voucher" id="voucher" class="form-control text-success" placeholder="Nhập mã giảm giá tại đây...">
                    <button type="submit" class="btn btn-success">Áp dụng</button>
                </div>
            </form>
            <div class="bg-light px-4 py-2 rounded-3 mt-3">
                <div class="h5 py-3 text-center text-lg-start">Giỏ hàng</div>
                <?php if($total) { for ($i=0; $i < count($listCart); $i++) { extract($listCart[$i])?>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">
                        <?= $name ?>
                        <div class="small text-muted">số lượng: <?= $quantity ?></div>
                    </div>
                    <div class=""><?= number_format($priceSale*$quantity) ?> đ</div>
                </div>
                <?php } ?>
                <div class="h5 mt-3 text-center text-lg-start">Hóa đơn</div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">Sản phẩm</div>
                    <div class=""><?= number_format($total) ?> đ</div>
                </div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">Mã giảm giá</div>
                    <div class=""><?= 0 ?> đ</div>
                </div>
                <hr class="w-100 border border-success border-1 my-1">
                <div class="w-100 d-flex justify-content-between py-2 fw-bold">
                    <div class="">TỔNG THANH TOÁN</div>
                    <div class="text-success"><?= number_format($total) ?> đ</div>
                </div>
                <?php }else {?>
                <div class="w-100 d-flex justify-content-center py-2">
                    Chưa có sản phẩm
                </div>
                <?php }?>
            </div>
            <?php
            if($total) {?>
            <div class="py-3">
                <button type="submit" class="w-100 btn btn-success" data-bs-toggle="modal" data-bs-target="#<?=$activeModal?>">Thanh toán</button>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<!-- Modal Thanh Toán -->
<?php if($total) {?>
  <div class="modal modal-lg fade" id="<?=$activeModal?>" tabindex="-1" aria-labelledby="ModalPay" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalPay">Thanh toán hóa đơn</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <?php if(!$_SESSION['user']) {?>
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Bạn chưa đăng nhập ! Hãy đăng nhập để <strong>lưu lịch sử mua hàng</strong> và <strong>tích điểm</strong> 
                        <a class="text-decoration-none text-success fw-bold" href="<?=URL?>dang-nhap&addCart">&rarr; Đăng nhập</a> hoặc  
                        <a class="text-decoration-none text-success fw-bold" href="<?=URL?>dang-ky&addCart">&rarr; Đăng ký</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <?php }?>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="fs-6 fw-bold mb-2 text-center text-lg-start">Hóa đơn</div>
                    <table class="table table table-success responsive table-hover align-middle text-end">
                        <thead class="fw-bold">
                            <tr>
                                <td class="text-start">Tên sản phẩm</td>
                                <td>Giá</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody class="small">
                        <?php for ($i=0; $i < count($listCart); $i++) { extract($listCart[$i]) ?>
                            <tr>
                                <td class="text-start">
                                    <img width="50" src="<?=URL_IMAGE_PRODUCT.$image?>" alt="<?=$image?>">
                                    <?=$name?>
                                </td>
                                <td><?=number_format($priceSale)?> đ</td>
                                <td>01</td>
                                <td><?=number_format($priceSale*$quantity)?> đ</td>
                            </tr>
                        <?php }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>TỔNG </strong><?= number_format($total) ?> đ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="fs-6 mb-2 text-center text-lg-start"><span class="fw-bold">Thông tin giao hàng</span> <span>(<span class="text-danger">&#10033;</span> : thông tin bắt buộc điền)</span></div>
                    <form method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="fullName" value="<?= $fullName ?>" class="form-control bg-success-subtle" id="fullName" placeholder="none">
                                    <label for="fullName">Họ và tên <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="phone" value="<?= $phone ?>" class="form-control bg-success-subtle" id="phone" placeholder="none">
                                    <label for="phone">Số điện thoại <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="address" value="<?= $address ?>" class="form-control bg-success-subtle" id="address" placeholder="none">
                                    <label for="address">Địa chỉ giao hàng <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <select name="pay" type="text" class="form-control bg-success-subtle" id="pay" placeholder="none">
                                        <option <?php if($pay == 1) echo'selected' ?> value="1">Tiền mặt (Cash On Delivery - Trả tiền lúc nhận hàng)</option>
                                        <option <?php if($pay == 2) echo'selected' ?> value="2">Thanh toán điện tử ( Ebanking - quét mã QR )</option>
                                        <option <?php if($pay == 3) echo'selected' ?> value="3">Thanh toán thẻ ngân hàng ( VNPAY )</option>
                                    </select>
                                    <label for="pay">Phương thức thanh toán <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" value="<?= $email ?>" class="form-control bg-success-subtle" id="email" placeholder="none">
                                    <label for="email">E-mail (nhận thông báo)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" name="mess" value="<?= $mess ?>" class="form-control bg-success-subtle" id="scription" placeholder="none">
                                    <label for="scription">Mô tả (link FB, SĐT khác, ghi chú)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <?= showError($arr_error) ?>
                        </div>
                        <div class="col-12 text-center text-lg-start">
                            <button name="thanhtoan" type="submit" class="btn btn-success">Tiếp tục</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
      </div>
    </div>
  </div>
<?php }?>