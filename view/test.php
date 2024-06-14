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
    for ($i=0; $i < 10; $i++) { 
        $price = mt_rand(12500000,37500000);
        $percent = mt_rand(0,20);
        echo number_format($price).' đ - KM còn : '.number_format(round($price*((100- $percent)/100))).' đ ('.$percent.'%)<br>';
    }
    function checkPassHash($input,$hash){
        $pass_verify = $hash;
        $enteredPassword = $input;
        if (password_verify($enteredPassword, $pass_verify)) return 1;
        else return 2;
    }

    $password = 'HieuTest79@@';
    $hash = password_hash($password, PASSWORD_DEFAULT); 
    echo $hash;
    echo '<br>'.checkPassHash('T1234563',$hash);
    echo '<br>';
    echo formatTime('2024-05-31 12:24:38','MM/DD lúc hh:mm');


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
