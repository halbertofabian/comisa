<script>
    var pagina = ""
</script>

<?php

// preArray($rutas[1]);

?>

<div class="row">
    <div class="col-12">
        <?php cargarComponente('breadcrumb', '', 'Flujo de caja por usuario'); ?>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="flujo_usr">Nombre del usuario</label>
            <select name="flujo_usr" id="flujo_usr" class="form-control select2">
                <option value="">Seleccione un usuario</option>
                <?php

                $usuarios = UsuariosModelo::mdlMostrarUsuarios();

                foreach ($usuarios as $key => $usr) :

                ?>

                    <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre'] ?></option>

                <?php endforeach; ?>
            </select>

        </div>

        <?php if (isset($rutas[1])) : ?>

            <script>
                var flujo_usr = <?= $rutas[1] ?>;

                $('#flujo_usr').val(flujo_usr).trigger('change');
            </script>

        <?php endif; ?>
    </div>
    <div class="col-md-4  d-none">
        <button class="btn btn-success mt-4">Abrir caja para este usuario</button>
    </div>
    <div class="col-md-4 btn-close-cash d-none">
        <button class="btn btn-danger mt-4">Cerrar caja para este usuario</button>
    </div>

</div>
<div class="row content-flujo d-none">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text-success" style="font-size:18px">FLUJO DE INGRESOS (+)</h5>
                <div class="row">
                    <div class="col-12">
                        <form method="post" id="formIngreso">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="igs_usuario">Registrar ingreso para:</label>
                                        <input type="text" name="igs_usuario" id="igs_usuario" class="form-control" readonly>
                                        <input type="hidden" name="igs_usuario_responsable" id="igs_usuario_responsable">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="igs_tipo">TIPO DE INGRESO</label>
                                        <select class="form-control select2" name="igs_tipo" id="igs_tipo" required>
                                            <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                                                <!-- <option value="">SELECCIONE TIPO DE INGRESO</option> -->
                                                <option selected>COBRANZA</option>
                                                <option value="COBRANZA_CREDICONTADO">CREDICONTADO DE COBRANZA</option>
                                                <!-- <option value="DEPOSITOS_COBRANZA">DEPOSITOS</option>
                                            <option value="ABONOS_COBRANZA">ABONOS</option>
                                            <option value="OTROS_COBRANZA">OTROS</option>
                                            <option value="PRESTO_CP_SAMUEL_COBRANZA">PRESTO CP. SAMUEL</option> 
                                            <option value="REINGRESOS_COBRANZA">REINGRESOS</option>-->
                                                <!-- <option value="S/E_VENTAS">S/E</option>
                                                <option value="CONTADO_VENTAS">CONTADO</option>
                                                <option value="OTROS_COBRANZA">OTROS</option> -->
                                            <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                                <option value="">SELECCIONE TIPO DE INGRESO</option>
                                                <option value="S/E_VENTAS">S/E</option>
                                                <option value="CONTADO_VENTAS">CONTADO</option>
                                                <!-- <option>COBRANZA</option> -->
                                                <!-- <option value="DEPOSITOS_COBRANZA">DEPOSITOS</option>
                                            <option value="ABONOS_COBRANZA">ABONOS</option>
                                            <option value="OTROS_COBRANZA">OTROS</option>
                                            <option value="PRESTO_CP_SAMUEL_COBRANZA">PRESTO CP. SAMUEL</option> 
                                            <option value="REINGRESOS_COBRANZA">REINGRESOS</option>-->

                                                <!-- <option value="OTROS_COBRANZA">OTROS</option> -->
                                            <?php else : ?>
                                                <option value="">SELECCIONE TIPO DE INGRESO</option>
                                                <option>COBRANZA</option>
                                                <option value="COBRANZA_CREDICONTADO">CREDICONTADO DE COBRANZA</option>
                                                <!-- <option value="DEPOSITOS_COBRANZA">DEPOSITOS</option>
                                            <option value="ABONOS_COBRANZA">ABONOS</option>
                                            <option value="OTROS_COBRANZA">OTROS</option>
                                            <option value="PRESTO_CP_SAMUEL_COBRANZA">PRESTO CP. SAMUEL</option> 
                                            <option value="REINGRESOS_COBRANZA">REINGRESOS</option>-->
                                                <option value="S/E_VENTAS">S/E</option>
                                                <option value="CONTADO_VENTAS">CONTADO</option>
                                                <option value="OTROS_COBRANZA">OTROS</option>
                                            <?php endif; ?>

                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="igs_ruta" id="igs_ruta">


                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="igs_monto">Cantidad</label>
                                        <input type="text" name="igs_monto" id="igs_monto" class="form-control inputN" required placeholder="0.00">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="igs_concepto">Concepto:</label>
                                        <input type="text" name="igs_concepto" id="igs_concepto" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-6">
                                    <label for="igs_mp">Método de pago</label>
                                    <select name="igs_mp" id="igs_mp" class="form-control">
                                        <option>EFECTIVO</option>
                                        <option>DEPOSITO</option>
                                        <option>TRANSFERENCIA</option>
                                        <option>TARJETA DE CREDITO / DEBITO </option>
                                    </select>
                                </div>
                                <div class="col-md-6"></div>

                                <div class="col-md-12 content-cuenta d-none" id="content-cuenta">
                                    <div class="row">

                                        <div class="col-6 col-md-6">
                                            <div class="form-group">
                                                <label for="igs_cuenta">Cuenta</label>
                                                <select class="form-control select2" name="igs_cuenta" id="igs_cuenta">

                                                    <option value="">Seleccione una cuenta</option>
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
                                                <label for="igs_referencia">Referencia</label>
                                                <input type="text" name="igs_referencia" id="igs_referencia" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>

                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button> -->
                                <button type="submit" class="btn btn-primary btn-load" name="btnAgregarIngreso">Registrar ingreso</button>
                            </div>
                            <?php
                            // $crearIngreso = new IngresosControlador();
                            // $crearIngreso->ctrAgregarIngresos();

                            ?>
                        </form>
                    </div>

                </div>
            </div>
            <!-- <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario registro</th>
                                    <th>Fecha</th>
                                    <th class="text-danger"> <strong>Monto</strong> </th>
                                    <th>MP</th>
                                    <th>Concepto</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyIngresos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive table-igs">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario registro</th>
                                    <th>Fecha</th>
                                    <th class="text-danger"> <strong>Monto</strong> </th>
                                    <th>MP</th>
                                    <th>Concepto</th>
                                    <th>Empleado</th>
                                    <th class="text-center">Marcador</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyIngresos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="text-danger" style="font-size:18px">FLUJO DE GASTOS (-)</h5>
                <div class="row">
                    <form method="post" id="formGasto">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="tgts_usuario_responsable">Registrar gasto para: </label>

                                    <input type="text" name="tgts_usuario" id="tgts_usuario" class="form-control" readonly>
                                    <input type="hidden" name="tgts_usuario_responsable" id="tgts_usuario_responsable">

                                    <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                                        <input type="hidden" name="tgts_tipo" id="tgts_tipo" value="COBRANZA">
                                    <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                        <input type="hidden" name="tgts_tipo" id="tgts_tipo" value="VENTAS">
                                    <?php else : ?>
                                        <input type="hidden" name="tgts_tipo" id="tgts_tipo" value="COBRANZA">
                                    <?php endif; ?>


                                </div>

                                <input type="hidden" name="tgts_ruta" id="tgts_ruta">

                                <div class="form-group col-md-6 col-12">
                                    <label for="tgts_categoria">Categoría</label>
                                    <select name="tgts_categoria" id="tgts_categoria" class="form-control select2">
                                        <option value="">Elija una categoría</option>
                                    </select>
                                    <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlCategoria">
                                        Agregar nueva categoría
                                    </button>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label for="tgts_cantidad">Cantidad</label>
                                    <input type="text" name="tgts_cantidad" id="tgts_cantidad" class="form-control inputN" placeholder="0.00">
                                </div>
                                <div class="form-group col-12 col-md-8">
                                    <label for="tgts_concepto">Concepto</label>
                                    <input type="text" name="tgts_concepto" id="tgts_concepto" class="form-control" placeholder="Escriba el concepto de este gasto">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="tgts_mp">Método de pago</label>
                                    <select readonly name="tgts_mp" id="tgts_mp" class="form-control">
                                        <option selected>EFECTIVO</option>
                                        <option>TRANSFERENCIA</option>
                                        <option>DEPOSITO</option>
                                        <option>TARJETA DE CREDITO / DEBITO </option>
                                    </select>
                                </div>
                                <input type="hidden" name="tgts_nota">


                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button> -->
                            <button type="submit" class="btn btn-primary btn-load" name="btnGuardarGasto">Registrar gasto</button>
                        </div>

                    </form>
                </div>

            </div>
            <!-- <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario registro</th>
                                    <th>Fecha</th>
                                    <th class="text-danger"> <strong>Monto</strong> </th>
                                    <th>MP</th>
                                    <th>Concepto</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyGastos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-responsive table-gts">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario registro</th>
                                    <th>Fecha</th>
                                    <th class="text-danger"> <strong>Monto</strong> </th>
                                    <th>MP</th>
                                    <th>Concepto</th>
                                    <th>Empleado</th>
                                    <th class="text-center">Marcador</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyGastos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4">

        <div class="card">

            <div class="card-body">
                <div class="card-title">FLUJO EFECTIVO</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Entrada:</th>
                            <th><strong id="igs_efectivo"></strong></th>
                            <input type="hidden" name="" id="igs_efectivo_input">
                        </tr>
                        <tr>
                            <th>Salida:</th>
                            <th><strong id="tgts_efectivo"></strong></th>
                            <input type="hidden" name="" id="tgts_efectivo_input">

                        </tr>
                        <tr style="background-color:blue; color:#fff; font-size: 20px;">
                            <th>Entregar: </th>
                            <th><strong id="total_efectivo"></strong></th>
                            <input type="hidden" name="" id="total_efectivo_input">

                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="card">

            <div class="card-body">
                <div class="card-title">FLUJO BANCO</div>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Entrada:</th>
                            <th><strong id="igs_banco"></strong></th>
                            <input type="hidden" name="" id="igs_banco_input">

                        </tr>
                        <tr>
                            <th>Salida:</th>
                            <th><strong id="tgts_banco"></strong></th>
                            <input type="hidden" name="" id="tgts_banco_input">

                        </tr>
                        <tr>
                            <th>Entregar: </th>
                            <th><strong id="total_banco"></strong></th>
                            <input type="hidden" name="" id="total_banco_input">

                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
    <div class="col-md-4">

        <div class="card">

            <div class="card-body">
                <div class="card-title">FLUJO TOTAL</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Entrada:</th>
                            <th><strong id="total_ing"></strong></th>
                        </tr>
                        <tr>
                            <th>Salida:</th>
                            <th><strong id="total_gts"></strong></th>
                        </tr>
                        <tr>
                            <th>Entregar: </th>
                            <th><strong id="total"></strong></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>

    <!-- PRESTAMOS -->

    <!-- <div class="col-md-6">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Prestamos</h4>
                <div class="form-group">
                    <label for="pms_usuario">Empleado</label>
                    <select class="form-control select2" name="pms_usuario" id="pms_usuario">
                        <option value="">Seleccione a un empleado a prestar</option>
                        <?php
                        $empleados = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($empleados as $key => $usr) :
                        ?>
                            <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pms_cantidad">Cantidad</label>
                    <input type="text" name="pms_cantidad" id="pms_cantidad" class="form-control inputN">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-load" id="btnGuardarPrestamo">Guardar</button>
                </div>

            </div>
        </div>
    </div> -->
