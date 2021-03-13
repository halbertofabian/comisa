<?php
if (isset($rutas[0]) && $rutas[1] == 'cobrador' && !isset($rutas[2])) :
    cargarComponente('breadcrumb', '', 'Comisiones por cobrador');
?>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="fch_usr">Seleccione un empledo</label>
                <select name="fch_usr" id="fch_usr" class="form-group select2">
                    <?php
                    $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                    foreach ($usuarios as $key => $usr) : ?>
                        <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fch_fecha_inicio">Fecha inicio</label>
                <input type="date" name="fch_fecha_inicio" id="fch_fecha_inicio" class="form-control" placeholder="">

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fch_fecha_fin">Fecha fin</label>
                <input type="date" name="fch_fecha_fin" id="fch_fecha_fin" class="form-control" placeholder="">

            </div>
        </div>
        <div class="col-md-3 mb-">
            <br>
            <button type="submit" class="btn btn-primary btn-load buscarFichaByUsr">Buscar ficha</button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-dark" role="alert">
                <strong>COBRANZA</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 table-reponsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Fecha registro</th>
                        <th>Usuario recibio</th>
                        <th>MP</th>
                    </tr>
                </thead>
                <tbody id="tbodyCobranza">

                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: right;">
                            <strong> COBRO $ </strong>
                        </th>
                        <th colspan="2">
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_cobro" id="fch_cobro">
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">
                            <strong> COMISIÓN $ </strong>
                        </th>
                        <th>
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_comision" id="fch_comision">
                        </th>
                        <th>
                            <input type="text" class="form-control" style="border:none; border-bottom: 1px solid #000; background: transparent; " value="10" name="fch_porcentaje" id="fch_porcentaje">
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">
                            <strong> DESCUENTO $ </strong>
                        </th>
                        <th colspan="2">
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_descuento" id="fch_descuento">
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">
                            <strong> A PAGAR $ </strong>
                        </th>
                        <th colspan="2">
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_pagar" id="fch_pagar">
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: right;">
                            <strong> GASTOS GASOLINA $ </strong>
                        </th>
                        <th>
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_gasolina" id="fch_gasolina">
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">
                            <strong> GASTOS REFACCIONES $ </strong>
                        </th>
                        <th>
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_refacciones" id="fch_refacciones">
                        </th>
                    </tr>
                    <tr>
                        <th style="text-align: right;">
                            <strong> DEUDA EXTERNA $ </strong>
                        </th>
                        <th>
                            <input type="text" class="form-control inputN" style="border:none; border-bottom: 1px solid #000; background: transparent; " name="fch_deuda_ext" id="fch_deuda_ext">
                        </th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
<?php elseif ((isset($rutas[0]) && $rutas[1] == 'cobrador') && isset($rutas[2])) : ?>

<?php endif; ?>