<?php

require_once 'conexion.php';

class usuarioController{
	
	private  $conexion;

	public function __construct()
	{
		$this->conexion = Conexion::conectar();
	}
	public function getCantidadProductos($id_cliente){
		$query =   "SELECT tipo_cliente.cantidad_productos
					FROM cliente 
					INNER JOIN tipo_cliente 
					on cliente.id_tipo_cliente = tipo_cliente.id
					WHERE cliente.id=:id_cliente"; 

		$stmt = $this->conexion->prepare($query);
		$stmt->bindValue("id_cliente", $id_cliente,PDO::PARAM_INT) ;
		$stmt->execute();
		$cantidad= $stmt->fetch();
		return  $cantidad;
	}


	public function userLogin($user,$password)
	{
	try{
		//$db = getDB();
		//$hash_password= hash('sha256', $password); //Password encryption 
		$hash_password= $password;
		$query =   "SELECT *
					FROM cliente 
					WHERE (user=:user ) 
					AND password=:hash_password"; 

		$stmt = $this->conexion->prepare($query);
		$stmt->bindValue("user", $user,PDO::PARAM_STR) ;
		$stmt->bindValue("hash_password", $hash_password,PDO::PARAM_STR) ;
		$stmt->execute();
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		//$db = null;
		if($count)
		{

			$_SESSION['id_usuario']=$data->id; // Storing user session value
			$_SESSION['privilegio']= $data->id_tipo_cliente;
			

			$_SESSION['nombre']= $data->persona_contacto;
			//$data->status=true;
			//echo "es" .$_SESSION['id_usuario'];
			//die();

			return true;
		}
		else
		{
			
			return false;
		} 
	}
	catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
	}

	}

	public function insertUsuario($nombre_usuario, $apellido_usuario, $email_usuario,$password_usuario, $privilegio)
	{
		$query = "INSERT INTO "
		        . "usuarios(nombre_usuario, apellido_usuario, email_usuario, password_usuario, privilegio) "
		        . "VALUES (:nombre_usuario, :apellido_usuario, :email_usuario, :hash_password, :privilegio)";
		$insert = $this->conexion->prepare($query);
		$insert->bindParam(":nombre_usuario", $nombre_usuario, PDO::PARAM_STR);
		$insert->bindParam(":apellido_usuario", $apellido_usuario, PDO::PARAM_STR);
		$insert->bindParam(":email_usuario", $email_usuario, PDO::PARAM_STR);
		$hash_password= hash('sha256', $password_usuario); //Password encryption
		$insert->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
		$insert->bindParam(":privilegio", $privilegio, PDO::PARAM_INT);
		
		if( $insert->execute() ){
			return true;
		}
		else
			return  false;
	}

	public function getUsuario($id)
	{
		$query= "SELECT nombre_usuario, apellido_usuario, privilegio , tipo_privilegio
				 FROM usuarios 
				 INNER JOIN privilegios 
				 ON usuarios.privilegio = privilegios.id_privilegio
				 WHERE id_usuario =:id";
		
		$getUsuario = $this->conexion->prepare($query);
		$getUsuario->bindParam("id", $id,PDO::PARAM_INT);
		$getUsuario->execute();
		$usuario= $getUsuario->fetch();
		return  $usuario;
		
	}

	public  function getPrivilegios()
	{
		$query = "SELECT id_privilegio, tipo_privilegio FROM privilegios";
		$getPrivilegios = $this->conexion->prepare($query);
		$getPrivilegios->execute();
		$privilegios = $getPrivilegios->fetchAll();
		return $privilegios;
	}


}