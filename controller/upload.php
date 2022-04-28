<?php
include_once('productosController.php');
$idCliente =11;
$mensaje = "";
$estado = 0;
$toast = 0;
$nombre_temp ="";
$err_msg = array(
    UPLOAD_ERR_OK => 'Archivo subido correctamente.',
    UPLOAD_ERR_INI_SIZE => 'El tamaño del archivo ha excedido el tamaño indicado en php.ini .',
    UPLOAD_ERR_FORM_SIZE => 'El tamaño del archivo ha excedido el tamaño máximo para este formulario.',
    UPLOAD_ERR_PARTIAL => 'El archivo ha sido subido parcialmente.',
    UPLOAD_ERR_NO_FILE => 'El archivo no existe.',
    UPLOAD_ERR_NO_TMP_DIR => 'El directorio temporal no existe.',
    UPLOAD_ERR_CANT_WRITE => 'No se puede escribir en el disco.',
    UPLOAD_ERR_EXTENSION => 'Error de extensión PHP.'
);
$tipos_permitidos = array('jpg', 'jpeg', 'png', 'JPG','JPEG', 'PNG', 'svg'); //modificar extensiones


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = (isset($_POST['_id_producto'])) ? trim($_POST['_id_producto']) : '';
    $nombre_categoria = (isset($_POST['nombre_categoria'])) ? trim($_POST['nombre_categoria']) : '';
    
    $url_foto =(isset($_FILES['file_upload']["name"])) ? trim($_FILES['file_upload']["name"]) : '';
    $url_foto1 =(isset($_FILES['file_upload_foto1']["name"])) ? trim($_FILES['file_upload_foto1']["name"]) : '';
    $url_foto2 =(isset($_FILES['file_upload_foto2']["name"])) ? trim($_FILES['file_upload_foto2']["name"]) : '';
    $url_foto3 =(isset($_FILES['file_upload_foto3']["name"])) ? trim($_FILES['file_upload_foto3']["name"]) : '';
    $url_foto4 =(isset($_FILES['file_upload_foto4']["name"])) ? trim($_FILES['file_upload_foto4']["name"]) : '';
      
    if ( (!empty($_POST['delete_prod_principal'])) )
    {
        $update = new productosController();
        $updateProducto = $update->updateImagenPrincipal($id, NULL );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}
    }
 if ( (!empty($_POST['delete_prod'])) )
    {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_1($id, NULL );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}
    }
if ( (!empty($_POST['delete_prod2'])) )
    {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_2($id, NULL );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}
    }
if ( (!empty($_POST['delete_prod3'])) )
    {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_3($id, NULL );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}
    }
if ( (!empty($_POST['delete_prod4'])) )
    {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_4($id, NULL );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}
    }

}


