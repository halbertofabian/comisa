<?php
cargarComponente('breadcrumb', '', 'Editar contrato');

$idctr = 0;
if ($rutas[2] > 0) {
    $idctr = $rutas[2];
}
$clt = ContratosModelo::mdlMostrarInfoContrato($idctr);
//preArray($clt);
?>

<div class="container">
    <form id="form_editaCliente" enctype="multipart/formdata">
        <div class="row">
            <div class="row ">
                <div class="col-12">

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">

                                <strong>1.- DATOS DEL CLIENTE: </strong>
                                <input type="hidden" name="clts_id" value="<?= $clt['clts_id'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="dts-client">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="clts_nombre"><strong class="text-primary">*</strong>NOMBRE:</label>
                                <input type="text" name="clts_nombre" value="<?= $clt['clts_nombre'] ?>" id="clts_nombre" class="form-control" placeholder="NOMBRE">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_telefono"><strong class="text-primary">*</strong>TELÉFONO:</label>
                                <input type="number" name="clts_telefono" value="<?= $clt['clts_telefono'] ?>" id="clts_telefono" class="form-control" placeholder="TELÉFONO">
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="clts_domicilio"><strong class="text-primary">*</strong>DOMICILIO:</label>
                                <input type="text" name="clts_domicilio" value="<?= $clt['clts_domicilio'] ?>" id="clts_domicilio" class="form-control" placeholder="DOMICILIO">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_col"><strong class="text-primary">*</strong>COL:</label>
                                <input type="text" name="clts_col" value="<?= $clt['clts_col'] ?>" id="clts_col" class="form-control" placeholder="COLONIA">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_entre_calles"><strong class="text-primary">*</strong>ENTRE CALLES:</label>
                                <input type="text" name="clts_entre_calles" value="<?= $clt['clts_entre_calles'] ?>" id="clts_entre_calles" class="form-control" placeholder="ENTRE CALLES">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_fachada_color">FACHADA DE COLOR:</label>
                                <input type="text" name="clts_fachada_color" value="<?= $clt['clts_fachada_color'] ?>" id="clts_fachada_color" class="form-control" placeholder="FACHADA DE COLOR">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_puerta_color">PUERTA COLOR:</label>
                                <input type="text" name="clts_puerta_color" value="<?= $clt['clts_puerta_color'] ?>" id="clts_puerta_color" class="form-control" placeholder="PUERTA COLOR">
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="clts_cred_elector_n">CRED. ELECTOR Nº:</label>
                                <input type="text" name="clts_cred_elector_n" value="<?= $clt['clts_cred_elector_n'] ?>" id="clts_cred_elector_n" class="form-control" placeholder="CRED. ELECTOR Nº">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_ubicacion"><strong class="text-primary"></strong>UBICACION:</label>
                                <input type="text" name="clts_ubicacion" value="<?= $clt['clts_ubicacion'] ?>" id="clts_ubicacion" class="form-control" placeholder="UBICACION">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                <strong>DATOS DEL TRABAJO:</strong>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="clts_trabajo"><strong class="text-primary">*</strong>TRABAJA EN:</label>
                                <input type="text" name="clts_trabajo" value="<?= $clt['clts_trabajo'] ?>" id="clts_trabajo" class="form-control" placeholder="TRABAJA EN">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_puesto"><strong class="text-primary">*</strong>PUESTO:</label>
                                <input type="text" name="clts_puesto" value="<?= $clt['clts_puesto'] ?>" id="clts_puesto" class="form-control" placeholder="PUESTO">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="clts_direccion_tbj"><strong class="text-primary">*</strong>DIRECCIÓN:</label>
                                <input type="text" name="clts_direccion_tbj" value="<?= $clt['clts_direccion_tbj'] ?>" id="clts_direccion_tbj" class="form-control" placeholder="DIRECCION">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="clts_col_tbj"><strong class="text-primary">*</strong>COL:</label>
                                <input type="text" name="clts_col_tbj" value="<?= $clt['clts_col_tbj'] ?>" id="clts_col_tbj" class="form-control" placeholder="COL">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="clts_tel_tbj">TEL:</label>
                                <input type="number" name="clts_tel_tbj" value="<?= $clt['clts_tel_tbj'] ?>" id="clts_tel_tbj" class="form-control" placeholder="TEL">
                            </div>
                        </div>
                        <?php

                        $arrayAntTrabajo = explode("-", $clt['clts_antiguedad_tbj']);
                        $arrayTiempo = ['AÑOS', 'MESES', 'DIAS']
                        ?>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_antiguedad_trabajo">ANTIGÜEDAD:</label>
                                <input type="number" name="clts_antiguedad_trabajo" value="<?= $arrayAntTrabajo[0] ?>" id="clts_antiguedad_trabajo" class="form-control" placeholder="ANTIGÜEDAD">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_antiguedad_trabajo_1">ELIJE TIEMPO:</label>
                                <select name="clts_antiguedad_trabajo_1" id="clts_antiguedad_trabajo_1" class="form-control">
                                    <option value="">SELECCIONE UNA OPCION</option>
                                    <?php foreach ($arrayTiempo as $t) :
                                        if ($t == $arrayAntTrabajo[1]) :
                                    ?>
                                            <option selected value="<?= $arrayAntTrabajo[1] ?>"><?= $arrayAntTrabajo[1] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $t ?>"><?= $t ?></option>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_igs_mensual_tbj">INGRESO MENSUAL:</label>
                                <input type="number" name="clts_igs_mensual_tbj" value="<?= $clt['clts_igs_mensual_tbj'] ?>" id="clts_igs_mensual_tbj" class="form-control" placeholder="INGRESO MENSUAL">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                <strong>DATOS DE LA VIVIENDA:</strong>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tipo_vivienda">LA CASA ES:</label>
                                <select name="clts_tipo_vivienda" id="clts_tipo_vivienda" class="form-control">
                                    <option value="">SELECCIONE UNA OPCION</option>
                                    <?php
                                    $arrayTcasa = ['PROPIA', 'RENTADA', 'PRESTADA'];
                                    foreach ($arrayTcasa as $tcasa) :
                                        if ($tcasa == $clt['clts_tipo_vivienda']) :
                                    ?>
                                            <option selected value="<?= $clt['clts_tipo_vivienda'] ?>"><?= $clt['clts_tipo_vivienda'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $tcasa ?>"><?= $tcasa ?></option>
                                    <?php
                                        endif;
                                    endforeach;
                                    $arrayAntVivienda = explode("-", $clt['clts_antiguedad_viviendo']);
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tiempo_casa"><strong class="text-primary">*</strong>TIEMPO VIVIENDO AQUÍ:</label>
                                <input type="number" name="clts_tiempo_casa" value="<?= $arrayAntVivienda[0] ?>" id="clts_tiempo_casa" class="form-control" placeholder="TIEMPO VIVIENDO AQUÍ">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tiempo_casa_1">ELIJE TIEMPO:</label>
                                <select name="clts_tiempo_casa_1" id="clts_tiempo_casa_1" class="form-control">
                                    <option value="">SELECCIONE UNA OPCION</option>
                                    <?php foreach ($arrayTiempo as $t) :
                                        if ($t == $arrayAntVivienda[1]) :
                                    ?>
                                            <option selected value="<?= $arrayAntVivienda[1] ?>"><?= $arrayAntVivienda[1] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $t ?>"><?= $t ?></option>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="clts_vivienda_anomde">A NOMBRE DE:</label>
                                <input type="text" name="clts_vivienda_anomde" value="<?= $clt['clts_vivienda_anomde'] ?>" id="clts_vivienda_anomde" class="form-control" placeholder="A NOMBRE DE">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="clts_nreg_propiedad">Nº REG. DE LA PROPIEDAD:</label>
                                <input type="text" name="clts_nreg_propiedad" value="<?= $clt['clts_nreg_propiedad'] ?>" id="clts_nreg_propiedad" class="form-control" placeholder="Nº REG. DE LA PROPIEDAD">
                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">

                                <strong>2.- DATOS DEL CÓNYUGE: </strong>
                            </div>
                        </div>
                    </div>
                    <div class="row " id="dts-conyug">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="clts_nom_conyuge">NOMBRE:</label>
                                <input type="text" name="clts_nom_conyuge" value="<?= $clt['clts_nom_conyuge'] ?>" id="clts_nom_conyuge" class="form-control" placeholder="NOMBRE">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_conyuge">TRABAJA EN:</label>
                                <input type="text" name="clts_tbj_conyuge" value="<?= $clt['clts_tbj_conyuge'] ?>" id="clts_tbj_conyuge" class="form-control" placeholder="TRABAJA EN">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_puesto_conyuge">PUESTO:</label>
                                <input type="text" name="clts_tbj_puesto_conyuge" value="<?= $clt['clts_tbj_puesto_conyuge'] ?>" id="clts_tbj_puesto_conyuge" class="form-control" placeholder="PUESTO">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_dir_conyuge">DIRECCION:</label>
                                <input type="text" name="clts_tbj_dir_conyuge" value="<?= $clt['clts_tbj_dir_conyuge'] ?>" id="clts_tbj_dir_conyuge" class="form-control" placeholder="DIRECCION">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_col_conyuge">COL:</label>
                                <input type="text" name="clts_tbj_col_conyuge" value="<?= $clt['clts_tbj_col_conyuge'] ?>" id="clts_tbj_col_conyuge" class="form-control" placeholder="COL">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_tel_conyuge">TELEFONO:</label>
                                <input type="text" name="clts_tbj_tel_conyuge" value="<?= $clt['clts_tbj_tel_conyuge'] ?>" id="clts_tbj_tel_conyuge" class="form-control" placeholder="TELEFONO">
                            </div>
                        </div>
                        <?php

                        $arrayAntTrabajoCy = explode("-", $clt['clts_tbj_ant_conyuge']);

                        ?>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_anttrabajo_conyuge">ANTIGÜEDAD:</label>
                                <input type="number" name="clts_anttrabajo_conyuge" <?= $arrayAntTrabajoCy[0] ?> id="clts_anttrabajo_conyuge" class="form-control" placeholder="TIEMPO">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tiempo_trabajo_conyuge">ELIJE TIEMPO:</label>
                                <select name="clts_tiempo_trabajo_conyuge" id="clts_tiempo_trabajo_conyuge" class="form-control">
                                    <option value="">SELECCIONE UNA OPCION</option>
                                    <?php foreach ($arrayTiempo as $t) :
                                        if ($t == $arrayAntTrabajoCy[1]) :
                                    ?>
                                            <option selected value="<?= $arrayAntTrabajoCy[1] ?>"><?= $arrayAntTrabajoCy[1] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $t ?>"><?= $t ?></option>
                                    <?php
                                        endif;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>3.- DATOS DEL FIADOR: </strong>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_nom_fiador">NOMBRE:</label>
                        <input type="text" name="clts_nom_fiador" value="<?= $clt['clts_nom_fiador'] ?>" id="clts_nom_fiador" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_parentesco_fiador">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_fiador" value="<?= $clt['clts_parentesco_fiador'] ?>" id="clts_parentesco_fiador" class="form-control" placeholder="PARENTESCO">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tel_fiador">TEL:</label>
                        <input type="text" name="clts_tel_fiador" value="<?= $clt['clts_tel_fiador'] ?>" id="clts_tel_fiador" class="form-control" placeholder="TEL">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_dir_fiador">DIRECCIÓN:</label>
                        <input type="text" name="clts_dir_fiador" value="<?= $clt['clts_dir_fiador'] ?>" id="clts_dir_fiador" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_col_fiador">COLONIA:</label>
                        <input type="text" name="clts_col_fiador" value="<?= $clt['clts_col_fiador'] ?>" id="clts_col_fiador" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_fiador">TRABAJA EN:</label>
                        <input type="text" name="clts_tbj_fiador" value="<?= $clt['clts_tbj_fiador'] ?>" id="clts_tbj_fiador" class="form-control" placeholder="TRABAJA EN">
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_dir_fiador">DIRECCION:</label>
                        <input type="text" name="clts_tbj_dir_fiador" value="<?= $clt['clts_tbj_dir_fiador'] ?>" id="clts_tbj_dir_fiador" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_tel_fiador">TEL:</label>
                        <input type="text" name="clts_tbj_tel_fiador" value="<?= $clt['clts_tbj_tel_fiador'] ?>" id="clts_tbj_tel_fiador" class="form-control" placeholder="TELEFONO">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_col_fiador">COL:</label>
                        <input type="text" name="clts_tbj_col_fiador" value="<?= $clt['clts_tbj_col_fiador'] ?>" id="clts_tbj_col_fiador" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_fc_elector_fiador">FOLIO CRED.ELECTOR:</label>
                        <input type="text" name="clts_fc_elector_fiador" value="<?= $clt['clts_fc_elector_fiador'] ?>" id="clts_fc_elector_fiador" class="form-control" placeholder="FOLIO CRED.ELECTOR">
                    </div>
                </div>
                <?php

                $arrayAntTrabajoFd = explode("-", $clt['clts_tbj_ant_fiador']);

                ?>

                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_anttrabajo_fiador">ANTIGÜEDAD:</label>
                        <input type="number" name="clts_anttrabajo_fiador" value="<?= $arrayAntTrabajoFd[0] ?>" id="clts_anttrabajo_fiador" class="form-control" placeholder="TIEMPO">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tiempo_trabajo_fiador">ELIJE TIEMPO:</label>
                        <select name="clts_tiempo_trabajo_fiador" id="clts_tiempo_trabajo_fiador" class="form-control">
                            <?php foreach ($arrayTiempo as $t) :
                                if ($t == $arrayAntTrabajoFd[1]) :
                            ?>
                                    <option selected value="<?= $arrayAntTrabajoFd[1] ?>"><?= $arrayAntTrabajoFd[1] ?></option>
                                <?php else : ?>
                                    <option value="<?= $t ?>"><?= $t ?></option>
                            <?php
                                endif;
                            endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>4.- REFERENCIAS: </strong>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_nom_ref1">NOMBRE:</label>
                        <input type="text" name="clts_nom_ref1" value="<?= $clt['clts_nom_ref1'] ?>" id="clts_nom_ref1" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_parentesco_ref1">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_ref1" value="<?= $clt['clts_parentesco_ref1'] ?>" id="clts_parentesco_ref1" class="form-control" placeholder="PARENTESCO">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="clts_dir_ref1">DIRECCION:</label>
                        <input type="text" name="clts_dir_ref1" value="<?= $clt['clts_dir_ref1'] ?>" id="clts_dir_ref1" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_col_ref1">COL:</label>
                        <input type="text" name="clts_col_ref1" value="<?= $clt['clts_col_ref1'] ?>" id="clts_col_ref1" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tel_ref1">TEL:</label>
                        <input type="text" name="clts_tel_ref1" value="<?= $clt['clts_tel_ref1'] ?>" id="clts_tel_ref1" class="form-control" placeholder="TELEFONO">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_nom_ref2">NOMBRE:</label>
                        <input type="text" name="clts_nom_ref2" value="<?= $clt['clts_nom_ref2'] ?>" id="clts_nom_ref2" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_parentesco_ref2">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_ref2" value="<?= $clt['clts_parentesco_ref2'] ?>" id="clts_parentesco_ref2" class="form-control" placeholder="PARENTESCO">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="clts_dir_ref2">DIRECCION:</label>
                        <input type="text" name="clts_dir_ref2" id="clts_dir_ref2" value="<?= $clt['clts_dir_ref2'] ?>" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_col_ref2">COL:</label>
                        <input type="text" name="clts_col_ref2" id="clts_col_ref2" value="<?= $clt['clts_col_ref2'] ?>" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tel_ref2">TEL:</label>
                        <input type="text" name="clts_tel_ref2" id="clts_tel_ref2" value="<?= $clt['clts_tel_ref2'] ?>" class="form-control" placeholder="TELEFONO">
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>5.- LLENADO POR EL CLIENTE: </strong>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <table class="table">
                        <tr class="text-center">
                            <td>
                                <strong>FORMA DE PAGO</strong>
                            </td>
                            <td>

                                <input type="text" class="form-control" name="ctrs_forma_pago" id="ctrs_forma_pago" required>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <strong>DIA Y HORARIO DE PAGO DEL CLIENTE</strong>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for=""></label>
                                    <select class="form-control" name="ctrs_dia_pago" id="ctrs_dia_pago" required>
                                        <option value="">SELECCIONE UN DIA</option>
                                        <option>SABADO</option>
                                        <option>DOMINGO</option>
                                        <option>LUNES</option>
                                        <option>MARTES</option>
                                        <option>MIERCOLES</option>
                                        <option>JUEVES</option>
                                        <option>VIERNES</option>
                                    </select>
                                </div>
                                <input type="time" class="form-control" name="ctrs_horario_pago" id="ctrs_horario_pago" required>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6 col-12">
                    <table class="table">
                        <tr class="text-center">
                            <td>
                                <strong>FECHA DE PRÓXIMO PAGO</strong>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="ctrs_fecha_pp" id="ctrs_fecha_pp" required>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td>
                                <strong>PLAZO DE CRÉDITO</strong>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="ctrs_plazo_credito" id="ctrs_plazo_credito" placeholder="Exprese en semanas" required>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>6.- ARCHIVOS: </strong>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="ctrs_evidencia"><strong class="text-primary"></strong>FOTO DEL CLIENTE CON EL PRODUCTO:</label>
                        <input type="file" class="form-control-file" name="ctrs_evidencia">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="ctrs_pagare"><strong class="text-primary"></strong>FOTO DEL PAGARE:</label>
                        <input type="file" class="form-control-file" name="ctrs_pagare">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="ctrs_fachada"><strong class="text-primary"></strong>FOTO DE FACHADA DE LA CASA:</label>
                        <input type="file" class="form-control-file" name="ctrs_fachada">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <button type="submit" class="btn btn-primary btn-sm-block float-right btn-load">GUARDAR</button>
                </div>
            </div>
        </div>
    </form>
</div>