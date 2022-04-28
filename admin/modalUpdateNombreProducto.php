<!-- Modal -->


<div class="modal fade" id="modalUpdateNombreProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="form-inline">
          <h4 class="modal-title" id="myModalLabel">{{nom_original}} </h4>
        </div>
      </div>
      <div class="modal-body">
       <div id="exportthis" >
         <div class="" >
          <input type="text" class="form-control" ng-model="nuevo_nombre_producto" pattern="[A-Za-z0-9,-ñ. ]{4,130}" required="">
         
       </div>
         <div class="" >
          <input type="text" class="form-control" ng-model="nueva_descripcion" pattern="[A-Za-z0-9,-ñ. ]{4,130}" >
         
       </div>
           
      </div>
     
    </div>
    <div class="modal-footer"  ng-show = "confirmo_pedido"style="margin-top: 40px;">
      <div class="row ">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
          
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-xs-2 col-sm-6 col-md-6 col-lg-6" >
        <button type="button" class="btn btn-default"  ng-click="confirmoUpdateNombreProducto(nuevo_nombre_producto, nueva_descripcion)" data-dismiss="modal">Actualizar</button>
          
        </div>
      </div>
    </div>

    
  </div>
</div>
</div>