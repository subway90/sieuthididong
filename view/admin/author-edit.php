<div id="top" class="sa-app__body">
<form action="<?=ACT_ADMIN?>author-edit&id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=ACT_ADMIN?>author">Quản lí tác giả</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Sửa tác giả</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Thêm tác giả</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=ACT_ADMIN?>author" class="btn btn-secondary me-3">Hủy</a>
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
                                                <h2 class="mb-0 fs-exact-18">Nhập thông tin tác giả</h2>
                                            </div>
                                            <div class="col-6 form-floating mb-2 p-0 px-3">
                                                <input name="name" value="<?=$name?>" type="text" class="form-control rounded rounded-5" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Tên tác giả</label>
                                            </div>
                                            <div class="col-6 form-floating mb-2 p-0 px-3">
                                                <select name="status" class="form-select rounded rounded-5" id="tacgia" aria-label="ttg">
                                                    <option <?php if($status == 1) echo'selected' ?> value="1">Hiện</option>
                                                    <option <?php if($status == 2) echo'selected' ?> value="2">Ẩn</option>
                                                </select>
                                                <label for="tacgia">Trạng thái</label>
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

