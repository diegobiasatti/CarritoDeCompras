<?php 
require_once  '../controller/categoriasController.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: appliction/json');

$nombre = (isset($_GET['nombre']))?$_GET['nombre']:'';
$nro =  (isset($_GET['nro']))?$_GET['nro']:'';
$id_cliente =  (isset($_GET['id_cliente']))?$_GET['id_cliente']:'';

$categorias = new categoriasController();

switch ($nro) {
	case 1:
		$getCategorias = $categorias->getCategorias($id_cliente);
		echo json_encode($getCategorias);
		break;
	case 2:
		$delBanco = $categorias->eliminarBanco($id);
		echo json_encode($delBanco);
		break;
	case 3:
		$updBanco = $categorias->updateBanco($nombre,$id);
		echo json_encode($updBanco);
		break;
	default:
		
		break;
}

?>