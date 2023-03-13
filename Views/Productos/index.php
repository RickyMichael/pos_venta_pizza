<?php
    include "Views/Templates/header.php";
?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Productos</li>
    </ol>
    <button class="btn btn-success my-2" type = "button" onclick="frmProducto();"><i class="fas fa-plus"></i> Nuevo producto</button>
    <div class="table-responsive">
        <table class="table table-light" id="tblProductos">
            <thead class="thead-green">
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div id="nuevo_producto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-green">
                    <h5 class="modal-title text-white" id="title">Nuevo Producto</h5>
                    <button class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-close text-white"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmProducto">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="codigo_barra">Codigo de barra</label>
                                <input type="hidden" id="id" name="id">
                                <input type="text" id="codigo_barra" class="form-control" name="codigo_barra" placeholder="Codigo de barra">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nombre">Descripción</label>
                                <input type="text" id="nombre" class="form-control" name="nombre" placeholder="Descripción">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="precio_compra">Precio compra</label>
                                <input type="text" id="precio_compra" class="form-control" name="precio_compra" placeholder="Precio compra">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="precio_venta">Precio venta</label>
                                <input type="text" id="precio_venta" class="form-control" name="precio_venta" placeholder="Precio venta">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="medida">Medida</label>
                                    <select id="medida" class="form-control" name="medida">
                                        <?php foreach($data['medidas'] as $row) {?>
                                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <select id="categoria" class="form-control" name="categoria">
                                        <?php foreach($data['categorias'] as $row) {?>
                                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div class="card border-primary">
                                        <div class="car-body">
                                            <label for="foto" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                            <span id="icon-cerrar"></span>
                                            <input id="foto" class="d-none" type="file" onchange="preview(event)" name="foto">
                                            <input type="hidden" id="foto-actual" name="foto-actual">
                                            <!-- <input type="hidden" id="foto-delete" name = "foto-delete"> -->
                                            <img src="" alt="" class="img-thumbnail" id="img-preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button" onclick="registrarPro(event);" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button" >Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include "Views/Templates/footer.php";
?>
