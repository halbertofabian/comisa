<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "new") :
    cargarComponente('breadcrumb_nivel_1', '', 'Nuevo paquete', array(['ruta' => 'paquetes', 'label' => 'Listar paquetes']));
?>
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-4 col-12 form-group">
                    <label for="pqt_nombre">Nombre del paquete</label>
                    <input type="text" name="pqt_nombre" id="pqt_nombre" class="form-control" placeholder="Nombre del paquete">
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label for="pqt_modalidad">Modalidad</label>
                    <select name="pqt_modalidad" class="form-control" id="pqt_modalidad">
                        <option value="PRESENCIAL">PRESENCIAL</option>
                        <option value="ONLINE">ONLINE</option>
                    </select>
                </div>
                <div class="col-md-2 col-12 form-group">
                    <label for="pqt_duracion">Duración</label>
                    <input type="text" name="pqt_duracion" id="pqt_duracion" class="form-control" placeholder="Duración">
                </div>
                <div class="col-md-2 col-12 form-group">
                    <label for="pqt_duracion_tiempo">Tiempo</label>
                    <select name="pqt_duracion_tiempo" class="form-control" id="pqt_duracion_tiempo">
                        <option value="SEMANAS">SEMANAS</option>
                        <option value="MESES">MESES</option>
                        <option value="SEMESTRES">SEMESTRES</option>
                        <option value="AÑOS">AÑOS</option>
                    </select>
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label for="pqt_sku"><strong>SKU</strong></label>
                    <input type="text" name="pqt_sku" id="pqt_sku" class="form-control" placeholder="SKU" required>
                    <button type="button" class="btn btn-link float-right btngenerarSKU">Generar</button>
                </div>
                <div class="col-md-8 col-12 form-group">
                    <label for="pqt_descripcion"><strong>Descripción</strong></label>
                    <!-- <input type="text" name="pqt_descripcion" id="pqt_descripcion" class="form-control" placeholder="Descripción"> -->
                    <textarea id="pqt_descripcion" class="form-control" name="pqt_descripcion"></textarea>
                </div>
                <div class="col-12">
                    <div class="alert alert-dark" role="alert">
                        <strong>Costos:</strong>
                    </div>
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_duracion_semana">SEMANAS</label>
                    <input type="text" name="pqt_duracion_semana" id="pqt_duracion_semana" class="form-control" placeholder="Número de semanas">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_semana">Costo</label>
                    <input type="text" name="pqt_costo_semana" id="pqt_costo_semana" class="form-control inputN" placeholder="Costo por semana">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_costo_semana_descripcion">Descripción</label>
                    <input type="text" name="pqt_costo_semana_descripcion" id="pqt_costo_semana_descripcion" class="form-control" placeholder="Descripción">
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="">Inscripción</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Inscripción">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_inscripcion">Costo</label>
                    <input type="text" name="pqt_costo_inscripcion" id="pqt_costo_inscripcion" class="form-control inputN" placeholder="Costo de inscripción">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_inscripcion">Descripción</label>
                    <input type="text" name="pqt_descripcion_inscripcion" id="pqt_descripcion_inscripcion" class="form-control" placeholder="Descripción">
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="">Guía</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Guía / material didactico"">
                </div>
                <div class=" col-md-3 col-12 form-group">
                    <label for="pqt_costo_guia">Costo</label>
                    <input type="text" name="pqt_costo_guia" id="pqt_costo_guia" class="form-control inputN" placeholder="Costo de guía / material didactico">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_guia">Descripción</label>
                    <input type="text" name="pqt_descripcion_guia" id="pqt_descripcion_guia" class="form-control" placeholder="Descripción">
                </div>

                <div class="col-md-3 col-12 form-group">
                    <label for="">Exámen</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Exámen">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_examen">Costo</label>
                    <input type="text" name="pqt_costo_examen" id="pqt_costo_examen" class="form-control inputN" placeholder="Costo de exámen">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_examen">Descripción</label>
                    <input type="text" name="pqt_descripcion_examen" id="pqt_descripcion_examen" class="form-control" placeholder="Descripción">
                </div>

                <div class="col-md-3 col-12 form-group">
                    <label for="">Incorporación</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Incorporación">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_incorporacion">Costo</label>
                    <input type="text" name="pqt_costo_incorporacion" id="pqt_costo_incorporacion" class="form-control inputN" placeholder="Costo de incorporación">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_incorporacion">Descripción</label>
                    <input type="text" name="pqt_descripcion_incorporacion" id="pqt_descripcion_incorporacion" class="form-control" placeholder="Descripción">
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="">Certificado</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Certificado">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_certificado">Costo</label>
                    <input type="text" name="pqt_costo_certificado" id="pqt_costo_certificado" class="form-control inputN" placeholder="Costo de certificado">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_certificado">Descripción</label>
                    <input type="text" name="pqt_descripcion_certificado" id="pqt_descripcion_certificado" class="form-control" placeholder="Descripción">
                </div>
                <div class="col-12 mb-5">
                    <button type="submit" class="btn btn-primary float-right" name="btnAgregarPaquete">Crear paquete</button>
                </div>

            </div>
            <?php
            $crearPauqte = new PaquetesControlador();
            $crearPauqte->ctrAgregarPaquetes();
            ?>
        </form>
    </div>

