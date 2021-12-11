<div class="container-fluid table-responsive">
    <?php
    cargarComponente('breadcrumb', '', 'Abonos por autorizar');
    $abonos = CobranzaModelo::mdlMostrarAbonosPorAutorizarByCobrador(83);
    ?>
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr class="text-center">
                <th>CHK</th>
                <th># ABONO</th>
                <th>CLIENTE</th>
                <th>NÚMERO DE CUENTA</th>
                <th>RUTA</th>
                <th>SALDO ANTERIOR</th>
                <th>NUEVO SALDO</th>
                <th>ABONO</th>
                <th>COBRADOR</th>
                <th>NOTA</th>
                <th>FECHA DE ABONO</th>
                <th>FECHA PROGRAMADA DE COBRO</th>
                <th>FECHA REAGENDADA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($abonos as $key => $abs) : ?>
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
                    <td class="bg-success" ><?= $abs['ctr_numero_cuenta'] ?></td>
                    <td class="bg-success"><?= $abs['ctr_ruta'] ?></td>
                    <td><?= number_format($abs['ctr_saldo_actual'],2) ?></td>
                    <td><?= number_format($abs['ctr_saldo_actual'] - $abs['abs_monto'],2) ?></td>
                    <td class="bg-success" ><?= number_format( $abs['abs_monto'],2) ?></td>
                    <td><?= $abs['usr_nombre'] ?></td>
                    <td><?= $abs['abs_nota'] ?></td>
                    <td><?= $abs['abs_fecha_cobro'] ?></td>
                    <td><?= $abs['cra_fecha_cobro'] ?></td>
                    <td><?= $abs['cra_fecha_reagenda'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>