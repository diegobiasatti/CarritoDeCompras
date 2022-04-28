<?php
include '../controller/config.php';
$session_uid='';
$_SESSION['id_usuario']=''; 
$_sess = false;
if(empty($session_uid) && empty($_SESSION['id_usuario']))
{
	$url=BASE_URL;
	header("Location: $url");
}