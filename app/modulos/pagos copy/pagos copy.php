<?php
if (isset($rutas[2]) && isset($rutas[3])) :
    cargarComponente('breadcrumb', '', 'Pagos');
?>
    <script>
        pagina = "pagos/new"
    </script>

    <div class="container">
        <form id="formBuscarAlumnoPago" method="post">
            <div class="row">

                <!-- <div class="col-md-5 col-12">
                    <button type="button" class="btn  float-right btn-link mb-1 ">Buscar alumno</button>

                    <div class="input-group mb-3">
                        <input type="text" id="usr_matricula" readonly class="form-control" value="<?php echo str_replace(SUB_FIJO, '', $rutas[2]) ?>" placeholder="Dígite la matricula del alumno">
                    </div>

                </div> -->
                <div class="col-md-5 col-12">
                    <button type="button" class="btn  float-right btn-link mb-1 ">Buscar alumno</button>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><?php echo SUB_FIJO ?></span>
                        </div>
                        <input type="number" id="usr_matricula" readonly class="form-control" value="<?php echo str_replace(SUB_FIJO, '', $rutas[2]) ?>" placeholder="Dígite la matricula del alumno" aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                </div>


            </div>
            <div class="row">
                <div class="col-6">
                    <p>Nombre: <strong id="usr_nombre_text"></strong></p>
                </div>
            </div>
        </form>
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
            <div class="row" id="rowDataAbonosAlumnos">
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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-group">
                                <label for="">Monto</label>
                                <input type="text" name="ppg_monto" id="ppg_monto" class="form-control inputN" placeholder="">
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary">+</button>
                        </div>
                    </div>
                    <div class="row">
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
                            <input type="hidden" class="form-control" name="fpg_id" value="<?php echo $rutas[3] ?>" id="fpg_id">
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


<?php
elseif (isset($rutas[1]) && $rutas[1] == "new") :
    cargarComponente('breadcrumb', '', 'Pagos');
?>
    <div class="container">
        <form id="formBuscarAlumnoPagos" method="post">
            <div class="row">

                <div class="col-md-5 col-12">
                    <button type="button" class="btn  float-right btn-link mb-1 ">Buscar alumno</button>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><?php echo SUB_FIJO ?></span>
                        </div>
                        <input type="number" id="usr_matricula" class="form-control" placeholder="Dígite la matricula del alumno" aria-label="Username" aria-describedby="basic-addon1">
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
<?php elseif (isset($rutas[1]) && $rutas[1] == "historial") :
    cargarComponente('breadcrumb', '', 'Historial de pagos');
?>
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive table-bordered tablaPagosAlumno table-striped table-hover">
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
                            <th>Metodo pago</th>
                            <th>Referencia</th>
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
                                <td><?php echo $ppg['ppg_mp'] ?></td>
                                <td><?php echo $ppg['ppg_referencia'] ?></td>
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