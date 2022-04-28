<?php

require_once 'conexion.php';

class categoriasController{
	
	private  $conexion;

	public function __construct()
	{
		$this->conexion = Conexion::conectar();
	}

	public function getCategorias($id_cliente){
		$query = "SELECT * FROM categorias where id_cliente = $id_cliente ";
		$caegorias = $this->conexion->prepare($query);
		$caegorias->execute();
		$cat = $caegorias->fetchAll();
		return $cat;
	
	}

	public function deleteAdministrador($id){
		$query = "DELETE FROM administradores WHERE id=:id ";
		$getBancos = $this->conexion->prepare($query);
		$getBancos->bindParam(":id", $id, PDO::PARAM_INT);
		
		if( $getBancos->execute() ){
			return true;
		}
		else
			return  false;
	}



////////////////////////////////////   Productos   /////////////////////

	public function altaProducto($id_cliente 	,$id_categoria 	,$nombre_producto 	,$precio 	,$precio_promocion 	,$imagen){
		
		$query = "INSERT INTO "
		        . "productos(id_cliente, id_categoria, nombre_producto, precio, precio_promocion, imagen) "
		        . "VALUES (:id_cliente,  :id_categoria, :nombre_producto, :precio, :precio_promocion, :imagen)";
		$insert = $this->conexion->prepare($query);
		$insert->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
		$insert->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);
		$insert->bindParam(":nombre_producto", $nombre_producto, PDO::PARAM_STR);
		$insert->bindParam(":precio", $precio, PDO::PARAM_INT);
		$insert->bindParam(":precio_promocion", $precio_promocion, PDO::PARAM_INT);
		$insert->bindParam(":imagen", $imagen, PDO::PARAM_STR);
		
		if( $insert->execute() ){
			return true;
		}
		else
			return  false;

	}

	
	public function updateEdificio($id,$nombre ,$domicilio  ,$id_localidad, $id_administrador, $cantidad_ascensores,$id_tipo_equipo, $cantidad_paradas,  $id_estado){
		$query = "UPDATE edificios SET "
				. "nombre=:nombre , domicilio=:domicilio, id_localidad=:id_localidad, id_administrador=:id_administrador, cantidad_ascensores=:cantidad_ascensores, id_tipo_equipo=:id_tipo_equipo,  cantidad_paradas=:cantidad_paradas, id_estado=:id_estado WHERE id=:id";
			$upd = $this->conexion->prepare($query);
			$upd->bindParam(":id", $id, PDO::PARAM_INT);
			$upd->bindParam(":nombre", $nombre, PDO::PARAM_STR);
			$upd->bindParam(":domicilio", $domicilio, PDO::PARAM_STR);
			$upd->bindParam(":id_localidad", $id_localidad, PDO::PARAM_INT);
			$upd->bindParam(":id_administrador", $id_administrador, PDO::PARAM_INT);
			$upd->bindParam(":cantidad_ascensores", $cantidad_ascensores, PDO::PARAM_INT);
			$upd->bindParam(":id_tipo_equipo", $id_tipo_equipo, PDO::PARAM_INT);
			$upd->bindParam(":cantidad_paradas", $cantidad_paradas, PDO::PARAM_INT);
			$upd->bindParam(":id_estado", $id_estado, PDO::PARAM_INT);
			
			if( $upd->execute() ){
			return true;
			}
			else
				return  false;
		}

/////////////////////fin edificios///////////
}