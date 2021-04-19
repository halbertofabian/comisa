<?php


$usr = UsuariosModelo::mdlMostrarUsuarios($rutas[2]);
if ($rutas[1] == 'cobranza') :
    cargarComponente('breadcrumb', '', 'REPORTES DE COBRANZA <strong class="text-dark">' . strtoupper($usr['usr_nombre']) . '</strong>');
?>

    <div class="row">
        <div class="col-md-12">
            <?php

            $cobranza = CajasModelo::mdlMostrarCajasByIdUsuario($rutas[2]);
            // preArray($cobranza);


            ?>

            <table class="table tablas table-light tablas table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usurio responsable</th>
                        <th>Fecha apertura</th>
                        <th>Fecha cierre</th>
                        <th>Monto efectivo</th>
                        <th>Monto banco</th>
                        <th>Caja</th>
                        <th>Saldo caja</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($cobranza as $key => $cbz) : ?>
                        <tr>
                            <td><?php echo $cbz['copn_id'] ?></td>
                            <td><?php echo $cbz['usr_nombre'] ?></td>
                            <td><?php echo fechaCastellano($cbz['copn_fecha_abrio']) ?></td>
                            <td><?php echo fechaCastellano($cbz['copn_fecha_cierre']) ?></td>
                            <td><?php echo number_format($cbz['copn_ingreso_efectivo'], 2) ?></td>
                            <td><?php echo number_format($cbz['copn_ingreso_banco'], 2) ?></td>
                            <td><?php echo $cbz['cja_nombre'] ?></td>
                            <td><?php echo number_format($cbz['copn_saldo'], 2) ?></td>
                            <td><?php echo $cbz['copn_registro'] ?></td>
                            <td> <a target="_blank" href="<?php echo HTTP_HOST . 'app/report/reporte-cobranza-usuario.php?copn_id=' . $cbz['copn_id']  ?>" class="btn btn-outline-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php elseif ($rutas[1] == 'ventas') :
    cargarComponente('breadcrumb', '', 'REPORTES DE VENTAS <strong class="text-dark">' . strtoupper($usr['usr_nombre']) . '</strong>');
?>
    <div class="row">
        <div class="col-md-12">
            <?php

            $ventas = CajasModelo::mdlMostrarCajasByIdUsuario($rutas[2]);
            // preArray($ventas);


            ?>

            <table class="table tablas table-light tablas table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usurio responsable</th>
                        <th>Fecha apertura</th>
                        <th>Fecha cierre</th>
                        <th>Monto efectivo</th>
                        <th>Monto banco</th>
                        <th>Caja</th>
                        <th>Saldo caja</th>
                        <th>Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($ventas as $key => $cbz) : ?>
                        <tr>
                            <td><?php echo $cbz['copn_id'] ?></td>
                            <td><?php echo $cbz['usr_nombre'] ?></td>
                            <td><?php echo fechaCastellano($cbz['copn_fecha_abrio']) ?></td>
                            <td><?php echo fechaCastellano($cbz['copn_fecha_cierre']) ?></td>
                            <td><?php echo number_format($cbz['copn_ingreso_efectivo'], 2) ?></td>
                            <td><?php echo number_format($cbz['copn_ingreso_banco'], 2) ?></td>
                            <td><?php echo $cbz['cja_nombre'] ?></td>
                            <td><?php echo number_format($cbz['copn_saldo'], 2) ?></td>
                            <td><?php echo $cbz['copn_registro'] ?></td>
                            <td> <a target="_blank" href="<?php echo HTTP_HOST . 'app/report/reporte-cobranza-usuario.php?copn_id=' . $cbz['copn_id']  ?>" class="btn btn-outline-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>