<?php
require_once '../../config/APP.php';
$fb = new Facebook\Facebook([
    'app_id' => FB_ID_APP_KEY,
    'app_secret' => FB_SECRET_KEY,
    'default_graph_version' => FB_VERS_GRAPH,
]);