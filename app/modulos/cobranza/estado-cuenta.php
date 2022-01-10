<div class="containeir">
    <div class="row">
        <div class="col-xl-9 col-md-9 col-8">
            <div class="card">
                <div class="card-body">
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
                                <input type="text" class="form-control" name="ec_cuenta" id="ec_cuenta" placeholder="">
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="btn_consultar_cuenta"></label><br>
                                <input name="" id="btn_consultar_cuenta" class="btn btn-primary" type="button" value="Buscar">
                            </div>
                        </div>
                    </div>
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
                                        <th>FECHA</th>
                                        <th>PAGO</th>
                                        <th>SALDO</th>
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
        <div class="col-xl-3 col-md-3 col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_precio">Precio</label>
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
                                <label for="ec_saldo">Saldo</label>
                                <input type="text" class="form-control" name="ec_saldo" id="ec_saldo" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_saldo_base">Saldo base</label>
                                <input type="text" class="form-control" name="ec_saldo_base" id="ec_saldo_base" placeholder="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="ec_saldo_actual">Saldo actual</label>
                                <input type="text" class="form-control" name="ec_saldo_actual" id="ec_saldo_actual" placeholder="" readonly>
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
                </div>
            </div>
        </div>
    </div>
</div>