<?php
if (isset($con)) {
    ?>
    <!-- Modal -->
    <div class="modal fade" id="recuperar_caso" tabindex="-1" role="dialog" aria-labelledby="recuperar_caso" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="recuperar_form" name="recuperar_form">
                <div class="modal-header">
                    <h4 class="modal-title" id="toggle_title"><i class="fas fa-edit"></i><span id="toggle_resid_titulo"></span>Recuperar caso</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <input type="hidden" id="NCaso" name="NCaso">
                <div class="modal-body">
                    <span id="recuperar_texto"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-buscar" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-custom" id="toggle_guardar">Confirmar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>