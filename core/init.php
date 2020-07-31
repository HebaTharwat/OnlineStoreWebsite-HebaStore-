<?php
$db=mysqli_connect('localhost','root','','heba');
if(mysqli_connect_error()){
	echo 'Database Connection Failed with following errors: ' . mysqli_connect_error();
	}
require_once $_SERVER['DOCUMENT_ROOT'].'/final/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/final/helpers/helpers.php';

require_once BASEURL.'helpers/helpers.php';
?>