</div>

<div class="div content-abrir-caja d-none">
    <form method="post">
        <?php
        $cajas = CajasModelo::mdlMostrarCajasDisponibles($_SESSION['session_suc']['scl_id']);
        ?>
        <div class="row ">
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">Abrir caja para:</label>
                    <input type="text" name="copn_usuario" id="copn_usuario" class="form-control" readonly placeholder="" aria-describedby="helpId">
                    <input type="hidden" name="copn_usuario_abrio" id="copn_usuario_abrio">
                </div>
            </div>

            <div class="col-12 col-md-4">

                <label for="copn_id_caja">Cajas disponibles para <strong class="text-primary"><?php echo $_SESSION['session_suc']['scl_nombre'] ?> </strong> </label>
                <select name="copn_id_caja" id="copn_id_caja" class="form-control select2">
                    <option value="0">Selecione una caja</option>
                    <?php


                    foreach ($cajas as $key => $cjs) :

                    ?>
                        <option value="<?php echo $cjs['cja_id_caja'] ?>"><?php echo $cjs['cja_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="copn_ingreso_inicio">Monto inicial:</label>
                    <input type="text" readonly name="copn_ingreso_inicio" value="<?php echo $cjs['cja_saldo'] ?>" id="copn_ingreso_inicio" class="form-control inputN">
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary float-right" name="btnAbrirCaja">Abrir caja</button>
            </div>

        </div>

        <?php
        $abrirCaja = new CajasControlador();
        $abrirCaja->ctrAbrirCaja2();
        ?>
    </form>
</div>

<div class="row content-cerrar-caja d-none">

    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <form id="formCerrarCaja" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-success">Caja abierta</h4>
                                    <input type="hidden" name="copn_tabulador" id="copn_tabulador">
                                    <input type="hidden" id="cja_id_caja_input" name="cja_id_caja">
                                    <input type="hidden" id="usr_caja_input" name="usr_caja">
                                    <input type="hidden" id="usr_id_input" name="usr_id">
                                    <input type="hidden" id="copn_id_input" name="copn_id">
                                    <input type="hidden" id="copn_ingreso_inicio_input" name="copn_ingreso_inicio">
                                    <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_COBRADOR">
                                        <input type="hidden" name="tgts_tipo" value="COBRANZA">


                                    <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_VENDEDOR">
                                        <input type="hidden" name="tgts_tipo" value="VENTAS">


                                    <?php else : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="COBRANZA">
                                        <input type="hidden" name="tgts_tipo" value="COBRANZA">

                                    <?php endif; ?>


                                    <p class="card-text">Responsable <strong id="cja_responsable"> </strong> </p>
                                    <p class="card-text">Caja <strong id="cja_nombre"> </strong> </p>
                                    <p class="card-text">Sucursal <strong id="cja_sucursal"> </strong> </p>
                                    <p class="card-text">Fecha de apertura <strong id="cja_fecha_apertura"></strong> </p>

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <img src="" class="img-responsive img_qr_usr" width="250px" height="250px" alt="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">RETIRO DE CAJA</h4>
                                    <div class="form-group">
                                        <label for="copn_saldo">Introduce la cantidad de retiro</label>
                                        <input type="text" name="copn_saldo" id="copn_saldo" class="form-control inputN" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">EFECTIVO</h4>
                                    <div class="form-group">
                                        <label for="copn_ingreso_efectivo">Cantidad en efectivo reportada por el sistema</label>
                                        <input type="text" name="copn_ingreso_efectivo" id="copn_ingreso_efectivo" readonly class="form-control inputN">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">BANCO</h4>
                                    <div class="form-group">
                                        <label for="copn_ingreso_banco">Introduce la cantidad en banco</label>
                                        <input type="text" name="copn_ingreso_banco" id="copn_ingreso_banco" class="form-control inputN" placeholder="Transaferencias / Depositos / Pagos con Tarjeta">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="copn_ingreso_efectivo_usuario">Cantidad reportada por el usuario</label>
                                                <input type="text" name="copn_ingreso_efectivo_usuario" id="copn_ingreso_efectivo_usuario" class="form-control inputN" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">



                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="copn_diferencia_efectivo">Diferencia (DEBE)</label>
                                                <input type="text" name="copn_diferencia_efectivo" id="copn_diferencia_efectivo" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary float-right" name="btnCerrarCaja">Cerrar caja para <span id="usr_responsable"></span> </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>



<!-- Modal Ingresos-->
<div class="modal fade" role="dialog" id="mdlIngresos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlIngresosLabel">Ingresos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formIngreso">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="igs_usuario">Registrar ingreso para:</label>
                                <input type="text" name="igs_usuario" id="igs_usuario" class="form-control" readonly>
                                <input type="hidden" name="igs_usuario_responsable" id="igs_usuario_responsable">
                            </div>
                        </div>
                        <input type="hidden" name="igs_ruta" id="igs_ruta">


                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="igs_monto">Ingreso</label>
                                <input type="text" name="igs_monto" id="igs_monto" class="form-control inputN" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="igs_concepto">Concepto:</label>
                                <input type="text" name="igs_concepto" id="igs_concepto" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-6">
                            <label for="igs_mp">Método de pago</label>
                            <select name="igs_mp" id="igs_mp" class="form-control">
                                <option value="EFECTIVO">EFECTIVO</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="DEPOSITO">DEPOSITO</option>
                                <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
                            </select>
                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" name="btnAgregarIngreso">Registrar ingreso</button>
                </div>
                <?php
                // $crearIngreso = new IngresosControlador();
                // $crearIngreso->ctrAgregarIngresos();

                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal Gastos-->
<div class="modal fade" role="dialog" id="mdlGastos">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlGastosLabel">Gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formGasto">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="tgts_usuario_responsable">Registrar gasto para: </label>

                            <input type="text" name="tgts_usuario" id="tgts_usuario" class="form-control" readonly>
                            <input type="hidden" name="tgts_usuario_responsable" id="tgts_usuario_responsable">
                        </div>
                        <input type="hidden" name="tgts_ruta" id="tgts_ruta">


                        <div class="form-group col-md-4 col-12">
                            <label for="tgts_categoria">Categoría</label>
                            <select name="tgts_categoria" id="tgts_categoria" class="form-control select2">
                                <option value="">Elija una categoría</option>
                            </select>
                            <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlCategoria">
                                Agregar nueva categoría
                            </button>
                        </div>
                        <div class="form-group col-12 col-md-8">
                            <label for="tgts_concepto">Concepto</label>
                            <input type="text" name="tgts_concepto" id="tgts_concepto" class="form-control" placeholder="Escriba el concepto de este gasto">
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label for="tgts_cantidad">Cantidad</label>
                            <input type="text" name="tgts_cantidad" id="tgts_cantidad" class="form-control inputN" placeholder="0.00">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgts_mp">Método de pago</label>
                            <select name="tgts_mp" id="tgts_mp" class="form-control">
                                <option value="EFECTIVO">EFECTIVO</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="DEPOSITO">DEPOSITO</option>
                                <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
                            </select>
                        </div>
                        <input type="hidden" name="tgts_nota">
                        <!-- <div class="form-group col-12 col-md-8 d-none">
                            <label for="tgts_nota">Nota</label>
                            <textarea class="form-control area_larga" name="tgts_nota" id="tgts_nota" cols="30" rows="5"></textarea>
                        </div> -->

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary" name="btnGuardarGasto">Registrar gasto</button>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" id="mdlCategoria">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlCategoriaLabel">Nueva categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formAddCategoria">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="gts_nombre">Nombre de la categoría</label>
                        <input type="text" name="gts_nombre" id="gts_nombre" class="form-control" placeholder="Introduzca el nombre de la categoría ">
                    </div>

                    <div class="form-group">
                        <label for="gts_presupuesto">Presupuesto mensual</label>
                        <input type="text" name="gts_presupuesto" id="gts_presupuesto" class="form-control inputN" value="0.00">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Agregar categoria</button>
                </div>
            </form>
        </div>
    </div>
</div>