<div class="container wow fadeIn py-5">
    <nav class="mb-2" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-sa-simple">
            <li class="breadcrumb-item"><a href="<?= URL ?>">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?= ACT ?>thong-bao">Thông báo</a></li>
            <li class="breadcrumb-item">Đánh giá sản phẩm</li>
        </ol>
    </nav>
    <div class="row bg-primary deal p-0 py-lg-5 py-3 px-lg-3">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="h5 text-light">SẢN PHẨM</div>
            <div class="row p-0">
                <div class="col-6 col-md-6 col-lg-12">
                    <img class="w-100" src="<?=URL?>/uploads/product/<?=$getPRO['image']?>" alt="image product">
                </div>
                <div class="col-6 col-md-6 col-lg-12">
                    <div class="d-flex justify-content-lg-between justify-content-start text-light">
                        <div class="fw-bold me-2 mb-2">Tên: </div>
                        <div><?=$getPRO['name']?></div>
                    </div>
                    <div class="d-flex justify-content-lg-between justify-content-start text-light">
                        <div class="fw-bold me-2 mb-2">Giá: </div>
                        <div><?=number_format($getBD['price'])?> đ</div>
                    </div>
                    <div class="d-flex justify-content-lg-between justify-content-start text-light">
                        <div class="fw-bold me-2 mb-2">Số lượng: </div>
                        <div><?=$getBD['quantity']?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-8 mt-3 mt-lg-0">
            <div class="h5 text-light">PHIẾU ĐÁNH GIÁ</div> 
            <form method="post">
                <div class="form-floating my-3">
                    <textarea class="form-control" style="height:100px" id="mess" placeholder="input your message"><?=$message?></textarea>
                    <label for="mess">Nội dung đánh giá</label>
                </div>
                <div class="form-floating">
                    <select class="form-select text-warning" id="star" aria-label="Floating label select example">
                        <option class="text-warning fs-4" value="5">&#10025;&#10025;&#10025;&#10025;&#10025;</option>
                        <option class="text-warning fs-4" value="4">&#10025;&#10025;&#10025;&#10025;</option>
                        <option class="text-warning fs-4" value="3">&#10025;&#10025;&#10025;</option>
                        <option class="text-warning fs-4" value="2">&#10025;&#10025;</option>
                        <option class="text-warning fs-4" value="1">&#10025;</option>
                    </select>
                    <label for="star">Số sao đánh giá</label>
                </div>
                <div class="my-3">
                    <input type="file" class="form-control" id="file">
                    <label class="input-group-text position-relative" for="file">Tải ảnh lên</label>
                </div>
                <div class="d-flex justify-content-lg-start justify-content-center">
                <button type="submit" class="btn btn-sm btn-light">Gửi đánh giá</button>
                </div>
            </form>
        </div>
    </div>
</div>
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