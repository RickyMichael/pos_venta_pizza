<?php
    include "Views/Templates/header.php";
?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>
    <button class="btn btn-success my-2" type = "button" onclick="frmUsuario();"><i class="fas fa-plus"></i> Nuevo usuario</button>
    <table class="table table-light" id="tblUsuarios">
        <thead class="thead-green">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Caja</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                    <button class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmUsuario">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="hidden" id="id" name="id">
                            <input type="text" id="usuario" class="form-control" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Nombre">
                        </div>
                        <div class="row" id="claves">
                            <div class="form-group col-md-6">
                                <label for="contraseña">Contraseña</label>
                                <input type="password" id="contraseña" class="form-control" name="contraseña" placeholder="Contraseña">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="confirmar">Confirmar contraseña</label>
                                <input type="password" id="confirmar" class="form-control" name="confirmar" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="caja">Caja</label>
                            <select id="caja" class="form-control" name="caja">
                                <?php foreach($data['cajas'] as $row) {?>
                                    <option value="<?php echo $row['id']; ?>" ><?php echo $row['caja']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button" >Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include "Views/Templates/footer.php";
?>
