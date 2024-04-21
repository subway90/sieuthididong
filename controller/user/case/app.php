<?php
if(isset($arrayURL[1]) && isset($arrayURL[2])) {
    if($arrayURL[2] == 'mode-light') $_SESSION['background'] = '';
    if($arrayURL[2] == 'mode-dark')  $_SESSION['background'] = 'style="background: #050314; color:#ffffff; opacity: 0.8"';
    header('Location:'.ACT.$arrayURL[1]);
}