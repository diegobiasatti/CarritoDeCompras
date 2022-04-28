
<div ng-controller="productosCtrl">
	<div class="agileinfo-ads-display col-md-12">
		<div class="wrapper">
			<div class="contact agileits">
			<div class="contact-form wthree" style="margin-bottom: 10px;" >
			<input type="button" class="btn btn-primary " name="" value="Crear Categoria" >
			<input type="button" class="btn btn-primary " name="" value="Alta Producto" >
			</div>
		</div>
			<!-- first section (nuts) -->
			<div class="contact agileits">
				<div class="contact-form wthree" style="height: 500px;">
					<h3>Alta de Producto</h3>
					<form action="#" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
						<div class="">
							<label for="">Seleccionar Categoria</label>
							 <select name="categoria" id="mySelect" required=""  ng-options="option.nombre for option in _categorias track by option.id" ng-value="conceptoSeleccionado" ng-change="cambioConcepto(_categorias.selectedOption)" ng-model="_categorias.selectedOption" class="form-control" >
                          <option value="">Seleccionar</option>
                        </select>
						</div>
						<div class="">
							<input type="text" name="nombre_producto" placeholder="Nombre Producto" required="">
						</div>
						<div class="">
							<input class="text" type="number" name="precio" placeholder="Precio" required="">
						</div>
						<div class="">
							<input class="text" type="number" name="precio_promocion" placeholder="Precio en Promocion" >
						</div>
						<div class="">
							 <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                            <input type="file" class="text"  name="file_upload" id="filename" title="Examinar"  />
                           
							
						</div>

						<input type="submit" class="btn btn-primary pull-right" name="alta_producto" value="Confirmar" >
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
</div>