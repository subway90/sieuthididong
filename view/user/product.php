<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item fw-bold"><a href="<?=URL?>" class="text-decoration-none text-dark">Trang chủ</a></li>
          <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Điện thoại</li>
        </ol>
      </nav>
</div>
<!--[PHONE] Ads Box Image -->
<div class="container py-3 p-0">
    <a href="#!/chi-tiet/1">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 p-lg-0 ps-lg-3  p-md-0 ps-md-3">
                <img class="w-100" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
            </div>
            <div class="col-12 col-md-6 col-lg-6 p-lg-0 pe-lg-3 p-md-0 pe-md-3">
                <img class="w-100" src="<?=URL?>publics/img/ads/ads-zflip-2.png" alt="">
            </div>
        </div>
    </a>
</div>

<div class="container bg-light rounded py-3">
    <form action="<?=URL?>san-pham/loc/" method="get">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-2">
            <label for="brand">Thương hiệu:</label>
            <select name="Brand" class="form-control" id="brand">
                <?=$showSelectBrand?>
            </select>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label for="color">Màu:</label>
            <select name="Color" class="form-control" id="color">
                <?=$showSelectColor?>
            </select>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label for="style">Phong cách:</label>
            <select name="Style" class="form-control" id="style">
                <?=$showSelectStyle?>
            </select>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label for="price">Giá tiền:</label>
            <select name="Price" class="form-control" id="price">
                <?=$showSelectPrice?>
            </select>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label for="sort">Sắp xếp:</label>
            <select name="Sorts" class="form-control" id="sort">
                <?=$showSelectSorts?>
            </select>
        </div>
        <div class="col-12 col-md-12 col-lg-2">
            <label class="" for="Filter">Tùy chọn</label>
            <div>
            <button id="Filter" type="submit" class="btn btn-outline-success w-100"> <i class="fas fa-search"></i> Lọc tìm kiếm </button>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="container mt-3">
    <div class="row">
        <!-- Product Start -->
        <?php
        if($listProduct) {
            for ($i = 0; $i < count($listProduct); $i++) {
                extract($listProduct[$i]);
        ?>
        <div class="col-6 col-md-4 col-lg-2 pb-3 pb-md-4 pb-lg-5">
            <form method="post">
                <input type="hidden" name="idProduct" value="<?= $idProduct ?>">
                <input type="hidden" name="idModel" value="<?= $idModel ?>">
                <input type="hidden" name="idColor" value="<?= $id ?>">
                <div style="min-height: 100%;" class="card shadow">
                    <div class="position-relative hover-trigger">
                        <img src="<?=URL_IMGER_PRODUCT.$image?>" class="card-img img-product" alt="<?=$image?>">
                        <span style="left: 84%; top: -4%; width: 45px; height: 45px" class="btn bg-danger text-light rounded-circle position-absolute small p-0 pt-2 fw-bold "><?= saleProduct($price,$priceSale) ?>%</span>
                        <span class="show-hover position-absolute end-0 bottom-0 w-100">
                            <div class="d-flex justify-content-evenly">
                                <button class="btn btn-success">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button name="addProduct" type="submit" class="btn btn-success">
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
                    <a class="text-decoration-none" href="<?=URL.'chi-tiet/'.$slug?>">
                        <div class="card-body">
                            <h5 class="card-title fs-6 fw-bold text-dark"> <?= $name.'-'.$model ?> </h5>
                            <p class="card-text">
                                <span ng-if="product.priceSale!=0">
                                    <span class="text-danger fw-bold me-1"><?= number_format($priceSale) ?> đ</span>
                                    <span class="text-secondary small"><del><small><?= number_format($price) ?> đ</small></del></span>
                                </span>
                            </p>
                        </div>
                    </a>
                </div>
            </form>
        </div>
        <?php }}else{?> <div class="col-12 text-center py-5">Không tìm thấy sản phẩm. <a href="<?=URL?>san-pham" class="text-success">Quay lại</a></div> <?php }?>
        <!-- Product End -->
        <!-- Page Start -->
        <div class="col-12">
            <div class="input-group d-flex justify-content-center">
                <div class="btn btn-small btn-outline-success disabled">Prev</div>
                <div class="btn btn-small btn-outline-success active">1</div>
                <div class="btn btn-small btn-outline-success">2</div>
                <div class="btn btn-small btn-outline-success">3</div>
                <div class="btn btn-small btn-outline-success">Next</div>
            </div>
        </div>
    </div>
</div>