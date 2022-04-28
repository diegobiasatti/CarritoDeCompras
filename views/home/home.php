<style>
	.titulo {
    
    text-align: center;
    padding: 10px;
    color: #1a1f35;
    
}
.titulo_articulo {
    
    text-align: center;
    padding: 10px;
    color: #1a1f35;
    height: 60px;
    margin-bottom: 40px;
    margin-top: 20px;
}

.busqueda{
	border-radius: 15px;
	border-color: #f4e1b5; 
	border-style: solid; 
	border-width: medium;
	padding: 20px 10px;
	line-height: 28px;
}
.busqueda:focus{
	border-color: #f4e1b5;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);

}

</style>
<div ng-controller="homeCtrl">
<div class="header-bot portada">
	<div class="col-md-8 col-xs-1" style="margin-top: 100px; float: right; margin-right: 30px;" data-toggle="modal"  data-target="#modalCarrito" > 
			<button class="w3view-cart" type="submit" name="submit" value="">
				<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
				<span class="product-new-top"><strong>{{cantidad_pedido}}</strong></span>
			</button>
		</div>
	</div>
<div   style="background-color: white;margin-top: 20px; margin-bottom: 50px;">
			

<div style="margin-bottom: 10px;  height:400px;" >
	<div  class="agileinfo-ads-display " ng-repeat="x in _categorias  " >
		<div class="wrapper col-xs-6 col-md-4 col-sm-4 col-lg-3">
			
			<div class="product-sec1"  ng-click="filtro(x.nombre)">
					<div class="titulo"><h5>{{x.nombre}}</h5></div>
				<div class=" product-men" >
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="images/productos/iconos/{{x.icono}}.png" alt="" style="max-width: 110px; max-height: 110px;">
						</div>
						
					</div>
				</div>


				<div class="clearfix"></div>
			</div>

		</div>
	</div>
	
<?php include_once('modalCarrito.php'); ?>
</div>
<div  id="productosHash">
	<div ng-show="inputShow" style="padding: 10px; border-radius: 10px; margin-bottom: 10px;">
		<label for="">Que andas buscando ?</label>
		<input type="text" ng-model="busqueda" class="form-control busqueda">
		</div>
<div  class="agileinfo-ads-display col-md-4 col-sm-4 col-lg-4"ng-repeat="x in _productos | filter: nombre_categoria=filtro_  | filter: nombre_producto= busqueda" >
		
			
			<div class="product-sec1a" >
					<div class="titulo_articulo"><h4>{{x.nombre_producto}}</h4></div>
				<div class=" product-men" style="padding: 0 !important">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
								<img ng-if="foto"  src="images/productos/{{x.icono}}/{{x.imagen}}" alt="" style="max-width: 170px; max-height: 170px; min-width: 170px; min-height: 170px	; ">
							<div class="item-info-product " style="margin-top: 10px;">
							
							<span ng-click="_foto(x.id_producto, x.imagen_original)" style="text-decoration:none;"><img  src="images/separador.jpg" alt="" style="max-width: 30px; "></span>
							<span style="margin-left: 10px;" ng-click="_foto1(x.id_producto, x.foto_foto1)" ng-if="x.foto1 !=NULL" ><img  src="images/separador.jpg" alt="" style="max-width: 30px;text-decoration:none; "></span>
							<span style="margin-left: 10px;" ng-click="_foto2(x.id_producto, x.foto_foto2)" ng-if="x.foto2 !=NULL" ><img  src="images/separador.jpg" alt="" style="max-width: 30px;text-decoration:none; "></span>
							<span style="margin-left: 10px;" ng-click="_foto3(x.id_producto, x.foto_foto3)" ng-if="x.foto3 !=NULL" ><img  src="images/separador.jpg" alt="" style="max-width: 30px;text-decoration:none; "></span>
							<span style="margin-left: 10px;" ng-click="_foto4(x.id_producto, x.foto_foto4)" ng-if="x.foto4 !=NULL" ><img  src="images/separador.jpg" alt="" style="max-width: 30px;text-decoration:none; "></span>
							</div>
						</div>
						<div class="item-info-product  ">
							<h4>
								{{x.descripcion}}
							</h4>
							<div class="info-product-price">
								<span class="item_price">${{x.precio}}</span>
								<!--del>${{x.precio_promocion}}</del-->
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">


								<input type="button"class="button"   value="Agregar al Pedido" ng-click="addToCart(x, $index)" data-toggle="modal"  data-target="#modalCarrito">

								
							</div>

						</div>
					</div>
				</div>


				<div class="clearfix"></div>
			</div>

		
	</div>

</div>
</div>
</div>