if ( (!empty($_POST['update_prod'])) )
{
    
    $id = (isset($_POST['_id_producto'])) ? trim($_POST['_id_producto']) : '';
    $nombre_categoria = (isset($_POST['nombre_categoria'])) ? trim($_POST['nombre_categoria']) : '';
    
    $url_foto =(isset($_FILES['file_upload']["name"])) ? trim($_FILES['file_upload']["name"]) : '';
    $url_foto1 =(isset($_FILES['file_upload_foto1']["name"])) ? trim($_FILES['file_upload_foto1']["name"]) : '';
    $url_foto2 =(isset($_FILES['file_upload_foto2']["name"])) ? trim($_FILES['file_upload_foto2']["name"]) : '';
    $url_foto3 =(isset($_FILES['file_upload_foto3']["name"])) ? trim($_FILES['file_upload_foto3']["name"]) : '';
    $url_foto4 =(isset($_FILES['file_upload_foto4']["name"])) ? trim($_FILES['file_upload_foto4']["name"]) : '';
  
 if(isset($url_foto) and !empty($url_foto)){
  
     $nombre_temp = $_FILES["file_upload"]["tmp_name"];
    $nuevo_nombre = $_FILES["file_upload"]["name"];
    $primer_caracter = strtoupper(substr($nuevo_nombre, 0, 1));
    //$destino = "../images/resultados_" . $primer_caracter . "-$fecha/" . basename($nuevo_nombre);
    $destino = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre);
    if (move_uploaded_file($nombre_temp, $destino)) {

        $update = new productosController();
        $updateProducto = $update->updateImagenPrincipal($id, $url_foto );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}

        $mime = explode(".", $nuevo_nombre);
        $count = count($mime);
        $count--;

        $a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
        if (!$a) {    exit();        }
    }
} 
 
                
     

   if(isset($url_foto1) and !empty($url_foto1)){
    $nombre_temp1 = $_FILES["file_upload_foto1"]["tmp_name"];
    $nuevo_nombre1 = $_FILES["file_upload_foto1"]["name"];
    $primer_caracter1 = strtoupper(substr($nuevo_nombre1, 0, 1));
    $destino1 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre1);
    // fotos secundarias
    if (move_uploaded_file($nombre_temp1, $destino1)) {

        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_1($id, $url_foto1 );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}

        $mime = explode(".", $nuevo_nombre1);
        $count = count($mime);
        $count--;

        $a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
        if (!$a) {    exit();        }
    }
}
if(isset($url_foto2) and !empty($url_foto2)){

         $nombre_temp2 = $_FILES["file_upload_foto2"]["tmp_name"];
    $nuevo_nombre2 = $_FILES["file_upload_foto2"]["name"];
    $primer_caracter2 = strtoupper(substr($nuevo_nombre2, 0, 1));
    $destino2 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre2);



    if (move_uploaded_file($nombre_temp2, $destino2)) {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_2($id, $url_foto2 );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}

        $mime = explode(".", $nuevo_nombre2);
        $count = count($mime);
        $count--;

        $a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
        if (!$a) {    exit();        }
    }
}
if(isset($url_foto3) and !empty($url_foto3)){
           $nombre_temp3 = $_FILES["file_upload_foto3"]["tmp_name"];
    $nuevo_nombre3 = $_FILES["file_upload_foto3"]["name"];
    $primer_caracter3 = strtoupper(substr($nuevo_nombre3, 0, 1));
    $destino3 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre3);


if (move_uploaded_file($nombre_temp3, $destino3)) {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_3($id, $url_foto3 );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}

        $mime = explode(".", $nuevo_nombre3);
        $count = count($mime);
        $count--;

        $a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
        if (!$a) {    exit();        }
    }
}
if(isset($url_foto4) and !empty($url_foto4)){
      $nombre_temp4 = $_FILES["file_upload_foto4"]["tmp_name"];
    $nuevo_nombre4 = $_FILES["file_upload_foto4"]["name"];
    $primer_caracter4 = strtoupper(substr($nuevo_nombre4, 0, 1));
    $destino4 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre4);

if (move_uploaded_file($nombre_temp4, $destino4)) {
        $update = new productosController();
        $updateProducto = $update->updateImagenSecundaria_4($id, $url_foto4 );
        
        if($updateProducto)
        {$toast=1;} 
        else {$toast = 2;}

        $mime = explode(".", $nuevo_nombre4);
        $count = count($mime);
        $count--;

        $a = in_array($mime[$count], $tipos_permitidos) ? TRUE : FALSE;
        if (!$a) {    exit();        }
    }
}
    
}

