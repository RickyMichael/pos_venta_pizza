<?php
    include "Views/Templates/header.php";
?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Medidas</li>
    </ol>
    <button class="btn btn-success my-2" type = "button" onclick="frmMedida();"><i class="fas fa-plus"></i> Nueva Medida</button>
    <table class="table table-light" id="tblMedidas">
        <thead class="thead-green">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nombre Corto</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="nueva_medida" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h5 class="modal-title text-white" id="title">Nueva Medida</h5>
                    <button class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-close text-white"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmMedida">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre de medida">
                        </div>
                        <div class="form-group">
                            <label for="nombre_corto">Nombre corto</label>
                            <input type="text" id="nombre_corto" class="form-control" name="nombre_corto" placeholder="Nombre corto">
                        </div>

                        <button class="btn btn-primary" type="button" onclick="registrarMed(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button" >Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include "Views/Templates/footer.php";
?>
