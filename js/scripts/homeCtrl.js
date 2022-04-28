app.controller("homeCtrl",["$rootScope","$scope", "$window", "$http","$location","datosFactory",'$sce','$anchorScroll','$filter',
  function ($rootScope, $scope,  $window, $http, $location, datosFactory,$sce,$anchorScroll, $filter) {
    $rootScope.cantidad_pedido = 0;
    $rootScope._cant=1;
    var idCliente =11;
    var telefono = 5492944813311

    $scope.inputShow= false;
    $scope.categorias = function($id_cliente){
      datosFactory.datosCategorias(idCliente,1).then(function(response){
        $scope._categorias=response.data;
        console.log(response.data)
      })
    }
  


var ok = function(_response){
  $rootScope._productos = _response.data;
  console.log(_response.data)

  
}
var ng = function(){
  console.log("NG")
}
$scope.productos = function($id_cliente){
  datosFactory.datosProductos(idCliente,1 ).then(ok, ng);

}

$scope.sumar = function(detalle_pedido, _cant ){
  
 _cant=  $rootScope._cant + _cant;
 console.log(_cant)
    $rootScope.gastoTotal= 0;
  $scope.reArmoTabla(detalle_pedido, _cant);

}

$scope.restar = function(detalle_pedido, _cant ){
  
   _cant=  $rootScope._cant - _cant;
 
    $rootScope.gastoTotal= 0;
  $scope.reArmoTabla(detalle_pedido, _cant);
}



$scope.categorias();
$scope.productos();

$scope.filtro_ = "xxxxxx"
 $scope.filtro = function(categoria){
  $scope.busqueda = "";
  $scope.filtro_ = categoria;
  $location.hash('productosHash');
  $anchorScroll();

  $scope.inputShow= true;
 }

$scope.foto = true;
$scope.foto1 = false;
$scope.foto2= false;
$scope.foto3 = false;
$scope.foto4 = false;
$rootScope.cont =0;
 
$scope._foto = function($id){
angular.forEach($rootScope._productos, function(value){
 
  if(value['id_producto'] == $id){
    
    value['imagen'] = value['imagen_original'];
  }
})}

$scope._foto1 = function($id){
angular.forEach($rootScope._productos, function(value){
 
  if(value['id_producto'] == $id){
    
    value['imagen'] = value['foto1'];
  }
})

}
$scope._foto2 = function($id){
  angular.forEach($rootScope._productos, function(value){
 
  if(value['id_producto'] == $id){
    
    value['imagen'] = value['foto2'];
  }
})
}
$scope._foto3 = function($id){
  angular.forEach($rootScope._productos, function(value){
 
  if(value['id_producto'] == $id){
    
    value['imagen'] = value['foto3'];
  }
})
}
$scope._foto4 = function($index){
 angular.forEach($rootScope._productos, function(value){
 
  if(value['id_producto'] == $id){
    
    value['imagen'] = value['foto4'];
  }
})
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

$scope.reArmoTabla = function(detalle_pedido, _cant){
  $rootScope.cantidad_pedido = 0;
  for (var i = $rootScope.pedido.length - 1; i >= 0; i--) {
    if($rootScope.pedido[i].id_pedido == detalle_pedido.id_pedido){
      var movie = {};
      $rootScope.subtotal = (parseFloat(_cant) * parseFloat(detalle_pedido.precio_unitario))
      detalle_pedido.subtotal = $rootScope.subtotal
      detalle_pedido._cant= _cant;
      $rootScope.gastoTotal = 0;
      angular.forEach($rootScope.pedido, function(value){
        $rootScope.gastoTotal = parseFloat($rootScope.gastoTotal) + parseFloat(value.subtotal)
       $rootScope.cantidad_pedido = parseFloat($rootScope.cantidad_pedido)+ parseFloat(value._cant) ;
       // console.log($rootScope.gastoTotal)
      })
    }
  }
}

$scope.multiplico = function(detalle_pedido, _cant ){
   console.log($rootScope._cant)
   $rootScope.gastoTotal= 0;
  $scope.reArmoTabla(detalle_pedido, _cant);

}

$scope.confirmo_pedido = true;
$scope.final = false;

$scope.confirmoPedido = function(){
  if(angular.isNumber($rootScope.gastoTotal)){
    $scope.confirmo_pedido = false;
  $scope.final = true;
}
}

 $scope.envioWhtasapp= function(nombre, direccion, localidad, observaciones){
  if(($rootScope.gastoTotal > 0)&&(!angular.isUndefined(nombre))&&(!angular.isUndefined(direccion))&&(!angular.isUndefined(localidad))){
  var pedidoFinal = ""
  angular.forEach($rootScope.pedido, function(value){
    
      pedidoFinal += value.nombre_producto + " X " +value._cant +" = "+ $filter('number')(value.subtotal, 2) +"%0A"
  })//%0A
  angular.forEach(pedidoFinal, function(value){

    pedidoFinal = pedidoFinal.replace(" ","%20")
  })
  
   $window.open('https://api.whatsapp.com/send?phone='+telefono+'&text=Cliente:'+nombre+
    '%0ADireccion:'+direccion+
    '%0ALocalidad:'+localidad+
    '%0A-------------------------------------------'+
    '%0APedido:%0A'+pedidoFinal+
    '%0A-------------------------------------------'+
    '%0AObservaciones:%0A'+observaciones+
    '%0A-------------------------------------------'+
    '%0ATotal:'+$filter('number')($rootScope.gastoTotal, 2)+
    '%0A-------------------------------------------'+
    '%0AGracias', '_blank');
   $rootScope.gastoTotal = 0;
   $rootScope.pedidoFinal = 0;
   $rootScope.cantidad_pedido = 0;
   $scope.nombre = "";
   $scope.direccion = "";
   $localidad = "";
   $scope.confirmo_pedido = true;
   $scope.final = false;
  $rootScope.pedido = [];
 }
 }


}])
