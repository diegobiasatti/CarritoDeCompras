<?php 


require_once  '../controller/usuarioController.php';

$user = (isset($_POST['user']))?$_POST['user']:'';
$password =  (isset($_POST['password']))?$_POST['password']:'';

$objDatos = json_decode(file_get_contents("php://input"));


$user= $objDatos->user;
$password= $objDatos->password;

$usuario = new usuarioController();
$usuarios = $usuario->userLogin($user,$password );


header('Access-Control-Allow-Origin: *');
header('Content-Type: appliction/json');
echo json_encode($usuarios);

?>