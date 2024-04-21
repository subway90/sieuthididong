<?php 
?>
<div class="container px-lg-4">
    <div class="d-flex flex-column-reverse flex-lg-row">
        <!-- [DANH SÁCH GIỎ HÀNG] -->
        <div class="col-12 col-md-12 col-lg-6 me-lg-2 wow fadeIn" data-wow-delay="0.2s">
            <div class="h4 py-2 text-primary text-center">Thông tin hóa đơn</div>
            <table class="table table-light table-border border-3 table-striped text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="4">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                <?php
                    for ($i=0; $i < count($listCart); $i++) { 
                        extract($listCart[$i]);
                        if(!empty($priceSale)) $price = $priceSale;
                ?>
                    <tr>
                        <td colspan="3" class="align-middle">
                            <img src="<?=URL?>/uploads/product/<?=$image?>" alt="ẢNH SP ID:" style="width: 50px;">
                        </td>
                        <td class="align-middle">
                            <div class="h6 text-start"><?=$name?></div>
                        </td>
                        <td class="align-middle">
                        <?=number_format($price)?>
                        </td>
                        <td class="align-middle">
                            <?=$quantity?>
                        </td>
                        <td class="align-middle">
                            <?=number_format($quantity*$price)?>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
                <tfoot>
                    <tr>
                        <td colspan="7" class="align-middle text-end">
                            <div class="w-100">
                                <span class="h6 me-2">TỔNG TIỀN</span>
                                <?=number_format($total)?> đ
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- [THÔNG TIN] -->
        <div class="col-12 col-md-12 col-lg-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="h4 py-2 text-primary text-center">Thông tin giao hàng</div>
        <?php if(empty($_SESSION['user'])){ ?>
            <!-- CẢNH BÁO CHƯA ĐĂNG NHẬP -->
            <div class="alert alert-warning alert-dismissible fade show border-0" role="alert">
                <span class="mb-4">nếu bạn <span class="text-primary fw-bold">ĐĂNG NHẬP</span> thì sẽ được <span class="text-success fw-bold">lưu lịch sử mua hàng</span> & <span class="text-danger fw-bold">tích điểm</span> ! <a href="<?=ACT?>dang-nhap&addCart" class="text-primay">&rarr; Đăng nhập</a></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>

        <?=showError($arr_error)?>
            <div class="wow fadeIn" data-wow-delay="0.3s">
                <div class="ms-2 mb-2 fs-6"><span class="text-danger">&#10039;</span>: Thông tin bắt buộc điền</div>
                <form action="<?=ACT?>gio-hang&thanhtoan" method="post">
                    <div class="row g-2 px-2">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input value="<?=$fullName?>" name="fullName" type="text" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Họ và tên <span class="text-danger">&#10039;</span></label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input name="phone"  value="<?=$phone?>"type="text" class="form-control" id="tel" placeholder="Your tel">
                                <label for="tel">Số điện thoại <span class="text-danger">&#10039;</span></label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input name="address"  value="<?=$address?>"type="text" class="form-control" id="address" placeholder="Your address">
                                <label for="address">Địa chỉ nhận <span class="text-danger">&#10039;</span></label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input name="email" value="<?=$email?>" type="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Email (nhận thông báo)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input name="mess" value="<?=$mess?>" type="text" class="form-control" id="mess" placeholder="Your mess">
                                <label for="mess">Tin nhắn (mô tả Địa chỉ, link FB, SĐT khác,...)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="pay" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="1" <?php if($pay == 1) echo'selected'?>>Tiền mặt - Shipper nhận tiền (COD)</option>
                                    <option value="2" <?php if($pay == 2) echo'selected'?>>Ebanking - Chuyển tiền online</option>
                                </select>
                                <label for="floatingSelect">Phương thức thanh toán <span class="text-danger">&#10039;</span></label>
                            </div>
                        </div>
                        <div class="col-12 text-center py-3">
                            <button class="btn btn-primary py-2 px-5" type="submit">Tiếp tục</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>