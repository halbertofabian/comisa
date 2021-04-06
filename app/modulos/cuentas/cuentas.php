<?php  ?>


<?php if (isset($rutas[0]) && !isset($rutas[1])) :
    cargarComponente('breadcrumb', '', 'Listar cuentas');

?>

    <div class="row">

        <div class="col-12">

            <a href="<?php echo HTTP_HOST . 'cuentas/new' ?>" class="btn btn-primary float-right mt-1 mb-2">Crear nueva cuenta</a>

        </div>

        <div class="col-12">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOMBRE</th>
                        <th>SALDO INICIAL</th>
                        <th>SALDO ACTUAL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $cuentas = CuentasModelo::mdlMostrarCuentas();

                    foreach ($cuentas as $key => $cbco) :

                    ?>

                        <tr>

                            <td><?php echo $cbco['cbco_id'] ?></td>
                            <td><a href="<?php echo HTTP_HOST . "cuentas/reporte/" . $cbco['cbco_id'] ?>"><?php echo $cbco['cbco_nombre'] ?></a> </td>
                            <td><?php echo number_format($cbco['cbco_monto_inicial'], 2) ?></td>
                            <td><?php echo number_format($cbco['cbco_monto_inicial'] + $cbco['cbco_saldo'], 2) ?></td>

                            <td></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>

    </div>



<?php elseif (isset($rutas[0]) && $rutas[1] == "new") :
    cargarComponente('breadcrumb', '', 'Nueva cuenta');
?>
    <form method="post">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="cbco_nombre">Nombre de la cuenta</label>
                    <input type="text" name="cbco_nombre" id="cbco_nombre" class="form-control" autofocus placeholder="">
                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">
                    <label for="cbco_saldo">Saldo</label>
                    <input type="text" name="cbco_saldo" id="cbco_saldo" class="form-control inputN" placeholder="">
                </div>

            </div>

            <div class="col-md-12">

                <input type="submit" class="btn btn-primary float-right mt-1" value="Guardar cuenta" name="btnGuardarCuenta">

            </div>
        </div>

        <?php
        $guardarCuenta = new CuentasControlador();
        $guardarCuenta->ctrAgregarCuentas();
        ?>
    </form>



<?php elseif (isset($rutas[0]) && $rutas[1] == "movimientos") :
    cargarComponente('breadcrumb', '', 'Movimientos de cuenta');

?>

    <br>

    <div class="card mt-4">

        <div class="card-header">
            <h5>INGRESOS</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-6 col-md-6">
                    <div class="form-group">
                        <label for="icta_cuenta">Cuenta</label>
                        <select class="form-control" name="icta_cuenta" id="icta_cuenta">
                            <?php
                            $cuentas = CuentasModelo::mdlMostrarCuentas();
                            foreach ($cuentas as $key => $cbco) : ?>

                                <option value="<?php echo $cbco['cbco_id'] ?>"><?php echo $cbco['cbco_nombre'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="icta_cantidad">Saldo</label>
                        <input type="text" name="icta_cantidad" id="icta_cantidad" class="form-control inputN" placeholder="">
                    </div>

                </div>

                <input type="hidden" value="INGRESO" name="cbco_tipo">

                <div class="col-md-12">

                    <input type="submit" class="btn btn-primary float-right mt-1" value="GUARDAR INGRESO" name="btnGuardarIngreso">

                </div>

            </div>
        </div>
    </div>

    <div class="card mt-4">

        <div class="card-header">
            <h5>EGRES0S</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-6 col-md-6">
                    <div class="form-group">
                        <label for="icta_cuenta">Cuenta</label>
                        <select class="form-control" name="icta_cuenta" id="icta_cuenta">
                            <?php
                            $cuentas = CuentasModelo::mdlMostrarCuentas();
                            foreach ($cuentas as $key => $cbco) : ?>

                                <option value="<?php echo $cbco['cbco_id'] ?>"><?php echo $cbco['cbco_nombre'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="icta_cantidad">Saldo</label>
                        <input type="text" name="icta_cantidad" id="icta_cantidad" class="form-control inputN" placeholder="">
                    </div>

                </div>
                <input type="hidden" value="EGRESO" name="cbco_tipo">

                <div class="col-md-12">

                    <input type="submit" class="btn btn-primary float-right mt-1" value="GUARDAR EGRESO" name="btnGuardarEgreso">

                </div>

            </div>
        </div>
    </div>

<?php elseif (isset($rutas[0]) && $rutas[1] == "reporte") :
    cargarComponente('breadcrumb', '', 'Movimientos de cuenta');


    $infMovimientoscta = CuentasModelo::mdlMostrarCuentasId($rutas[2]);
    $infocta = CuentasModelo::mdlMostrarNombreCTA($rutas[2]);
    //preArray($infocta);
?>
    <div class="container">
        <div class="row">
            <div class="form-group col-12">
                <h4>ESTADO DE CUENTA <?php echo $infocta['cbco_nombre'] ?></h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>$</th>
                            <th>Metodo de pago</th>
                            <th>Referencia</th>
                            <th>Usuario</th>
                            <th>Fecha</th>

                    </thead>
                    <tbody>
                        <?php

                        foreach ($infMovimientoscta as $key => $inf) :
                        ?>
                            <tr>
                                <th scope="row"><?php echo $inf['igs_id'] ?></th>
                                <td><?php echo number_format($inf['igs_monto'], 2)  ?></td>
                                <th><?php echo $inf['igs_mp'] ?></th>
                                <td><?php echo $inf['igs_referencia'] ?></td>
                                <td><?php echo $inf['igs_usuario_registro'] ?></td>
                                <td><?php echo $inf['igs_fecha_registro'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php else : ?>
    <div class="container">
        <h4>Pagina no encontrada</h4>
    </div>

<?php endif; ?>