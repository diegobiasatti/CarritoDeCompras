app.controller("updateCtrl",["$rootScope","$scope", "$window", "$http","$location","datosFactory",'$sce',
 function ($rootScope, $scope,  $window, $http, $location, datosFactory,$sce) {
  $rootScope.cantidad_pedido = 0;
 $rootScope._cant=1;
 var idCliente =11;
    //var telefono = 541169221352

 $scope.categorias = function($id_cliente){
  datosFactory.datosCategorias(idCliente,1).then(function(response){
    $scope._categorias=response.data;

  })
 }
 $scope.productos = function($id_cliente){
  datosFactory.datosProductos(idCliente,4 ).then(function(response){
   $scope._productos= response.data;


  })
 }


 $scope.categorias();
 $scope.productos();

$scope.cambioImagen = function(_id, _producto){
  console.log(_producto)

$rootScope._id_producto =_id;
  $rootScope._categoria = _producto.icono;
  $rootScope._imagen_original = _producto.imagen;
  $rootScope._foto1 = _producto.foto1;
  $rootScope._foto2 = _producto.foto2;
  $rootScope._foto3 = _producto.foto3;
  $rootScope._foto4 = _producto.foto4;
}
 

 $scope.selectCategoria=function(categoria){
  
  if(categoria == null)
    {$scope.filtro = ''}
  else
  {$scope.filtro =categoria.nombre}
 }

 $rootScope.pedido = [];
  
$rootScope.gastoTotal = 0;

$scope.addToCart = function(pedido, $index){
  if($rootScope.pedido.length == 0){
    $rootScope.cantidad_pedido = 0;
    var movie = {};
    $scope.nombre_producto = pedido.nombre_producto;
    $rootScope.id_pedido = pedido.id_producto;
    $rootScope.precio = pedido.precio;
    $rootScope.subtotal = pedido.precio;
    $rootScope.precio_unitario = pedido.precio;


    movie.id_pedido = $index;
    movie.nombre_producto = $scope.nombre_producto;
    movie.subtotal =  $rootScope.precio
    movie.precio_unitario = $rootScope.precio;
    movie._cant = 1 ;

    $rootScope.pedido.push(movie);

    $rootScope._cant = 1;
    $rootScope.gastoTotal=0;

    angular.forEach($rootScope.pedido , function(value){
      $rootScope.gastoTotal = parseFloat($rootScope.gastoTotal) + parseFloat(value.subtotal);
      $rootScope.cantidad_pedido = parseInt($rootScope.cantidad_pedido)+ parseInt(value._cant) ;
    })
  }
  var existe = false;
angular.forEach($rootScope.pedido , function(value){
  if (value.nombre_producto == pedido.nombre_producto){
    existe = true;
  }
})
   if(!existe){
    existe = false;
     $rootScope.cantidad_pedido = 0;
    var movie = {};
    $scope.nombre_producto = pedido.nombre_producto;
    $rootScope.id_pedido = pedido.id_producto;
    $rootScope.precio = pedido.precio;
    $rootScope.subtotal = pedido.precio;
    $rootScope.precio_unitario = pedido.precio;


    movie.id_pedido = $index;
    movie.nombre_producto = $scope.nombre_producto;
    movie.subtotal =  $rootScope.precio
    movie.precio_unitario = $rootScope.precio;
    movie._cant = 1 ;

    $rootScope.pedido.push(movie);

    $rootScope._cant = 1;
    $rootScope.gastoTotal=0;

    angular.forEach($rootScope.pedido , function(value){
      $rootScope.gastoTotal = parseFloat($rootScope.gastoTotal) + parseFloat(value.subtotal);
      $rootScope.cantidad_pedido = parseInt($rootScope.cantidad_pedido)+ parseInt(value._cant) ;
    })
  }

}


$scope.quitoProducto = function($index){
  $rootScope.cantidad_pedido =0;
  $rootScope.gastoTotal = $rootScope.gastoTotal - $rootScope.pedido[$index]['subtotal']
  delete $rootScope.pedido[$index] 
  var reArmoArr = [];
  angular.forEach($rootScope.pedido, function (value) {
    reArmoArr.push(value);
     $rootScope.cantidad_pedido = parseInt($rootScope.cantidad_pedido)+ parseInt(value._cant) ;
  });
  $rootScope.pedido = reArmoArr;

 
}

$scope.reArmoTabla = function(detalle_pedido, cantidad){
  $rootScope.cantidad_pedido = 0;
  for (var i = $rootScope.pedido.length - 1; i >= 0; i--) {
    if($rootScope.pedido[i].id_pedido == detalle_pedido.id_pedido){
      var movie = {};
      $rootScope.subtotal = (parseFloat(cantidad) * parseFloat(detalle_pedido.precio_unitario))
      detalle_pedido.subtotal = $rootScope.subtotal
      detalle_pedido._cant= cantidad;
      angular.forEach($rootScope.pedido, function(value){
        $rootScope.gastoTotal = parseFloat($rootScope.gastoTotal) +parseFloat(value.subtotal)
       $rootScope.cantidad_pedido = parseInt($rootScope.cantidad_pedido)+ parseInt(value._cant) ;
       // console.log($rootScope.gastoTotal)
      })
    }
  }
}

$scope.multiplico = function(detalle_pedido, cantidad,$index ){
 /* if(cantidad == 0){
    $scope.quitoProducto($index)

  }*/
  //console.log(detalle_pedido.id_pedido + " "+ detalle_pedido.subtotal )
   $rootScope.gastoTotal= 0;
  $scope.reArmoTabla(detalle_pedido, cantidad);

}

$scope.confirmo_pedido = true;
$scope.final = false;

$scope.confirmoPedido = function(){
  if(angular.isNumber($rootScope.gastoTotal)){
    $scope.confirmo_pedido = false;
  $scope.final = true;
}
}


$scope.deleteProducto= function($producto){
console.log($producto)
$scope.id_prod = $producto.id_producto;
$scope.prod = $producto.nombre_producto;
}

$scope.confirmoElimino = function(){
datosFactory.eliminoProducto($scope.id_prod, 2).then(function(response){
  if(response.data){
     $scope.productos();

  }
})
}


$scope.AltaProductos = function(){
   $rootScope.estado_add = true;
  $rootScope.estado_login= false;
  $rootScope.estado_update = false;
  $scope.estado_logout = true;
}

$scope.cambioPrecio = function(id,nombre, precio){
  $scope._nombre_producto = nombre;
  $scope._precio = parseFloat(precio);
 $rootScope.idProductoUpdate = parseInt(id);
}

$scope.cambioNombreProducto = function(id, nombre_producto, descripcion){
  console.log(descripcion)
  $scope.nom_original = nombre_producto;
  $scope.nuevo_nombre_producto = nombre_producto;
  $scope.nueva_descripcion = descripcion
 $rootScope.idProductoUpdate = parseInt(id);
 
}

$scope.confirmoUpdate = function(nuevo_precio){
  if(angular.isNumber(nuevo_precio)){
   datosFactory.updateProductos($rootScope.idProductoUpdate, parseFloat(nuevo_precio), 3).then(function(response){

    if(response.data){
     $scope.productos();
    }
  })
}}


$scope.confirmoUpdateNombreProducto = function($nombre_producto_, $descripcion){
  datosFactory.updateProductosNombre($rootScope.idProductoUpdate, $nombre_producto_,$descripcion, 5).then(function(response){
    if(response.data){
     $scope.productos();
    }
  })
}



}])


