<?php
if (isset($rutas[2]) && isset($rutas[3])) :
    cargarComponente('breadcrumb', '', 'Pagos');

    if ($_SESSION['session_usr']['usr_caja'] == 0) {
        AppControlador::msj('warning', '¡Ups!', 'Necesitas abrir caja para cobrar', HTTP_HOST . 'abrir-caja');
        return;
    }

    $copn = CajasModelo::mdlMostrarCajasById($_SESSION['session_usr']['usr_caja']);
    if ($_SESSION['session_suc']['scl_id'] != $copn['cja_id_sucursal']) {
        AppControlador::msj('warning', '¡Ups!', 'Esta caja esta registrada para que operé en otra sucursal, para continuar cierra caja en ' . $copn['scl_nombre'] . '', HTTP_HOST);
        return;
    }


?>
    <script>
        pagina = "pagos/new"
    </script>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <strong class="float-right" style="font-size: 18px;"><?php echo $copn['cja_nombre'] ?></strong>
            </div>
        </div>
        <form id="formBuscarAlumnoPago" method="post">
            <div class="row">

                <!-- <div class="col-md-5 col-12">
                    <button type="button" class="btn  float-right btn-link mb-1 ">Buscar alumno</button>

                    <div class="input-group mb-3">
                        <input type="text" id="usr_matricula" readonly class="form-control" value="<?php echo str_replace($_SESSION['session_suc']['scl_sub_fijo'], '', $rutas[2]) ?>" placeholder="Dígite la matricula del alumno">
                    </div>

                </div> -->
                <div class="col-md-5 col-12">
                    <!-- <button type="button" class="btn  float-right btn-link mb-1 ">Buscar alumno</button> -->

                    <label for="">Matricula</label><br>
                    <div class="input-group mb-3">

                        <!-- <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><?php echo $_SESSION['session_suc']['scl_sub_fijo'] ?></span>
                        </div> -->
                        <input type="text" id="usr_matricula" readonly class="form-control" value="<?php echo $rutas[2]; ?>" placeholder="Dígite la matricula del alumno">
                    </div>

                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="vfch_id_fake"># FICHA PAGO</label>
                        <input type="text" name="" id="vfch_id_fake" readonly class="form-control" placeholder="" aria-describedby="helpId">

                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <button type="button" class="btn btn-primary btn-block mt-2 btnEmpezarFichaVenta">
                        EMPEZAR
                    </button>

                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <p>Nombre: <strong id="usr_nombre_text"></strong></p>
                </div>
            </div>
        </form>
        <fieldset disabled id="fieldest_1">
            <div class="row d-none" id="rowDataPagosAlumnos">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered tablaAbonosAlumno table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre del alumno</th>

                                <th>Nombre del paquete</th>
                                <th>Fecha de inscripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyDataPagosAlumnos">

                        </tbody>
                    </table>
                </div>

            </div>
            <form id="formAbonoAlumno" method="post">
                <input type="hidden" name="vfch_id" id="vfch_id" readonly class="form-control">
                <input type="hidden" class="form-control" name="fpg_id" value="<?php echo $rutas[3] ?>" id="fpg_id">
                <input type="hidden" class="form-control" name="vfch_alumno" value="<?php echo $rutas[2] ?>" id="vfch_alumno">

                <input type="hidden" name="vfch_detalle_carrito" id="vfch_detalle_carrito">
                <div class="row" id="rowDataAbonosAlumnos">
                    <div class="col-md-7 col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12 table-responsive tableCarrito">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Concepto</th>
                                                    <th>Monto</th>
                                                    <th>Descuento</th>
                                                    <th>Total</th>
                                                    <th>Quitar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyCarrito">

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="col-md-7 col-12">
                            <div class="form-group">
                                <label for="ppg_concepto">Concepto</label>
                                <select name="ppg_concepto" class="form-control" id="ppg_concepto" required>
                                    <option value=""></option>
                                    <option value="PPG_INSCRIPCION">Inscripción</option>
                                    <option value="PPG_EXAMEN">Exámen</option>
                                    <option value="PPG_GUIA">Guía</option>
                                    <option value="PPG_INCORPORACION">Incorporacion</option>
                                    <option value="PPG_SEMANAL">Semanal</option>
                                    <option value="PPG_CERTIFICADO">Certificado</option>
                                </select>
                            </div>
                        </div> -->
                                    <!-- <div class="col-md-5 col-12">
                            <div class="form-group">
                                <label for="">Monto</label>
                                <input type="text" name="ppg_monto" id="ppg_monto" class="form-control inputN" placeholder="">
                            </div>

                        </div> -->

                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                        Agregar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>
                        <div class="row">


                            <!-- <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                            <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>

                        </div>

                    </div> -->

                            <!-- <div class="col-12 table-responsive">
                            <table class="table" class="rowDataAbonosAlumnosConcepto">
                                <thead>
                                    <tr>
                                        <th>#ID PAGO</th>
                                        <th>MONTO</th>
                                        <th>METODO DE PAGO</th>
                                        <th>REFERENCIA</th>
                                        <th>ADEUDO</th>
                                        <th>FECHA REGISTRO</th>
                                        <th>USUARIO REGISTRO</th>
                                    </tr>
                                </thead>
                                <tbody class="tbodyDataAbonosAlumnosConcepto">

                                </tbody>
                            </table>
                        </div> -->
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <!-- <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ficha de pago</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Costo</th>
                                        <th>Adeudo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            Inscripción
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INSCRIPCION_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INSCRIPCION_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Exámen
                                        </td>
                                        <td>
                                            $ <strong id="PPG_EXAMEN_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_EXAMEN_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Guía
                                        </td>
                                        <td>
                                            $ <strong id="PPG_GUIA_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_GUIA_ADEUDO"></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Incorporación
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INCORPORACION_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INCORPORACION_ADEUDO"></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Certificado
                                        </td>
                                        <td>
                                            $ <strong id="PPG_CERTIFICADO_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_CERTIFICADO_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Semanal
                                        </td>
                                        <td>
                                            $ <strong id="PPG_SEMANAL_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_SEMANAL_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <strong>Pago semanal</strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_SEMANAL_PAGO"></strong>
                                        </td>
                                    </tr>


                                </tbody>

                            </table>


                        </div>
                        <div class="card-footer text-muted">
                            <div class="form-group">
                                <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                                <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>

                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="<?php echo HTTP_HOST . 'pagos/new' ?>" class="btn btn-danger">Volver</a>
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary float-right  mt-1" name="btnRegistrarAbono">REGISTRAR COBRO</button>

                                </div>
                            </div>

                        </div>
                    </div> -->
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vfch_mp">Método de pago</label>
                                            <select name="vfch_mp" id="vfch_mp" class="form-control" required>
                                                <option value="EFECTIVO">EFECTIVO</option>
                                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                                <option value="DEPOSITO">DEPOSITO</option>
                                                <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="vfch_referencia">Referencia</label>
                                            <input type="text" name="vfch_referencia" id="vfch_referencia" class="form-control" placeholder="">
                                        </div>

                                    </div>

                                    <div class="col-md-12 col-12">
                                        <h5>¿Tienes un cupón?</h5>
                                        <div class="form-group">
                                            <label for="vfch_cupon"></label>
                                            <input type="text" name="vfch_cupon" id="vfch_cupon" class="form-control">
                                            <small id="helpId" class="text-muted">Introduce el cupón aquí</small>
                                            <button type="button" class="btn btn-sm btn-primary mt-1 float-right" id="btnAplicarCupon">Aplicar</button>
                                            <input type="hidden" name="ppg_descuento" id="ppg_descuento">
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="vfch_sub_monto">Sub Total: $</label>
                                                        <input type="text" name="vfch_sub_monto" id="vfch_sub_monto" readonly class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="vfch_monto">Total: $</label>
                                                        <input type="text" name="vfch_monto" id="vfch_monto" readonly class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="form-group">
                                    <!-- <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                                    <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label> -->

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Cobrar</button>

                                        <!-- <button type="submit" class="btn btn-success btn-block">Guardar</button> -->
                                        <button class="btn btn-danger btn-block btnCancelarCarrito" type="button">Cancelar</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                // $crearAbono = new PagosControlador();
                // $crearAbono->ctrAgregarPagos();

                ?>
            </form>
            <div class="row d-none">
                <div class="col-md-7 col-12">
                    <div class="form-group">
                        <label for="">Cobrar</label>
                        <select name="" class="form-control" id="">
                            <option value="">Inscripción</option>
                            <option value="">Exámen</option>
                            <option value="">Guía</option>
                            <option value="">Incorporacion</option>
                            <option value="">Semanas</option>
                            <option value="">Certificado</option>
                            <option value="">Todo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="">Monto</label>
                        <input type="text" name="" id="" class="form-control inputN" placeholder="">
                    </div>

                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="">Método de pago</label>
                        <select name="" id="" class="form-control">
                            <option value="">EFECTIVO</option>
                            <option value="">TRANSFERENCIA</option>
                            <option value="">DEPOSITO</option>
                            <option value="">TARJETA DE CREDITO / DEBITO </option>
                        </select>
                    </div>

                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="">Referencia</label>
                        <input type="text" name="" id="" class="form-control" placeholder="">
                    </div>

                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="">PAGO SUGERIDO:</label>
                        <h3 class="">$ 2,030.00</h3>
                        <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                        <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>
                    </div>

                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary float-right">PAGAR</button>
                    </div>

                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#ID PAGO</th>
                                <th>MONTO</th>
                                <th>METODO DE PAGO</th>
                                <th>REFERENCIA</th>
                                <th>ADEUDO</th>
                                <th>FECHA REGISTRO</th>
                                <th>USUARIO REGISTRO</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
        <?php

        $fichaPago = PagosControlador::ctrMostrarDatosFichaPago3($rutas[3]);


        ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table tableAddCart">
                                <thead>
                                    <tr>
                                        <th>Cocepto</th>
                                        <th>Costo</th>
                                        <th>Adeudo</th>
                                        <th>Monto</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Inscripción</td>
                                        <td><?php echo $fichaPago['PPG_INSCRIPCION']['total'] ?></td>
                                        <td><input type="text" class="form-control inputN" readonly value="<?php echo $fichaPago['PPG_INSCRIPCION']['adeudo'] ?>"></td>
                                        <td><input type="text" class="form-control inputN ppg_monto" id="ppg_monto_inscripcion" value="<?php echo $fichaPago['PPG_INSCRIPCION']['adeudo'] ?>"></td>
                                        <td><button type="button" class="btn btn-primary btnAgregarPPG" ppg_ficha="PPG_INSCRIPCION" ppg_identificador="ins" ppg_concepto="Inscripción" ppg_adeudo="<?php echo $fichaPago['PPG_INSCRIPCION']['adeudo'] ?>">+</button></td>
                                    </tr>
                                    <tr>
                                        <td>Exámen</td>
                                        <td><?php echo $fichaPago['PPG_EXAMEN']['total'] ?></td>
                                        <td><input type="text" class="form-control inputN" readonly value="<?php echo $fichaPago['PPG_EXAMEN']['adeudo'] ?>"></td>
                                        <td><input type="text" class="form-control inputN ppg_monto" id="ppg_monto_examen" value="<?php echo $fichaPago['PPG_EXAMEN']['adeudo'] ?>"></td>
                                        <td><button type="button" class="btn btn-primary btnAgregarPPG" ppg_ficha="PPG_EXAMEN" ppg_identificador="exa" ppg_concepto="Exámen" ppg_adeudo="<?php echo $fichaPago['PPG_EXAMEN']['adeudo'] ?>">+</button></td>
                                    </tr>
                                    <tr>
                                        <td>Guía</td>
                                        <td><?php echo $fichaPago['PPG_GUIA']['total'] ?></td>
                                        <td><input type="text" class="form-control inputN" readonly value="<?php echo $fichaPago['PPG_GUIA']['adeudo'] ?>"></td>
                                        <td><input type="text" class="form-control inputN ppg_monto" id="ppg_monto_guia" value="<?php echo $fichaPago['PPG_GUIA']['adeudo'] ?>"></td>
                                        <td><button type="button" class="btn btn-primary btnAgregarPPG" ppg_ficha="PPG_GUIA" ppg_identificador="gui" ppg_concepto="Guía" ppg_adeudo="<?php echo $fichaPago['PPG_GUIA']['adeudo'] ?>">+</button></td>
                                    </tr>
                                    <tr>
                                        <td>Incorporación</td>
                                        <td><?php echo $fichaPago['PPG_INCORPORACION']['total'] ?></td>
                                        <td><input type="text" class="form-control inputN" readonly value="<?php echo $fichaPago['PPG_INCORPORACION']['adeudo'] ?>"></td>
                                        <td><input type="text" class="form-control inputN ppg_monto" id="ppg_monto_incorporacion" value="<?php echo $fichaPago['PPG_INCORPORACION']['adeudo'] ?>"></td>
                                        <td><button type="button" class="btn btn-primary btnAgregarPPG" ppg_ficha="PPG_INCORPORACION" ppg_identificador="inc" ppg_concepto="Incorporacion" ppg_adeudo="<?php echo $fichaPago['PPG_INCORPORACION']['adeudo'] ?>">+</button></td>
                                    </tr>
                                    <tr>
                                        <td>Certificado</td>
                                        <td><?php echo $fichaPago['PPG_CERTIFICADO']['total'] ?></td>
                                        <td><input type="text" class="form-control inputN" readonly value="<?php echo $fichaPago['PPG_CERTIFICADO']['adeudo'] ?>"></td>
                                        <td><input type="text" class="form-control inputN ppg_monto" id="ppg_monto_certificado" value="<?php echo $fichaPago['PPG_CERTIFICADO']['adeudo'] ?>"></td>
                                        <td><button type="button" class="btn btn-primary btnAgregarPPG" ppg_ficha="PPG_CERTIFICADO" ppg_identificador="cer" ppg_concepto="Certificado" ppg_adeudo="<?php echo $fichaPago['PPG_CERTIFICADO']['adeudo'] ?>">+</button></td>
                                    </tr>

                                    <tr>
                                        <td>Semana</td>
                                        <td><?php echo $fichaPago['PPG_SEMANAL']['total'] ?></td>
                                        <td><input type="text" class="form-control inputN" readonly value="<?php echo $fichaPago['PPG_SEMANAL']['adeudo'] ?>"></td>
                                        <td><input type="text" class="form-control inputN ppg_monto" id="ppg_monto_semanal" value="<?php echo $fichaPago['PPG_SEMANAL']['pago_semanal'] ?>"></td>
                                        <td><button type="button" class="btn btn-primary btnAgregarPPG" ppg_ficha="PPG_SEMANAL" ppg_identificador="sem" ppg_concepto="Semana" ppg_adeudo="<?php echo $fichaPago['PPG_SEMANAL']['adeudo'] ?>">+</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
