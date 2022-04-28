<?php 
require_once  '../controller/productosController.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: appliction/json');

$nombre = (isset($_GET['nombre']))?$_GET['nombre']:'';
$nro =  (isset($_GET['nro']))?$_GET['nro']:'';
$id_cliente =  (isset($_GET['id_cliente']))?$_GET['id_cliente']:'';

$id =  (isset($_GET['id']))?$_GET['id']:'';
$precio =  (isset($_GET['precio']))?$_GET['precio']:'';
$nombre_producto =  (isset($_GET['nombre_producto']))?$_GET['nombre_producto']:'';
$descripcion =  (isset($_GET['descripcion']))?$_GET['descripcion']:'';



$productos = new productosController();

switch ($nro) {
	case 1:
		$getProds = $productos->getProductos($id_cliente);
		echo json_encode($getProds);
		break;
	case 2:
		$delProd = $productos->deleteProducto( $id);
		echo json_encode($delProd);
		break;
	case 3:
		$updProd = $productos->updateProducto($id,$precio);
		echo json_encode($updProd);
		break;
	case 4:
		$updProd = $productos->getProductosPorUltimoIngresado($id_cliente);
		echo json_encode($updProd);
		break;
	case 5:
		$updProd = $productos->updateNombreProducto($id, $nombre_producto, $descripcion);
		echo json_encode($updProd);
		break;
	case 6:
		$cantidad = $productos->getCantidadProductos($id_cliente);
		echo json_encode($cantidad);
		break;

	
	default:
		
		break;
}

?>