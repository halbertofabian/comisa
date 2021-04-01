<?php
cargarComponente('breadcrumb', '', 'Nueva compra');
?>
<div class="container">

    <div class="row">

        <div class="form-group col-md-6 col-12">
            <label for="cps_almacen">Almacen</label>
            <select name="cps_almacen" id="cps_almacen" class="form-control select2" >
                <option value="">Elija el almacen</option>
            </select>
        </div>

        <div class="form-group col-md-6 col-12">
            <label for="cps_proveedor">Nombre del proveedor</label>
            <select name="cps_proveedor" id="cps_proveedor" class="form-control select2">
                <option value="">Elija el proveedor</option>
            </select>
            <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlProveedor">
                Agregar nuevo proveedor
            </button>
        </div>


        <div class="form-group col-md-6 col-12">
            <form method="post" enctype="multipart/form-data" id="formImportarProductosExcel">
                <label for="cps_excel">Documento adjunto</label>
                <input type="file" class="form-control-file" name="cps_excel" id="cps_excel">

                <button type="submit" class="btn btn-success mt-1 float-right btnImportarProductosExcel">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    Importar productos
                </button>
            </form>
        </div>

        <div class="form-group col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Codigo</th>
                        <th>Cantidad</th>
                        <th>PU</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="tbodyNuevaCompra">
                </tbody>
            </table>
        </div>

        <div class="alert alert-dark col-12" role="alert">
            <strong>TOTAL $ </strong><strong id="totaldecompra"></strong>
        </div>

        <div class="form-group col-md-4 col-12">
            <label for="abs_costoEnvio">Costo de envio</label>
            <input type="text" name="abs_costoEnvio" id="abs_costoEnvio" class="form-control inputN" value="0.00" placeholder="0.00">
        </div>
        <div class="form-group col-12 col-md-8">
            <label for="cps_nota">Nota</label>
            <textarea class="form-control" name="cps_nota" id="cps_nota" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Articulos</th>
                        <th>Total</th>
                        <th>Costo de envio</th>
                        <th>Gran total</th>

                    </tr>
                </thead>
                <tbody id="tbodygeneral">

                </tbody>
            </table>
        </div>

        <div class="form-group col-12">
            <button type="submit" class="btn btn-primary float-right " name="btnGuardarCompra">Guardar Compra</button>
        </div>
    </div>
    <?php
    $crearCompra = new ComprasControlador();
    $crearCompra->ctrGuardarCompra();
    ?>

</div>


<div class="modal fade" id="mdlProveedor" tabindex="-1" aria-labelledby="mdlProveedorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlProveedorLabel">Nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formAddProveedor">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="pvs_nombre">Nombre del proveedor</label>
                        <input type="text" name="pvs_nombre" id="pvs_nombre" class="form-control" placeholder="Introduzca el nombre del proveedor / empresa ">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Agregar proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>

