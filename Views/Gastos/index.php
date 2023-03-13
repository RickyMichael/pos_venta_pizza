<?php
    include "Views/Templates/header.php";
?>
    <div class="card">
        <div class="card-header bg-green text-white">
            Nuevo Gasto
        </div>
        <div class="card-body">
            <form id="frmCompra">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigo"><i class="fas fa-barcode"></i> Codigo</label>
                            <input type="hidden" id="id" name="id">
                            <input id="codigo" class="form-control" type="text" name="codigo" placeholder="codigo de barras" onkeyup="buscarCodigo(event)">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="nombre">Descripción</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Descripcion del producto" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cantidad">Cant</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" onkeyup="calcularPrecio(event)">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio compra" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sub_total">Sub Total</label>
                            <input id="sub_total" class="form-control" type="text" name="sub_total" placeholder="Sub total" disabled>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-md-2 d-flex align-items-end">
                        <div class="form-group">
                            <div class="btn btn-success" type="button" onclick="generarCompra()">Generar Compra</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input id="total" class="form-control" type="text" name="total" placeholder="Total" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-light table-bordered table-hover">
        <thead class="thead-green">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Sub Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tblDetalle">

        </tbody>
    </table>

<?php
    include "Views/Templates/footer.php";
?>
