var app = angular.module('appDatos', ['ngMaterial','toaster','ngRoute','ui.bootstrap', 'ngSanitize'])


app.controller('toast',["$rootScope" ,"$scope", "toaster",
                function($rootScope, $scope,   toaster) {
    $scope.a;
    $rootScope.pop = function(a, msg){
        if (a == 1){   toaster.pop('success', "Operación Exitosa", "Puede continuar");      }
        else if(a==2) {toaster.pop('error', "Error", "No pudo realizarse la Operación");    }
        if(a==3){toaster.pop('warning', "Venta Realizada, no se pudo actualizar la caja."); }
        if(a==4){toaster.pop('error',msg);}
        if(a==5){toaster.pop('success', msg);}
    };
   
}]);

