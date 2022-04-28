app.controller("productosCtrl",["$rootScope","$scope", "$window", "$http","$location","datosFactory",
 function ($rootScope, $scope,  $window, $http, $location, datosFactory) {
  $scope.session = false;
  $rootScope.estado_login = false;
  $rootScope.estado_logout = false;
  $rootScope.estado_add = false;
  var idCliente = 11;
 $scope.usuario = { user : "", password : "" };


 $scope.categorias = function($id_cliente){
  datosFactory.datosCategorias(idCliente,1).then(function(response){
    $scope._categorias=response.data;
   
$scope.selectedOption = $scope._categorias[0];
$scope.nombre_categoria = $scope._categorias[0]['icono']
$scope.id_categoria = $scope._categorias[0]['id']
console.log($scope.nombre_categoria)
  })
 }
 $scope.cambioConcepto = function(cat){
  //console.log(cat)
$scope.nombre_categoria = cat.icono;
console.log($scope.nombre_categoria)
$scope.id_categoria = cat.id;
 }
 $scope.categorias();

 $scope.login = function(){
 // //console.log($scope.usuario)
//console.log($scope.session)
//Call the services
 var data = {user: $scope.usuario.user, password: $scope.usuario.password};
$http.post('../json/login.php',data).then(function (response) {
if (response.data=='true'){

////console.log("ok"+response.data)
$rootScope.estado_add = true;
$rootScope.estado_login = false;
$rootScope.estado_logout =true;
$scope.usuario={ user : "", password : "" };
////console.log($scope.session)
}

}, function (response) {

//console.log("Service not Exists")

$scope.statusval = response.status;

$scope.statustext = response.statusText;

$scope.headers = response.headers();

});
 }

$scope.editarProductos = function(){
  $rootScope.estado_add = false;
  $rootScope.estado_login= false;
  $rootScope.estado_update = true;
   $rootScope.estado_logout = true;
}

$rootScope.sessionStatus= function(){
  datosFactory.session().then(function(response){
    $scope.estadoSession = response.data
    if($scope.estadoSession == 'false'){
      $rootScope.estado_add = false;
      $rootScope.estado_login = true;
      $rootScope.estado_logout = false;
    }
    if($scope.estadoSession == 'true'){
      $rootScope.estado_add = true;
      $rootScope.estado_login = false;
      $rootScope.estado_logout = true;

    }

  })}
   $rootScope.sessionStatus();
 

 $scope.logout = function(){
  $rootScope.estado_add = false;
$rootScope.estado_login = true;
 $rootScope.estado_logout = false;

 }
 
$scope.cantidad = function(){
  datosFactory.datosProductos(idCliente,1).then(function(response){
      $scope.cant_total_productos= (response.data.length-1)
      datosFactory.datosProductos(idCliente,6).then(function(response){

      $scope.cant_disponible = response.data[0] - $scope.cant_total_productos
      if ($scope.cant_disponible == 0)
      {
        $scope.estadoBoton = true;
      }
      })
  
  })
}
$scope.cantidad();

}])
