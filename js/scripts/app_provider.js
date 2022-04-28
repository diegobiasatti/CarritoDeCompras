app.config(function($routeProvider, $locationProvider) {
  $routeProvider
  .when("/", {
    templateUrl : "views/home/home.php",
    controller : 'homeCtrl' 
  })
  .when("/login", {
    templateUrl : "views/login/login.php",
    controller : ''
  })
  
  .when("/home", {
    templateUrl : "views/home/home.php",
    controller : 'homeCtrl'
  })
 
  .when("/productos", {
    templateUrl : "views/productos/productos.php",
    controller : 'productosCtrl'
  })
 
  
  .when("/error", {
    templateUrl : "views/error/404.php",
   
})
  .otherwise ({
    redirectTo: '/error'
  });
  
  $locationProvider.html5Mode(true);
  $locationProvider.hashPrefix('');

});



 