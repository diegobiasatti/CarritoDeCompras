<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!empty($_SESSION['id_usuario']))
{ 
	$session_uid=$_SESSION['id_usuario'];
	
//	$session_nombre = $_SESSION['nombre'];
}

if(empty($session_uid))
{
	//$url=BASE_URL. "admin";
	//header("Location: $url");
}

?>