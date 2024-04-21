<?php
include "../../view/admin/header.php";
//ẨN HIỆN
if(isset($_GET['delete']) && !empty($_GET['delete']) && isset($_GET['id']) && !empty($_GET['id'])) updateStatusById('author',$_GET['id'],$_GET['delete']);
include "../../view/admin/author.php";