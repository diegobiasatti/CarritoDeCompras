<style>
	.titulo {
    
    text-align: center;
}
</style>
<div  ng-controller="updateCtrl" style="margin-top: 35px;" class="col-md-12">
	<div class="wrapper">
		
		<div class="contact agileits">
				<div class="contact-form wthree" style="margin-bottom: 10px; margin-top: 15px;" >
					<input type="button" class="btn btn-primary "  value="Editar Productos" ng-click="editarProductos()">
					<input type="button" class="btn btn-primary "  value="Alta Producto"    ng-click="AltaProductos()">
				</div>
		
	<div class="contact-form wthree" style="margin-bottom: 10px;" >
<div class="row " >
	
					<div class="col-md-12 col-xs-12" style="margin-bottom: 10px;" >
						<input name="Search" type="search" placeholder="Producto a modificar..." ng-model="busqueda" class="form-control">
					</div>
					
			</div>
			
<div class="">
		<div class="row">
			<div class="col-md-8 col-xs-12">
				 <select name="forma_aviso" id="mySelect"    ng-options="option.nombre for option in _categorias track by option.id" ng-model="_categorias.selectedOption" ng-change="selectCategoria(_categorias.selectedOption)" class="form-control">
                <option value="">Ver Todos los Productos</option>
            </select>
			</div>
		
		</div>
	</div>
<div  >
	
<?php 
include_once('modalUpdatePrecio.php'); 
include_once('modalUpdateNombreProducto.php');
include_once('modalUpdateImages.php');
include_once('modalConfirmaElimina.php');
?>
	
	</div>
</div>
</div>
</div>
<div  class="row  ">
		<div class="wrapper col-xs-12 col-md-12 col-sm-12 col-lg-12">

			<table class="table-bordered col-xs-12 col-md-12 col-sm-12 col-lg-12" style="margin-bottom: 10px;margin-top: 10px;">
				<thead >
					<th>Producto</th>
					<th>Precio</th>
					<th>Foto</th>
					<th style="width: 5%">-X-</th>
					
				</thead>
				<tbody>
					<tr ng-repeat="x in _productos | filter: nombre_categoria=filtro | filter: nombre_producto=busqueda">
						<td style="padding: 3px;" ng-click="cambioNombreProducto(x.id_producto,x.nombre_producto, x.descripcion)"  data-toggle="modal"  data-target="#modalUpdateNombreProducto">{{x.nombre_producto}}</td>
						<td style="padding: 3px;" ng-click="cambioPrecio(x.id_producto,x.nombre_producto, x.precio)" data-toggle="modal"  data-target="#modalUpdatePrecio">${{x.precio}}</td>
						<td style="padding: 3px;" ng-click="cambioImagen(x.id_producto,x)" data-toggle="modal"  data-target="#modalUpdateImages"><img src="../images/productos/{{x.icono}}/{{x.imagen}}" alt="" style="max-width: 70px; max-height: 70px;"></td>
						<td style="padding:  4px; " ><i   class="fa fa-times-circle fa-2x" style="color: tomato;" ng-click="deleteProducto(x)"  data-toggle="modal"  data-target="#modalConfirmaElimina"></i></td>
					</tr>
				</tbody>
			</table>
			

		</div>
	</div>