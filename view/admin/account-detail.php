<div id="top" class="sa-app__body">
<form action="<?=ACT_ADMIN?>account<?=$subURL?>" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=ACT_ADMIN?>account">Quản lí tài khoản</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết tài khoản</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=ACT_ADMIN?>account" class="btn btn-secondary me-3">Hủy</a>
                                <button name="submit" class="btn btn-success" type="submit" >Lưu</button></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card w-100">
                                        
                                        <div class="card-body p-5">
                                            <div class="col-12 pb-3 mx-3">
                                                <small>Ngày tạo:</small> <span class="badge badge-sa-info"><?= formatTime($dateCreate,'hh:mm:ss DD/MM/YYYY') ?></span>
                                                <small>Loại:</small> <?= $showType ?>
                                                <small>Phân quyền:</small> <?= $showRole ?>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <input name="user" value="<?=$user?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Username</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <input name="fullName" value="<?=$fullName?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Họ và tên</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <input name="phone" value="<?=$phone?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Số điện thoại</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <input name="address" value="<?=$address?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Địa chỉ</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <input name="email" value="<?=$email?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Email</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <select name="status" class="form-select" id="status" aria-label="Floating label select example">
                                                    <option <?= matchSelected($status,1) ?> value="1">Tài khoản hoạt động</option>
                                                    <option <?= matchSelected($status,2) ?>value="2">Cấm tài khoản</option>
                                                </select>
                                                <label for="status">Trạng thái</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3 px-3">
                                                <select name="role" class="form-select" id="role" aria-label="Floating label select example">
                                                    <option <?= matchSelected($status,2) ?>value="2">Thành viên</option>
                                                    <option <?= matchSelected($status,3) ?>value="3">Quản lí</option>
                                                </select>
                                                <label for="role">Phân quyền</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5 h2 fs-exact-18">Ảnh đại diện</div>
                                            <div class="form-control">
                                                <div class="max-w-20x">
                                                    <?php
                                                    if(empty($imageOld)){ ?>
                                                    <img src="<?= pathImage('user_default.jpg') ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="<?=$imageOld?>" />
                                                    <?php }else{ ?>
                                                    <img src="<?= pathImage($imageOld) ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="<?=$imageOld?>" />
                                                    <div class="text-info text-center mt-2"><?=$imageOld?></div>
                                                    <input hidden type="text" name="imageOld" value="<?=$imageOld?>">
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