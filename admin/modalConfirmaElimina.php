<!-- Modal -->
<div >
              <div class="modal fade" id="modalConfirmaElimina" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Confirmacion
                          
                     
                    </div>
                    <div class="modal-body">
                        <p>Esta seguro de querer ELIMINAR ?</p>
                        <p>{{prod}}</p>
                    </div>
                    <div class="modal-footer">
                       <button ng-click="confirmoElimino()" class="btn btn-danger btn-sm" data-dismiss="modal">ELIMINAR</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                     
                    </div>
                  </div>
                </div>
              </div>

</div>