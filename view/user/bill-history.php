<div class="container my-5 wow fadeIn">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sa-simple">
            <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
            <li class="breadcrumb-item">Lịch sử mua hàng</li>
        </ol>
    </nav>
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th class="text-start">STT</th>
                    <th class="text-center">Tổng</th>
                    <th class="text-center">Thanh toán</th>
                    <th class="text-center">Giao hàng</th>
                    <th class="text-center">Ngày tạo</th>
                    <th class="text-end">Trạng thái / Xem</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php
                if(count($listBill)==0){ ?>
                <tr>
                    <td colspan="7" class="text-center py-3">Bạn chưa có hóa đơn nào.</td>
                </tr>
                <?php }
                else{
                for ($i=0; $i < count($listBill); $i++) { extract($listBill[$i]) ?>
                <tr>
                    <th class="text-start"><?=$i+1?></th>
                    <td class="text-center"><?=number_format($total)?> đ</td>
                    <td class="text-center">
                        <?php
                        if($statusPay == 1) echo'<span class="badge border border-1 text-danger border-danger">Chưa</span>';
                        if($statusPay == 2) echo'<span class="badge border border-1 text-success border-success">Xong</span>';
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                        if($statusDelivery == 1) echo'<span class="badge border border-1 text-danger border-danger">Chưa</span>';
                        if($statusDelivery == 2) echo'<span class="badge border border-1 text-warning border-warning">Đang</span>';
                        if($statusDelivery == 3) echo'<span class="badge border border-1 text-success border-success">Xong</span>';
                        ?>
                    </td>
                    <td class="text-center"><?=formatTime($dateCreate,'DD/MM lúc hh:mm')?></td>
                    <td class="text-end">
                        <?php
                        if($status == 1) echo'<span class="badge border border-1 text-warning border-warning">Chưa xác nhận</span>';
                        if($status == 2) echo'<span class="badge border border-1 text-success border-success">Đã xác nhận</span>';
                        if($status == 3) echo'<span class="badge border border-1 text-danger border-danger">Đã hủy</span>';
                        if($status == 4) echo'<span class="badge border border-1 text-primary border-primary">Đã hoàn thành</span>';
                        ?>
                        <a href="<?=ACT?>lich-su-mua-hang/<?=$token?>" class="btn btn-sm border-1 btn-outline-success mt-2 mt-lg-0"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</div>