<?php
elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "update") :
    $paquetes = PaquetesModelo::mdlMostrarPaquetes($rutas[2]);

?>
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-4 col-12 form-group">
                    <label for="pqt_nombre">Nombre del paquete</label>
                    <input type="text" name="pqt_nombre" value="<?php echo $paquetes['pqt_nombre'] ?>" id="pqt_nombre" class="form-control" placeholder="Nombre del paquete" required>
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label for="pqt_modalidad">Modalidad</label>
                    <select name="pqt_modalidad" class="form-control" id="pqt_modalidad">
                        <option value="<?php echo $paquetes['pqt_modalidad'] ?>"><?php echo $paquetes['pqt_modalidad'] ?></option>
                        <option value="PRESENCIAL">PRESENCIAL</option>
                        <option value="ONLINE">ONLINE</option>
                    </select>
                </div>
                <?php
                $duracion = explode(" ", $paquetes['pqt_duracion']);


                ?>
                <div class="col-md-2 col-12 form-group">
                    <label for="pqt_duracion">Duración</label>
                    <input type="text" name="pqt_duracion" value="<?php echo $duracion[0] ?>" id="pqt_duracion" class="form-control" placeholder="Duración" required>
                </div>
                <div class="col-md-2 col-12 form-group">
                    <label for="pqt_duracion_tiempo">Tiempo</label>
                    <select name="pqt_duracion_tiempo" class="form-control" id="pqt_duracion_tiempo">
                        <option value="<?php echo $duracion[1] ?>"><?php echo $duracion[1] ?></option>

                        <option value="SEMANAS">SEMANAS</option>
                        <option value="MESES">MESES</option>
                        <option value="SEMESTRES">SEMESTRES</option>
                        <option value="AÑOS">AÑOS</option>
                    </select>
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label for="pqt_sku"><strong>SKU</strong></label>
                    <input type="text" name="pqt_sku" id="pqt_sku" readonly value="<?php echo $paquetes['pqt_sku'] ?>" class="form-control" placeholder="SKU" required>
                    <!-- <button type="button" class="btn btn-link float-right btngenerarSKU">Generar</button> -->
                </div>
                <div class="col-md-8 col-12 form-group">
                    <label for="pqt_descripcion"><strong>Descripción</strong></label>
                    <!-- <input type="text" name="pqt_descripcion" id="pqt_descripcion" class="form-control" placeholder="Descripción"> -->
                    <textarea id="pqt_descripcion" class="form-control" name="pqt_descripcion"><?php echo $paquetes['pqt_descripcion'] ?></textarea>
                </div>
                <div class="col-12">
                    <div class="alert alert-dark" role="alert">
                        <strong>Costos:</strong>
                    </div>
                </div>

                <?php

                $costo = json_decode($paquetes['pqt_costo'], true);

                //preArray($costo);

                ?>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_duracion_semana">SEMANAS</label>
                    <input type="text" name="pqt_duracion_semana" value="<?php echo  $costo['duracion_semana'] ?>" id="pqt_duracion_semana" class="form-control" placeholder="Número de semanas">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_semana">Costo</label>
                    <input type="text" name="pqt_costo_semana" value="<?php echo  $costo['costo_semana'] ?>" id="pqt_costo_semana" class="form-control inputN" placeholder="Costo por semana">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_costo_semana_descripcion">Descripción</label>
                    <input type="text" name="pqt_costo_semana_descripcion" value="<?php echo  $costo['descripcion_semana'] ?>" id="pqt_costo_semana_descripcion" class="form-control" placeholder="Descripción">
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="">Inscripción</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Inscripción">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_inscripcion">Costo</label>
                    <input type="text" name="pqt_costo_inscripcion" value="<?php echo  $costo['costo_inscripcion'] ?>" id="pqt_costo_inscripcion" class="form-control inputN" placeholder="Costo de inscripción">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_inscripcion">Descripción</label>
                    <input type="text" name="pqt_descripcion_inscripcion" value="<?php echo  $costo['descripcion_inscripcion'] ?>" id="pqt_descripcion_inscripcion" class="form-control" placeholder="Descripción">
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="">Guía</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Guía / material didactico"">
                </div>
                <div class=" col-md-3 col-12 form-group">
                    <label for="pqt_costo_guia">Costo</label>
                    <input type="text" name="pqt_costo_guia" value="<?php echo  $costo['costo_guia'] ?>" id="pqt_costo_guia" class="form-control inputN" placeholder="Costo de guía / material didactico">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_guia">Descripción</label>
                    <input type="text" name="pqt_descripcion_guia" value="<?php echo  $costo['descripcion_guia'] ?>" id="pqt_descripcion_guia" class="form-control" placeholder="Descripción">
                </div>

                <div class="col-md-3 col-12 form-group">
                    <label for="">Exámen</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Exámen">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_examen">Costo</label>
                    <input type="text" name="pqt_costo_examen" value="<?php echo  $costo['costo_examen'] ?>" id="pqt_costo_examen" class="form-control inputN" placeholder="Costo de exámen">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_examen">Descripción</label>
                    <input type="text" name="pqt_descripcion_examen" value="<?php echo  $costo['descripcion_examen'] ?>" id="pqt_descripcion_examen" class="form-control" placeholder="Descripción">
                </div>

                <div class="col-md-3 col-12 form-group">
                    <label for="">Incorporación</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Incorporación">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_incorporacion">Costo</label>
                    <input type="text" name="pqt_costo_incorporacion" value="<?php echo  $costo['costo_incorporacion'] ?>" id="pqt_costo_incorporacion" class="form-control inputN" placeholder="Costo de incorporación">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_incorporacion">Descripción</label>
                    <input type="text" name="pqt_descripcion_incorporacion" value="<?php echo  $costo['descripcion_incorporacion'] ?>" id="pqt_descripcion_incorporacion" class="form-control" placeholder="Descripción">
                </div>


                <div class="col-md-3 col-12 form-group">
                    <label for="">Certificado</label>
                    <input type="text" name="" id="" readonly class="form-control" value="Certificado">
                </div>
                <div class="col-md-3 col-12 form-group">
                    <label for="pqt_costo_certificado">Costo</label>
                    <input type="text" name="pqt_costo_certificado" value="<?php echo  $costo['costo_certificado'] ?>" id="pqt_costo_certificado" class="form-control inputN" placeholder="Costo de certificado">
                </div>
                <div class="col-md-6 col-12 form-group">
                    <label for="pqt_descripcion_certificado">Descripción</label>
                    <input type="text" name="pqt_descripcion_certificado" value="<?php echo  $costo['descripcion_certificado'] ?>" id="pqt_descripcion_certificado" class="form-control" placeholder="Descripción">
                </div>
                <div class="col-12 mb-5">
                    <button type="submit" class="btn btn-primary float-right" name="btnEditarPaquete">Guardar cambios</button>
                </div>

            </div>
            <?php
            $guardarCambios = new PaquetesControlador();
            $guardarCambios->ctrActualizarPaquetes();
            ?>
        </form>
    </div>