if ( (!empty($_POST['alta_producto']))) {
    
    $nombre_producto = (isset($_POST['nombre_producto'])) ? trim($_POST['nombre_producto']) : '';
    $descripcion = (isset($_POST['descripcion_producto'])) ? trim($_POST['descripcion_producto']) : '';
    $id_categoria =  (isset($_POST['id_categoria'])) ? trim($_POST['id_categoria']) : '';
    $nombre_categoria = (isset($_POST['nombre_categoria'])) ? trim($_POST['nombre_categoria']) : '';
    $precio = (isset($_POST['precio'])) ? trim($_POST['precio']) : '';
    $precio_promocion =(isset($_POST['precio_promocion'])) ? trim($_POST['precio_promocion']) : '';
    $url_foto =(isset($_FILES['file_upload']["name"])) ? trim($_FILES['file_upload']["name"]) : '';
    $url_foto1 =(isset($_FILES['file_upload_foto1']["name"])) ? trim($_FILES['file_upload_foto1']["name"]) : '';
    $url_foto2 =(isset($_FILES['file_upload_foto2']["name"])) ? trim($_FILES['file_upload_foto2']["name"]) : '';
    $url_foto3 =(isset($_FILES['file_upload_foto3']["name"])) ? trim($_FILES['file_upload_foto3']["name"]) : '';
    $url_foto4 =(isset($_FILES['file_upload_foto4']["name"])) ? trim($_FILES['file_upload_foto4']["name"]) : '';
    
     if(isset($url_foto) and !empty($url_foto)){

    $nombre_temp = $_FILES["file_upload"]["tmp_name"];
    $nuevo_nombre = $_FILES["file_upload"]["name"];
    $primer_caracter = strtoupper(substr($nuevo_nombre, 0, 1));
    //$destino = "../images/resultados_" . $primer_caracter . "-$fecha/" . basename($nuevo_nombre);
    $destino = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre);
    move_uploaded_file($nombre_temp, $destino);
    }
    else
    {
      unset($url_foto);
    }
     if(isset($url_foto1) and !empty($url_foto1)){

    $nombre_temp1 = $_FILES["file_upload_foto1"]["tmp_name"];
    $nuevo_nombre1 = $_FILES["file_upload_foto1"]["name"];
    $primer_caracter1 = strtoupper(substr($nuevo_nombre1, 0, 1));
    $destino1 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre1);
     move_uploaded_file($nombre_temp1, $destino1);
}else
            {   unset($url_foto1);}
 if(isset($url_foto2) and !empty($url_foto2)){

    $nombre_temp2 = $_FILES["file_upload_foto2"]["tmp_name"];
    $nuevo_nombre2 = $_FILES["file_upload_foto2"]["name"];
    $primer_caracter2 = strtoupper(substr($nuevo_nombre2, 0, 1));
    $destino2 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre2);
    move_uploaded_file($nombre_temp2, $destino2);
}else
            {   unset($url_foto2);}
 if(isset($url_foto3) and !empty($url_foto3)){

    $nombre_temp3 = $_FILES["file_upload_foto3"]["tmp_name"];
    $nuevo_nombre3 = $_FILES["file_upload_foto3"]["name"];
    $primer_caracter3 = strtoupper(substr($nuevo_nombre3, 0, 1));
    $destino3 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre3);
     move_uploaded_file($nombre_temp3, $destino3);
}else
            {   unset($url_foto3);}
 if(isset($url_foto4) and !empty($url_foto4)){

    $nombre_temp4 = $_FILES["file_upload_foto4"]["tmp_name"];
    $nuevo_nombre4 = $_FILES["file_upload_foto4"]["name"];
    $primer_caracter4 = strtoupper(substr($nuevo_nombre4, 0, 1));
    $destino4 = "../images/productos/".$nombre_categoria."/" . basename($nuevo_nombre4);
    move_uploaded_file($nombre_temp4, $destino4);
}else
            {   unset($url_foto4);}
    
    $insert = new productosController();
        $newProduct = $insert->altaProducto($idCliente     ,$id_categoria  ,strtoupper($nombre_producto)   ,$precio    ,$precio  ,$url_foto, $descripcion);

        if($newProduct)
        {
            $fotos_sec = $insert->altaImagenSecundaria($idCliente, $url_foto1     ,$url_foto2     ,$url_foto3     ,$url_foto4);
            
            if($fotos_sec){
               $toast=1;
               $nombre_producto ="";
               $precio ="";
               $url_foto ="";
               $url_foto1="";
                $url_foto2="";
                $url_foto3="";
                $url_foto4="";
            }
            
          
        }
        else {
            $toast=2;
        }

      
     
    
}
