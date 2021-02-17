<?php

if (isset($rutas[1]) && $rutas[1] == "new") :
    cargarComponente('breadcrumb', '', 'Nueva inscripción');
?>
    <div class="container">

        <form method="post" id="formInscribirAlumno">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="usr_alumno">Alumno</label>
                        <select name="ins_alumno" class="form-control select2" id="usr_alumno" required>
                            <option value="">Buscar alumno</option>
                        </select>
                        <button type="button" class="btn btn-link float-right" data-toggle="modal" data-target="#mdlAgregarAlumno">Registrar nuevo alumno</button>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="pqt_alumno">Paquete</label>
                        <select name="ins_paquete" class="form-control select2" id="pqt_alumno" required>
                            <?php
                            if (isset($rutas[1])) :
                                $pqt = PaquetesModelo::mdlMostrarPaquetes($rutas[1]); ?>
                                <option value="<?php echo $pqt['pqt_sku'] ?>"><?php echo $pqt['pqt_nombre'] ?></option>
                            <?php else : ?>
                                <option value="">Seleccione un paquete</option>
                            <?php endif;
                            $paquetes = PaquetesModelo::mdlMostrarPaquetes();
                            foreach ($paquetes as $key => $pqt) :
                            ?>
                                <option value="<?php echo $pqt['pqt_sku'] ?>"><?php echo $pqt['pqt_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">FICHA DE PAGO</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="reload" class="btn-load-info-alumno"><i class="feather icon-rotate-cw"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="div_load text-center"></div>
                            <div class="div-info-alumno d-none bg-gradient-info" style="padding: 20px; border-radius: 10px;">
                                <P>Matricula: <strong id="usr_matricula"></strong></P>
                                <P>Alumno: <strong id="usr_nombre"></strong></P>
                                <P>Correo: <strong id="usr_correo"></strong></P>
                                <!-- <p>: <input type="text" id="usr_correo" class="form-control" style="border:none; border-bottom: 1px solid #000; border-radius: 0px;"></p> -->
                            </div>
                            <div class="div-info-paquete d-none bg-gradient-info" style="padding: 20px; border-radius: 10px;">
                                <p>PAQUETE: <strong id="pqt_nombre"></strong></p>
                                <input type="hidden" value="" id="ins_costos" name="ins_costos">
                                <table class="table">
                                    <tr>
                                        <td>Inscripción:</td>
                                        <td id="pqt_r_inscripcion" class="text-dark"></td>
                                    </tr>
                                    <tr>
                                        <td>Exámen:</td>
                                        <td id="pqt_r_examen" class="text-dark"></td>
                                    </tr>
                                    <tr>
                                        <td>Guía:</td>
                                        <td id="pqt_r_guia" class="text-dark"></td>
                                    </tr>
                                    <tr>
                                        <td>Incorporación:</td>
                                        <td id="pqt_r_incorporacion" class="text-dark"></td>
                                    </tr>
                                    <tr>
                                        <td>Certificado:</td>
                                        <td id="pqt_r_certificado" class="text-dark"></td>
                                    </tr>
                                    <tr>
                                        <td>Pago semanal:</td>
                                        <td id="pqt_r_semanal" class="text-dark"></td>
                                    </tr>
                                    <tr>
                                        <td>Duración:</td>
                                        <td id="pqt_r_semanas" class="text-dark"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h4>PAGO</h4> -->
                        </div>
                        <div class="card-body">
                            <!-- <div class="form-group">
                                <label for="ins_cupon">Cupón</label>
                                <input type="text" id="ins_cupon" name="ins_cupon" class="form-control">
                                <input type="hidden" id="ins_cupon_detalle" name="ins_cupon_detalle">

                            </div>
                            <div class="form-group">
                                <button type="button" class="btn  btn-secondary float-right">Aplicar cupón</button>
                            </div> -->

                            <div class="form-group d-none">
                                <input type="radio" id="enviar-chk_1" name="ins_envio"> <label for="enviar-chk_1">Enviar comprobante por email</label> <br>
                                <input type="radio" id="enviar-chk_2" name="ins_envio"> <label for="enviar-chk_2">Enviar comprobante por WhatsApp</label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block mt-5 btnInscribir btn-primary">Inscribir</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php elseif (isset($rutas[1]) && $rutas[1] == "fichas" && $rutas[2] != "") :
    cargarComponente('breadcrumb', '', 'Ficha de inscripción');


?>

    <div class="container">

        <iframe src="<?php echo HTTP_HOST ?>/app/report/ficha_inscripcion.php?fpg_id=<?php echo $rutas[2] ?>" width="100%" height="1200px" frameborder="0">


        </iframe>

    </div>
<?php else :
    cargarComponente('breadcrumb', '', 'Listar inscripciones');
?>
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive ">
                <table class="table tablas table-bordered tablaPagosAlumno table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>Número de inscripción</th>
                            <th>Matricula</th>
                            <th>Alumno</th>
                            <th>Paquete</th>
                            <th>Usuario registro</th>
                            <th>Fecha registro</th>
                            <th>Adeudo <br> Total</th>
                            <th>Kardex</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $inscripciones = InscripcionesModelo::mdlMostrarInscripciones();
                        foreach ($inscripciones as $key => $fpg) :
                        ?>
                            <tr>
                                <td><?php echo $fpg['fpg_id'] ?></td>
                                <td><?php echo $fpg['usr_matricula'] ?></td>
                                <td><?php echo $fpg['usr_nombre'] . ' ' . $fpg['usr_app'] . ' ' . $fpg['usr_apm']  ?></td>
                                <td><?php echo $fpg['pqt_nombre'] ?></td>
                                <td><?php echo $fpg['fpg_usuario_registro'] ?></td>
                                <td><?php echo $fpg['fpg_fecha_registro'] ?></td>
                                <td>
                                    <?php
                                    $datosFicha = PagosControlador::ctrMostrarDatosFichaPagoByFicha($fpg['fpg_id']);

                                    $adeudo = 0;
                                    $adeudo +=  $datosFicha['PPG_INSCRIPCION']['adeudo'];
                                    $adeudo += $datosFicha['PPG_EXAMEN']['adeudo'];
                                    $adeudo +=  $datosFicha['PPG_GUIA']['adeudo'];
                                    $adeudo +=  $datosFicha['PPG_INCORPORACION']['adeudo'];
                                    $adeudo +=  $datosFicha['PPG_CERTIFICADO']['adeudo'];
                                    $adeudo += $datosFicha['PPG_SEMANAL']['adeudo'];

                                    echo '$ <strong class="text-primary">'.number_format($adeudo,2).'</strong>';
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo HTTP_HOST . 'alumno/' . $fpg['usr_id'] . '/kerdex-fichas' ?>" class="btn btn-dark">Ver</a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <?php //if ($_SESSION['session_usr']['usr_rol'] != "Responsable de sucursal") : 
                                        ?>
                                        <a href="<?php echo HTTP_HOST . 'pagos/new/' . $fpg['usr_matricula'] . '/' . $fpg['fpg_id'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Abonar"><i class="fa fa-money" aria-hidden="true"></i></a>
                                        <!-- <?php //endif; 
                                                ?> -->
                                        <a class="btn btn-info" href="<?php echo HTTP_HOST . 'inscripciones/fichas/' . $fpg['fpg_id'] ?> " data-toggle="tooltip" data-placement="top" title="Ver ficha de inscripcón" "><i class=" fa fa-file-pdf-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>



<!-- Modal -->
<div class="modal fade" id="mdlAgregarAlumno" tabindex="-1" aria-labelledby="mdlAgregarAlumnoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAgregarAlumnoLabel">Registro de alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" id="formAgregarAlumno">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <?php

                                    $usr_id = UsuariosControlador::ctrConsultarSiguienteUsuario($_SESSION['session_suc']['scl_sub_fijo']);

                                    ?>
                                    <label for="usr_matricula">Matricula</label>
                                    <input type="text" name="usr_matricula" id="usr_matricula" class="form-control" placeholder="Escribe el nombre completo del alumno" value="<?php echo $usr_id ?>" readonly required>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="usr_nombre">Nombre(s)</label>
                                    <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="usr_app">Apellido paterno</label>
                                    <input type="text" name="usr_app" id="usr_app" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="usr_apm">Apellido materno</label>
                                    <input type="text" name="usr_apm" id="usr_apm" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                                </div>

                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_telefono">Teléfono</label>
                                    <input type="text" name="usr_telefono" id="usr_telefono" class="form-control" placeholder="Escribe el telefono">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_correo">Correo electrónico</label>
                                    <input type="email" name="usr_correo" id="usr_correo" class="form-control" placeholder="Escribe el correo electrónico">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>


                                    <input id="usr_clave" name="usr_clave" type="password" class="form-control">

                                </div>
                            </div>
                            <input type="hidden" value="Alumno" name="usr_rol">
                            <!-- <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_modalidad">Modalidad</label>
                                <select name="usr_modalidad" id="usr_modalidad" class="form-control">
                                    <option value="PRESENCIAL">PRESENCIAL</option>
                                    <option value="ONLINE">ONLINE</option>
                                </select>
                            </div>
                        </div> -->
                            <div class="col-12">
                                <div class="alert alert-dark" role="alert">
                                    <strong>Dirección</strong>
                                </div>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="form-group">
                                    <label for="usr_calle">Calle</label>
                                    <input type="text" name="usr_calle" id="usr_calle" class="form-control" placeholder="Escribe la calle" required>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label for="usr_ne">Número ext</label>
                                    <input type="text" name="usr_ne" id="usr_ne" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label for="usr_ni">Número int</label>
                                    <input type="text" name="usr_ni" id="usr_ni" class="form-control" placeholder="S/N">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="usr_cp">Código postal</label>
                                    <input type="text" name="usr_cp" id="usr_cp" class="form-control" placeholder="Escribe el código postal" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_colonia">Colonia</label>
                                    <input type="text" name="usr_colonia" id="usr_colonia" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_estado">Estado</label>
                                    <input type="text" name="usr_estado" id="usr_estado" class="form-control" value="Tamaulipas" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_municipio">Municipio</label>
                                    <input type="text" name="usr_municipio" id="usr_municipio" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" value="Guardar usuario" name="btnGuardarUsuario" id="btnGuardarUsuario" class="btn btn-primary float-right ">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>