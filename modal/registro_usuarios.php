<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <form class="form-horizontal was-validated" method="post" id="guardar_usuario" name="guardar_usuario" autocomplete="off" novalidate>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-edit"></i> Agregar nuevo usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">

                        <div id="resultados_ajax_usuarios">
                            <div id="divnuerr" class="alert alert-danger" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#divnuerr').hide(500);">&times;</button>
                                <strong>Error!</strong> 
                                <span id="spannuerr"></span>
                            </div>
                            <div id="divnuok" class="alert alert-success" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#divnuok').hide(500);">&times;</button>
                                <strong>¡Bien hecho!</strong>
                                <span id="spannuok"></span>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="usuario" class="control-label" style="margin-top: 7px;"><strong>Usuario</strong></label></div>
                                <div class="col-7">
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de Usuario" pattern=".{8,16}" required maxlength="16">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="nombre" class="control-label" style="margin-top: 7px;"><strong>Nombre y Apellido</strong></label></div>
                                <div class="col-7">
                                    <input class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" pattern=".{3,50}" required maxlength="50">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="acceso" class="control-label" style="margin-top: 7px;"><strong>Nivel de acceso</strong></label></div>
                                <div class="col-7">
                                    <select class="form-control" id="acceso" name="acceso" required>
                                        <?/*<option value="">-- Nivel de acceso --</option>*/?>
                                        <option value="l" selected>Lector</option>
                                        <option value="o" selected>Operador</option>
                                        <option value="s">Supervisor</option>
                                        <option value="a">Administrador</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="activo" class="control-label" style="margin-top: 7px;"><strong>Activo</strong></label></div>
                                <div class="col-7">
                                    <select class="form-control" id="activo" name="activo" required>
                                        <?/*<option value="">-- Activo --</option>*/?>
                                        <option value="s" selected>Si</option>
                                        <option value="n">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="user_password_1" class="control-label" style="margin-top: 7px;"><strong>Contraseña</strong></label></div>
                                <div class="col-7">
                                    <input type="password" class="form-control" id="user_password_1" name="user_password_1" placeholder="Contraseña" pattern=".{8,16}" autocomplete="new-password" required maxlength="16">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="user_password_2" class="control-label" style="margin-top: 7px;"><strong>Repita la contraseña</strong></label></div>
                                <div class="col-7">
                                    <input type="password" class="form-control" id="user_password_2" name="user_password_2" placeholder="Repita la contraseña" pattern=".{8,16}" autocomplete="new-password" required maxlength="16">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-buscar" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-custom" id="guardar_datos">Guardar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>