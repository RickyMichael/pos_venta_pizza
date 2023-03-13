<?php
    include "Views/Templates/header.php";
?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Cajas</li>
    </ol>
    <button class="btn btn-success my-2" type = "button" onclick="frmCaja();"><i class="fas fa-plus"></i> Nueva caja</button>
    <table class="table table-light" id="tblCajas">
        <thead class="thead-green">
            <tr>
                <th>ID</th>
                <th>Caja</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="nueva_caja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h5 class="modal-title text-white" id="title">Nueva Caja</h5>
                    <button class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-close text-white"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCaja">

                        <div class="form-group">
                            <label for="caja">Nombre caja</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" id="caja" class="form-control" name="caja" placeholder="Nombre de la caja">
                        </div>

                        <button class="btn btn-primary" type="button" onclick="registrarCaja(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button" >Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include "Views/Templates/footer.php";
?>
