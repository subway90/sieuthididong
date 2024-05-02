<div class="container mt-3 bg-light rounded pt-3 pb-1">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>" class="text-decoration-none text-dark">Trang chủ</a></li>
            <li class="breadcrumb-item fw-bold"><a href="<?= URL ?>tin-tuc" class="text-decoration-none text-dark">Tin tức</a></li>
            <li class="breadcrumb-item active text-success fw-bolder" aria-current="page">chủ đề <?= getOneFieldByCustom('news_category','name','id ='.$idCate)['name'] ?></li>
        </ol>
    </nav>
</div>
<div class="container pt-5">
    <div class="row">
        <!-- NEWS TOP -->
        <div class="col-lg-12 p-lg-0">
            <div class="mb-lg-3"> 
                <div class="fw-bold h4"><?= $title ?></div>
                <div class="text-muted"><?= formatTime($dateCreate,'lúc hh:mm MM/DD/YYYY') ?></div>
                <img class="my-lg-3 w-100" src="<?=URL_IMAGE_NEWS.$imageTitle?>" alt="<?= $imageTitle ?>">
            </div>
            <div class="my-lg-5"> 
                <?= $shortDecribe ?>  
            </div>
            <div class="">
                <?= $Decribe ?>
            </div>
            <div class="fs-6">
                <span class="text-muted">Tác giả:</span>
                <span class="fw-bold"><?= getOneFieldByCustom('accounts','fullName','id ='.$idUser)['fullName'] ?></span>
            </div>
        </div>
        <!-- NEWS RECOMMEND -->
        <!-- <div class="pe-lg-0 col-lg-4 d-flex flex-column mt-lg-0 mt-5">
            <div class="fs-6 text-success p-lg-0 border-bottom border-success mb-3">Tin tức liên quan</div>
           <div class="d-flex shadow mb-3 pe-1">
                <img class="me-lg-2 w-25" src="<?= URL_IMAGE_SYSTEM ?>image_default.jpg" alt="image">
                <div class="fs-6">
                    <a href="#" class="text-green text-decoration-none">Thông tin mới nhất về iPhone 15 Pro Max & IOS 16.0.1</a>
                    <div class="text-muted small">Minh Hiếu | 16.02.2024</div>
                </div>
           </div>
        </div> -->
        <div class="col-12 p-0 pb-1 my-4 d-flex justify-content-between text-success h5 border-2 border-success border-bottom">
            <div class="">Bình luận</div>
        </div>
        <!-- NEWS COMMENT -->
        <div class="col-lg-8 ps-lg-0 d-flex flex-column">
            <table class="table table-hover">
                <tr class="">
                    <?php 
                    if($listComment){
                        for ($i=0; $i < count($listComment); $i++) { 
                        extract($listComment[$i]);
                    ?>
                    <td style="width: 5%" class="">
                        <img class="rounded-circle" width="40" height="40" src="<?=pathImage(getOneFieldByCustom('accounts','image','id ='.$idUser)['image'])?>" alt="imguser">
                    </td>
                    <td class=" text-muted">
                        <div class="fs-6">
                            <span class="fw-bold"><?= getOneFieldByCustom('accounts','fullName','id ='.$idUser)['fullName'] ?></span> | 
                            <span class="small"><?= formatTime($dateUpdate,'lúc hh:mm MM/DD/YYYY') ?></span></div>
                        <div class="text-muted">
                            <?= $message ?>
                        </div>
                    </td>
                    <?php }
                    }else{?>
                </tr>
                <tr>
                    <td>Chưa có bình luận nào</td>
                </tr>
                <?php }?>
            </table>
            <div class="w-100 d-flex">
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
        <div class="col-lg-4 bg-info bg-opacity-50 bg-gradient text-center my-lg-0 my-3">
                banner ads [COL-LG 4]
        </div>
    </div>

</div>