<div class="container py-5 my-5">
    <div class="h1 text-danger">TEST AREA</div>
    <div><span class="fw-bold">Your IP : </span><?= getIPUser() ?></div>
    <div><span class="fw-bold">Time : </span><span id="current-time"></span></div>
    <hr class="border border-danger">

    <?php
    #KHU VỰC CODE TEST
    if ($verify == true) {
        ?>
        <div class="row">
            <div class="col-4">
                <form action="" method="get" class="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="message" placeholder="name@example.com">
                        <label for="message">Nhập bình luận</label>
                    </div>
                    <button class="btn btn-primary" type="submit" name="message">Gửi</button>
                </form>
            </div>
        </div>


        <?php
        #NHẬP MẬT KHẨU
    } else { ?>
        <div class="w-50 m-auto">
            <form class="input-group" action="" method="post">
                <input type="password" name="password" class="form-control border-danger"
                    placeholder="Nhập mật khẩu khu vực TEST">
                <button type="submit" class="btn btn-sm btn-danger">OK</button>
            </form>
            <div class="text-danger small">Gợi ý: HT79@@</div>
        </div>
    <?php }
    ?>
</div>
<script src="<?= URL ?>publics/js/custom_timenow.js"></script>