<?php
elseif (isset($rutas[1]) && $rutas[1] == "ficha" && isset($rutas[2])) :
    cargarComponente('breadcrumb', '', 'Ficha de pago');
?>

    <div class="container">

        <embed src="<?php echo HTTP_HOST ?>/app/report/ficha_pago.php?fpg_id=<?php echo $rutas[2] ?>" width="100%" height="1200px" />

    </div>


<?php
elseif (isset($rutas[1]) && $rutas[1] == "new") :
    cargarComponente('breadcrumb', '', 'Pagos');
?>
    <div class="container">
        <form id="formBuscarAlumnoPagos" method="post">
            <div class="row">

                <div class="col-md-5 col-12">
                    <!-- <button type="button" class="btn  float-right btn-link mb-1 ">Buscar alumno</button> -->
                    <!-- <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><?php echo $_SESSION['session_suc']['scl_sub_fijo'] ?></span>
                        </div>
                        <input type="number" id="usr_matricula" class="form-control" placeholder="Dígite la matricula del alumno" aria-label="Username" aria-describedby="basic-addon1">
                    </div> -->
                    <div class="row">
                        <div class="col-6">
                            <select name="scl_sub_fijo" id="scl_sub_fijo" class="form-control">
                                <option value="<?php echo $_SESSION['session_suc']['scl_sub_fijo'] ?>"><?php echo $_SESSION['session_suc']['scl_sub_fijo'] ?></option>
                                <?php
                                $sucursales = SucursalesModelo::mdlMostrarSucursales();
                                foreach ($sucursales as $key => $scl) : ?>
                                    <option value="<?php echo $scl['scl_sub_fijo'] ?>"><?php echo $scl['scl_sub_fijo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <input type="number" id="usr_matricula" class="form-control" placeholder="Dígite la matricula del alumno" aria-label="Username" aria-describedby="basic-addon1">

                        </div>
                    </div>

                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <p>Nombre: <strong id="usr_nombre_text"></strong></p>
                </div>
            </div>
        </form>
        <div class="row" id="rowDataPagosAlumnos">
            <div class="col-12 table-responsive">
                <table class="table table-bordered tablaAbonosAlumno table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nombre del alumno</th>

                            <th>Nombre del paquete</th>
                            <th>Fecha de inscripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyDataPagosAlumnos">

                    </tbody>
                </table>
            </div>
        </div>
        <form id="formAbonoAlumno" method="post">
            <div class="row d-none" id="rowDataAbonosAlumnos">
                <div class="col-md-7 col-12">
                    <div class="row">
                        <div class="col-md-7 col-12">
                            <div class="form-group">
                                <label for="ppg_concepto">Concepto</label>
                                <select name="ppg_concepto" class="form-control" id="ppg_concepto" required>
                                    <option value=""></option>
                                    <option value="PPG_INSCRIPCION">Inscripción</option>
                                    <option value="PPG_EXAMEN">Exámen</option>
                                    <option value="PPG_GUIA">Guía</option>
                                    <option value="PPG_INCORPORACION">Incorporacion</option>
                                    <option value="PPG_SEMANAL">Semanal</option>
                                    <option value="PPG_CERTIFICADO">Certificado</option>
                                    <!-- <option value="PPG_TODO">Todo</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-group">
                                <label for="">Monto</label>
                                <input type="text" name="ppg_monto" id="ppg_monto" class="form-control inputN" placeholder="">
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="ppg_mp">Método de pago</label>
                                <select name="ppg_mp" id="ppg_mp" class="form-control" required>
                                    <option value="EFECTIVO">EFECTIVO</option>
                                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                    <option value="DEPOSITO">DEPOSITO</option>
                                    <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="ppg_referencia">Referencia</label>
                                <input type="text" name="ppg_referencia" id="ppg_referencia" class="form-control" placeholder="">
                            </div>

                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="">ADEUDO:</label>
                                <h3 id="ppg_adeudo_text" class="inputN"></h3>
                                <input type="hidden" name="ppg_adeudo" id="ppg_adeudo">

                            </div>

                        </div>

                        <!-- <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                            <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>

                        </div>

                    </div> -->

                        <div class="col-12 table-responsive">
                            <table class="table" id="rowDataAbonosAlumnosConcepto">
                                <thead>
                                    <tr>
                                        <th>#ID PAGO</th>
                                        <th>MONTO</th>
                                        <th>METODO DE PAGO</th>
                                        <th>REFERENCIA</th>
                                        <th>ADEUDO</th>
                                        <th>FECHA REGISTRO</th>
                                        <th>USUARIO REGISTRO</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyDataAbonosAlumnosConcepto">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ficha de pago</h4>
                            <input type="hidden" class="form-control" name="fpg_id" id="fpg_id">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Concepto</th>
                                        <th>Costo</th>
                                        <th>Adeudo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            Inscripción
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INSCRIPCION_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INSCRIPCION_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Exámen
                                        </td>
                                        <td>
                                            $ <strong id="PPG_EXAMEN_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_EXAMEN_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Guía
                                        </td>
                                        <td>
                                            $ <strong id="PPG_GUIA_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_GUIA_ADEUDO"></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Incorporación
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INCORPORACION_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_INCORPORACION_ADEUDO"></strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Certificado
                                        </td>
                                        <td>
                                            $ <strong id="PPG_CERTIFICADO_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_CERTIFICADO_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Semanal
                                        </td>
                                        <td>
                                            $ <strong id="PPG_SEMANAL_TOTAL"></strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_SEMANAL_ADEUDO"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <strong>Pago semanal</strong>
                                        </td>
                                        <td>
                                            $ <strong id="PPG_SEMANAL_PAGO"></strong>
                                        </td>
                                    </tr>


                                </tbody>

                            </table>


                        </div>
                        <div class="card-footer text-muted">
                            <div class="form-group">
                                <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                                <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>

                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="<?php echo HTTP_HOST . 'pagos/new' ?>" class="btn btn-danger">Volver</a>
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary float-right  mt-1" name="btnRegistrarAbono">REGISTRAR COBRO</button>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php

            // $crearAbono = new PagosControlador();
            // $crearAbono->ctrAgregarPagos();

            ?>
        </form>
        <div class="row d-none">
            <div class="col-md-7 col-12">
                <div class="form-group">
                    <label for="">Cobrar</label>
                    <select name="" class="form-control" id="">
                        <option value="">Inscripción</option>
                        <option value="">Exámen</option>
                        <option value="">Guía</option>
                        <option value="">Incorporacion</option>
                        <option value="">Semanas</option>
                        <option value="">Certificado</option>
                        <option value="">Todo</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="form-group">
                    <label for="">Monto</label>
                    <input type="text" name="" id="" class="form-control inputN" placeholder="">
                </div>

            </div>
            <div class="col-md-3 col-12">
                <div class="form-group">
                    <label for="">Método de pago</label>
                    <select name="" id="" class="form-control">
                        <option value="">EFECTIVO</option>
                        <option value="">TRANSFERENCIA</option>
                        <option value="">DEPOSITO</option>
                        <option value="">TARJETA DE CREDITO / DEBITO </option>
                    </select>
                </div>

            </div>
            <div class="col-md-3 col-12">
                <div class="form-group">
                    <label for="">Referencia</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>

            </div>
            <div class="col-md-3 col-12">
                <div class="form-group">
                    <label for="">PAGO SUGERIDO:</label>
                    <h3 class="">$ 2,030.00</h3>
                    <input type="radio" id="enviar-chk_1" name="r1"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                    <input type="radio" id="enviar-chk_2" name="r1"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>
                </div>

            </div>
            <div class="col-12">
                <div class="form-group">
                    <button class="btn btn-primary float-right">PAGAR</button>
                </div>

            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#ID PAGO</th>
                            <th>MONTO</th>
                            <th>METODO DE PAGO</th>
                            <th>REFERENCIA</th>
                            <th>ADEUDO</th>
                            <th>FECHA REGISTRO</th>
                            <th>USUARIO REGISTRO</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php elseif (isset($rutas[1]) && $rutas[1] == "fichas" && isset($rutas[2])) :
    // cargarComponente('breadcrumb', '', 'Ficha #' . $rutas[2]);
    cargarComponente('breadcrumb_nivel_1', '', 'Ficha #' . $rutas[2], array(['ruta' => 'pagos/fichas', 'label' => 'Listar Fichas']));

    // Consultar la ficha 

    $vfch = PagosModelo::mdlConsultarFichas($rutas[2]);


    if ($vfch != false) :

        $alumno = UsuariosModelo::mdlMostrarUsuarios('', '', true, $vfch['vfch_alumno']);
        $abonos = PagosModelo::mdlMostrarCarritoAlumno($vfch['vfch_ficha_pago'], $vfch['vfch_id']);
    ?>

        <div class="container">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="background-color: #EDEDED;">
                                <th>Matricula</th>
                                <th>Alumno</th>
                                <th style="text-align: right;">Ficha</th>
                            </tr>
                            <tr style="background-color: #A7D3F3;">
                                <th><?php echo $alumno['usr_matricula'] ?></th>
                                <th><?php echo $alumno['usr_nombre'] . ' ' . $alumno['usr_app'] . ' ' . $alumno['usr_apm']  ?></th>

                                <th style="text-align: right;">

                                    <a class="btn btn-dark" href="<?php echo HTTP_HOST . 'pagos/ficha/' . $rutas[2] ?> " data-toggle="tooltip" data-placement="top" title="Ver ficha de pago" "><i class=" fa fa-file-pdf-o"></i> #<?php echo $vfch['vfch_id'] ?></a>

                                </th>
                            </tr>
                        </thead>

                    </table>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="background-color: #EDEDED;">
                                <th>Sub monto</th>
                                <th>Monto</th>
                                <th>Metodo de pago</th>
                                <th>Referencia</th>
                                <th>Fecha registro</th>
                                <th>Usuario registro</th>
                            </tr>
                        </thead>
                        <tbody <tr style="background-color: #A7D3F3;">
                            <td><?php echo $vfch['vfch_sub_monto'] ?></td>
                            <td><?php echo $vfch['vfch_monto'] ?></td>
                            <td><?php echo $vfch['vfch_mp'] ?></td>
                            <td><?php echo $vfch['vfch_referencia'] ?></td>
                            <td><?php echo $vfch['vfch_fecha_registro'] ?></td>
                            <td><?php echo $vfch['vfch_usuario_registro'] ?></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <div class="col-12">
                    <div class="col-12 table-responsive table-bordered tablaPagosAlumno table-striped  table-hover">
                        <table class="table  dt-responsive table-responsive ">
                            <thead>
                                <tr>
                                    <th># Número de pago</th>


                                    <th>Concepto</th>
                                    <th>Monto</th>
                                    <th>Adeudo</th>
                                    <th>Descuento</th>
                                    <th>Total</th>
                                    <th>Fecha registro</th>
                                    <th>Usuario registro</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                //preArray($pagos);
                                foreach ($abonos as $key => $ppg) :

                                ?>
                                    <tr>



                                        <td><?php echo $ppg['ppg_id'] ?></td>
                                        <td><?php echo $ppg['ppg_concepto'] ?></td>
                                        <td><?php echo $ppg['ppg_monto'] ?></td>
                                        <td><?php echo $ppg['ppg_adeudo'] ?></td>
                                        <td><?php echo $ppg['ppg_descuento'] ?></td>
                                        <td><?php echo $ppg['ppg_total'] ?></td>

                                        <td><?php echo $ppg['ppg_fecha_registro'] ?></td>
                                        <td><?php echo $ppg['ppg_usuario_registro'] ?></td>
                                        <td><?php echo $ppg['ppg_estado_pagado'] ?></td>
                                        <td>

                                        </td>


                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    <?php else :
        echo '<script>window.location.href="' . HTTP_HOST . 'pagos/fichas"</script>';
    endif;

    ?>


<?php elseif (isset($rutas[1]) && $rutas[1] == "fichas") :
    cargarComponente('breadcrumb', '', 'Fichas de pago');
?>
    <div class="container">
        <div class="row">
            <!-- <button type="button" class="btn btn-dark" id="btnImprimir" >Imprimir</button> -->
            <div class="col-12 table-responsive table-bordered tablaPagosAlumno table-striped dt-responsive table-hover" id="tablaPagosAlumno">
                <table class="table tablas tablasPagosAlumnos ">
                    <thead>
                        <tr>
                            <th># Número de ficha</th>
                            <th>Matricula</th>
                            <th>Referenica</th>
                            <th>Metodo de pago</th>
                            <th>Sub monto</th>
                            <th>Monto total</th>
                            <th>Cupón</th>

                            <th>Fecha registro</th>
                            <th>Fecha pagada</th>
                            <th>Usuario registro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $fichas_venta =  PagosModelo::mdlConsultarFichas();
                        //preArray($pagos);
                        foreach ($fichas_venta as $key => $ppg) :

                        ?>

                            <?php
                            $vfch_class = "";
                            if ($ppg['vfch_solicitud_cancelacion'] == 1) {
                                $vfch_class = "bg-warning";
                                $vfch_button = "<strong class='mt-1'>Solicitud de cancelación en espera de aprobación</strong>";
                            } else if ($ppg['vfch_solicitud_cancelacion'] == 3) {
                                $vfch_class = "bg-danger";
                                $vfch_button = "<strong class='mt-1'>Solicitud rechazada</strong>";
                            } else {
                                if ($_SESSION['session_usr']['usr_rol'] == 'Administrador') {
                                    $vfch_button = ' <button class="btn btn-danger btnCanelarFichaPago mt-1" vfch_id="' . $ppg['vfch_id'] . '">Cancelar</button>';
                                } elseif ($_SESSION['session_usr']['usr_caja'] == $ppg['vfch_id_corte']) {
                                    $vfch_button = ' <button class="btn btn-danger btnCanelarFichaPago mt-1" vfch_id="' . $ppg['vfch_id'] . '">Cancelar</button>';
                                } else {
                                    $vfch_button = '';
                                }
                            }
                            ?>
                            <tr class="<?php echo $vfch_class  ?>">

                                <td>
                                    <a href="<?php echo HTTP_HOST . 'pagos/fichas/' . $ppg['vfch_id'] ?>" class="btn btn-dark"><?php echo $ppg['vfch_id'] ?></a>
                                </td>
                                <td><?php echo $ppg['vfch_alumno'] ?></td>
                                <td><?php echo $ppg['vfch_referencia'] ?></td>
                                <td><?php echo $ppg['vfch_mp'] ?></td>
                                <td><?php echo $ppg['vfch_sub_monto'] ?></td>
                                <td><?php echo $ppg['vfch_monto'] ?></td>
                                <td><?php echo $ppg['vfch_descuento'] ?></td>
                                <td><?php echo $ppg['vfch_fecha_registro'] ?></td>
                                <td><?php echo $ppg['vfch_fecha_pagada'] ?></td>
                                <td><?php echo $ppg['vfch_usuario_registro'] ?></td>
                                <td><?php echo $ppg['vfch_estado'] ?></td>
                                <td>

                                    <a class="btn btn-info" href="<?php echo HTTP_HOST . 'pagos/ficha/' . $ppg['vfch_id'] ?> " data-toggle="tooltip" data-placement="top" title="Ver ficha de pago" "><i class=" fa fa-file-pdf-o"></i></a>


                                    <?php echo $vfch_button ?>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php elseif (isset($rutas[1]) && $rutas[1] == "fichas-canceladas") :
    cargarComponente('breadcrumb', '', 'Fichas de pago canceladas');
?>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <p>
                <div style="border: 3px solid #FF9F43; width: 40px; display: inline-block;"></div>
                <strong>Solicitud de cancelación en espera de aprobación</strong>
                </p>
                <p>
                <div style="border: 3px solid #28C76F; width: 40px; display: inline-block;"></div>
                <strong>Solicitud de cancelación aprobada</strong>
                </p>
                <p>
                <div style="border: 3px solid #EA5455; width: 40px; display: inline-block;"></div>
                <strong>Solicitud de cancelación rechazada</strong>
                </p>

            </div>
        </div>
        <div class="row">
            <!-- <button type="button" class="btn btn-dark" id="btnImprimir" >Imprimir</button> -->
            <div class="col-12 table-responsive table-bordered tablaPagosAlumno table-striped dt-responsive table-hover" id="tablaPagosAlumno">
                <table class="table tablas tablasPagosAlumnosCancelar ">
                    <thead>
                        <tr>
                            <th># Número de ficha</th>
                            <th>Monto</th>
                            <th>Método de pago</th>
                            <th>Usuario solicito</th>
                            <th>Fecha solicitud</th>
                            <th>Justificación de cancelación</th>
                            <th>Usuario responsable</th>
                            <th>Fecha atendio</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $fichas_venta =  PagosModelo::mdlConsultarFichas("", "", 1);
                        //preArray($pagos);
                        foreach ($fichas_venta as $key => $ppg) :

                        ?>

                            <?php
                            $vfch_class = "";
                            if ($ppg['vfch_solicitud_cancelacion'] == 1) {
                                $vfch_class = "bg-warning";
                                $vfch_button = "<strong class='mt-1'>Solicitud de cancelación en espera de aprobación</strong>";
                            } elseif ($ppg['vfch_solicitud_cancelacion'] == 2) {
                                $vfch_class = "bg-success";
                                $vfch_button = "<strong class='mt-1'>Solicitud de cancelación en espera de aprobación</strong>";
                            } elseif ($ppg['vfch_solicitud_cancelacion'] == 3) {
                                $vfch_class = "bg-danger";
                                $vfch_button = "<strong class='mt-1'>Solicitud de cancelación en espera de aprobación</strong>";
                            }
                            ?>
                            <tr class="<?php echo $vfch_class  ?>">

                                <td>
                                    <a href="<?php echo HTTP_HOST . 'pagos/fichas/' . $ppg['vfch_id'] ?>" class="btn btn-dark"><?php echo $ppg['vfch_id'] ?></a>
                                </td>
                                <td>$<?php echo number_format($ppg['vfch_monto'], 2) ?></td>
                                <th><?php echo $ppg['vfch_mp'] ?> </th>
                                <td><?php echo $ppg['vfch_usuario_solicito'] ?></td>
                                <td><?php echo $ppg['vfch_fecha_solicitud'] ?></td>
                                <td><?php echo $ppg['vfch_justificacion'] ?></td>
                                <td><?php echo $ppg['vfch_usuario_aprobo'] ?></td>
                                <td><?php echo $ppg['vfch_fecha_aprobacion'] ?></td>
                                <td style="width: 150px;">


                                    <?php if ($ppg['vfch_solicitud_cancelacion'] == 2) : ?>

                                        <strong>APROBADA</strong>

                                    <?php else : ?>
                                        <select class="form-control btnCambioEstadoSolicitud" vfch_id="<?php echo $ppg['vfch_id'] ?>" name="vfch_solicitud_cancelacion" id="vfch_solicitud_cancelacion">
                                            <option value="1">Pendiente</option>
                                            <option value="2">Aprobar</option>
                                            <option value="3">Rechazar</option>
                                        </select>
                                    <?php endif; ?>

                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php elseif (isset($rutas[1]) && $rutas[1] == "historial") :
    cargarComponente('breadcrumb', '', 'Historial de pagos');
?>
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive table-bordered tablaPagosAlumno table-striped dt-responsive table-hover">
                <table class="table tablas ">
                    <thead>
                        <tr>
                            <th># Número de pago</th>
                            <th>Matricula</th>
                            <th>Alumno</th>
                            <th>Paquete</th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>Adeudo</th>
                            <th>Descuento</th>
                            <th>Total</th>
                            <th>Fecha registro</th>
                            <th>Usuario registro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $pagos =  PagosModelo::mdlMostrarPagos();
                        //preArray($pagos);
                        foreach ($pagos as $key => $ppg) :

                        ?>
                            <tr>

                                <td><?php echo $ppg['ppg_id'] ?></td>
                                <td><?php echo $ppg['usr_matricula'] ?></td>
                                <td><?php echo $ppg['usr_nombre'] ?></td>
                                <td><?php echo $ppg['pqt_nombre'] ?></td>
                                <td><?php echo $ppg['ppg_concepto'] ?></td>
                                <td><?php echo $ppg['ppg_monto'] ?></td>
                                <td><?php echo $ppg['ppg_adeudo'] ?></td>
                                <td><?php echo $ppg['ppg_descuento'] ?></td>
                                <td><?php echo $ppg['ppg_total'] ?></td>

                                <td><?php echo $ppg['ppg_fecha_registro'] ?></td>
                                <td><?php echo $ppg['ppg_usuario_registro'] ?></td>
                                <td><?php echo $ppg['ppg_estado_pagado'] ?></td>
                                <td></td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php endif; ?>