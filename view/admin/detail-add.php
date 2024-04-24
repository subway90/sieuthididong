<div id="top" class="sa-app__body">
<form action="<?=ACT_ADMIN?>product-add&add" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=ACT_ADMIN?>product">Quản lí sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Thêm sản phẩm</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=ACT_ADMIN?>product" class="btn btn-secondary me-3">Hủy</a>
                                <button class="btn btn-success" type="submit" >Lưu</button></div>
                            </div>
                            <div class="mt-5">
                               <?php
                               for ($i=1; $i < count($arr_error); $i++) { 
                                ?>
                                <div class="text-danger">
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    <?php print_r($arr_error[$i])?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5 row">
                                            <div class="col-12 mb-5">
                                                <h2 class="mb-0 fs-exact-18">Nhập thông tin sản phẩm</h2>
                                            </div>
                                            <div class="col-6 form-floating mb-2 p-0 px-3">
                                                <input name="tensp" value="<?=$tensp?>" type="text" class="form-control rounded rounded-5" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Tên sách</label>
                                            </div>
                                            <div class="col-6 form-floating mb-2 p-0 px-3">
                                                <select name="idtg" class="form-select rounded rounded-5" id="tacgia" aria-label="ttg">
                                                    <?php
                                                    $select = getAll('author',1);
                                                    for ($i=0; $i < count($select); $i++) {
                                                    extract($select[$i])
                                                    ?>
                                                    <option <?php if($idtg == $id) echo'selected' ?>  value="<?=$id?>"><?=$name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="tacgia">Tên tác giả</label>
                                                <div class="mt-2">
                                                    <a href="<?=ACT_ADMIN?>author-add" class="me-3 pe-2">&rarr; Thêm tác giả mới</a>
                                                </div>
                                            </div>
                                            <div class="col-6 form-floating mb-2 p-0 px-3">
                                                <input name="ngayxuatban" type="date" value="<?=$ngayxuatban?>" class="form-control rounded rounded-5" id="nxb" placeholder="name@example.com">
                                                <label for="nxb">Ngày xuất bản</label>
                                                <div class="mt-2 small text-info">Tháng / ngày / năm</div>
                                            </div>
                                            <div class="col-6 form-floating mb-2 p-0 px-3">
                                                <select name="idnxb" class="form-select rounded rounded-5" id="nhaxb" aria-label="nxb">
                                                    <?php
                                                    $select = getAll('publishing',1);
                                                    for ($i=0; $i < count($select); $i++) {
                                                    extract($select[$i])
                                                    ?>
                                                    <option <?php if($idnxb == $id) echo'selected' ?> value="<?=$id?>"><?=$name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="nhaxb">Nhà xuất bản</label>
                                                <div class="mt-2">
                                                    <a href="<?=ACT_ADMIN?>publishing-add" class="me-3 pe-2">&rarr; Thêm NXB mới</a>
                                                </div>
                                            </div>
                                            <div class="col-12 form-floating p-0 px-3">
                                                <textarea name="motasp" class="form-control rounded rounded-5" placeholder="Nhập mô tả sản phẩm" id="mota"><?=$motasp?></textarea>
                                                <label for="mota">Mô tả sách</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5 row">
                                            <div class="col-12 mb-5">
                                                <h2 class="mb-0 fs-exact-18">Kho hàng</h2>
                                            </div>
                                            <div class="col-4 form-floating p-0 px-3">
                                                <input name="soluong" value="<?=$soluong?>" type="number" min="1" max="999" class="form-control rounded rounded-5" id="soluong" placeholder="name@example.com">
                                                <label for="soluong">Số lượng</label>
                                                <div class="mt-2 small text-info">min = 1, max = 999</div>
                                            </div>
                                            <div class="col-4 form-floating p-0 px-3">
                                                <input name="giasp" value="<?=$giasp?>" type="number" min="1000" class="form-control rounded rounded-5" id="giagoc" placeholder="name@example.com">
                                                <label for="giagoc">Giá gốc</label>
                                                <div class="mt-2 small text-info">min = 1000 vnđ</div>
                                            </div>
                                            <div class="col-4 form-floating p-0 px-3">
                                                <input name="giasale" value="<?=$giasale?>" type="number" class="form-control rounded rounded-5" id="giasale" placeholder="name@example.com">
                                                <label for="giasale">Giá sale</label>
                                                <div class="mt-2 small text-info">để trống hoặc = 0 là không sale</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <h2 class="mb-5 fs-exact-18">Hiển thị</h2>
                                            <div class="form-floating px-3">
                                                <select name="idCategory" class="form-select rounded rounded-5" id="danhmuc" aria-label="nxb">
                                                    <?php
                                                    $select = getAll('category',1);
                                                    for ($i=0; $i < count($select); $i++) {
                                                    extract($select[$i])
                                                    ?>
                                                    <option <?php if($idCategory == $id) echo'selected' ?> value="<?=$id?>"><?=$name?></option>
                                                    <?php } ?>
                                                </select>
                                                <label for="danhmuc">Danh mục</label>
                                                <div class="mt-2">
                                                    <a href="<?=ACT_ADMIN?>category-add" class="me-3 pe-2">&rarr; Thêm danh mục mới</a>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Ảnh sản phẩm</h2>
                                            </div>
                                                <div class="form-control ">
                                                    <div class="max-w-20x">
                                                        <?php
                                                        if(empty($filename)){ ?>
                                                        <img src="<?=URL?>/uploads/system/image_default.jpg" id="image" class="w-100 h-auto" width="320" height="320" alt="image product" />
                                                        <?php }else{ ?>
                                                        <img src="<?=URL?>/uploads/product/<?=$filename?>" id="image" class="w-100 h-auto" width="320" height="320" alt="image product" />
                                                        <div class="text-info text-center mt-2"><?=$hinhcu?></div>
                                                        <input hidden type="text" name="hinhcu" value="<?=$filename?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <a href="#" class="me-3 pe-2">
                                                            <input type="file" id="imageFile" name="hinhsp" onchange="chooseFile(this)" class="form-control"
                                                            accept="image/jpeg, image/png, image/gif" >

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
<script>
    function chooseFile(fileInput)
    {
        if(fileInput.files && fileInput.files[0])
        {
            var reader = new FileReader();
            reader.onload =function (e)
                                        {
                                            $('#image').attr('src',e.target.result);
                                        }
                                        reader.readAsDataURL(fileInput.files[0])
        }
    }
</script>

