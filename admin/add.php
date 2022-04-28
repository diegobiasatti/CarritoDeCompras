<?php



?>
<div >
	<div class="agileinfo-ads-display col-md-12">
		<div class="wrapper">
			<div class="contact agileits">
				<div class="contact-form wthree" style="margin-bottom: 10px;" >
					<input type="button" class="btn btn-primary " value="Editar Productos" ng-click="editarProductos()">
					<input type="button" class="btn btn-primary " value="Alta Producto" >
					<!--a href="iphone.php"><input type="button" class="btn btn-primary " name="" value="IPHONE Test" ></a-->
				</div>
			</div>
			<!-- first section (nuts) -->
			<div class="contact agileits">
				<div class="contact-form wthree" >
					<h4>Alta de Producto <h6>Productos Actuales: {{cant_total_productos}}</h6><h6>Quedan {{cant_disponible}} disponibles.</h6>	</h4>
					<form action="#" method="post" enctype="multipart/form-data"  style="margin-top: 15px;">
						<div class="">
							 <select class="text" name="categoria" ng-model="selectedOption"  required="" ng-change="cambioConcepto(selectedOption)"  ng-options="option.nombre for option in _categorias"    >
                         
                        </select>
                    
						</div>
						<div class="">
							<input type="text" name="nombre_producto" placeholder="Nombre Producto" pattern="[A-Za-z0-9-ñ, ]{3,130}" required="">
							<input type="text" hidden="" ng-model="nombre_categoria" name="nombre_categoria">
							<input type="text" hidden="" ng-model="id_categoria" name="id_categoria">
						</div>
						<div class="">
							<input type="text" name="descripcion_producto" placeholder="Descripcion (opcional)" pattern="[A-Za-z0-9-ñ, ]{3,130}" >
						</div>
						<div class="">
							<input class="text" type="number" step="0.01" name="precio" placeholder="Precio" required="">
						</div>
						<!--div class="">
							<input class="text" type="number" name="precio_promocion" placeholder="Precio en Promocion" >
						</div-->
						<div class="">
							 <input type="hidden" name="MAX_FILE_SIZE" value="1500000">
							 <label >Foto Principal</label>
                            <input type="file" class="text"  name="file_upload" id="filename" title="Examinar"  />
                           
                           
							 <label >Fotos Secundaria 
							 <h6 style="margin-right:  20px;">(Opcionales)</h6>
							</label>
                            <input type="file" class="text"  name="file_upload_foto1" id="filename1" title="Examinar"  />
                           
							<input type="file" class="text"  name="file_upload_foto2" id="filename2" title="Examinar"  />
                           
							<input type="file" class="text"  name="file_upload_foto3" id="filename3" title="Examinar"  />
                           
							<input type="file" class="text"  name="file_upload_foto4" id="filename4" title="Examinar"  />
                            
                            <h6>Max. archivo de 1,5Mb</h6>
                           
							
						</div>
						<input ng-disabled="estadoBoton" type="submit" class="btn btn-primary " id="alta_prod" style="margin-left: 35%;" name="alta_producto" value="Confirmar" >
						<span ng-show="estadoBoton">Has llegado al limite de tus productos. </span>

					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

	</div>
</div>