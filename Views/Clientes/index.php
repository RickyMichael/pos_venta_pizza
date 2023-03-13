<?php
    include "Views/Templates/header.php";
?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Clientes</li>
    </ol>
    <button class="btn btn-success my-2" type = "button" onclick="frmCliente();"><i class="fas fa-plus"></i> Nuevo Cliente</button>
    <table class="table table-light" id="tblClientes">
        <thead class="thead-green">
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                    <button class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-close text-white"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCliente">

                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" id="dni" class="form-control" name="dni" placeholder="DNI">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre del cliente">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea id="direccion" name="direccion" placeholder="Dirección" class="form-control" name="" rows="3"></textarea>
                        </div>

                        <button class="btn btn-primary" type="button" onclick="registrarCli(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button" >Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include "Views/Templates/footer.php";
?>
