
app.factory("datosFactory",["$http","$location", "$rootScope" ,
    function($http,$location, $rootScope, $window){
      
        return{
       		login:function($user,  $pass){
                return $http.get('json/login.php?user='+$user+'&pass='+$pass);
            },
            logout:function(){
            	return $http.get('json/logout.php');
            },
            session:function(){
            	return $http.get('json/session.php');
            },
            datosCategorias:function($id_cliente, $nro){
                return $http.get('json/categorias.php?id_cliente='+$id_cliente+'&nro='+$nro);
            },
            datosProductos:function($id_cliente, $nro){
            	return $http.get('json/productos.php?id_cliente='+$id_cliente+'&nro='+$nro);
            },
             datosImagenesProductos:function($id_producto, $nro){
                return $http.get('json/productos.php?id_producto='+$id_producto+'&nro='+$nro);
            },
            
            datos_pedidos:function($data){
                return $http.post('json/pedidos.php', $data);
            },
                
            
            
        }
    }
]);