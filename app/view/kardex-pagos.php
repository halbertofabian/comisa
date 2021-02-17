<?php if ($rutas[1] == $_SESSION['session_usr']['usr_id'] && isset($rutas[3]) && $rutas[3] != "") :

    cargarComponente('breadcrumb_nivel_1', '', 'Ficha #' . $rutas[3], array(['ruta' =>   'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-pagos', 'label' => 'Listar Fichas']));

    // Consultar la ficha

    $vfch = PagosModelo::mdlConsultarFichas($rutas[3]);


    if ($vfch != false) :

    $alumno = UsuariosModelo::mdlMostrarUsuarios('', '', true, $vfch['vfch_alumno']);
    if($alumno['usr_id'] != $_SESSION['session_usr']['usr_id']){
        echo '<script>window.location.href="'.HTTP_HOST.'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-pagos'.'"</script>';
        return;
    }
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
                            <th><?php echo $alumno['usr_matricula']  ?></th>
                            <th><?php echo $alumno['usr_nombre'].' '. $alumno['usr_app'] .' '. $alumno['usr_apm']  ?></th>
                            <th style="text-align: right;">

                                <a target="framename" class="btn btn-dark" href="<?php echo HTTP_HOST . 'app/report/ficha_pago.php?fpg_id=' . $ppg['vfch_id'] ?>" data-toggle="tooltip" data-placement="top" title="Ver ficha de pago" "><i class=" fa fa-file-pdf-o"></i> #<?php echo $vfch['vfch_id'] ?></a>

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
        echo '<script>window.location.href="' . HTTP_HOST . '"</script>';
    endif;

    ?>
<?php elseif ($rutas[1] == $_SESSION['session_usr']['usr_id']) : ?>

    <div class="container">


        <?php
        $usr = UsuariosModelo::mdlMostrarUsuarios($rutas[1]);

        $ins = InscripcionesModelo::mdlMostrarInscripciones($usr['usr_id']);

        ?>
        <div class="card">

            <div class="card-body">
                <h3 class="text-primary">PAGOS</h3>
                <h5><?php echo $usr['usr_nombre'] . ' ' . $usr['usr_app'] . ' ' . $usr['usr_apm'] ?></h5>
                <h5><?php echo $usr['usr_matricula'] ?></h5>

            </div>
        </div>

        <hr>

        <?php

        if (sizeof($ins) > 0) :
            foreach ($ins as $key => $pqt) :
        ?>
                <?php
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $pqt['pqt_nombre'] ?></h4>


                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <!-- <button type="button" class="btn btn-dark" id="btnImprimir" >Imprimir</button> -->
                                <div class="col-12 table-responsive table-bordered tablaPagosAlumno table-striped dt-responsive table-hover" id="tablaPagosAlumno">
                                    <table class="table tablas tablasPagosAlumnos ">
                                        <thead>
                                            <tr>
                                                <th># Número de ficha</th>

                                                <th>Referenica</th>
                                                <th>Metodo de pago</th>
                                                <th>Sub monto</th>
                                                <th>Monto total</th>
                                                <th>Cupón</th>

                                                <th>Fecha registro</th>
                                                <th>Fecha pagada</th>
                                                <th>Usuario registro</th>
                                                <th>Estado</th>
                                                <th>Ticket</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $fichas_venta =  PagosModelo::mdlConsultarFichas('', $pqt['fpg_id']);
                                            //preArray($pagos);
                                            foreach ($fichas_venta as $key => $ppg) :

                                            ?>
                                                <tr>

                                                    <td>
                                                        <a href="<?php echo HTTP_HOST . 'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-pagos/' . $ppg['vfch_id'] ?>" class="btn btn-dark"><?php echo $ppg['vfch_id'] ?></a>
                                                    </td>

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
                                                        <div class="btn-group">
                                                            <a target="framename" class="btn btn-info" href="<?php echo HTTP_HOST . 'app/report/ficha_pago.php?fpg_id=' . $ppg['vfch_id'] ?>" data-toggle="tooltip" data-placement="top" title="Ver ficha de pago" "><i class=" fa fa-file-pdf-o"></i></a>
                                                        </div>
                                                    </td>


                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div>
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

<?php elseif ($_SESSION['session_usr']['usr_rol'] != "Alumno") : ?>

<?php else :
    echo '<script>window.location.href="' . HTTP_HOST . '"</script>';
?>

<?php endif; ?>