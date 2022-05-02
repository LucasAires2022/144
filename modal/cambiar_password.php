<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-custom">
                <form class="form-horizontal was-validated" method="post" id="editar_password" name="editar_password" novalidate>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-edit"></i> Cambiar contraseña</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div id="resultados_ajax3">
                            <div id="diveperr" class="alert alert-danger" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#diveperr').hide(500);">&times;</button>
                                <strong>Error!</strong> 
                                <span id="spaneperr"></span>
                            </div>
                            <div id="divepok" class="alert alert-success" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#divepok').hide(500);">&times;</button>
                                <strong>¡Bien hecho!</strong>
                                <span id="spanepok"></span>
                            </div>
                        </div>

                        <div class="form-group" id="Sector-contraseña-actual">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="user_password_actual3" class="control-label" style="margin-top: 7px;"><strong>Contraseña actual</strong></label></div>
                                <div class="col-7">
                                    <input type="password" class="form-control" id="user_password_actual3" name="user_password_actual3" placeholder="Contraseña" pattern=".{8,16}"  autocomplete="password" required maxlength="16">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="user_password_new3" class="control-label" style="margin-top: 7px;"><strong>Nueva Contraseña</strong></label></div>
                                <div class="col-7">
                                    <input type="password" class="form-control" id="user_password_new3" name="user_password_new3" placeholder="Contraseña" pattern=".{8,16}"  autocomplete="new-password" required maxlength="16">
                                    <input type="hidden" id="user_id_mod" name="user_id_mod">
                                    <input type="hidden" id="session_u_id" name="session_u_id">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="user_password_repeat3" class="control-label" style="margin-top: 7px;"><strong>Repita la contraseña</strong></label></div>
                                <div class="col-7">
                                    <input type="password" class="form-control" id="user_password_repeat3" name="user_password_repeat3" placeholder="Repita la contraseña" pattern=".{8,16}"  autocomplete="new-password" required maxlength="16">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-buscar" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-custom" id="actualizar_datos3">Cambiar contraseña</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>	