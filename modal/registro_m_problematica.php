<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="nuevom_problematica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <form class="form-horizontal was-validated" method="post" id="guardar_m_problematica" name="guardar_m_problematica" autocomplete="off" novalidate>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-edit"></i> Agregar nuevo motivo de la llamada (Problemáticas)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">

                        <div id="resultados_ajax_m_problematica">
                            <div id="divnrerr" class="alert alert-danger" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#divnrerr').hide(500);">&times;</button>
                                <strong>Error!</strong> 
                                <span id="spannrerr"></span>
                            </div>
                            <div id="divnrok" class="alert alert-success" style="display:none;" role="alert">
                                <button type="button" class="close"  onclick="javascript:$('#divnrok').hide(500);">&times;</button>
                                <strong>¡Bien hecho!</strong>
                                <span id="spannrok"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <div class="col-4 text-right"><label for="descr" class="control-label" style="margin-top: 7px;"><strong>Nombre</strong></label></div>
                                <div class="col-7">
                                    <input type="text" class="form-control" id="descr" name="descr" placeholder="Nombre" pattern=".{3,45}" required maxlength="45">
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