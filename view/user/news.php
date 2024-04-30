<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>" class="text-decoration-none text-dark">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">Tin tức</li>
        </ol>
    </nav>
</div>
<div class="container pt-lg-5 pt-3">
    <div class="row">
        <!-- NEWS TOP -->
        <div class="col-lg-8 p-lg-0">
            <div class="fs-6 text-success p-lg-0 border-bottom border-success mb-3">Tin đầu</div>
            <div id="headingNews" class="carousel slide position-relative" data-bs-ride="carousel">
                <div class="carousel-inner px-3">
                    <?php
                    for ($i=0; $i < count($listHeading); $i++) { 
                        extract($listHeading[$i])
                    ?>
                    <div class="w-100 carousel-item position-relative <?=matchValue('active',0,$i)?>">
                       <a href="<?=URL?>tin-tuc/<?=$slug?>">
                       <img src="<?= URL_IMAGE_NEWS.$imageTitle ?>" class="img object-fit-cover w-100 d-block" alt="<?= $imageTitle ?>">
                       </a>
                        <span class="w-100 p-lg-3 px-2 position-absolute bg-success bg-opacity-75 text-light bottom-0">
                            <?= $title ?>
                        <div class="small">
                            <small>
                                bởi <a class="text-decoration-none text-light fst-italic me-2" href="<?=URL?>thong-tin/<?=$idUser?>">
                                 <?= getOneFieldByCustom('accounts','fullName','id ='.$idUser)['fullName'] ?></a> 
                                <div class=""><?= formatTime($dateCreate,'lúc hh:mm DD/MM/YYYY') ?></div>
                            </small>
                        </div>
                        </span>
                    </div>
                    <?php } ?>
                </div>
                <span class="position-absolute w-100 d-flex justify-content-between top-50">
                    <button class="btn rounded-circle bg-success text-light bg-opacity-75" data-bs-target="#headingNews" data-bs-slide="prev"><i class="fas fs-2 mx-1 fa-caret-left"></i></button>
                    <button class="btn rounded-circle bg-success text-light bg-opacity-75"  data-bs-target="#headingNews" data-bs-slide="next"><i class="fas fs-2 mx-1 fa-caret-right"></i></button>
                </span>
            </div>
        </div>
        <!-- NEWS TOP -->
        <div class="pe-lg-0 mt-5 mt-lg-0 col-lg-4 d-flex flex-column">
            <div class="fs-6 text-success p-lg-0 border-bottom border-success mb-3">Tin nổi bật khác</div>
           <div class="d-flex shadow mb-3 pe-1">
                <img class="me-2 w-25" src="<?= URL_IMAGE_SYSTEM ?>image_default.jpg" alt="image">
                <div class="fs-6">
                    <a href="#" class="text-green text-decoration-none">Thông tin mới nhất về iPhone 15 Pro Max & IOS 16.0.1</a>
                    <div class="text-muted small">Minh Hiếu | 16.02.2024</div>
                </div>
           </div>
           <div class="d-flex shadow mb-3 pe-1">
                <img class="me-2 w-25" src="<?= URL_IMAGE_SYSTEM ?>image_default.jpg" alt="image">
                <div class="fs-6">
                    <a href="#" class="text-green text-decoration-none">Thông tin mới nhất về iPhone 15 Pro Max & IOS 16.0.1</a>
                    <div class="text-muted small">Minh Hiếu | 16.02.2024</div>
                </div>
           </div>
           <div class="d-flex shadow mb-3 pe-1">
                <img class="me-2 w-25" src="<?= URL_IMAGE_SYSTEM ?>image_default.jpg" alt="image">
                <div class="fs-6">
                    <a href="#" class="text-green text-decoration-none">Thông tin mới nhất về iPhone 15 Pro Max & IOS 16.0.1</a>
                    <div class="text-muted small">Minh Hiếu | 16.02.2024</div>
                </div>
           </div>
           <div class="d-flex shadow mb-3 pe-1">
                <img class="me-2 w-25" src="<?= URL_IMAGE_SYSTEM ?>image_default.jpg" alt="image">
                <div class="fs-6">
                    <a href="#" class="text-green text-decoration-none">Thông tin mới nhất về iPhone 15 Pro Max & IOS 16.0.1</a>
                    <div class="text-muted small">Minh Hiếu | 16.02.2024</div>
                </div>
           </div>
           <div class="d-flex shadow mb-3 pe-1">
                <img class="me-2 w-25" src="<?= URL_IMAGE_SYSTEM ?>image_default.jpg" alt="image">
                <div class="fs-6">
                    <a href="#" class="text-green text-decoration-none">Thông tin mới nhất về iPhone 15 Pro Max & IOS 16.0.1</a>
                    <div class="text-muted small">Minh Hiếu | 16.02.2024</div>
                </div>
           </div>
        </div>
        <!-- BANNER ADS -->
        <div class="col-lg-12 p-0 my-3">
            <a href="#">
                <div class="row mx-lg-1">
                    <div class="col-12 col-md-6 col-lg-6 p-0">
                        <img class="w-100" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 p-0">
                        <img class="w-100" src="<?=URL?>publics/img/ads/ads-zflip-2.png" alt="">
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12 p-0 pb-1 my-4 d-flex justify-content-between text-success h5 border-2 border-success border-bottom">
            <div class="">Tin tức mới nhất</div>
        </div>
        <!-- NEWS DETAIL -->
        <div class="col-lg-8 d-flex flex-column">
            <div style="max-height:500" class="mb-lg-2 mb-4 shadow d-flex">
                <img width="40%" class="" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
                <div class="fs-6 mx-2">
                    <a href="#" class="text-green text-decoration-none  ">
                        Hỗ trợ trả góp khi mua Samsung Z-flip 5, trả góp 0%, quà siêu ưu đãi và cơ hội trúng voucher SALE 50% Tủ Lạnh Samsung Ultra Freeze Max UTIS 102kg
                    </a>
                    <div class="small mt-3">
                        <a class="text-green small text-decoration-none" href="#">#khuyenmaisamsung</a>
                    </div>
                </div>
            </div>
            <div style="max-height:500" class="mb-lg-2 mb-4 shadow d-flex">
                <img width="40%" class="" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
                <div class="fs-6 mx-2">
                    <a href="#" class="text-green text-decoration-none  ">
                        Hỗ trợ trả góp khi mua Samsung Z-flip 5, trả góp 0%, quà siêu ưu đãi và cơ hội trúng voucher SALE 50% Tủ Lạnh Samsung Ultra Freeze Max UTIS 102kg
                    </a>
                    <div class="small mt-3">
                        <a class="text-green small text-decoration-none" href="#">#khuyenmaisamsung</a>
                    </div>
                </div>
            </div>
            <div style="max-height:500" class="mb-lg-2 mb-4 shadow d-flex">
                <img width="40%" class="" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
                <div class="fs-6 mx-2">
                    <a href="#" class="text-green text-decoration-none  ">
                        Hỗ trợ trả góp khi mua Samsung Z-flip 5, trả góp 0%, quà siêu ưu đãi và cơ hội trúng voucher SALE 50% Tủ Lạnh Samsung Ultra Freeze Max UTIS 102kg
                    </a>
                    <div class="small mt-3">
                        <a class="text-green small text-decoration-none" href="#">#khuyenmaisamsung</a>
                    </div>
                </div>
            </div>
            <div style="max-height:500" class="mb-lg-2 mb-4 shadow d-flex">
                <img width="40%" class="" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
                <div class="fs-6 mx-2">
                    <a href="#" class="text-green text-decoration-none  ">
                        Hỗ trợ trả góp khi mua Samsung Z-flip 5, trả góp 0%, quà siêu ưu đãi và cơ hội trúng voucher SALE 50% Tủ Lạnh Samsung Ultra Freeze Max UTIS 102kg
                    </a>
                    <div class="small mt-3">
                        <a class="text-green small text-decoration-none" href="#">#khuyenmaisamsung</a>
                    </div>
                </div>
            </div>
            <div style="max-height:500" class="mb-lg-2 mb-4 shadow d-flex">
                <img width="40%" class="" src="<?=URL?>publics/img/ads/ads-zflip-1.png" alt="">
                <div class="fs-6 mx-2">
                    <a href="#" class="text-green text-decoration-none  ">
                        Hỗ trợ trả góp khi mua Samsung Z-flip 5, trả góp 0%, quà siêu ưu đãi và cơ hội trúng voucher SALE 50% Tủ Lạnh Samsung Ultra Freeze Max UTIS 102kg
                    </a>
                    <div class="small mt-3">
                        <a class="text-green small text-decoration-none" href="#">#khuyenmaisamsung</a>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex mt-3 ">
                <div class="input-group justify-content-center justify-content-lg-start">
                    <a href="#" class="btn btn-sm btn-outline-success disabled">Trang trước</a>
                    <a href="#" class="btn btn-sm btn-outline-success active">1</a>
                    <a href="#" class="btn btn-sm btn-outline-success">2</a>
                    <a href="#" class="btn btn-sm btn-outline-success">3</a>
                    <a href="#" class="btn btn-sm btn-outline-success">4</a>
                    <a href="#" class="btn btn-sm btn-outline-success">5</a>
                    <a href="#" class="btn btn-sm btn-outline-success">Trang tiếp</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-lg-0 mt-5 bg-info bg-opacity-50 bg-gradient text-center mb-2">
                banner ads [COL-LG 4]
        </div>
    </div>

</div>