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
                                <li class="breadcrumb-item active" aria-current="page">Quản lí hóa đơn</li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">Quản lí hóa đơn</h1>
                    </div>
                    <div class="col-auto d-flex"><a href="#" class="btn btn-info btn-gradient">In hóa đơn</a></div>
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
                            <th class="w-min">User</th>
                            <th class="min-w-15x">Thông tin <br> (Tên, SĐT, Địa chỉ)</th>
                            <th class="">Tổng tiền/ <br> Loại thanh toán</th>
                            <th class="min-w-10x">Ngày cập nhật/<br> Thanh toán</th>
                            <th class="min-w-10x">Ngày cập nhật/<br> Giao hàng</th>
                            <th> Ngày tạo đơn/<br> Trạng thái đơn</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0; $i < count($list); $i++) {
                        extract($list[$i]);
                    ?>
                        <tr>
                            <td>
                            <?php
                            if($idUser == 0) echo 'null';
                            else echo '<a class="nav-link" href="#">'.$idUser.'</a>';
                            ?>
                            </td>
                            <td>
                            <div class="d-flex align-items-center">
                                <div class="text-reset">
                                    <?=$fullName?>
                                    <div class="text-muted mt-n1"><?=$phone?></div>
                                    <div class="text-muted mt-n1"><?=$address?></div>
                                </div>
                            </div>
                            </td>
                            <td class="text-nowrap">
                                <?=number_format($total)?> đ
                            <?php
                            if($typePay == 1) echo '<br><div class="badge badge-sa-success">Tiền mặt COD</div>';
                            if($typePay == 2) echo '<br><div class="badge badge-sa-info">Ebanking</div>';
                            ?>
                            </td>
                            <td>
                            <div class="text-muted mt-2"><?=$datePay?></div>
                            <?php
                            if($statusPay == 1) echo '<div class="badge badge-sa-danger">Chưa thanh toán</div>';
                            if($statusPay == 2) echo '<div class="badge badge-sa-primary">Đã thanh toán</div>';
                            ?>
                            </td>
                            <td>
                            <div class="text-muted mt-2"><?=$dateDelivery?></div>
                            <?php
                            if($statusDelivery==1) echo '<div class="badge badge-sa-secondary">Chưa giao</div>';
                            if($statusDelivery==2) echo '<div class="badge badge-sa-warning">Đang giao</div>';
                            if($statusDelivery==3) echo '<div class="badge badge-sa-success">Đã giao</div>';
                            ?>
                            </td>
                            <td>
                            <div class="text-muted mt-2"><?=$dateCreate?></div>
                            <?php
                            if($status==1) echo '<div class="badge badge-sa-warning">Chưa xác nhận</div>';
                            if($status==2) echo '<div class="badge badge-sa-info">Đã xác nhận</div>';
                            if($status==3) echo '<div class="badge badge-sa-danger">Đã hủy</div>';
                            if($status==4) echo '<div class="badge badge-sa-success">Đã hoàn thành</div>';
                            ?>
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
                                        <li><a class="dropdown-item" href="<?=ACT_ADMIN?>bill-detail&token=<?=$token?>">Xem</a></li>
                                        <li><hr class="dropdown-divider"/></li>
                                        <li class="ms-3 text-muted">Trạng thái đơn hàng :</li>
                                        <?php 
                                        if($status !=1) echo'<li><a class="dropdown-item text-warning" href="'.ACT_ADMIN.'bill&edit=1&token='.$token.'&stt=1">&rarr; Chưa xác nhận</a></li>';
                                        if($status !=2) echo'<li><a class="dropdown-item text-info" href="'.ACT_ADMIN.'bill&edit=1&token='.$token.'&stt=2">&rarr; Đã xác nhận</a></li>';
                                        if($status !=3) echo'<li><a class="dropdown-item text-danger" href="'.ACT_ADMIN.'bill&edit=1&token='.$token.'&stt=3">&rarr; Hủy đơn</a></li>';
                                        if($status !=4) echo'<li><a class="dropdown-item text-success" href="'.ACT_ADMIN.'bill&edit=1&token='.$token.'&stt=4">&rarr; Đã hoàn thành</a></li>';
                                        ?>
                                        <li><hr class="dropdown-divider"/></li>
                                        <li class="ms-3 text-muted">Trạng thái giao hàng :</li>
                                        <?php 
                                        if($statusDelivery !=1) echo'<li><a class="dropdown-item text-dark" href="'.ACT_ADMIN.'bill&edit=2&token='.$token.'&stt=1">&rarr; Chưa giao</a></li>';
                                        if($statusDelivery !=2) echo'<li><a class="dropdown-item text-warning" href="'.ACT_ADMIN.'bill&edit=2&token='.$token.'&stt=2">&rarr; Đang giao</a></li>';
                                        if($statusDelivery !=3) echo'<li><a class="dropdown-item text-success" href="'.ACT_ADMIN.'bill&edit=2&token='.$token.'&stt=3">&rarr; Đã giao</a></li>';
                                        ?>
                                        <li><hr class="dropdown-divider"/></li>
                                        <li class="ms-3 text-muted">Trạng thái thanh toán :</li>
                                        <?php 
                                        if($statusPay !=1) echo'<li><a class="dropdown-item text-danger" href="'.ACT_ADMIN.'bill&edit=3&token='.$token.'&stt=1">&rarr; Chưa thanh toán</a></li>';
                                        if($statusPay !=3) echo'<li><a class="dropdown-item text-success" href="'.ACT_ADMIN.'bill&edit=3&token='.$token.'&stt=2">&rarr; Đã thanh toán</a></li>';
                                        ?>
                                        <?php
                                        if($status >= 4){
                                        echo '<li><hr class="dropdown-divider"/></li><li class="ms-3 text-muted">Trạng thái feedback :</li>';
                                        if($status != 4) echo'<li><a class="dropdown-item text-info" href="'.ACT_ADMIN.'bill&edit=4&idUser='.$idUser.'&token='.$token.'&stt=4">&rarr; Gửi lại</a></li>';
                                        if($status != 5) echo'<li><a class="dropdown-item text-warning" href="'.ACT_ADMIN.'bill&edit=4&idUser='.$idUser.'&token='.$token.'&stt=5">&rarr; Gửi feedback</a></li>';
                                        }
                                        ?>
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

            