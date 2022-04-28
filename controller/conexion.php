<?php
error_reporting(0); // para que no se muestren posibles errores en pantalla.
require_once 'config.php';
class Conexion 
{

public function __construct(){
		
	}
	public static function conectar()
	{
		try
		{
		  $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . COMERCIOS, USER, PASS);	
		  $conexion->exec("set names utf8");

		  return $conexion;
		}
		catch (PDOException $ex){
			echo $ex->getMessage();
		}

	}
}