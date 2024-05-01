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
        <!-- FILTER NEWS -->
        <div class="col-lg-8 p-lg-0 col-12 mb-lg-3">
            <div class="fs-5 fw-bold text-success mb-2">Loại tin</div>
            <?= $showFilterCategoryNews ?>
        </div>
        <div class="col-lg-4 p-lg-0 col-12">
        <div class="fs-5 fw-bold text-success mb-2">Tìm kiếm</div>
            <form action="" method="get">
            <div class="input-group">
                <input type="text" name="tim-kiem" value="<?= $keyword ?>" id="#" class="form-control" placeholder="Nhập từ khóa bài viết...">
                <button type="submit" class="btn btn-success">Tìm kiếm</button>
            </div>
            </form>
        </div>
        <!-- SHOW NEWS -->
        <div class="col-12 p-lg-0 my-3">
            <div class="row">
                <?php 
                if($listNews){
                    for ($i=0; $i < count($listNews); $i++) { 
                    extract($listNews[$i]) ?>
                <div class="col-lg-3 col-6">
                    <a class="text-decoration-none text-green" href="<?=URL?>tin-tuc/<?=$slug?>">
                        <img height="70%" class="w-100 rounded-4" src="<?=URL_IMAGE_NEWS.$imageTitle?>" alt="<?=$imageTitle?>">
                        <p class="fs-6 fw-bold"> <?= $title ?> </p>
                    </a>
                </div>
                <?php } ?>
                <div class="col-12 input-group d-flex justify-content-center">
                    <?= $showPagingNews ?>
                </div>
                <?php }else{?>
                <div class="col-12 text-center">
                    <p class="text-muted" >Không tìm thấy bài viết nào.</p>
                    <a href="<?=URL?>tin-tuc" class="btn btn-sm btn-outline-success mb-3">Quay lại</a>
                </div>
                <?php } ?>
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
            <div class="">Tin tức nổi bật</div>
        </div>
        <!-- NEWS ALL -->
        <div class="col-lg-8 d-flex flex-column">
            <?php 
            for ($i=0; $i < count($listNews); $i++) { 
                extract($listNews[$i])
            ?>
            <div style="max-height:500" class="mb-lg-2 mb-4 shadow d-flex">
                <img width="20%" class="" src="<?=URL_IMAGE_NEWS.$imageTitle?>" alt="<?=$imageTitle?>">
                <div class="fs-6 mx-2">
                    <a href="<?=URL.'tin-tuc/'.$slug?>" class="text-green text-decoration-none  ">
                        <?= $title ?>.
                    </a>
                    <div class="small mt-5">
                        <a class="text-green small text-decoration-none" href="#"><?= '#tags' ?></a>
                    </div>
                </div>
            </div>
            <?php }?>
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