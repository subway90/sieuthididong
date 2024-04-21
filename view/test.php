<div class="container py-5 my-5">
    <div class="h1 text-danger">TEST AREA</div>
    <hr class="border border-danger">
<?php
#KHU VỰC CODE TEST
if($verify == true){
?>



<?php

var_dump(strstr($_SESSION['user']['image'],'http'));
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