app.factory("datosFactory",["$http","$location", "$rootScope" ,
    function($http,$location, $rootScope, $window){
      
        return{
          login:function($user,  $pass){
                return $http.get('../json/login.php?user='+$user+'&pass='+$pass);
            },
            logout:function(){
              return $http.get('../json/logout.php');
            },
            session:function(){
              return $http.get('../json/session.php');
            },
            datosCategorias:function($id_cliente, $nro){
                return $http.get('../json/categorias.php?id_cliente='+$id_cliente+'&nro='+$nro);
            },
            datosProductos:function($id_cliente, $nro){
              return $http.get('../json/productos.php?id_cliente='+$id_cliente+'&nro='+$nro);
            },
             updateProductos:function($id,$precio, $nro){
                return $http.get('../json/productos.php?id='+$id+'&precio='+$precio+'&nro='+$nro);
            },
           
             updateProductosNombre:function($id,$nombre_producto,$descripcion, $nro){
                return $http.get('../json/productos.php?id='+$id+'&nombre_producto='+$nombre_producto+'&descripcion='+$descripcion+'&nro='+$nro);
            },
          eliminoProducto:function($id, $nro){
            return $http.get('../json/productos.php?id='+$id+'&nro='+$nro);
           },
        }
            
        
    }
]);
