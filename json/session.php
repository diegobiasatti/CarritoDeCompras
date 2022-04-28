<?php 

header('Access-Control-Allow-Origin: *');
header('Content-Type: appliction/json');
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}
 if(empty($_SESSION['id_usuario']))
    {
    	$estadoSession = false;
    	echo json_encode($estadoSession);
    }
    else
    {
    $estadoSession = true;
    	echo json_encode($estadoSession);
    }
 


?>