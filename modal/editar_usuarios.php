<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <form class="form-horizontal was-validated" method="post" id="editar_usuario" name="editar_usuario" novalidate>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-edit"></i> Modificar usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div id="resultados_ajax2">
                            <div id="diveuerr" class="alert alert-danger" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#diveuerr').hide(500);">&times;</button>
                                <strong>Error!</strong> 
                                <span id="spaneuerr"></span>
                            </div>
                            <div id="diveuok" class="alert alert-success" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#diveuok').hide(500);">&times;</button>
                                <strong>¡Bien hecho!</strong>
                                <span id="spaneuok"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="usuario2" class="control-label" style="margin-top: 7px;"><strong>Usuario</strong></label></div>
                                <div class="col-7">
                                    <input type="text" class="form-control" id="usuario2" name="usuario2" placeholder="Nombre de Usuario" pattern=".{8,16}" required maxlength="16">
                                    <input type="hidden" id="mod_id" name="mod_id">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="nombre2" class="control-label" style="margin-top: 7px;"><strong>Nombre y Apellido</strong></label></div>
                                <div class="col-7">
                                    <input class="form-control" id="nombre2" name="nombre2" placeholder="Nombre y Apellido" pattern=".{3,50}" required maxlength="50"></input>
                                </div>
                            </div>
                        </div>
                        
                                               
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="acceso2" class="control-label" style="margin-top: 7px;"><strong>Acceso</strong></label></div>
                                <div class="col-7">
                                    <select class="form-control" id="acceso2" name="acceso2" required>
                                        <option value="l">Lector</option>
                                        <option value="o">Operador</option>
                                        <option value="s">Supervisor</option>
                                        <option value="a">Administrador</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="activo2" class="control-label" style="margin-top: 7px;"><strong>Activo</strong></label></div>
                                <div class="col-7">
                                    <select class="form-control" id="activo2" name="activo2" required>
                                        <?/*<option value="">-- Activo --</option>*/?>
                                        <option value="s">Si</option>
                                        <option value="n">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-buscar" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-custom" id="actualizar_datos">Actualizar usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>