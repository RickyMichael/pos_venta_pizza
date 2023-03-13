<?php
    include "Views/Templates/header.php";
?>
    <div class="card">
        <div class="card-header bg-green text-white">
            Datos de la empresa
        </div>
        <div class="card-body">
            <form id="frmEmpresa">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <label for="ruc">RUC</label>
                            <input id="ruc" class="form-control" type="text" name="ruc" value="<?php echo $data['ruc']; ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" value="<?php echo $data['nombre']; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefono">Telfono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $data['telefono']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $data['direccion']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje" class="form-control" rows="1" name="mensaje"><?php echo $data['mensaje']; ?></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="button" onclick="modificarEmpresa()">Modificar</button>
            </form>
        </div>
    </div>
<?php
    include "Views/Templates/footer.php";
?>