<?php  ?>

<div class="container">

    <?php

    if (isset($rutas[1]) && $rutas[1] == 'view-r' && isset($rutas[2])) :
        cargarComponente('breadcrumb', '', 'Corte #' . $rutas[2]);

        $corte = CajasModelo::mdlMostrarCajasById($rutas[2]);

        // preArray($corte);

    ?>

        <table class="table  table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Usuario responsable</th>
                    <th>Fecha de apertura</th>
                    <th>Fecha de cierre</th>
                    <th>Caja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $corte['usr_nombre'] ?></td>
                    <td><?php echo $corte['copn_fecha_abrio'] ?></td>
                    <td><?php echo $corte['copn_fecha_cierre'] ?></td>
                    <td><?php echo $corte['cja_nombre'] ?></td>
                </tr>
            </tbody>
        </table>

        <?php

        $vfch_efectivo = CortesModelo::mdlConsultarTodoFichasPEByCorte($corte['copn_id']);
        $vfch_banco = CortesModelo::mdlConsultarTodoFichasPBByCorte($corte['copn_id']);

        $ingreso_efectivo = CortesModelo::mdlConsultarTodoIngresosPEByCorte($corte['copn_id']);
        $ingreso_banco = CortesModelo::mdlConsultarTodoIngresosPBByCorte($corte['copn_id']);

        $gastos_efectivo = CortesModelo::mdlConsultarTodoGastosPEByCorte($corte['copn_id']);
        $gastos_banco = CortesModelo::mdlConsultarTodoGastosPBByCorte($corte['copn_id']);

        // preArray($vfch_banco);

        ?>
        <div class="alert alert-dark" role="alert">
            <strong>FICHAS DE PAGO EFECTIVO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th># Ficha</th>
                    <!-- <th>Referenica</th> -->
                    <th>Sub monto</th>
                    <th>Monto total</th>
                    <th>Cupón</th>
                    <th>Fecha registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vfch_efectivo as $key => $vfe) : ?>
                    <tr>

                        <td><?php echo $vfe['vfch_id'] ?></td>
                        <!-- <td><?php echo $vfe['vfch_referencia'] ?></td> -->
                        <td><?php echo number_format($vfe['vfch_sub_monto'], 2) ?></td>
                        <td><?php echo number_format($vfe['vfch_monto'], 2)  ?></td>
                        <td><?php echo $vfe['vfch_descuento'] ?></td>
                        <td><?php echo $vfe['vfch_fecha_registro'] ?></td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>

        <div class="alert alert-dark" role="alert">
            <strong>INGRESOS EFECTIVO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ingreso_efectivo as $key => $ins) : ?>
                    <tr>

                        <td><?php echo $ins['igs_id'] ?></td>
                        <td><?php echo $ins['igs_concepto'] ?></td>
                        <td><?php echo $ins['igs_monto'] ?></td>
                        <td><?php echo $ins['igs_fecha_registro'] ?></td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>

        <div class="alert alert-dark" role="alert">
            <strong>GASTOS EFECTIVO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gastos_efectivo as $key => $gst) : ?>
                    <tr>

                        <td><?php echo $gst['tgts_id'] ?></td>
                        <td><?php echo $gst['tgts_concepto'] ?></td>
                        <td><?php echo $gst['tgts_cantidad'] ?></td>
                        <td><?php echo $gst['tgts_fecha_gasto'] ?></td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>




        <div class="alert alert-info" role="alert">
            <strong>REPORTE EFECTIVO</strong>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <td>
                        Cantidad de inicio:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_ingreso_inicio'], 2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cantidad reportada:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_ingreso_efectivo'], 2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cantidad real:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_efectivo_real'], 2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Resultado:
                    </td>
                    <td>
                        <?php

                        $efectivo_r = $corte['copn_ingreso_efectivo'] - $corte['copn_efectivo_real'];

                        ?>
                        <strong><?php echo number_format($efectivo_r, 2); ?></strong>

                    </td>
                </tr>
            </thead>

        </table>

        <div class="alert alert-dark" role="alert">
            <strong>FICHAS DE PAGO BANCO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th># Ficha</th>
                    <th>Método de pago</th>
                    <th>Referenica</th>
                    <th>Sub monto</th>
                    <th>Monto total</th>
                    <th>Cupón</th>
                    <th>Fecha registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vfch_banco as $key => $vfb) : ?>
                    <tr>

                        <td><?php echo $vfb['vfch_id'] ?></td>
                        <td><?php echo $vfb['vfch_mp'] ?></td>
                        <td><?php echo $vfb['vfch_referencia'] ?></td>
                        <td><?php echo number_format($vfb['vfch_sub_monto'], 2) ?></td>
                        <td><?php echo number_format($vfb['vfch_monto'], 2)  ?></td>
                        <td><?php echo $vfb['vfch_descuento'] ?></td>
                        <td><?php echo $vfb['vfch_fecha_registro'] ?></td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
        <div class="alert alert-dark" role="alert">
            <strong>INGRESOS BANCO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Método de pagp</th>
                    <th>Monto</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ingreso_banco as $key => $ins) : ?>
                    <tr>

                        <td><?php echo $ins['igs_id'] ?></td>
                        <td><?php echo $ins['igs_concepto'] ?></td>
                        <td><?php echo $ins['igs_mp'] ?></td>
                        <td><?php echo $ins['igs_monto'] ?></td>
                        <td><?php echo $ins['igs_fecha_registro'] ?></td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>

        <div class="alert alert-dark" role="alert">
            <strong>GASTOS BANCO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Método de pago</th>
                    <th>Monto</th>
                    <th>Fecha de registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gastos_banco as $key => $gst) : ?>
                    <tr>

                        <td><?php echo $gst['tgts_id'] ?></td>
                        <td><?php echo $gst['tgts_concepto'] ?></td>
                        <td><?php echo $gst['tgts_mp'] ?></td>
                        <td><?php echo $gst['tgts_cantidad'] ?></td>
                        <td><?php echo $gst['tgts_fecha_gasto'] ?></td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>


        <div class="alert alert-info" role="alert">
            <strong>REPORTE BANCO</strong>
        </div>
        <table class="table">
            <thead>

                <tr>
                    <td>
                        Cantidad reportada:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_ingreso_banco'], 2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cantidad real:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_banco_real'], 2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Resultado:
                    </td>
                    <td>
                        <?php

                        $banco_r = $corte['copn_ingreso_banco'] - $corte['copn_banco_real'];

                        ?>
                        <strong><?php echo number_format($banco_r, 2); ?></strong>

                    </td>
                </tr>
            </thead>

        </table>





    <?php elseif (isset($rutas[1]) && $rutas[1] == 'view-t') : ?>

        <div class="container">

            <embed src="<?php echo HTTP_HOST ?>/app/report/corte.php?copn_id=<?php echo $rutas[2] ?>" width="100%" height="1200px" />

        </div>

        <? 
    else:
        cargarComponente('breadcrumb', '', 'Gestión de cortes');
    $cortes = CajasModelo::mdlMostrarCajasById();

    // preArray($cortes);
    ?>
        <div class="row">
            <div class="col-12">
                <table class="table tablas table-striped table-hover">
                    <thead>
                        <tr>
                            <th># CORTE</th>
                            <th>Ingreso inicial</th>
                            <th>Usuario abrio</th>
                            <th>Fecha de ingreso</th>
                            <th>Ingreso en caja</th>
                            <th>Ingreso en banco</th>
                            <th>Ingreso en caja real</th>
                            <th>Ingreso en banco real</th>
                            <th>Fecha de cierre</th>
                            <th>Usuario cerro</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cortes as $key => $cts) : ?>
                            <tr>

                                <td><?php echo $cts['copn_id'] ?></td>
                                <td><?php echo $cts['copn_ingreso_inicio'] ?></td>
                                <td><?php echo $cts['usr_nombre'] ?></td>
                                <td><?php echo $cts['copn_fecha_abrio'] ?></td>
                                <td><?php echo $cts['copn_ingreso_efectivo'] ?></td>
                                <td><?php echo $cts['copn_ingreso_banco'] ?></td>
                                <td> <strong class="text-primary"> <?php echo $cts['copn_efectivo_real'] ?> </strong> </td>
                                <td> <strong class="text-primary"> <?php echo $cts['copn_banco_real'] ?> </strong> </td>
                                <td><?php echo $cts['copn_fecha_cierre'] ?></td>
                                <td><?php echo $cts['copn_usuario_cerro'] ?></td>
                                <td>

                                    <a href="<?php echo HTTP_HOST . 'cortes/view-r/' . $cts['copn_id'] ?>" class="btn btn-secondary mt-1"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </i>
                                    </a>
                                    <a href="<?php echo HTTP_HOST . 'cortes/view-t/' . $cts['copn_id'] ?>" class="btn btn-secondary mt-1"><i class="fa fa-file-text" aria-hidden="true"></i>
                                        </i>
                                    </a>


                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>
</div>