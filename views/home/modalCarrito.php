<!-- Modal -->


<div class="modal fade" id="modalCarrito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="form-inline">
          <h4 class="modal-title" id="myModalLabel">Detalle Pedido </h4>
        </div>
      </div>
      <div class="modal-body">
       <div id="exportthis" >
         <div class="" >
          <table class="table-striped" style="  border-width: 1px;">
            <th class="col" style="background-color: #FFE6E2; padding: 5px; font-size: 14px; width: 40%;">Producto</th>
            <th class="col" style="background-color: #FFE6E2; padding: 5px; font-size: 14px; width: 50%;">Cant.</th>
            <!--th class="col" style="background-color: #FFE6E2; padding: 5px; font-size: 14px; width: 10%;">Precio</th-->
            <th class="col" style="background-color: #FFE6E2; padding: 5px; font-size: 14px; width: 5%;">Total</th>
            <th class="col" style="background-color: #FFE6E2; padding: 5px; font-size: 14px; width: 5%;">Quitar</th>
            <tbody>
              <tr class="table-warning" ng-repeat="detalle_pedido in pedido" style="height: 60px;">
                <td class="col" style="font-size: 14px;">
                   {{detalle_pedido.nombre_producto}}
                </td> 
                <td class="col" style="max-width: 10px;text-align: center; height: 50px;">
                 <input type="number"  size="3"   ng-change="multiplico(detalle_pedido, _cant)" ng-model="_cant">
                <!--div  id="" class="row" style="height: 50px;">
                                           
                 <div  class="col-xs-1" style="text-align: center; padding-top: 30px"><h5> <input type="text"  size="3"  ng-model="_cant"></h5></div>
                 <div class="col-xs-1" style="text-align: center;"><img ng-click="sumar(detalle_pedido, _cant)" src="images/mas.png" alt=""><br><br><img ng-click="restar(detalle_pedido, _cant )" src="images/minus.png" alt=""></div>
                                        </div--> 

               </td>
               <!--td class="col" style="font-size: 14px;text-align: center;">${{detalle_pedido.precio_unitario}}</td-->
               <td class="col" style="font-size: 14px;text-align: center;">${{detalle_pedido.subtotal | number:2}}</td>
               <td ng-click="quitoProducto($index)" style="text-align: center;"><img src="images/eliminar.png" alt=""></td>
             </tr>
           
           </tbody>




         </table>
         
       </div>
           <div class="pull-right" style="margin: 20px;">Total $ {{gastoTotal | number:2}}</div>
      

      </div>
     
    </div>
    <div class="modal-footer"  ng-show = "confirmo_pedido"style="margin-top: 40px;">
      <div class="row ">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
          
        <button type="button" class="btn btn-default" data-dismiss="modal">Seguir Comprando</button>
        </div>
        <div class="col-xs-2 col-sm-6 col-md-6 col-lg-6" >
        <button type="button" class="btn btn-default"  ng-click="confirmoPedido()">Confirmar Pedido</button>
          
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
    <div class="" >
        <label class="col-md-3 col-xs-12 control-label" style="text-align: left;">Observaciones</label>
        <div class="col-md-8 col-xs-12" style="margin-bottom: 15px;">                                            
           <textarea name="" id="" cols="30" ng-model="observaciones" rows="4" class="form-control" placeholder="Bananas Verdes, Morrones pequeños, ..."></textarea>
        </div>
    </div>
    <div >
      <label class="col-md-3 col-xs-12 control-label" style="text-align: left;">Estimado Cliente:</label>
        <div class="col-md-8 col-xs-12" style="margin-bottom: 15px;">                                            
          <p style="background-color: #f4e1b5; border-radius: 15px; padding: 10px; text-align: center;">El valor que usted esta viendo es aproximado, el precio total dependera del peso de cada Producto.</p>
        </div>
    </div>
     <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="envioWhtasapp(nombre, direccion, localidad, observaciones)" >Enviar Pedido</button>
      
    </div>
  </div>
</div>
</div>