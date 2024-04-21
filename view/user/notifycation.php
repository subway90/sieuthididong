<div class="container my-5 wow fadeIn">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sa-simple">
            <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
            <li class="breadcrumb-item">Thông báo</li>
        </ol>
    </nav>
    <table class="table table-sm">
        <thead>
            <tr>
                <th class="text-start">STT</th>
                <th colspan="2" class="text-center">Chủ đề</th>
                <th class="text-start">Nội dung</th>
                <th class="text-center">Ngày</th>
                <th class="text-center">T.thái</th>
                <th class="text-end">Chọn</th>
            </tr>
        </thead>
        <tbody class="align-middle">
        <?php if($countNotify==0){ ?>
            <tr>
                <td colspan="7" class="text-center py-3">Bạn chưa có thông báo.</td>
            </tr>
        <?php }else{
                for ($i=0; $i < count($listFB); $i++) { 
                extract($listFB[$i]);?>
            <tr class='<?=colorTextRow($statusUser)?>'>
                <th class="text-start"><?=$i+1?></th>
                <td colspan="2" class="text-center">Đánh giá sản phẩm</td>
                <td class="text-start">Đánh giá sản phẩm '<?=$idBillDetail?>'. Đánh giá xong bạn sẽ nhận phần thưởng: <span class="text-danger">+10 điểm</span></td>
                <td class="text-center">
                    <?=$dateCreate?>
                </td>
                <td class="text-center">
                    <?php if($status==1) echo'<span class="btn btn-sm btn-outline-warning border-1">Chưa đánh giá</span>'?>
                    <?php if($status==2) echo'<span class="btn btn-sm btn-outline-secondary border-1">Đã đánh giá</span>'?>
                </td>
                <td class="text-end">
                    <a href="<?=ACT?>danh-gia/<?=$id?>/<?=$idUser?>" class="btn btn-sm btn-outline-<?=colorEyeActive($statusUser)?> border-1"><i class="fas fa-eye"></i></a>
                </td>
            </tr>
        <?php }}?>
        </tbody>
    </table>
</div>