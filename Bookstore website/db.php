<?php
session_start();
$con=mysqli_connect("localhost","root","","bookstore");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'//Book-Store-Demo/');
define('SITE_PATH','http://localhost/Book-Store-Demo//');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'assets/images/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'assets/images/');
?>














