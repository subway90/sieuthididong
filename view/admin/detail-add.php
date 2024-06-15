<div id="top" class="sa-app__body">
<form action="<?=ACT_ADMIN?>detail-add<?=$subURL?>" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=ACT_ADMIN?>detail">Quản lí sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=ACT_ADMIN?>detail" class="btn btn-secondary me-3">Hủy</a>
                                <button name="submit" class="btn btn-success" type="submit" >Lưu</button></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="fw-bold mb-3">Chọn Series & Phiên bản</div>
                                            <?= $showInputSeriesModel ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card">
                                        <div class="card-body p-5 row">
                                            <div class="col-12 mb-3 h2 fs-exact-18">Nhập thông tin chi tiết</div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <input name="color" value="<?=$color?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Tên màu</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <select name="status" class="form-select rounded rounded-5" id="status" aria-label="ttg">
                                                    <option <?=matchSelected($status,1)?> value="1">Hiện</option>
                                                    <option <?=matchSelected($status,2)?> value="2">Ẩn</option>
                                                </select>
                                                <label for="status">Trạng thái</label>
                                            </div>
                                            <div class="col-12 form-floating p-0 px-3">
                                                <textarea name="decribe" class="form-control rounded rounded-5" placeholder="Nhập mô tả sản phẩm" id="mota"><?=$decribe?></textarea>
                                                <label for="mota">Mô tả chi tiết</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5 row">
                                            <div class="col-12 h2 mb-3 fs-exact-18">Kho hàng</div>
                                            <div class="col-12 form-floating p-0 px-3">
                                                <input name="quantity" value="<?=$quantity?>" type="number" class="form-control rounded rounded-5" id="quantity" placeholder="name@example.com">
                                                <label for="quantity">Số lượng</label>
                                                <div class="mt-2 small text-info">min = 1, max = <?= number_format(MAX_QUANTITY_PRODUCT)?></div>
                                            </div>
                                            <div class="col-12 form-floating p-0 px-3">
                                                <input name="price" value="<?=$price?>" type="number" class="form-control rounded rounded-5" id="price" placeholder="name@example.com">
                                                <label for="price">Giá gốc</label>
                                                <div class="mt-2 small text-info">min = 1 vnđ, max <?= number_format(MAX_PRICE_PRODUCT)?> vnđ</div>
                                            </div>
                                            <div class="col-12 form-floating p-0 px-3">
                                                <input name="priceSale" value="<?=$priceSale?>" type="number" class="form-control rounded rounded-5" id="priceSale" placeholder="name@example.com">
                                                <label for="priceSale">Giá sale</label>
                                                <div class="mt-2 small text-info">giá Sale = giá Gốc (hoặc để trống) là không sale</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5 h2 fs-exact-18">Ảnh sản phẩm</div>
                                            <div class="form-control">
                                                <div class="max-w-20x">
                                                    <?php
                                                    if(empty($hinhcu)){ ?>
                                                    <img src="<?=URL_IMAGE_PRODUCT?>image_default.jpg" id="image" class="w-100 h-auto" width="320" height="320" alt="image product" />
                                                    <?php }else{ ?>
                                                    <img src="<?=URL?>/uploads/product/<?=$hinhcu?>" id="image" class="w-100 h-auto" width="320" height="320" alt="image product" />
                                                    <div class="text-info text-center mt-2"><?=$hinhcu?></div>
                                                    <input hidden type="text" name="hinhcu" value="<?=$hinhcu?>">
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
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</form>