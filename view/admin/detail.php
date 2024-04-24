<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lí sản phẩm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex"><a href="<?=ACT_ADMIN?>detail-add" class="btn btn-info btn-gradient">Thêm sản phẩm</a></div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Nhập thông tin tìm kiếm"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="w-min">STT</th>
                            <th class="min-w-20x">Tên sản phẩm</th>
                            <th>Phiên bản</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th>Giá gốc</th>
                            <th>Giá sale</th>
                            <th>Ngày tạo</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0; $i < count($listProduct); $i++) {
                        extract($listProduct[$i]);
                    ?>
                        <tr>
                            <td><?=$i+1?></td>
                            <td>
                                <div class="d-flex align-items-center"><a href="#"
                                        class="me-4">
                                        <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                            <img src="<?=URL_IMGER_PRODUCT.$image?>" class="" alt="<?=$image?>" />
                                        </div>
                                    </a>
                                    <div><a href="<?=URL?>chi-tiet/<?=$slug?>" class="text-reset"><?=$name?></a>
                                        <div class="text-muted mt-n1"><?= $color ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-nowrap"><?= $model ?></td>
                            <td>
                                <div class="badge badge-sa-<?= bgNumber($quantity) ?>"><?=$quantity?></div>
                            </td>
                            <td>
                            <?php
                            if($status==1) echo '<div class="badge badge-sa-success">Đang hiện</div>';
                            else echo '<div class="badge badge-sa-info">Đang ẩn</div>';
                            ?>
                            </td>
                            <td>
                                <div class="sa-price"><?= number_format($price) ?></div>
                            </td>
                            <td>
                                <div class="sa-price"><?= number_format($priceSale) ?></div>
                            </td>
                            <td><div class="badge badge-sa-info"><?= $dateCreate ?></div></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                        <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="customer-context-menu-0">
                                        <li><a class="dropdown-item" href="<?=ACT_ADMIN?>detail-edit&id=<?=$id?>">Chỉnh sửa</a></li>
                                        <li><hr class="dropdown-divider"/></li>
                                        <?php
                                        if($status == 1){ ?>
                                        <li><a class="dropdown-item text-danger" href="<?=ACT_ADMIN?>detail&delete=2&id=<?=$id?>">Ẩn sản phẩm</a></li>
                                        <?php }else{ ?>
                                        <li><a class="dropdown-item text-success" href="<?=ACT_ADMIN?>detail&delete=1&id=<?=$id?>">Hiện sản phẩm</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            