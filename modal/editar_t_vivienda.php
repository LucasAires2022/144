<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <form class="form-horizontal was-validated" method="post" id="editar_t_vivienda" name="editar_t_vivienda" novalidate>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-edit"></i> Modificar opción de tenencia de vivienda</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <div id="resultados_ajax2">
                            <div id="divererr" class="alert alert-danger" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#divererr').hide(500);">&times;</button>
                                <strong>Error!</strong> 
                                <span id="spanererr"></span>
                            </div>
                            <div id="diverok" class="alert alert-success" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#diverok').hide(500);">&times;</button>
                                <strong>¡Bien hecho!</strong>
                                <span id="spanerok"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="descr2" class="control-label" style="margin-top: 7px;"><strong>Nombre</strong></label></div>
                                <div class="col-7">
                                    <input type="text" class="form-control" id="descr2" name="descr2" placeholder="Nombre" pattern=".{3,50}" required maxlength="50">
                                    <input type="hidden" id="mod_id" name="mod_id">
                                    <input type="hidden" id="mod_ordenar" name="mod_ordenar">
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
                        <button type="submit" class="btn btn-custom" id="actualizar_datos">Actualizar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>