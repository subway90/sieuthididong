 <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Quản lí Series</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Quản lí Series</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=ACT_ADMIN?>series-add" class="btn btn-info btn-gradient">Thêm Series</a></div>
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
                                        <th class="w-min">ID</th>
                                        <th class="min-w-20x">Tên Series</th>
                                        <th class="min-w-5x">Type</th>
                                        <th class="min-w-5x">Brand</th>
                                        <th class="min-w-5x">Style</th>
                                        <th class="min-w-5x">Trạng thái</th>
                                        <th class="min-w-10x">Ngày cập nhật</th>
                                        <th class="w-min" data-orderable="false"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                for ($i=0; $i < count($listSeries); $i++) {
                                    extract($listSeries[$i]);
                                ?>
                                    <tr>
                                        <td><?=$id?></td>
                                        <td class="text-nowrap"> 
                                            <?= $name ?> 
                                            <div>
                                                <span class="fw-bold"> Slug: </span> 
                                                <a href="<?=URL?>chi-tiet/<?=$slug?>" class="small text-muted"><?= $slug ?></a>
                                            </div> 
                                        </td>
                                        <td> <?= getOneFieldByCustom('product_type','name','id ='.$idType)['name'] ?> </td>
                                        <td> <?= getOneFieldByCustom('product_brands','name','id ='.$idBrand)['name'] ?> </td>
                                        <td> <?= getOneFieldByCustom('product_style','name','id ='.$idStyle)['name'] ?> </td>
                                        <td>
                                        <?php
                                        if($status==1) echo '<div class="badge badge-sa-success">Đang hiện</div>';
                                        else echo '<div class="badge badge-sa-info">Đang ẩn</div>';
                                        ?>
                                        </td>
                                        <td>
                                            <div class="badge badge-sa-primary"><?=$dateCreate?></div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                    <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"></path>
                                                    </svg>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="customer-context-menu-0">
                                                    <li><a class="dropdown-item text-warning" href="<?=ACT_ADMIN?>series-add&edit=<?=$id?>">Chỉnh sửa</a></li>
                                                    <li><hr class="dropdown-divider"/></li>
                                                    <?php
                                                    if($status == 1){ ?>
                                                    <li><a class="dropdown-item text-danger" href="<?=ACT_ADMIN?>series&delete=2&id=<?=$id?>">Ẩn Series</a></li>
                                                    <?php }else{ ?>
                                                    <li><a class="dropdown-item text-success" href="<?=ACT_ADMIN?>series&delete=1&id=<?=$id?>">Hiện Series</a></li>
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

            