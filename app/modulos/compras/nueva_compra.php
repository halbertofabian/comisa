<div class="container">
    <form id="form_compra" method="$_POST">

        <div class="row">


            <div class="form-group col-md-4 col-12">
                <label for="cps_ams_id">Almacen</label>
                <select class="form-control select2" name="cps_ams_id" id="cps_ams_id">
                    <option value="">Elija el almacen</option>
                    <?php
                    $almacenes = AlmacenesModelo::mdlMostrarAlmacenes($_SESSION['session_suc']['scl_id']);
                    foreach ($almacenes as $key => $ams) :
                    ?>
                        <option value="<?php echo $ams['ams_id'] ?>"><?php echo $ams['ams_nombre'] ?></option>

                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-4 col-12">
                <label for="cps_proveedor">Nombre del proveedor</label>
                <select name="cps_proveedor" id="cps_proveedor" class="form-control select2">
                    <option value="">Elija el proveedor</option>
                    <?php
                    $proveedores = ProveedoresModelo::mdlMostrarProveedores();
                    foreach ($proveedores as $key => $pvs) :
                    ?>
                        <option value="<?php echo $pvs['pvs_id'] ?>"><?php echo $pvs['pvs_nombre'] ?></option>

                    <?php endforeach;
                    ?>
                </select>
                <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlProveedor">
                    Agregar nuevo proveedor
                </button>
            </div>
            <div class="form-group col-md-4 col-12">
                <label for="cps_folio">Folio</label>
                <input type="text" name="cps_folio" id="cps_folio" class="form-control">
            </div>


            <div class="form-group col-md-6 col-12">

                <label for="cps_excel">Documento adjunto</label>
                <input type="file" class="form-control-file" name="cps_excel" id="cps_excel">

                <button type="button" class="btn btn-success mt-3 btnImportarProductosExcel">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    Importar productos
                </button>

            </div>
            <div class="form-group col-md-6 col-12">
                <label for="cps_fecha">Fecha de compra</label>
                <input type="date" class="form-control-file theDate" name="cps_fecha" id="cps_fecha">
            </div>
        </div>

        <div class="row">
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
            <input type="hidden" name="cps_num_articulos" id="cps_num_articulos">
            <input type="hidden" name="cps_total" id="cps_total">
            <input type="hidden" name="cps_gran_total" id="cps_gran_total">
            <input type="hidden" name="cps_productos" id="cps_productos">

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
        </div>

        <div class="row">

            <div class="alert alert-dark col-12" role="alert">
                <strong>Tipo de pago </strong>
            </div>

            <div class="form-group col-md-4 col-12">
                <label for="cps_tipop">Tipo de pago</label>
                <select name="cps_tipop" id="cps_tipop" class="form-control select2" required>
                    <option value="">Elija tipo de pago</option>
                    <option>CONTADO</option>
                    <option>CREDITO</option>
                </select>
            </div>

            <div class="form-group col-md-4 col-12">
                <label for="cps_mtdpago">Metodo de pago</label>
                <select name="cps_mtdpago" id="cps_mtdpago" class="form-control select2">
                    <option>EFECTIVO</option>
                    <option>DEPOSITO</option>
                    <option>TRANSFERENCIA</option>
                    <option value="TARJETA">TARJETA DE CREDITO/DEBITO</option>
                </select>

            </div>
            <div class="form-group col-md-4 col-12">
                <label for="cps_monto">Monto</label>
                <input type="text" name="cps_monto" id="cps_monto" class="form-control inputN">
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary float-right btn-load " name="btnGuardarCompra" id="btnGuardarCompra">Guardar Compra</button>
            </div>
        </div>
    </form>

    <?php
    // $crearCompra = new ComprasControlador();
    // $crearCompra->ctrGuardarCompra();
    ?>

</div>