<?php else :
    cargarComponente('breadcrumb', '', 'Lista de paquetes');
?>
    <div class="container">
        <div class="row">
            <?php
            $paquetes = PaquetesModelo::mdlMostrarPaquetes();


            foreach ($paquetes as $key => $pqt) :
                $costos_paquetes = json_decode($pqt['pqt_costo'], true);

            ?>

                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <?php if ($_SESSION['session_usr']['usr_rol'] == "Administrador") : ?>
                                <div class="btn-group ">
                                    <a href="<?php echo HTTP_HOST . 'paquetes/update/' . $pqt['pqt_sku'] ?>" class="btn btn-warning btn-sm btnEditarPaquete" pqt_sku="<?php echo $pqt['pqt_sku']; ?>"><i class="fa fa-edit"></i></a>

                                    <button class="btn btn-danger btn-sm btnEliminarPaquete" pqt_sku="<?php echo $pqt['pqt_sku']; ?>"><i class="fa fa-trash"></i></button>

                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- <img class="card-img-top" src="https://www.interjet.com/images/img.jpg" alt=""> -->
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $pqt['pqt_nombre'] ?></h4>
                            <p class="card-text"><?php echo $pqt['pqt_descripcion'] ?></p>
                            <div class="badge  badge-success float-right mb-1">
                                <span><?php echo $pqt['pqt_modalidad'] ?></span>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Inscripción:</th>
                                        <th><strong>$ <?php echo number_format($costos_paquetes['costo_inscripcion'], 2); ?></strong></th>
                                        <th>Exámen:</th>
                                        <th><strong>$ <?php echo number_format($costos_paquetes['costo_examen'], 2); ?></strong></th>
                                    </tr>
                                    <tr>
                                        <th>Guía:</th>
                                        <th><strong>$ <?php echo number_format($costos_paquetes['costo_guia'], 2); ?></strong></th>
                                        <th>Incorporación:</th>
                                        <th><strong>$ <?php echo number_format($costos_paquetes['costo_incorporacion'], 2); ?></strong></th>
                                    </tr>
                                    <tr>
                                        <th>Certificado:</th>
                                        <th><strong>$ <?php echo number_format($costos_paquetes['costo_certificado'], 2); ?></strong></th>
                                        <th>Semana:</th>
                                        <th><strong>$ <?php echo number_format($costos_paquetes['costo_semana'], 2); ?></strong></th>
                                    </tr>
                                </table>
                            </div>

                            <strong>Duración: <?php echo $pqt['pqt_duracion'] ?></strong>
                            <br>
                            <!-- <a href="<?php echo HTTP_HOST . 'inscripciones/' . $pqt['pqt_sku'] ?>" class="btn btn-primary float-right">Inscribir</a> -->
                            <div class="badge  badge-danger">
                                <span><?php echo $pqt['pqt_sku'] ?></span>
                            </div>
                            <div class="">
                                <span>Usuario registro: <?php echo '<strong>' . $pqt['usr_nombre'] . '</strong>'; ?></span>

                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>