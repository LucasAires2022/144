<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="toggle_activo" tabindex="-1" role="dialog" aria-labelledby="ModalLabel4" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="toggle_form" name="toggle_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="toggle_title"><i class="fas fa-edit"></i><span id="toggle_resid_titulo"></span>Descartar caso</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                
                <div class="modal-body">
                    <span id="toggle_texto">Se descartará el caso ¿Está seguro?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-buscar" data-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="javascript:descartar();" class="btn btn-custom" id="toggle_guardar">Confirmar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>