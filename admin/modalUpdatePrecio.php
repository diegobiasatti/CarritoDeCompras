<!-- Modal -->


<div class="modal fade" id="modalUpdatePrecio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="form-inline">
          <h4 class="modal-title" id="myModalLabel">{{_nombre_producto}} </h4>
        </div>
      </div>
      <div class="modal-body">
       <div id="exportthis" >
         <div class="" >
          <input type="number" step="0.01" class="form-control" ng-model="_precio" style="padding: 0px;">
         
       </div>
           
      </div>
     
    </div>
    <div class="modal-footer"  ng-show = "confirmo_pedido"style="margin-top: 40px;">
      <div class="row ">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
          
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-xs-2 col-sm-6 col-md-6 col-lg-6" >
        <button type="button" class="btn btn-default"  ng-click="confirmoUpdate(_precio)" data-dismiss="modal">Actualizar</button>
          
        </div>
      </div>
    </div>

     <div class="modal-footer" ng-show="final" style="margin-top: 20px;">
    <div class="" >
        <label class="col-md-3 col-xs-12 control-label" style="text-align: left;">Nombre</label>
        <div class="col-md-8 col-xs-12" style="margin-bottom: 15px;">                                            
            <input type="text" ng-model="nombre" required="" class="form-control"/>
        </div>
    </div>
    <div class="" >
        <label class="col-md-3 col-xs-12 control-label" style="text-align: left;">Direccion</label>
        <div class="col-md-8 col-xs-12" style="margin-bottom: 15px;">                                            
            <input type="text" ng-model="direccion" required="" class="form-control"/>
        </div>
    </div>
    <div class="" >
        <label class="col-md-3 col-xs-12 control-label" style="text-align: left;">Localidad</label>
        <div class="col-md-8 col-xs-12" style="margin-bottom: 15px;">                                            
            <input type="text" ng-model="localidad" required="" class="form-control"/>
        </div>
    </div>
     <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="envioWhtasapp(nombre, direccion, localidad)" >Enviar Pedido</button>
      
    </div>
  </div>
</div>
</div>