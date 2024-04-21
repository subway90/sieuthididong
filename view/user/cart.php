<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a href="/index.html" class="text-decoration-none text-dark">Trang chủ</a></li>
          <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Giỏ hàng</li>
        </ol>
      </nav>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-8 p-0">
            <div class="table-responsive-sm">
                <table class="table table-hover rounded-3 small">
                    <thead class="align-middle text-center">
                        <th class="text-start">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody class="align-middle text-end">
                        <tr>
                            <td class="text-start"> 
                                <img width="50" src="<?=URL?>/upload/12-green.jpg" alt="">
                                <?='name of PRODUCT'?> 
                            </td>
                            <td> <?=4440000?> đ</td>
                            <td>
                                <div class="btn-group d-flex align-items-center mx-auto w-25 justify-content-center">
                                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-minus"></i></a>
                                    <span class="mx-2">02</span>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a>
                                </div>
                            </td>
                            <td class="text-end"><?=4440000?> đ</td>
                            <td><button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-center">Chưa có sản phẩm nào <a class="nav-link text-success" href="<?=URL?>san-pham">&rarr; Cửa hàng</a></td>
                        </tr>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 p-0 ps-lg-3">
            <div class="bg-light px-4 rounded-3">
                <div class="h5 py-3 text-center text-lg-start">Giỏ hàng</div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class=""><?='name of PRODUCT'?></div>
                    <div class=""><?='total of PRODUCT'?> đ</div>
                </div>
                <div class="h5 mt-3 text-center text-lg-start">Tổng thanh toán</div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">Sản phẩm</div>
                    <div class=""><?='total of PRODUCT'?> đ</div>
                </div>
                <div class="w-100 d-flex justify-content-between py-2">
                    <div class="">Mã giảm giá</div>
                    <div class="">(không)</div>
                </div>
            </div>
            <div class="py-3">
                <button type="submit" class="w-100 btn btn-success"  data-bs-toggle="modal" data-bs-target="#Pay">Thanh toán</button>
            </div>
        </div>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal modal-lg fade" id="Pay" tabindex="-1" aria-labelledby="ModalPay" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalPay">Thanh toán hóa đơn</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
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
                            <tr>
                                <td class="text-start">
                                    <img width="50" src="<?=URL?>/upload/12-green.jpg" alt="">
                                    SamSung A34
                                </td>
                                <td>4,444,000 đ</td>
                                <td>01</td>
                                <td>4,444,000 đ</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>TỔNG </strong>16,666,000 đ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="fs-6 mb-2 text-center text-lg-start"><span class="fw-bold">Thông tin giao hàng</span> <span>(<span class="text-danger">&#10033;</span> : thông tin bắt buộc điền)</span></div>
                    <form name="formInvoice">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullName" placeholder="none">
                                    <label for="fullName">Họ và tên <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" placeholder="none">
                                    <label for="phone">Số điện thoại <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="address" placeholder="none">
                                    <label for="address">Địa chỉ giao hàng <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <select type="text" class="form-control" id="pay" placeholder="none">
                                        <option value="1">Tiền mặt (Cash On Delivery - Trả tiền lúc nhận hàng)</option>
                                        <option value="2">Thanh toán điện tử ( Ebanking - quét mã QR )</option>
                                        <option value="3">Thanh toán thẻ ngân hàng ( VNPAY )</option>
                                    </select>
                                    <label for="pay">Phương thức thanh toán <span class="text-danger">&#10033;</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="email" placeholder="none">
                                    <label for="email">E-mail (nhận thông báo)</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="scription" placeholder="none">
                                    <label for="scription">Mô tả (link FB, SĐT khác, ghi chú)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center text-lg-start">
                            <button class="btn btn-success">Tiếp tục</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
      </div>
    </div>
  </div>