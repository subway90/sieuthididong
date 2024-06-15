<div class="container py-5 my-5">
    <div class="h1 text-danger">TEST AREA</div>
    <div><span class="fw-bold">Your IP  : </span><?= getIPUser() ?></div>
    <div><span class="fw-bold">Time : </span><span id="current-time"></span></div>
    <hr class="border border-danger">

<?php
#KHU VỰC CODE TEST
if($verify == true){
?>


<?php
    function checkPassHash($input,$hash){
        $pass_verify = $hash;
        $enteredPassword = $input;
        if (password_verify($enteredPassword, $pass_verify)) return 1;
        else return 0;
    }

    // $password = 'T123456';
    // $hash = password_hash($password, PASSWORD_DEFAULT); 
    // echo $hash;
    // echo '<br>';
    // echo 'kết quả đăng nhập (bool): '.checkPassHash('T1234563',$hash);
    


#NHẬP MẬT KHẨU
}else{?>
    <div class="w-50 m-auto">
        <form class="input-group" action="" method="post">
            <input type="password" name="password" class="form-control border-danger" placeholder="Nhập mật khẩu khu vực TEST">
            <button type="submit" class="btn btn-sm btn-danger">OK</button>
        </form>
        <div class="text-danger small">Gợi ý: HT79@@</div>
    </div>
<?php }?>
</div>
