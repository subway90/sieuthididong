<?php
require_once 'Facebook/autoload.php';
require_once 'fbconfig.php';

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl(URL_CALL_BACK, $permissions);