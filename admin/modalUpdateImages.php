<!-- Modal -->


<div class="modal fade" id="modalUpdateImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="form-inline">
          <h4 class="modal-title" id="myModalLabel">Actualizacion de Imagenes</h4>
        </div>
      </div>
      <div class="modal-body">
        <div id="exportthis" >
          
          <div>

            <table class="table table-bordered" style="text-align: center;">
              <th style="text-align: center;">Foto Principal</th>
              <tr><td><img ng-show="_imagen_original" src="../images/productos/{{_categoria}}/{{_imagen_original}}" alt="" style="max-width: 170px; max-height: 170px;">
               <p style="margin-top: 10px;"> 
                    <form action="" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
                    <input type="submit" name="delete_prod_principal" ng-show="_imagen_original" class="btn btn-danger " style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Eliminar"> 
                    
                    <input ng-show="!_imagen_original" type="file" class="text"  name="file_upload" ng-model="_file_upload" id="filename" title="Examinar"  />
                    <input type="text"hidden="" name="MAX_FILE_SIZE" value="1500000">
                    <input type="text" hidden="" ng-model="_id_producto" name="_id_producto">
                    <input type="text" hidden="" ng-model="_categoria" name="nombre_categoria">
                    <input type="submit" ng-show="!_imagen_original" class="btn btn-primary " name="update_prod" style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Cargar"> 
                    </form>
                    
                  </p>
                </td></tr>
            </table>

            <table class="table table-bordered" style="text-align: center;">
              <th style="text-align: center;">Fotos Secundarias</th>
              <tr>
                <td>
                  <img ng-show="_foto1" src="../images/productos/{{_categoria}}/{{_foto1}}" style="max-width: 170px; max-height: 170px;" alt="">
                  <p style="margin-top: 10px;"> 
                    <form action="" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
                    <input type="submit" name="delete_prod" ng-show="_foto1" class="btn btn-danger " style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Eliminar"> 
                    
                    <input ng-show="!_foto1" type="file" class="text"  name="file_upload_foto1" id="filename" title="Examinar"  />
                    <input type="text"hidden="" name="MAX_FILE_SIZE" value="1500000">
                    <input type="text" hidden="" ng-model="_id_producto" name="_id_producto">
                    <input type="text" hidden="" ng-model="_categoria" name="nombre_categoria">
                    <input type="submit" ng-show="!_foto1" class="btn btn-primary " name="update_prod" style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Cargar"> 
                    </form>
                    
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <img ng-show="_foto2" src="../images/productos/{{_categoria}}/{{_foto2}}" style="max-width: 170px; max-height: 170px;" alt="">
                  <p style="margin-top: 10px;">
                    <form action="" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
                    <input type="submit" name="delete_prod2" ng-show="_foto2" class="btn btn-danger " style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Eliminar"> 
                    
                    <input ng-show="!_foto2" type="file" class="text"  name="file_upload_foto2" id="filename" title="Examinar"  />
                    <input type="text"hidden="" name="MAX_FILE_SIZE" value="1500000">
                    <input type="text" hidden="" ng-model="_id_producto" name="_id_producto">
                    <input type="text" hidden="" ng-model="_categoria" name="nombre_categoria">
                    <input type="submit" ng-show="!_foto2" class="btn btn-primary " name="update_prod" style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Cargar"> 
                    </form>
                  </p>
                </td>
              </tr>
              <tr>
                <td>

                  <img ng-show="_foto3" src="../images/productos/{{_categoria}}/{{_foto3}}" style="max-width: 170px; max-height: 170px;" alt="">
                  <p style="margin-top: 10px;">
                    <form action="" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
                    <input type="submit" name="delete_prod3" ng-show="_foto3" class="btn btn-danger " style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Eliminar"> 
                    
                    <input ng-show="!_foto3" type="file" class="text"  name="file_upload_foto3" id="filename" title="Examinar"  />
                    <input type="text"hidden="" name="MAX_FILE_SIZE" value="1500000">
                    <input type="text" hidden="" ng-model="_id_producto" name="_id_producto">
                    <input type="text" hidden="" ng-model="_categoria" name="nombre_categoria">
                    <input type="submit" ng-show="!_foto3" class="btn btn-primary " name="update_prod" style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Cargar"> 
                    </form>
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <img ng-show="_foto4" src="../images/productos/{{_categoria}}/{{_foto4}}" style="max-width: 170px; max-height: 170px;" alt="">
                  <p style="margin-top: 10px;"> 
                    <form action="" method="post" enctype="multipart/form-data" style="margin-top: 15px;">
                    <input type="submit" name="delete_prod4" ng-show="_foto4" class="btn btn-danger " style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Eliminar"> 
                    
                    <input ng-show="!_foto4" type="file" class="text"  name="file_upload_foto4" id="filename" title="Examinar"  />
                    <input type="text" hidden="" name="MAX_FILE_SIZE" value="1500000">
                    <input type="text" hidden="" ng-model="_id_producto" name="_id_producto">
                    <input type="text" hidden="" ng-model="_categoria" name="nombre_categoria">
                    <input type="submit" ng-show="!_foto4" class="btn btn-primary " name="update_prod" style=" min-height: 20px; min-width: 20px;" aria-hidden="true" value="Cargar"> 
                    </form>
                  </td>
                </tr>

              </table>
            </div>

          </div>

        </div>
        <div class="modal-footer"  ng-show = "confirmo_pedido"style="margin-top: 40px;">
          <div class="row ">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >

              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
           
          </div>
        </div>

      
      </div>
    </div>
  </div>