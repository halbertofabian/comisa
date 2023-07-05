<script>
    var pagina = ""

    $(document).ready(function() {
        var flujo_usr = $("#flujo_usr").val();
        buscarFlujoCaja(flujo_usr)
    })
</script>

<div class="row">
    <!-- <div class="col-12 mt-5">

        <div class="alert bg-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>RECORDATORIO <i class="fa fa-bullhorn" aria-hidden="true"></i> :</strong>
            <p> No olvides cerrar la caja de quien recibes siempre y cuando ya no la necesites, al finalizar tu jornada cierra las cajas que abriste incluyendo la tuya.</p>
        </div>

        <script>
            $(".alert").alert();
        </script>

    </div> -->
    <div class="col-12 mt-5">
        <div class="alert alert-secondary" role="alert">
            <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                <strong>MI CAJA</strong> <a href="<?php echo HTTP_HOST . 'reportes-caja/cobranza/' . $_SESSION['session_usr']['usr_id'] ?>" class="btn btn-link float-right">Mis reportes</a>

            <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>

                <strong>MI CAJA</strong> <a href="<?php echo HTTP_HOST . 'reportes-caja/ventas/' . $_SESSION['session_usr']['usr_id'] ?>" class="btn btn-link float-right">Mis reportes</a>
            <?php else : ?>

                <strong>MI CAJA</strong> <a href="<?php echo HTTP_HOST . 'reportes-caja/cobranza/' . $_SESSION['session_usr']['usr_id'] ?>" class="btn btn-link float-right">Mis reportes</a>

            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="flujo_usr">Nombre del usuario</label>
            <select name="flujo_usr" disabled id="flujo_usr" class="form-control select2">
                <option selected value="<?php echo $_SESSION['session_usr']['usr_id'] ?>"><?php echo $_SESSION['session_usr']['usr_nombre'] ?></option>
                <?php

                // $usuarios = UsuariosModelo::mdlMostrarUsuarios();

                // foreach ($usuarios as $key => $usr) :

                ?>



                <?php //endforeach; 
                ?>
            </select>

        </div>
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

                <div class="alert alert-success" role="alert">
                    <h5 class="text-dark" style="font-size:18px">FLUJO DE INGRESOS (+)</h5>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="post" id="formIngreso">

                            <!-- <div class="form-group">
                                <label for=""></label>
                                <input type="date" name="igs_fecha_input" id="igs_fecha_input" class="form-control theDate">
                            </div> -->

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
                                                <option value="">SELECCIONE TIPO DE INGRESO</option>
                                                <option>COBRANZA</option>
                                                <option value="COBRANZA_CREDICONTADO">CREDICONTADO DE COBRANZA</option>
                                                <option value="REINGRESOS_COBRANZA">REINGRESOS</option>
                                                <!-- <option value="DEPOSITOS_COBRANZA">DEPOSITOS</option> -->
                                                <option value="ABONOS_COBRANZA">ABONOS</option>
                                                <!-- <option value="OTROS_COBRANZA">OTROS</option> -->
                                                <option value="PRESTO_CP_SAMUEL_COBRANZA">PRESTAMO DEL JEFE</option>
                                                <!-- <option value="S/E_VENTAS">S/E</option>
                                                <option value="CONTADO_VENTAS">CONTADO</option> -->

                                            <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                                <option value="">SELECCIONE TIPO DE INGRESO</option>
                                                <option value="S/E_VENTAS">S/E</option>
                                                <option value="CONTADO_VENTAS">CONTADO</option>
                                                <option value="REINGRESOS_COBRANZA">REINGRESOS</option>
                                                <!-- <option value="DEPOSITOS_COBRANZA">DEPOSITOS</option> -->
                                                <option value="ABONOS_COBRANZA">ABONOS</option>
                                                <!-- <option value="OTROS_COBRANZA">OTROS</option> -->
                                                <option value="PRESTO_CP_SAMUEL_COBRANZA">PRESTAMO DEL JEFE</option>
                                                <!-- <option>COBRANZA</option> -->

                                            <?php else : ?>
                                                <option value="">SELECCIONE TIPO DE INGRESO</option>
                                                <option value="REINGRESOS_COBRANZA">REINGRESOS</option>
                                                <option value="ABONOS_COBRANZA">ABONOS</option>
                                                <option value="PRESTO_CP_SAMUEL_COBRANZA">PRESTAMO DEL JEFE</option>

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
                                        <option value="EFECTIVO">EFECTIVO</option>
                                        <option value="DEPOSITO">DEPOSITO</option>
                                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                        <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
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

                <div class="alert alert-primary" role="alert">
                    <h5 class="text-dark" style="font-size:18px">FLUJO DE GASTOS (-)</h5>
                </div>
                <div class="row">
                    <form method="post" id="formGasto">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="tgts_usuario_responsable">Registrar gasto para: </label>

                                    <input type="text" name="tgts_usuario" id="tgts_usuario" class="form-control" readonly>
                                    <input type="hidden" name="tgts_usuario_responsable" id="tgts_usuario_responsable">

                                    <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                                        <input type="hidden" name="tgts_tipo" id="tgts_tipo" value="VARIOS-COBRANZA">
                                    <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                        <input type="hidden" name="tgts_tipo" id="tgts_tipo" value="VARIOS-VENTAS">
                                    <?php else : ?>
                                        <input type="hidden" name="tgts_tipo" id="tgts_tipo" value="VARIOS">
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
                                    <select name="tgts_mp" id="tgts_mp" class="form-control">
                                        <option value="EFECTIVO">EFECTIVO</option>
                                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                        <option value="DEPOSITO">DEPOSITO</option>
                                        <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
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

                <div class="card-title">
                    <div class="alert alert-secondary" role="alert">
                        <strong>FLUJO EFECTIVO</strong>
                    </div>

                </div>
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
                <div class="card-title">
                    <div class="alert alert-secondary" role="alert">
                        <strong>FLUJO BANCO</strong>
                    </div>
                </div>
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
                <div class="card-title">
                    <div class="alert alert-secondary" role="alert">
                        <strong>FLUJO TOTAL</strong>
                    </div>
                </div>
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

    <div class="col-md-6">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <div class="alert alert-secondary" role="alert">
                        <strong>PRESTAMOS</strong>
                    </div>
                </h4>

                <div class="form-group">
                    <label for="">Tipo de prestamo</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pms_tipo" id="pms_tipo_inerno" value="Interno" required>
                            Prestamo semanal (interno)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pms_tipo" id="pms_tipo_extero" value="Externo" required>
                            Prestamo externo
                        </label>
                    </div>
                </div>

                <div class="form-group">

                    <label for="pms_usuario">Empleado</label>
                    <select class="form-control select2 select2" name="pms_usuario" id="pms_usuario">
                        <option value="">Seleccione a un empleado a prestar</option>
                        <?php
                        $empleados = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($empleados as $key => $usr) :
                        ?>
                            <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label for="pms_cantidad">Cantidad</label>
                        <input type="text" name="pms_cantidad" id="pms_cantidad" class="form-control inputN">
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label for="pms_semanas_pago">Semamas de pago</label>
                        <input type="number" name="pms_semanas_pago" id="pms_semanas_pago" class="form-control">
                    </div>
                </div>
                <div class="form-group pms_codigo d-none">
                    <label for="pms_codigo">Codigo de aprobación</label>
                    <input type="hidden" id="pms_id">
                    <input type="number" name="pms_codigo" id="pms_codigo" class="form-control" placeholder="Introduzca el codigo de aprobación" autofocus>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-load" id="btnGuardarPrestamo">Solicitar</button>
                    <button class="btn btn-primary btn-load d-none" id="btnValidarPrestamo">Validar</button>
                </div>

            </div>
        </div>
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <div class="alert alert-secondary" role="alert">
                            <strong>GASOLINA ADMINISTRADA</strong>
                        </div>
                    </h4>
                    <div class="form-group">
                        <label for="gtsg_usuario">Empleado</label>
                        <select class="form-control select2 select2" name="gtsg_usuario" id="gtsg_usuario">
                            <option value="">Seleccione a un empleado</option>
                            <?php
                            $empleados = UsuariosModelo::mdlMostrarUsuarios();
                            foreach ($empleados as $key => $usr) :
                            ?>
                                <option value="<?php echo $usr['usr_id'] ?>">
                                    <?php echo $usr['usr_nombre'] . "/" . $usr['usr_vehiculo'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="gtsg_placas_v">Vehiculo</label>
                        <input type="text" name="gtsg_placas_v" id="gtsg_placas_v" class="form-control " required>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4 col-12">
                            <label for="gtsg_pxl">Precio Litro</label>
                            <input type="text" name="gtsg_pxl" id="gtsg_pxl" class="form-control inputN" required>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label for="gtsg_cantidad">Cantidad</label>
                            <input type="text" name="gtsg_cantidad" id="gtsg_cantidad" class="form-control inputN" required>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label for="gtsg_montoApagar">Monto a pagar</label>
                            <input type="text" name="gtsg_montoApagar" id="gtsg_montoApagar" class="form-control inputN" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="gtsg_kilometraje">Kilometraje</label>
                            <input type="text" name="gtsg_kilometraje" id="gtsg_kilometraje" class="form-control ">
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-load" id="btnGuardarGastoGas">Guardar</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Tabulador</h4>
                <table class="table table_tabulador">
                    <thead>
                        <tr>
                            <th>DENOMINACION</th>
                            <th>CANTIDAD</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" id="d_1000" class="form-control inputN" value="1000" readonly></td>
                            <td><input type="text" name="c_1000" id="c_1000" class="form-control inputN tabCalculo"></td>
                            <td><input type="text" id="t_1000" class="form-control inputN" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="d_500" class="form-control inputN" value="500" readonly></td>
                            <td><input type="text" name="c_500" id="c_500" class="form-control inputN tabCalculo"></td>
                            <td><input type="text" id="t_500" class="form-control inputN" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="d_200" class="form-control inputN" value="200" readonly></td>
                            <td><input type="text" name="c_200" id="c_200" class="form-control inputN tabCalculo"></td>
                            <td><input type="text" id="t_200" class="form-control inputN" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="d_100" class="form-control inputN" value="100" readonly></td>
                            <td><input type="text" name="c_100" id="c_100" class="form-control inputN tabCalculo"></td>
                            <td><input type="text" id="t_100" class="form-control inputN" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="d_50" class="form-control inputN" value="50" readonly></td>
                            <td><input type="text" name="c_50" id="c_50" class="form-control inputN tabCalculo"></td>
                            <td><input type="text" id="t_50" class="form-control inputN" readonly></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="d_20" class="form-control inputN" value="20" readonly></td>
                            <td><input type="text" name="c_20" id="c_20" class="form-control inputN tabCalculo"></td>
                            <td><input type="text" id="t_20" class="form-control inputN" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-center"> <strong>MONEDAS</strong> </td>
                            <td colspan="2"><input type="text" id="t_moneda" name="c_moneda" class="form-control inputN tabCalculo"></td>
                        </tr>
                        <tr>

                            <td colspan="3"><input type="text" id="total_t" class="form-control inputN" readonly></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>



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
                    <option value="">Selecione una caja</option>
                    <?php


                    foreach ($cajas as $key => $cjs) :

                    ?>
                        <option value="<?php echo $cjs['cja_id_caja'] ?>"><?php echo $cjs['cja_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <!-- <label for="copn_ingreso_inicio">Monto inicial:</label> -->
                    <input type="hidden" readonly name="copn_ingreso_inicio" value="<?php echo $cjs['cja_saldo'] ?>" id="copn_ingreso_inicio" class="form-control inputN">
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

<!-- <div class="row content-cerrar-caja d-none">

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="alert alert-secondary" role="alert">
                    <strong>CIERRE DE CAJA</strong>
                </div>
            </div>

            <div class="card-body">

                <form id="formCerrarCaja" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-success">Caja abierta</h4>

                                    <input type="hidden" id="cja_id_caja_input" name="cja_id_caja">
                                    <input type="hidden" id="usr_caja_input" name="usr_caja">
                                    <input type="hidden" id="usr_id_input" name="usr_id">
                                    <input type="hidden" id="copn_id_input" name="copn_id">


                                    <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_COBRANZA_G">
                                    <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_VENTAS_G">
                                    <?php else : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_COBRANZA">
                                    <?php endif; ?>



                                    <input type="hidden" id="copn_ingreso_inicio_input" name="copn_ingreso_inicio">
                                    <p class="card-text">Responsable <strong id="cja_responsable"> </strong> </p>
                                    <p class="card-text">Caja <strong id="cja_nombre"> </strong> </p>
                                    <p class="card-text">Sucursal <strong id="cja_sucursal"> </strong> </p>
                                    <p class="card-text">Fecha de apertura <strong id="cja_fecha_apertura"></strong> </p>
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
                                        <label for="copn_ingreso_efectivo">Introduce la cantidad en efectivo</label>
                                        <input type="text" name="copn_ingreso_efectivo" id="copn_ingreso_efectivo" class="form-control inputN">
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
                            <button class="btn btn-primary float-right" name="btnCerrarCaja">Cerrar caja</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div> -->

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
                                    <label for="copn_id_input"># Corte</label>
                                    <input type="text" id="copn_id_input" name="copn_id" class="form-control" readonly>
                                    <input type="hidden" id="copn_ingreso_inicio_input" name="copn_ingreso_inicio">
                                    <?php if ($_SESSION['session_usr']['usr_rol'] == 'Jefe de cobranza') : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_COBRANZA_G">
                                        <input type="hidden" name="tgts_tipo" value="COBRANZA">


                                    <?php elseif ($_SESSION['session_usr']['usr_rol'] == 'Jefe de ventas') : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_VENDEDOR_G">
                                        <input type="hidden" name="tgts_tipo" value="VENTAS">


                                    <?php else : ?>
                                        <input type="hidden" id="copn_tipo_caja" name="copn_tipo_caja" value="CAJA_COBRANZA_G">
                                        <input type="hidden" name="tgts_tipo" value="COBRANZA">

                                    <?php endif; ?>


                                    <p class="card-text">Responsable <strong id="cja_responsable"> </strong> </p>
                                    <p class="card-text">Caja <strong id="cja_nombre"> </strong> </p>
                                    <p class="card-text">Sucursal <strong id="cja_sucursal"> </strong> </p>
                                    <p class="card-text">Fecha de apertura <strong id="cja_fecha_apertura"></strong> </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8"> </div>
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
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">RETIRO DE CAJA</h4>
                                            <div class="form-group">
                                                <label for="copn_saldo">Introduce la cantidad de retiro</label>
                                                <input type="text" name="copn_saldo" id="copn_saldo" class="form-control inputN" placeholder="">
                                                <button type="button" class="btn btn-outline-primary  float-right mt-1 mb-1 d-none btnSolicitarCodigo">Solicitar</button>
                                                <input type="hidden" name="copn_codigo" id="copn_codigo" class="form-control mt-1" placeholder="Código de retiro">
                                                <button type="button" id="btnVerificar" class="btn btn-primary float-right mt-1 mb-1 d-none ">Verificar</button>

                                                <input type="hidden" id="isVerify" value="true">
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

                        <div class="col-12 div-cerar-caja d-none">
                            <button class="btn btn-primary float-right " name="btnCerrarCaja">Cerrar caja para <span id="usr_responsable"></span> </button>
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

<script>
    $("#copn_saldo").on("keyup", function() {
        var retiro = Number($(this).val());

        if (retiro > 0) {
            $("#isVerify").val('false');
            $(".div-cerar-caja").addClass('d-none')
            $(".btnSolicitarCodigo").removeClass('d-none')

        } else {
            $("#isVerify").val('true');
            $(this).val(0)
            $(".div-cerar-caja").removeClass('d-none')
            $(".btnSolicitarCodigo").addClass('d-none')



        }
    })
    $(".btnSolicitarCodigo").on("click", function() {
        var copn_retiro = Number($("#copn_saldo").val());
        if ($("#copn_ingreso_efectivo_usuario").val() == '' || copn_retiro > Number($("#copn_ingreso_efectivo_usuario").val())) {
            toastr.warning('Antes de proceder con un retiro, asegúrate de ingresar el monto que deseas reportar.', '¡Observación!');
            $("#isVerify").val('true');
            $("#copn_saldo").val(0)
            $(".div-cerar-caja").removeClass('d-none')
            $(".btnSolicitarCodigo").addClass('d-none')
            $("#copn_ingreso_efectivo_usuario").focus();
            return;
        }
        var copn_id = $("#copn_id_input").val();
        var datos = new FormData();
        datos.append("copn_id", copn_id);
        datos.append("copn_retiro", copn_retiro);
        datos.append("btnCodigoRetiro", true);
        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                // startLoadButton()

            },
            success: function(res) {
                if (res.status) {
                    $("#copn_codigo").attr("type", "text");
                    $("#copn_saldo").attr('readonly', true);
                    $("#copn_ingreso_efectivo_usuario").attr('readonly', true);
                    $(".btnSolicitarCodigo").addClass('d-none')
                    $("#btnVerificar").removeClass('d-none')
                    $("#copn_codigo").focus();
                    toastr.success(res.mensaje, 'Muy bien!');
                } else {
                    toastr.error(res.mensaje, '¡Error!');
                }
            }
        });

    })
    $("#btnVerificar").on("click", function(e) {
        var copn_id = $("#copn_id_input").val();
        var copn_codigo = $("#copn_codigo").val();
        var datos = new FormData();
        datos.append("copn_id", copn_id);
        datos.append("copn_codigo", copn_codigo);
        datos.append("btnAplicarCodigoRetiro", true);
        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                // startLoadButton()

            },
            success: function(res) {
                if (res.status) {
                    $("#copn_codigo").attr("type", "hidden");
                    $("#btnVerificar").addClass('d-none')
                    $("#isVerify").val('true');
                    $(".div-cerar-caja").removeClass('d-none')
                    toastr.success(res.mensaje, 'Muy bien!');
                } else {
                    toastr.error(res.mensaje, '¡Error!');
                }
            }
        })
    })
    $(function() {
        $("#formCerrarCaja").keypress(function(e) {
            var key;
            if (window.event)
                key = window.event.keyCode; //IE
            else
                key = e.which; //firefox     
            return (key != 13);
        });
    });
    $("#copn_ingreso_efectivo_usuario").on("keyup", function(e) {
        $(".div-cerar-caja").addClass('d-none')
    })
</script>