<?php 
require_once  '../controller/productosController.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: appliction/json');

$objDatos = json_decode(file_get_contents("php://input"));


$id_cliente = isset($objDatos->id_cliente) ? $objDatos->id_cliente : "";
$localidad = isset($objDatos->localidad) ? $objDatos->localidad : "";
$nombre = isset($objDatos->nombre) ? $objDatos->nombre : "";
$direccion = isset($objDatos->direccion) ? $objDatos->direccion : "";
$pedido = isset($objDatos->pedido) ? $objDatos->pedido : "";
$observaciones = isset($objDatos->observaciones) ? $objDatos->observaciones : "";
$monto = isset($objDatos->monto) ? $objDatos->monto : "";
$nro = isset($objDatos->nro) ? $objDatos->nro : "";

$productos = new productosController();

switch ($nro) {
	case 1:
		$getProds = $productos->insertPedido($id_cliente, $localidad, $nombre, $direccion, $pedido, $observaciones, $monto);
		echo json_encode($getProds);
		break;
	case 2:
		$getProds = $productos->getPedidos();
		echo json_encode($getProds);
		break;
	
	
	default:
		
		break;
}

?>