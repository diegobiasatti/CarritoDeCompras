<?php

require_once 'conexion.php';

class productosController{
	
	private  $conexion;

	public function __construct()
	{
		$this->conexion = Conexion::conectar();
	}

	public function getProductos($id_cliente){
		$query = "SELECT *, productos.id as id_producto,productos.imagen as imagen, productos.imagen as imagen_original, categorias.nombre as nombre_categoria FROM productos 
		INNER JOIN categorias
		ON productos.id_categoria = categorias.id
		LEFT JOIN imagenes
        on productos.id = imagenes.id_producto
		WHERE productos.id_cliente = $id_cliente  order by productos.id DESC";
		$prod = $this->conexion->prepare($query);
		$prod->execute();
		$productos = $prod->fetchAll();
		return $productos;
	
	}
public function getProductosPorUltimoIngresado($id_cliente){
		$query = "SELECT *, productos.id as id_producto,productos.imagen as imagen, productos.imagen as imagen_original, categorias.nombre as nombre_categoria FROM productos 
		INNER JOIN categorias
		ON productos.id_categoria = categorias.id
		LEFT JOIN imagenes
        on productos.id = imagenes.id_producto
		
		WHERE productos.id_cliente = $id_cliente  order by productos.id DESC";
		$prod = $this->conexion->prepare($query);
		$prod->execute();
		$productos = $prod->fetchAll();
		return $productos;
	
	}

	public function deleteProducto( $id_producto){
		$query = "DELETE FROM productos WHERE id=:id_producto";
		$getBancos = $this->conexion->prepare($query);
		$getBancos->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
		
		if( $getBancos->execute() ){
			return true;
		}
		else
			return  false;
	}



////////////////////////////////////   Productos   /////////////////////

	public function altaProducto($id_cliente 	,$id_categoria 	,$nombre_producto 	,$precio 	,$precio_promocion 	,$imagen, $descripcion){
		
		$query = "INSERT INTO "
		        . "productos(id_cliente, id_categoria, nombre_producto, precio, precio_promocion, imagen, descripcion) "
		        . "VALUES (:id_cliente,  :id_categoria, :nombre_producto, :precio, :precio_promocion, :imagen, :descripcion)";
		$insert = $this->conexion->prepare($query);
		$insert->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
		$insert->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);
		$insert->bindParam(":nombre_producto", $nombre_producto, PDO::PARAM_STR);
		$insert->bindParam(":precio", $precio, PDO::PARAM_STR);
		$insert->bindParam(":precio_promocion", $precio_promocion, PDO::PARAM_STR);
		$insert->bindParam(":imagen", $imagen, PDO::PARAM_STR);
		$insert->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
		
		if( $insert->execute() ){
			return true;
		}
		else
			return  false;

	}
public function altaImagenSecundaria($idCliente, $foto1 	,$foto2 	,$foto3 	,$foto4){

		$rs = "SELECT MAX(id) AS lastID FROM productos WHERE id_cliente = $idCliente";
		$rs_ = $this->conexion->prepare($rs);
		$rs_->execute();
		$ID = $rs_->fetchAll();
		$lastID =  $ID[0]['lastID'];


		$query = "INSERT INTO "
		        . "imagenes(id_producto, foto1, foto2, foto3, foto4) "
		        . "VALUES (:id_producto,  :foto1, :foto2, :foto3, :foto4)";
		$insert = $this->conexion->prepare($query);
		$insert->bindParam(":id_producto", $lastID, PDO::PARAM_INT);
		$insert->bindParam(":foto1", $foto1, PDO::PARAM_STR);
		$insert->bindParam(":foto2", $foto2, PDO::PARAM_STR);
		$insert->bindParam(":foto3", $foto3, PDO::PARAM_STR);
		$insert->bindParam(":foto4", $foto4, PDO::PARAM_STR);
		
		if( $insert->execute() ){
			return true;
		}
		else
			return  false;

	}

