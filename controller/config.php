<?php

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	date_default_timezone_set('UTC');
	date_default_timezone_set('America/Argentina/Buenos_Aires');

	
// Defino datos de conexion para cualquier caso
	define('HOST', 'localhost');
	/*
	define('USER', 'root');
	define('PASS', '');
	define('COMERCIOS', 'comercios');
	
	*/
	define('USER', 'xxxxxxxx');
	define('PASS', 'xxxxxxxx');
	define('COMERCIOS', 'xxxxxxxxxx');
	define('BASE_URL', 'http://balcubo.com.ar/dvs/');
	

 ?>