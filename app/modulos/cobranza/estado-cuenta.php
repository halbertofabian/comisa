<div class="containeir">
    <div class="row">
        <div class="col-xl-9 col-md-9 col-12">
            <div class="card">
                <div class="card-body">
                    <form id="form_consultar_cuenta" method="post">
                        <div class="row">
                            <div class="col-xl-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="ec_ruta">Ruta</label>
                                    <select name="ec_ruta" id="ec_ruta" class="form-control select2">
                                        <?php
                                        for ($i = 1; $i <= 100; $i++) :
                                        ?>
                                            <option value="R<?= $i ?>">R<?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="ec_cuenta">Cuenta</label>
                                    <input type="number" class="form-control" name="ec_cuenta" id="ec_cuenta" placeholder="">
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="btn_consultar_cuenta"></label><br>
                                    <input name="" id="btn_consultar_cuenta" class="btn btn-primary " type="submit" value="Buscar">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="form-group">
                                <label for="ec_cliente">Cliente</label>
                                <input type="text" class="form-control" name="ec_cliente" id="ec_cliente" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="ec_fecha_inicio">Fecha de inicio</label>
                                <input type="date" class="form-control" name="ec_fecha_inicio" id="ec_fecha_inicio" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>FOLIO</th>
                                        <th>FECHA</th>
                                        <th>M.P</th>
                                        <th>Nota</th>
                                        <th>PAGO</th>
                                        <th>SALDO</th>
                                        <th>STATUS</th>
                                        <th></th>
                                        <th>CANCELAR</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_estado_cuenta">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#mdlDescuento">Aplicar descuento</button>
                        </div>
                        <div class="col-12" id="btn-export-pdf">

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="ctr_elaboro">Vendedor</label>
                                <input type="text" class="form-control" name="ctr_elaboro" id="ctr_elaboro" placeholder="" readonly>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_precio">Precio</label>
                                <input type="hidden" id="ctr_id">
                                <input type="text" class="form-control" name="ec_precio" id="ec_precio" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_enganche">Enganche</label>
                                <input type="text" class="form-control" name="ec_enganche" id="ec_enganche" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_pago_adicional">Pago adicional</label>
                                <input type="text" class="form-control" name="ec_pago_adicional" id="ec_pago_adicional" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_pago">Pago</label>
                                <input type="text" class="form-control" name="ec_pago" id="ec_pago" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_saldo">Saldo inicial</label>
                                <input type="text" class="form-control" name="ec_saldo" id="ec_saldo" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_saldo_base">Saldo base</label>
                                <input type="text" class="form-control inputN" name="ec_saldo_base" id="ec_saldo_base" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_saldo_actual">Saldo actual</label>
                                <input type="text" class="form-control inputN" name="ec_saldo_actual" id="ec_saldo_actual" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_ultima_fecha">Ultima fecha</label>
                                <input type="date-time" class="form-control" name="ec_ultima_fecha" id="ec_ultima_fecha" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_total_pagado">Total pagado</label>
                                <input type="date-time" class="form-control" name="ec_total_pagado" id="ec_total_pagado" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ec_adeudo_corriente">Adeudo <br> corriente</label>
                                <input type="text" class="form-control bg-warning" name="ec_adeudo_corriente" id="ec_adeudo_corriente" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ec_atraso" id="label"><br><br></label>
                                <input type="text" class="form-control bg-warning" name="ec_atraso" id="ec_atraso" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="btn-actualizar-saldos">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlCancelarAbono" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titulo"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 abs_motivo_cancelacion">
                        <div class="form-group">
                            <label for="abs_motivo_cancelacion">Motivo de cancelación</label>
                            <input type="hidden" id="abs_id" name="abs_id">
                            <input type="hidden" id="abs_monto" name="abs_monto">
                            <textarea class="form-control text-uppercase" name="abs_motivo_cancelacion" id="abs_motivo_cancelacion" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-12 abs_codigo">
                        <div class="form-group">
                            <label for="abs_codigo">Codigo de cancelación</label>
                            <input type="number" class="form-control" name="abs_codigo" id="abs_codigo" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btnSolicitar btn-load">Solicitar</button>
                <button type="button" class="btn btn-primary btnVerificar">Verificar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlDescuento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Descuento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                          <label for=""></label>
                          <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>