public function updateImagenPrincipal($idProducto, $imagen ){
		$query = "UPDATE productos SET imagen=:imagen WHERE id=:idProducto";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
			$upd->bindParam(":imagen", $imagen, PDO::PARAM_STR); 
				
			if( $upd->execute() ){

			return true;
			}
			else
				return  false;
		}

	public function updateImagenSecundaria_1($idProducto, $foto1 ){
		$query = "UPDATE imagenes SET foto1=:foto1 WHERE id_producto=:idProducto";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
			$upd->bindParam(":foto1", $foto1, PDO::PARAM_STR); 
				
			if( $upd->execute() ){

			return true;
			}
			else
				return  false;
		}
	public function updateImagenSecundaria_2($idProducto, $foto2 ){
		$query = "UPDATE imagenes SET foto2=:foto2 WHERE id_producto=:idProducto";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
			$upd->bindParam(":foto2", $foto2, PDO::PARAM_STR); 
				
			if( $upd->execute() ){

			return true;
			}
			else
				return  false;
		}
	public function updateImagenSecundaria_3($idProducto, $foto3 ){
		$query = "UPDATE imagenes SET foto3=:foto3 WHERE id_producto=:idProducto";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
			$upd->bindParam(":foto3", $foto3, PDO::PARAM_STR); 
				
			if( $upd->execute() ){

			return true;
			}
			else
				return  false;
		}
	public function updateImagenSecundaria_4($idProducto, $foto4 ){
		$query = "UPDATE imagenes SET foto4=:foto4 WHERE id_producto=:idProducto";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
			$upd->bindParam(":foto4", $foto4, PDO::PARAM_STR); 
				
			if( $upd->execute() ){

			return true;
			}
			else
				return  false;
		}
	public function updateProducto($id,$precio){
		$query = "UPDATE productos SET "
				. "precio=:precio WHERE id=:id";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":id", $id, PDO::PARAM_INT);
			$upd->bindParam(":precio", $precio, PDO::PARAM_STR); //STR por q es decimal ;)
			
			if( $upd->execute() ){
			return true;
			}
			else
				return  false;
		}

		public function updateNombreProducto($id,$nombre_producto, $descripcion){
		$query = "UPDATE productos SET "
				. "nombre_producto=:nombre_producto, descripcion=:descripcion WHERE id=:id";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":id", $id, PDO::PARAM_INT);
			$upd->bindParam(":nombre_producto", $nombre_producto, PDO::PARAM_STR); 
			$upd->bindParam(":descripcion", $descripcion, PDO::PARAM_STR); 
			
			if( $upd->execute() ){
			return true;
			}
			else
				return  false;
		}

/////////////////////fin ///////////
///
public function insertPedido($id_cliente, $localidad, $nombre, $direccion, $pedido, $observaciones, $monto){
		
		$query = "INSERT INTO "
		        . "pedidos(id_cliente, localidad, nombre, direccion, pedido, observaciones, monto) "
		        . "VALUES (:id_cliente, :localidad, :nombre, :direccion, :pedido, :observaciones, :monto)";
		$insert = $this->conexion->prepare($query);
		$insert->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
		$insert->bindParam(":localidad", $localidad, PDO::PARAM_STR);
		$insert->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$insert->bindParam(":direccion", $direccion, PDO::PARAM_STR);
		$insert->bindParam(":pedido", $pedido, PDO::PARAM_STR);
		$insert->bindParam(":observaciones", $observaciones, PDO::PARAM_STR);
		$insert->bindParam(":monto", $monto, PDO::PARAM_STR);
		
		if( $insert->execute() ){
			return true;
		}
		else
			return  false;

	}

public function getPedidos(){
		$query = "SELECT * FROM pedidos	order by fecha DESC";
		$prod = $this->conexion->prepare($query);
		$prod->execute();
		$pedidos = $prod->fetchAll();
		return $pedidos;
	
	}

}