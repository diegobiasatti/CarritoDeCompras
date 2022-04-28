<!DOCTYPE html>
<html lang="en">
<?php 
include_once('content/head.php');
?>
<body ng-app="appDatos"  ng-cloak>
	<div class="container" ng-controller="homeCtrl">

	<table class="table table-bordered">
		<th>Fecha</th>
		<th>Nombre</th>
		<th>Direccion</th>
		<th>Localidad</th>
		<th>Pedido</th>
		<th>Observaciones</th>
		<th>Monto</th>
		<tr ng-repeat="x in allPedidos ">
			<td>{{x.fecha}}</td>
			<td>{{x.nombre}}</td>
			<td>{{x.direccion}}</td>
			<td>{{x.localidad}}</td>
			<td>{{x.pedido  | limitTo : 100}} <a href="" ng-click="verCompleto(x.pedido)">ver completo...</a></td>
			<td>{{x.observaciones}}</td>
			<td>{{x.monto}}</td>
			
		</tr>
	</table>
	</div>
</body>
</html>