<div class="container-fluid table-responsive">

    <?php
    cargarComponente('breadcrumb', '', 'Pagos por autorizar');

    ?>
    <form method="post" action="">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">COBRADOR</label>
                    <select name="" id="" class="form-control select2" placeholder="">
                        <option value=""></option>
                        <?php
                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($usuarios as $key => $usr) :
                        ?>
                            <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="" class="btn btn-dark mt-1 float-right mb-1">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <?php
    if (!isset($_POST['btnMostrarAbonos'])) {
        $abonos = CobranzaModelo::mdlMostrarAbonosPorAutorizarByCobrador();
    }

    ?>
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr class="text-center">
                <th colspan="3">NOMBRE DEL COBRADOR:</th>
                <th colspan="3">GERARDO</th>
                <th>RUTA</th>
                <th>R3</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>

            </tr>
            <tr class="text-center">
                <th>CHK</th>
                <th># PAGO</th>
                <th>CLIENTE</th>
                <th>NÚMERO DE CUENTA</th>
                <!-- <th>RUTA</th> -->
                <th>SALDO ANTERIOR</th>
                <th>NUEVO SALDO</th>
                <th>PAGO</th>
                <th>MP</th>
                <th>REFERENCIA</th>
                <th>NOTA</th>
                <!-- <th>COBRADOR</th> -->
                <th>FECHA DE PAGO</th>

                <th>FORMA PAGO</th>
                <th>DÍA PAGO</th>
                <th>PROXIMA FECHA PAGO</th>

            </tr>
        </thead>
        <tbody class="text-center">

            <?php
            $total_pago = 0;
            $total_efectivo = 0;
            $total_banco = 0;
            foreach ($abonos as $key => $abs) :
                $total_pago += $abs['abs_monto'];
                if ($abs['abs_mp'] == "EFECTIVO") {
                    $total_efectivo += $abs['abs_monto'];
                } else {
                    $total_banco += $abs['abs_monto'];
                }
            ?>
                <tr class="text-center">
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue">
                            </label>
                        </div>
                    </td>
                    <td><?= $abs['abs_id'] ?></td>
                    <td><?= $abs['ctr_cliente'] ?></td>
                    <td class="bg-success"><?= $abs['ctr_numero_cuenta'] ?></td>
                    <!-- <td class=""><?= $abs['ctr_ruta'] ?></td> -->
                    <td><?= number_format($abs['ctr_saldo_actual'], 2) ?></td>
                    <td><?= number_format($abs['ctr_saldo_actual'] - $abs['abs_monto'], 2) ?></td>
                    <td class="bg-success"><?= number_format($abs['abs_monto'], 2) ?></td>
                    <td><?= $abs['abs_mp'] ?></td>
                    <td><?= $abs['abs_referancia'] ?></td>
                    <td><?= $abs['abs_nota'] ?></td>
                    <!-- <td><?= $abs['usr_nombre'] ?></td> -->
                    <td><?= $abs['abs_fecha_cobro'] ?></td>
                    <th><?= $abs['ctr_forma_pago'] ?></th>
                    <th><?= $abs['ctr_dia_pago'] ?></th>
                    <th><?= $abs['cra_fecha_cobro'] ?></th>

                </tr>

            <?php endforeach; ?>
            <tr>
                <td>CUENTAS COBRADAS</td>
                <td>(<?= $key + 1 ?>)</td>
                <td></td>
                <td></td>
                <td></td>
                <td>TOTAL:</td>
                <td><?= number_format($total_pago, 2) ?></td>
                <td>EFECTIVO:</td>
                <td><?= number_format($total_efectivo) ?></td>
                <td>BANCO:</td>
                <td><?= number_format($total_banco) ?></td>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
    </table>
</div>