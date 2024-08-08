<?php
session_start();
$con=mysqli_connect("localhost","root","","golf");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/golf/');
define('SITE_PATH','http://localhost/golf/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/image/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/image/');
?>