<?php if ($rutas[1] == $_SESSION['session_usr']['usr_id'] || $_SESSION['session_usr']['usr_rol'] != "Alumno") : ?>

    <div class="container">


        <?php
        $usr = UsuariosModelo::mdlMostrarUsuarios($rutas[1]);

        $ins = InscripcionesModelo::mdlMostrarInscripciones($usr['usr_id']);

        ?>
        <div class="card">

            <div class="card-body">
                <h3 class="text-primary">FICHAS</h3>
                <h5><?php echo $usr['usr_nombre'] . ' ' . $usr['usr_app'] . ' ' . $usr['usr_apm'] ?></h5>
                <h5><?php echo $usr['usr_matricula'] ?></h5>

            </div>
        </div>

        <hr>

        <?php

        if (sizeof($ins) > 0) :
            foreach ($ins as $key => $pqt) :
        ?>
                <!-- <?php //preArray($pqt ) 
                        ?>  -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $pqt['pqt_nombre'] ?></h4>
                        <button type="button" class="btn btn-dark" data-toggle="button">CALIFICACIÓN: S/A </button>

                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <p> <strong>Asesor: </strong> <?php echo $pqt['fpg_usuario_registro'] ?> </p>
                                </div>
                                <div class="col-md-4 col-12">
                                    <p> <strong>Modalidad: </strong> <?php echo $pqt['pqt_modalidad'] ?> </p>
                                </div>
                                <div class="col-md-4 col-12">
                                    <p> <strong>Fecha inscripción: </strong> <?php echo $pqt['fpg_fecha_registro'] ?> </p>
                                </div>
                            </div>
                            <?php
                            $datosFicha = PagosControlador::ctrMostrarDatosFichaPagoByFicha($pqt['fpg_id']);
                            $adeudo = 0;
                            $adeudo +=  $datosFicha['PPG_INSCRIPCION']['adeudo'];
                            $adeudo += $datosFicha['PPG_EXAMEN']['adeudo'];
                            $adeudo +=  $datosFicha['PPG_GUIA']['adeudo'];
                            $adeudo +=  $datosFicha['PPG_INCORPORACION']['adeudo'];
                            $adeudo +=  $datosFicha['PPG_CERTIFICADO']['adeudo'];
                            $adeudo += $datosFicha['PPG_SEMANAL']['adeudo'];
                            ?>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="">INSCRIPCION</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                Costo

                                            </td>
                                            <td>
                                                Adeudo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                $ <strong class="text-success"><?php echo number_format($datosFicha['PPG_INSCRIPCION']['total'], 2) ?></strong>

                                            </td>
                                            <td>
                                                $ <strong class="text-danger"><?php echo number_format($datosFicha['PPG_INSCRIPCION']['adeudo'], 2) ?></strong>
                                            </td>
                                        </tr>
                                    </table class="table table-striped">
                                </div>

                                <div class="col-md-4 col-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="">EXAMEN</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                Costo

                                            </td>
                                            <td>
                                                Adeudo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                $ <strong class="text-success"><?php echo number_format($datosFicha['PPG_EXAMEN']['total'], 2) ?></strong>

                                            </td>
                                            <td>
                                                $ <strong class="text-danger"><?php echo number_format($datosFicha['PPG_EXAMEN']['adeudo'], 2) ?></strong>
                                            </td>
                                        </tr>
                                    </table class="table table-striped">
                                </div>

                                <div class="col-md-4 col-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="">GUIA</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                Costo

                                            </td>
                                            <td>
                                                Adeudo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                $ <strong class="text-success"><?php echo number_format($datosFicha['PPG_GUIA']['total'], 2) ?></strong>

                                            </td>
                                            <td>
                                                $ <strong class="text-danger"><?php echo number_format($datosFicha['PPG_GUIA']['adeudo'], 2) ?></strong>
                                            </td>
                                        </tr>
                                    </table class="table table-striped">
                                </div>
                                <div class="col-md-4 col-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="">INCORPORACION</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                Costo

                                            </td>
                                            <td>
                                                Adeudo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                $ <strong class="text-success"><?php echo number_format($datosFicha['PPG_INCORPORACION']['total'], 2) ?></strong>

                                            </td>
                                            <td>
                                                $ <strong class="text-danger"><?php echo number_format($datosFicha['PPG_INCORPORACION']['adeudo'], 2) ?></strong>
                                            </td>
                                        </tr>
                                    </table class="table table-striped">
                                </div>
                                <div class="col-md-4 col-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="">CERTIFICADO</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                Costo

                                            </td>
                                            <td>
                                                Adeudo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                $ <strong class="text-success"><?php echo number_format($datosFicha['PPG_CERTIFICADO']['total'], 2) ?></strong>

                                            </td>
                                            <td>
                                                $ <strong class="text-danger"><?php echo number_format($datosFicha['PPG_CERTIFICADO']['adeudo'], 2) ?></strong>
                                            </td>
                                        </tr>
                                    </table class="table table-striped">
                                </div>
                                <div class="col-md-4 col-12">
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="">PAGO SEMANAL</th>
                                        </tr>
                                        <tr>
                                            <td>

                                                Costo

                                            </td>
                                            <td>
                                                Adeudo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>

                                                $ <strong class="text-success"><?php echo number_format($datosFicha['PPG_SEMANAL']['total'], 2) ?></strong>

                                            </td>
                                            <td>
                                                $ <strong class="text-danger"><?php echo number_format($datosFicha['PPG_SEMANAL']['adeudo'], 2) ?></strong>
                                            </td>
                                        <tr>
                                            <td style="text-align: right;">
                                                $ <strong class=""><?php echo number_format($datosFicha['PPG_SEMANAL']['pago_semanal'], 2) ?></strong>
                                            </td>
                                        </tr>
                                        </tr>
                                    </table class="table table-striped">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div>
                        <div class="row">
                        <div class="col-4">
                            <h5>ADEUDO TOTAL: <?php echo '$ <strong class="text-primary">'.number_format($adeudo,2).'</strong>'; ?></h5>
                        </div>
                        </div>
                            <div class=" float-right">
                                <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Abonar"><i class="fa fa-money" aria-hidden="true"></i></a>
                                <a class="btn btn-info" href="<?php echo HTTP_HOST . 'app/report/ficha_inscripcion.php?fpg_id=' . $pqt['fpg_id'] ?>" target="framename" data-toggle="tooltip" data-placement="top" title="Ver ficha de inscripcón" "><i class=" fa fa-file-pdf-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        else :
            ?>
            <div class="alert alert-dark text-center" role="alert">
                <strong>No hay registros aún</strong>
            </div>
        <?php endif; ?>
    </div>
<?php elseif ($_SESSION['session_usr']['usr_rol'] != "Alumno") : ?>

<?php else :
    echo '<script>window.location.href="' . HTTP_HOST . '"</script>';
?>

<?php endif; ?>