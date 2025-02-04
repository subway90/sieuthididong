<div id="top" class="sa-app__body">
    <form action="<?= ACT_ADMIN ?>series-add&<?=$subURL?>" method="post" enctype="multipart/form-data">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="<?= URL_ADMIN ?>">Quản lí</a></li>
                                    <li class="breadcrumb-item"><a href="<?= ACT_ADMIN ?>series">Series</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-auto d-flex"><a href="<?= ACT_ADMIN ?>series"
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
                                        <h2 class="mb-0 fs-exact-18">Nhập thông tin Series</h2>
                                    </div>
                                    <div class="col-6 form-floating px-3 mb-5">
                                        <input name="name" value="<?= $name ?>" type="text"
                                            class="form-control rounded rounded-5" id="floatingInput"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">Tên Series</label>
                                    </div>
                                    <div class="col-6 form-floating px-3 mb-5">
                                        <select name="status" class="form-select rounded rounded-5" id="status"
                                            aria-label="ttg">
                                            <option <?php if($status == 1) echo'selected'?> value="1">Hiện</option>
                                            <option <?php if($status == 2) echo'selected'?> value="2">Ẩn</option>
                                        </select>
                                        <label for="status">Trạng thái</label>
                                    </div>
                                    <div class="col-4 form-floating px-3 mb-5">
                                        <select name="idType" class="form-select rounded rounded-5" id="idType"
                                            aria-label="ttg">
                                            <?= $showInputType ?>
                                        </select>
                                        <label for="idType">Loại</label>
                                    </div>
                                    <div class="col-4 form-floating px-3 mb-5">
                                        <select name="idBrand" class="form-select rounded rounded-5" id="idBrand"
                                            aria-label="ttg">
                                            <?= $showInputBrand ?>
                                        </select>
                                        <label for="idBrand">Thương hiệu</label>
                                    </div>
                                    <div class="col-4 form-floating px-3 mb-5">
                                        <select name="idStyle" class="form-select rounded rounded-5" id="idStyle"
                                            aria-label="ttg">
                                            <?= $showInputStyle ?>
                                        </select>
                                        <label for="idStyle">Phong cách</label>
                                    </div>
                                    <div class="col-12 form-floating  px-3 mb-5">
                                        <textarea name="decribe" class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px"><?= $decribe ?></textarea>
                                        <label for="floatingTextarea2">Mô tả</label>
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