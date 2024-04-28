<div id="top" class="sa-app__body">
    <form action="<?= ACT_ADMIN ?>news-add&<?=$subURL?>" method="post" enctype="multipart/form-data">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="<?= URL_ADMIN ?>">Quản lí</a></li>
                                    <li class="breadcrumb-item"><a href="<?= ACT_ADMIN ?>news">Tin tức</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-auto d-flex"><a href="<?= ACT_ADMIN ?>news"
                                class="btn btn-secondary me-3">Hủy</a>
                            <button name="submit" class="btn btn-success" type="submit">Lưu</button>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5 row">
                                    <div class="col-12 mb-5">
                                        <h2 class="mb-0 fs-exact-18">Nhập thông tin News</h2>
                                    </div>
                                    <div class="col-6 form-floating px-3 mb-5">
                                        <select name="idCate" class="form-select rounded rounded-5" id="idCate"
                                            aria-label="ttg">
                                            <?= $showInputCateNews ?>
                                        </select>
                                        <label for="status">Trạng thái</label>
                                    </div>
                                    <div class="col-6 form-floating px-3 mb-5">
                                        <select name="status" class="form-select rounded rounded-5" id="status"
                                            aria-label="ttg">
                                            <option <?= matchSelected($status,1) ?> value="1">Hiện</option>
                                            <option <?= matchSelected($status,2) ?> value="2">Ẩn</option>
                                        </select>
                                        <label for="status">Trạng thái</label>
                                    </div>
                                    <div class="col-12 form-floating px-3 mb-5">
                                        <input name="titleNews" value="<?= $titleNews ?>" type="text"
                                            class="form-control rounded rounded-5" id="titleNews"
                                            placeholder="titleNews@example.com">
                                        <label for="titleNews">Tiêu đề</label>
                                    </div>
                                    <div class="col-12 px-3 mb-5">
                                        <textarea name="shortDecribe" class="form-control" placeholder="Leave a comment here"
                                            id="shortDecribe" style="height: 200px"><?= $shortDecribe ?></textarea>
                                    </div>
                                    <div class="col-12 px-3 mb-5">
                                        <textarea name="decribe" class="form-control" placeholder="Leave a comment here"
                                            id="decribe"><?= $decribe ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5 h2 fs-exact-18">Ảnh header</div>
                                    <div class="form-control">
                                        <div class="max-w-20x">
                                            <?php
                                            if(empty($oldImage)){ ?>
                                            <img src="<?=URL_IMAGE_NEWS?>image_default.jpg" id="image" class="w-100 h-auto" width="320" height="320" alt="image product" />
                                            <?php }else{ ?>
                                            <img src="<?=URL_IMAGE_NEWS.$oldImage?>" id="image" class="w-100 h-auto" width="320" height="320" alt="image product" />
                                            <div class="text-info text-center mt-2"><?=$oldImage?></div>
                                            <input hidden type="text" name="oldImage" value="<?=$oldImage?>">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="me-3 pe-2">
                                            <input type="file" id="imageFile" name="image" onchange="chooseFile(this)" class="form-control" accept="image/jpeg,image/png, image/gif" >
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            #demo API tạo link ảnh
                            if(1==2) { ?>
                            <div class="card w-100">
                                <div class="card-body p-5 pt-0">
                                    <div class="mb-5 h2 fs-exact-18">Tạo link ảnh</div>
                                    <?php
                                    $urlGalery = 'https://i.imgur.com/W6YzeDF.png';
                                    ?>
                                    <div class="my-2 d-flex align-items-center justify-content-between">
                                        <img width="40" id="<?=$idGalery?>" src="<?= $urlGalery ?>" alt="<?= $urlGalery ?>">
                                        <div class="text-muted"><?= $urlGalery ?></div>
                                        <span onclick="copyContent('<?= $urlGalery ?>')" class="btn btn-sm btn-outline-success">Copy</span>
                                    </div>
                                    <div class="mt-5 input-group d-flex align-items-center">
                                        <input type="file" id="imgGallery" name="image" onchange="chooseFileCustom(this,id)" class="form-control" accept="image/jpeg,image/png, image/gif" >
                                        <a href="<?=ACT_ADMIN?>news-add&AddGalery" class="btn btn-outline-primary">Thêm</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>