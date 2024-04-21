<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a href="/" class="text-decoration-none text-dark">Trang chủ</a></li>
          <li class="breadcrumb-item fw-bold"><a href="#!/san-pham" class="text-decoration-none text-dark">Điện thoại</a></li>
          <li class="breadcrumb-item fw-bold"><a href="#!/san-pham" class="text-decoration-none text-dark">iPhone</a></li>
          <li class="breadcrumb-item active text-success fw-bolder" aria-current="page"><?='Name of PRODUCT'?></li>
        </ol>
      </nav>
</div>
<div class="container">
    <div class="row">

        <div class="col-12 fw-bold fs-4 py-2">
            <?='Name of PRODUCT'?>
        </div>

        <div class="col-12 col-md-12 col-lg-4">
            <div id="galery-product" class="carousel slide">
                <!-- [ẢNH LỚN] -->
                <div class="carousel-inner position-relative">
                  <div class="carousel-item active">
                    <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="galery-product">
                  </div>
                  <div class="carousel-item">
                    <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="galery-product">
                  </div>
                  <div class="carousel-item">
                    <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="galery-product">
                  </div>
                  <div class="carousel-item">
                    <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="galery-product">
                  </div>
                </div>
                <span class="position-absolute top-50 w-100 d-flex justify-content-between">
                    <button class="btn btn-success rounded-pill" data-bs-target="#galery-product" data-bs-slide="prev">
                        <i class="fa fa-lg fa-angle-left text-center pe-1" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-success rounded-pill " data-bs-target="#galery-product" data-bs-slide="next">
                        <i class="fa fa-lg fa-angle-right text-center ps-1" aria-hidden="true"></i>
                    </button>
                </span>
            </div>
            <div class="container mt-3">
                <!-- [ẢNH NHỎ] -->
                <div class="row d-flex justify-content-center">
                    <button class="col-2 border-0 hover-btn-galery-product" data-bs-target="#galery-product" data-bs-slide-to="0" aria-label="Slide 1">
                        <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="small-logo">
                    </button>
                    <button class="col-2 border-0 hover-btn-galery-product" data-bs-target="#galery-product" data-bs-slide-to="1" aria-label="Slide 2">
                        <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="small-logo">
                    </button>
                    <button class="col-2 border-0 hover-btn-galery-product" data-bs-target="#galery-product" data-bs-slide-to="2" aria-label="Slide 3">
                        <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="small-logo">
                    </button>
                    <button class="col-2 border-0 hover-btn-galery-product" data-bs-target="#galery-product" data-bs-slide-to="3" aria-label="Slide 4">
                        <img class="w-100" src="<?=URL?>publics/img/phone/samsung/a34-3.jpg" alt="small-logo">
                    </button>
                  </button>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-12 col-lg-5">
            <div class="row">
                <!-- [GIÁ] -->
                <div class="col-12 col-md-6 col-lg-6 mt-4 mt-lg-2">
                    <div class="tab-content fw-bold fs-3 text-danger" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="price1">4,444 vnđ</div>
                        <div class="tab-pane fade" id="price2" >6,666 vnđ</div>
                        <div class="tab-pane fade" id="price3" >8,888 vnđ</div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 mt-lg-3">
                    <p class="text-center text-lg-start text-secondary fw-bold">(Giá đã bao gồm VAT)</p>
                </div>
                <!-- [FREE] -->
                <div class="col-12 p-0">
                    <div class="w-100 border border-success bg-light text-center text-success fw-bold py-1 rounded">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        Vận chuyển miễn phí toàn quốc
                    </div>
                </div>
                <div class="col-12 text-end small">SKU: <span class="fw-bold">AP30520VN</span></div>
                <!-- [Type] -->
                </style>
                <div class="col-6 p-0">
                    <div class="w-100 text-start fw-bolder">Lựa chọn loại</div>
                    <div class="row p-0 mt-2">
                        <ul class="nav nav-pills" id="" role="tablist">
                            <li class="ms-3" role="presentation">
                                <button class="nav-link border border-success active" data-bs-toggle="pill" data-bs-target="#price1" type="button">256GB</button>
                            </li>
                            <li class="ms-3" role="presentation">
                                <button class="nav-link border border-success" data-bs-toggle="pill" data-bs-target="#price2" type="button">512GB</button>
                            </li>
                            <li class="ms-3" role="presentation">
                                <button class="nav-link border border-success" data-bs-toggle="pill" data-bs-target="#price3" type="button">1TB</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- [Color] -->
                <div class="col-6 p-0">
                    <div class="w-100 text-start fw-bolder">Lựa chọn màu</div>
                    <select class="form-control mt-2 border border-success p-2" name="" id="">
                        <button><option value="1" data-bs-target="#galery-product" data-bs-slide-to="0" aria-label="Slide 1">Màu Đen</option></button>
                        <option value="2" data-bs-target="#galery-product" data-bs-slide-to="1" aria-label="Slide 2">Màu Trắng</option>
                        <option value="3" data-bs-target="#galery-product" data-bs-slide-to="2" aria-label="Slide 3">Màu Xanh</option>
                        <option value="4" data-bs-target="#galery-product" data-bs-slide-to="3" aria-label="Slide 4">Màu Tự nhiên</option>
                    </select>
                </div>

                <!-- [MUA - TRẢ GÓP - GIỎ HÀNG] -->
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-10 px-1">
                            <button class="w-100 btn btn-danger bg-gradient">
                                MUA NGAY
                            </button>
                        </div>
                        <!-- <div class="col-5 px-1">
                            <button class="w-100 btn btn-success bg-gradient">
                                <span class="">MUA TRẢ GÓP</span>
                            </button>
                        </div> -->
                        <div class="col-2 px-1">
                            <button class="w-100 btn btn-outline-warning">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- [THÔNG TIN KM] -->
                <div class="col-12 mt-3">
                    <p class="text-success">KHUYẾN MÃI</p>
                        <div class="my-2">
                            <div class="btn btn-warning bg-gradient text-light p-0 px-1 small">
                                <span class="small">KM1</span>
                            </div>
                            <span>
                                <a class="text-decoration-none text-green" href="#">
                                    Giảm thêm 30% giá trị máy cũ, tối đa 2.000.000đ khi tham gia thu cũ, đổi mới iPhone 15 Series.
                                </a>
                            </span>
                        </div>
                        <div class="my-2">
                            <div class="btn btn-warning bg-gradient text-light p-0 px-1 small">
                                <span class="small">KM2</span>
                            </div>
                            <span>
                                <a class="text-decoration-none text-green" href="#">
                                    Giảm thêm 100.000đ khi khách hàng thanh toán bằng hình thức chuyển khoản ngân hàng khi mua iPhone 15 Series.
                                </a>
                            </span>
                        </div>
                </div>
                
                
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-3 mt-5 mt-md-4 mt-lg-3">
            <p class="text-center text-uppercase">thông số kỹ thuật</p>
            <table class="table table-hover table-bordered small">
                <thead>
                    <th class="bg-success bg-opacity-75 text-light text-center" scope="col" colspan="2">iPhone 15 Pro Max</th>
                </thead>
                <tbody>
                    <tr>
                        <th class="">Màn hình</th>
                        <td class="small align-middle" colspan="1">Super Retina XDR, tần số 120Hz, Haptic Touch</td>
                    </tr>
                    <tr>
                        <th class="">Độ phân giải</th>
                        <td class="small align-middle" colspan="1">1290 x 2796, chính 48MP, khẩu độ f/1.78</td>
                    </tr>
                    <tr>
                        <th class="">Kích thước màn hình</th>
                        <td class="small align-middle" colspan="1">6.7 inch</td>
                    </tr>
                    <tr>
                        <th class="">Hệ điều hành</th>
                        <td class="small align-middle" colspan="1">IOS 17</td>
                    </tr>
                    <tr>
                        <th class="">Vi xử lý</th>
                        <td class="small align-middle" colspan="1">A17 Pro</td>
                    </tr>
                    <tr>
                        <th class="">Bộ nhớ trong</th>
                        <td class="small align-middle" colspan="1">256 GB</td>
                    </tr>
                    <tr>
                        <th class="">RAM</th>
                        <td class="small align-middle" colspan="1">8 GB</td>
                    </tr>
                    <tr>
                        <th class="">Mạng di động</th>
                        <td class="small align-middle" colspan="1">2G 3G 4G 5G</td>
                    </tr>
                    <tr>
                        <th class="">Khe sim</th>
                        <td class="small align-middle" colspan="1">2 (nano SIM và eSIM)</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="bg-success bg-opacity-75 text-light small text-center" colspan="2" data-bs-toggle="modal" data-bs-target="#detailProduct">
                            Xem chi tiết
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- [Modal] Chi tiết thông số kỹ thuật -->
        <div class="col-12">
            <div class="modal fade" id="detailProduct" tabindex="-1" aria-labelledby="labelDP" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="labelDP">Thông tin chi tiết Điện thoại iPhone 15 Pro Max</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Table Detail 1 -->
                        <table class="table table-hover table-bordered small">
                            <tbody>
                                <tr>
                                    <th class="bg-success bg-opacity-75 text-light text-center" scope="col" colspan="2">Màn hình</th>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Công nghệ màn hình</th>
                                    <td class="small align-middle" colspan="1">
                                        <ul>
                                            <li>Màn hình Super Retina XDR</li>
                                            <li>Tấm nền OLED</li>
                                            <li>Dynamic Island</li>
                                            <li>Công nghệ ProMotion với tốc độ làm mới thích ứng lên đến 120Hz</li>
                                            <li>Màn hình Luôn Bật</li>
                                            <li>Màn hình HDR</li>
                                            <li>Tỷ lệ tương phản 2.000.000:1 (tiêu chuẩn)</li>
                                            <li>Màn hình True Tone</li>
                                            <li>Màn hình có dải màu rộng (P3)</li>
                                            <li>Haptic Touch</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Độ phân giải</th>
                                    <td class="small align-middle" colspan="1">
                                       1290 x 2796
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Kích thước màn hình</th>
                                    <td class="small align-middle" colspan="1">
                                       6.7 inch
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Độ sáng màn hình</th>
                                    <td class="small align-middle" colspan="1">
                                       <ul>
                                            <li>Độ sáng tối đa 1000 nit (tiêu chuẩn)</li>
                                            <li>Độ sáng đỉnh 1600 nit (HDR)</li>
                                            <li>Độ sáng cao nhất 2000 nit (ngoài trời)</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Mặt nạ cảm ứng</th>
                                    <td class="small align-middle" colspan="1">
                                        Ceramic Shield
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Table Detail 2 -->
                        <table class="table table-hover table-bordered small">
                            <tbody>
                                <tr>
                                    <th class="bg-success bg-opacity-75 text-light text-center" scope="col" colspan="2">Camera Sau</th>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Độ phân giải</th>
                                    <td class="small align-middle" colspan="1">
                                        <ul>
                                           <li>Chính: 48MP, khẩu độ ƒ/1.78</li>
                                           <li>Ultra Wide: 12MP, khẩu độ ƒ/2.2</li>
                                           <li>Telephoto: 12MP, khẩu độ ƒ/2.8</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Quay phim</th>
                                    <td class="small align-middle" colspan="1">
                                        <ul>
                                           <li>Quay video 4K ở tốc độ 24 fps, 25 fps, 30 fps, hoặc 60 fps</li>
                                           <li>Quay video HD 1080p ở tốc độ 25 fps, 30 fps, hoặc 60 fps</li>
                                           <li>Chế độ Điện Ảnh để quay video với độ sâu trường ảnh nông (lên đến 4K HDR ở tốc độ 30 fps)</li>
                                           <li>Chế độ Hành Động</li>
                                           <li>Quay video HDR với công nghệ Dolby Vision lên đến 4K ở tốc độ 60 fps</li>
                                           <li>Quay video ProRes lên đến 4K ở 60 fps với khả năng ghi vào ổ đĩa gắn ngoài</li>
                                           <li>Quay video định dạng Log</li>
                                           <li>Academy Color Encoding System (Hệ Thống Màu Của Viện Hàn Lâm, ACES)</li>
                                           <li>Quay video macro, bao gồm chế độ quay chậm và tua nhanh</li>
                                           <li>Hỗ trợ quay video chậm 1080p ở tốc độ 120 fps hoặc 240 fps</li>
                                           <li>Video tua nhanh có chống rung</li>
                                           <li>Tua nhanh ở chế độ Ban Đêm</li>
                                           <li>Chế độ quay video QuickTake</li>
                                           <li>Chống rung quang học dịch chuyển cảm biến thế hệ thứ hai cho video</li>
                                           <li>Phóng đại âm thanh</li>
                                           <li>Thu âm stereo</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Đèn flash</th>
                                    <td class="small align-middle" colspan="1">
                                        Flash True Tone Thích Ứng
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle small">Tính năng</th>
                                    <td class="small align-middle" colspan="1">
                                       <ul>
                                        <li>Chống rung quang học dịch chuyển cảm biến thế hệ thứ hai</li>
                                        <li>Các lựa chọn thu phóng quang học 0,5x, 1x, 2x, 5x</li>
                                        <li>Photonic Engine</li>
                                        <li>Deep Fusion</li>
                                        <li>HDR thông minh thế hệ 5 cho ảnh</li>
                                        <li>Ảnh chân dung thế hệ mới với Focus và Depth Control</li>
                                        <li>Hiệu ứng Chiếu Sáng Chân Dung với sáu chế độ</li>
                                        <li>Chế độ Ban Đêm</li>
                                        <li>Chụp ảnh chân dung ở chế độ Ban Đêm</li>
                                        <li>Phong Cách Nhiếp Ảnh</li>
                                        <li>Chụp ảnh macro</li>
                                        <li>Apple ProRAW</li>
                                       </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- [SẢN PHẨM LIÊN QUAN] -->
        <div class="col-12 col-md-6 col-lg-4 mt-5">
           <span class="text-uppercase text-success h6">
            sản phẩm liên quan
           </span>
            <hr class="border border-2 border-success m-0 mt-1">
        </div>

        <div class="col-12 mt-4">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
                    <div style="min-height: 100%;" class="card shadow">
                        <div class="position-relative hover-trigger">
                            <img src="/publics/img/phone/iphone/iphone-11/origin/iphone-11.jpg" class="card-img img-product" alt="...">
                            <span style="left: 84%; top: -4%; width: 45px; height: 45px" class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold ">51%</span>
                            <span class="show-hover position-absolute end-0 bottom-0 w-100">
                                <div class="d-flex justify-content-evenly">
                                    <button class="btn btn-success">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-success">
                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-success">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </span>
                        </div>
                        <div class="ms-2">
                            <span class="badge bg-warning">KM</span>
                            <span class="badge bg-success">Trả góp 0%</span>
                        </div>
                        <a class="text-decoration-none" href="/detail.html">
                            <div class="card-body">
                                <h5 class="card-title fs-6 fw-bold text-dark">iPhone 11 64GB</h5>
                                <p class="card-text">
                                    <span class="text-danger fw-bold me-1">9,990,000 đ</span>
                                    <span class="text-secondary small"><del><small>18,900,000</small></del></span>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <!-- Bình luận -->
            <form ng-submit="comment()">
                <div ng-show="user" class="mt-5 d-flex justify-content-between align-items-center">
                        <div class="me-2">
                            <img width="45px" height="45px" src="<?=URL?>/upload/user_default.jpg" alt="user_default.jpg" class="rounded-circle border-1 border-success">
                        </div>
                        <div class="w-100">
                            <textarea ng-model="content" class="form-control" rows="1" type="text" placeholder="Nhập bình luận của bạn..."></textarea>
                        </div> 
                        <button type="submit" class="ms-2 btn px-3 btn-success">gửi</button>
                </div>
            </form>
            <p class="h6 mt-5">Bình luận được tải lên</p>
            <hr class="border-2 border-secondary">
            <table class="table table-hover">
                <tr ng-if="listComment!=0" ng-repeat="cmt in listComment | limitTo: limit">
                    <td style="width: 5%">
                        <img width="45px" height="45px" src="<?=URL?>/upload/user_default.jpg" alt="user_default.jpg" class="rounded-circle border-1 border-success">
                    </td>
                    <td>
                        <div class="w-100 d-flex justify-content-between">
                            <span class="text-start">{{listUser[cmt.idUser-1].name}} | <span class="text-end"><i class="small text-secondary"> {{cmt.date}} </i></span></span>
                            <span ng-show="listUser[cmt.idUser-1].id  == user.id">
                                <button class="btn btn-sm btn-outline-info p-0 px-1 fw-sm">sửa</button> | 
                                <button ng-click="deleteComment(cmt.id)" class="btn btn-sm btn-outline-danger p-0 px-1 fw-sm">xóa</button>
                            </span>
                        </div>
                        <p class="small"> {{cmt.content}} </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="">Chưa có bình luận nào</td>
                </tr>
            </table>
            <div class="col-12 text-center">
                <button ng-show="limit<listComment.length" ng-click="limit=limit+5" class="btn btn-outline-success text-center">Tải thêm bình luận</button>
            </div>

    </div>
</div>