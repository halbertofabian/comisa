<?php
cargarComponente('breadcrumb_nivel_1', '', 'Contrato', array(['ruta' => 'contratos/listar', 'label' => 'Listar contratos']));


$ctr = ContratosModelo::mdlMostrarContratosById($rutas[2]);

?>

<form id="" method="post">
    <div class="card card-contrato">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">CONTRATO DE COMPRAVENTA</strong>
            <a href="<?= HTTP_HOST ?>app/report/contrato-ventas.php?ctr_id=<?= $ctr['ctr_id'] ?>" target="_blacnk" class="btn btn-secondary text-center btnImprimirContrato float-right">
                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="form-group">

                        <input type="hidden" name="clts_folio_nuevo" id="clts_folio_nuevo" class="form-control text-center" value="<?= $ctr['clts_folio_nuevo'] ?>" required readonly>
                        <input type="text" name="ctr_folio" id="ctr_folio" class="form-control text-center" value="<?= $ctr['ctr_folio'] ?>" required readonly>

                    </div>
                    <p class="card-text text-center">Nº CONTRATO</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <input type="text" name="ctr_ruta" id="ctr_ruta" class="form-control" value="<?= $ctr['ctr_ruta'] ?>" readonly>
                    </div>
                    <p class="card-text text-center">RUTA</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="form-group">

                        <input type="text" name="ctr_numero_cuenta" id="ctr_numero_cuenta" class="form-control text-center" value="<?= $ctr['ctr_numero_cuenta'] ?>" required readonly>

                    </div>
                    <p class="card-text text-center">Nº CUENTA</p>
                </div>
                <div class="col-md-3 text-center">
                    <div class="form-group">

                        <input type="text" name="ctr_fecha_contrato" id="ctr_fecha_contrato" class="form-control text-center" value="<?= $ctr['ctr_fecha_contrato'] ?>" required>

                    </div>
                    <p class="card-text text-center">FECHA</p>
                </div>

            </div>
        </div>
    </div>
    <div class="card card-cliente">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">1.- DATOS DEL CLIENTE</strong>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">NOMBRE:</label>
                        <input type="text" name="ctr_cliente" id="ctr_cliente" class="form-control" value="<?= $ctr['ctr_cliente'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_curp">CURP:</label>
                        <input type="text" name="clts_curp" id="clts_curp" class="form-control" value="<?= $ctr['clts_curp'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_telefono">TELEFONO:</label>
                        <input type="text" name="clts_telefono" id="clts_telefono" class="form-control  phone_mx" value="<?= $ctr['clts_telefono'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="clts_domicilio">DOMICILIO:</label>
                        <input type="text" name="clts_domicilio" id="clts_domicilio" class="form-control" value="<?= $ctr['clts_domicilio'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_col">COL:</label>
                        <input type="text" name="clts_col" id="clts_col" class="form-control" value="<?= $ctr['clts_col'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_entre_calles">ENTRE CALLES:</label>
                        <input type="text" name="clts_entre_calles" id="clts_entre_calles" class="form-control" value="<?= $ctr['clts_entre_calles'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="clts_trabajo">TRABAJA EN:</label>
                        <input type="text" name="clts_trabajo" id="clts_trabajo" class="form-control" value="<?= $ctr['clts_trabajo'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="clts_puesto">PUESTO:</label>
                        <input type="text" name="clts_puesto" id="clts_puesto" class="form-control" value="<?= $ctr['clts_puesto'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_direccion_tbj">DIRECCION:</label>
                        <input type="text" name="clts_direccion_tbj" id="clts_direccion_tbj" class="form-control" value="<?= $ctr['clts_direccion_tbj'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_col_tbj">COLONIA:</label>
                        <input type="text" name="clts_col_tbj" id="clts_col_tbj" class="form-control" value="<?= $ctr['clts_col_tbj'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tel_tbj">TEL:</label>
                        <input type="text" name="clts_tel_tbj" id="clts_tel_tbj" class="form-control phone_mx" value="<?= $ctr['clts_tel_tbj'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_antiguedad_tbj">ANTIGÜEDAD:</label>
                        <input type="text" name="clts_antiguedad_tbj" id="clts_antiguedad_tbj" class="form-control" value="<?= $ctr['clts_antiguedad_tbj'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_igs_mensual_tbj">INGRESO MENSUAL:</label>
                        <input type="text" name="clts_igs_mensual_tbj" id="clts_igs_mensual_tbj" class="form-control" value="<?= $ctr['clts_igs_mensual_tbj'] ?>">
                    </div>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_tipo_vivienda">LA CASA ES</label>
                        <input type="text" name="clts_tipo_vivienda" id="clts_tipo_vivienda" class="form-control" value="<?= $ctr['clts_tipo_vivienda'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_antiguedad_viviendo">TIEMPO VIVIENDO ALLI:</label>
                        <input type="text" name="clts_antiguedad_viviendo" id="clts_antiguedad_viviendo" class="form-control" value="<?= $ctr['clts_antiguedad_viviendo'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_vivienda_anomde">A NOMBRE DE:</label>
                        <input type="text" name="clts_vivienda_anomde" id="clts_vivienda_anomde" class="form-control" value="<?= $ctr['clts_vivienda_anomde'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_coordenadas">CORDENADAS:</label>
                        <input type="text" name="clts_coordenadas" id="clts_coordenadas" class="form-control" value="<?= $ctr['clts_coordenadas'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_fachada_color">FACHADA COLOR:</label>
                        <input type="text" name="clts_fachada_color" id="clts_fachada_color" class="form-control" value="<?= $ctr['clts_fachada_color'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_puerta_color">PUERTA COLOR:</label>
                        <input type="text" name="clts_puerta_color" id="clts_puerta_color" class="form-control" value="<?= $ctr['clts_puerta_color'] ?>">
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="card card-conyugue">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">2.- DATOS DEL CONYUGUE </strong>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="clts_nom_conyuge">NOMBRE:</label>
                        <input type="text" name="clts_nom_conyuge" id="clts_nom_conyuge" class="form-control" value="<?= $ctr['clts_nom_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_tbj_conyuge">TRABAJA EN:</label>
                        <input type="text" name="clts_tbj_conyuge" id="clts_tbj_conyuge" class="form-control" value="<?= $ctr['clts_tbj_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_puesto_conyuge">PUESTO:</label>
                        <input type="text" name="clts_tbj_puesto_conyuge" id="clts_tbj_puesto_conyuge" class="form-control" value="<?= $ctr['clts_tbj_puesto_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_dir_conyuge">DIRECCION:</label>
                        <input type="text" name="clts_tbj_dir_conyuge" id="clts_tbj_dir_conyuge" class="form-control" value="<?= $ctr['clts_tbj_dir_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_col_conyuge">COL:</label>
                        <input type="text" name="clts_tbj_col_conyuge" id="clts_tbj_col_conyuge" class="form-control" value="<?= $ctr['clts_tbj_col_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_tel_conyuge">TELEFONO:</label>
                        <input type="text" name="clts_tbj_tel_conyuge" id="clts_tbj_tel_conyuge" class="form-control" value="<?= $ctr['clts_tbj_tel_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_ant_conyuge">TIEMPO TRABAJANDO ALLI:</label>
                        <input type="text" name="clts_tbj_ant_conyuge" id="clts_tbj_ant_conyuge" class="form-control" value="<?= $ctr['clts_tbj_ant_conyuge'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_ing_conyuge">INGRESO DEL CONYUGUE:</label>
                        <input type="text" name="clts_tbj_ing_conyuge" id="clts_tbj_ing_conyuge" class="form-control" value="<?= $ctr['clts_tbj_ing_conyuge'] ?>">
                    </div>
                </div>


            </div>

        </div>

    </div>
    <div class="card card-fiador">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">3.- DATOS DEL FIADOR </strong>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_nom_fiador">NOMBRE:</label>
                        <input type="text" name="clts_nom_fiador" id="clts_nom_fiador" class="form-control" value="<?= $ctr['clts_nom_fiador'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_parentesco_fiador">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_fiador" id="clts_parentesco_fiador" class="form-control" value="<?= $ctr['clts_parentesco_fiador'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tel_fiador">TEL:</label>
                        <input type="text" name="clts_tel_fiador" id="clts_tel_fiador" class="form-control" value="<?= $ctr['clts_tel_fiador'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_dir_fiador">DIRECCION:</label>
                        <input type="text" name="clts_dir_fiador" id="clts_dir_fiador" class="form-control" value="<?= $ctr['clts_dir_fiador'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_col_fiador">COL:</label>
                        <input type="text" name="clts_col_fiador" id="clts_col_fiador" class="form-control" value="<?= $ctr['clts_col_fiador'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tbj_fiador">TRABAJA EN:</label>
                        <input type="text" name="clts_tbj_fiador" id="clts_tbj_fiador" class="form-control" value="<?= $ctr['clts_tbj_fiador'] ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_tbj_dir_fiador">DIRECCION:</label>
                        <input type="text" name="clts_tbj_dir_fiador" id="clts_tbj_dir_fiador" class="form-control" value="<?= $ctr['clts_tbj_dir_fiador'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_tbj_tel_fiador">TEL.:</label>
                        <input type="text" name="clts_tbj_tel_fiador" id="clts_tbj_tel_fiador" class="form-control" value="<?= $ctr['clts_tbj_tel_fiador'] ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_tbj_col_fiador">COL:</label>
                        <input type="text" name="clts_tbj_col_fiador" id="clts_tbj_col_fiador" class="form-control" value="<?= $ctr['clts_tbj_col_fiador'] ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="clts_tbj_ant_fiador">ANTIGÜEDAD:</label>
                        <input type="text" name="clts_tbj_ant_fiador" id="clts_tbj_ant_fiador" class="form-control" value="<?= $ctr['clts_tbj_ant_fiador'] ?>">
                    </div>
                </div>



            </div>

        </div>

    </div>
    <div class="card card-referencias">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">4.- REFERENCIAS </strong>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="ctr_nombre_ref_1">NOMBRE:</label>
                        <input type="text" name="ctr_nombre_ref_1" id="ctr_nombre_ref_1" class="form-control" value="<?= $ctr['ctr_nombre_ref_1'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_parentesco_ref_1">PARENTESCO:</label>
                        <input type="text" name="ctr_parentesco_ref_1" id="ctr_parentesco_ref_1" class="form-control" value="<?= $ctr['ctr_parentesco_ref_1'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_direccion_ref_1">DIRECCION:</label>
                        <input type="text" name="ctr_direccion_ref_1" id="ctr_direccion_ref_1" class="form-control" value="<?= $ctr['ctr_direccion_ref_1'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_colonia_ref_1">COLONIA:</label>
                        <input type="text" name="ctr_colonia_ref_1" id="ctr_colonia_ref_1" class="form-control" value="<?= $ctr['ctr_colonia_ref_1'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_telefono_ref_1">TEL:</label>
                        <input type="text" name="ctr_telefono_ref_1" id="ctr_telefono_ref_1" class="form-control phone_mx" value="<?= $ctr['ctr_telefono_ref_1'] ?>">
                    </div>
                </div>

                <div style="border-top: 1px dashed #000; height:10px;width: 100%;"></div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="clts_nom_ref2">NOMBRE:</label>
                        <input type="text" name="clts_nom_ref2" id="clts_nom_ref2" class="form-control" value="<?= $ctr['clts_nom_ref2'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_parentesco_ref2">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_ref2" id="clts_parentesco_ref2" class="form-control" value="<?= $ctr['clts_parentesco_ref2'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_dir_ref2">DIRECCION:</label>
                        <input type="text" name="clts_dir_ref2" id="clts_dir_ref2" class="form-control" value="<?= $ctr['clts_dir_ref2'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_col_ref2">COLONIA:</label>
                        <input type="text" name="clts_col_ref2" id="clts_col_ref2" class="form-control" value="<?= $ctr['clts_col_ref2'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tel_ref2">TEL:</label>
                        <input type="text" name="clts_tel_ref2" id="clts_tel_ref2" class="form-control phone_mx" value="<?= $ctr['clts_tel_ref2'] ?>">
                    </div>
                </div>

                <div style="border-top: 1px dashed #000; height:10px;width: 100%;"></div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="clts_nom_ref3">NOMBRE:</label>
                        <input type="text" name="clts_nom_ref3" id="clts_nom_ref3" class="form-control" value="<?= $ctr['clts_nom_ref3'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_parentesco_ref3">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_ref3" id="clts_parentesco_ref3" class="form-control" value="<?= $ctr['clts_parentesco_ref3'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_dir_ref3">DIRECCION:</label>
                        <input type="text" name="clts_dir_ref3" id="clts_dir_ref3" class="form-control" value="<?= $ctr['clts_dir_ref3'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_col_ref3">COLONIA:</label>
                        <input type="text" name="clts_col_ref3" id="clts_col_ref3" class="form-control" value="<?= $ctr['clts_col_ref3'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="clts_tel_ref3">TEL:</label>
                        <input type="text" name="clts_tel_ref3" id="clts_tel_ref3" class="form-control phone_mx" value="<?= $ctr['clts_tel_ref3'] ?>">
                    </div>
                </div>



            </div>

        </div>
    </div>
    <div class="card card-llenado">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">5.- FORMA DE PAGO </strong>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ctr_pago_credito">FORMA</label>
                        <input type="text" name="ctr_pago_credito" id="ctr_pago_credito" class="form-control inputN" value="<?= $ctr['ctr_pago_credito'] ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ctr_forma_pago">DE PAGO</label>
                        <select name="ctr_forma_pago" id="ctr_forma_pago" class="form-control">
                            <option selected><?= $ctr['ctr_forma_pago'] ?></option>
                            <option>SEMANALES</option>
                            <option>CATORCENALES</option>
                            <option>QUINCENALES</option>
                            <option>MENSUALES</option>
                        </select>
                    </div>
                </div>

                <?php

                $fecha = substr($ctr['ctr_proximo_pago'], 0, 10);

                ?>
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label for="ctr_proximo_pago">FECHA PROXIMO PAGO</label>
                        <input type="date" name="ctr_proximo_pago" id="ctr_proximo_pago" class="form-control inputN" value="<?= $fecha ?>">
                        <small id="helpId" class="text-muted text-center"><?= fechaCastellano($fecha) ?></small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ctr_dia_pago">DIA(S) DE PAGO DEL CLIENTE</label>
                        <input type="text" name="ctr_dia_pago" id="ctr_dia_pago" class="form-control" value="<?= $ctr['ctr_dia_pago'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ctr_plazo_credito">PLAZO DE CREDITO</label>
                        <input type="text" name="ctr_plazo_credito" id="ctr_plazo_credito" class="form-control" value="<?= $ctr['ctr_plazo_credito'] ?>">
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="card card-mercancia">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">6.- MERCANCIA </strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="form-group">
                        <label for="autocomplete_pdt">Seleccionar producto</label>
                        <input type="hidden" id="productos_contratos" value='<?= $ctr['ctr_productos'] ?>'>
                        <input type="hidden" id="ctrs_id" value='<?= $rutas[2] ?>'>
                        <input type="text" class="form-control" name="autocomplete_pdt" id="autocomplete_pdt" placeholder="Escriba el nombre del producto y seleccione...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover nowrap text-center" id="tbl_mercancia">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>CANTIDAD</th>
                                <th>DESCRIPCION</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbodyProductos">
                            <?php
                            $productos = $ctr['ctr_productos'];
                            // preArray($productos);
                            $productos = json_decode($productos, true);
                            foreach ($productos as $key => $pds) :
                            ?>
                                <tr id="<?= $pds['sku'] ?>">

                                    <td><?= $pds['sku'] ?></td>
                                    <td style="display:flex; justify-content: center">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default menos" btn_menos="<?= $pds['sku'] ?>" type="button">-</button>
                                        </span>
                                        <input type="text" class="form-control" style="width:50px;text-align: center;" id="contador<?= $pds['sku'] ?>" cps_id="<?= $pds['sku'] ?>" value=" <?= $pds['cantidad'] ?>" min="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default mas" btn_mas="<?= $pds['sku'] ?>" type="button">+</button>
                                        </span>
                                    </td>
                                    <td class="nombreProducto" style="width:50%; text-align:center" for="nombreProducto"><?= $pds['nombreProducto'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btnQuitarProducto" sku="<?= $pds['sku'] ?>"><i class="fa fa-trash"></i> Borrar</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="right">
                                    <button type="button" class="btn btn-success btnGuardarProductos">GUARDAR PRODUCTOS</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-3 text-right">
                    <label for="ctr_total" class="mt-2">TOTAL: <?= '<strong style="font-size:20px;" >'. $ctr['ctr_total'].'</strong>' ?></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" readonly name="ctr_total" id="ctr_total" class="form-control inputN" value="<?= $ctr['ctr_total'] ?>">
                    </div>
                </div>

                <div class="col-md-5"></div>
                <div class="col-md-3 text-right">
                    <label for="ctr_enganche" class="mt-2">ENGANCHE: <?= '<strong style="font-size:20px;" >'. $ctr['ctr_enganche'].'</strong>' ?></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" readonly name="ctr_enganche" id="ctr_enganche" class="form-control inputN" value="<?= $ctr['ctr_enganche'] ?>">
                    </div>
                </div>

                <div class="col-md-5"></div>
                <div class="col-md-3 text-right">
                    <label for="ctr_pago_adicional" class="mt-2">PAGO ADICIONAL: <?= '<strong style="font-size:20px;" >'. $ctr['ctr_pago_adicional'].'</strong>' ?></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" readonly name="ctr_pago_adicional" id="ctr_pago_adicional" class="form-control inputN" value="<?= $ctr['ctr_pago_adicional'] ?>">
                    </div>
                </div>

                <div class="col-md-5"></div>
                <div class="col-md-3 text-right">
                    <label for="ctr_saldo" class="mt-2">SALDO: <?= '<strong style="font-size:20px;" >'. $ctr['ctr_saldo'].'</strong>' ?></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" readonly name="ctr_saldo" id="ctr_saldo" class="form-control inputN" value="<?= $ctr['ctr_saldo'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-3 text-right">
                    <label for="sobre_enganche_pendiente" class="mt-2">PENDIENTE SOBRE ENGANCHE: <?= '<strong style="font-size:20px;" >'. $ctr['sobre_enganche_pendiente'].'</strong>' ?></label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="hidden" readonly name="sobre_enganche_pendiente" id="sobre_enganche_pendiente" class="form-control inputN" value="<?= $ctr['sobre_enganche_pendiente'] ?>">
                    </div>
                </div>


                <input type="hidden" name="ctr_id" id="ctr_id" value="<?= $ctr['ctr_id'] ?>">



                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($ctr['ctr_aprovado_ventas'] == 1) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="ctr_aprovado_ventas" id="ctr_aprovado_ventas" value="aprovado_ventas" checked>
                                        Aprovado por ventas
                                    </label>
                                </div>
                            <?php else : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="ctr_aprovado_ventas" id="ctr_aprovado_ventas" value="aprovado_ventas">
                                        Aprovado por ventas
                                    </label>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="card card-status">
        <div class="card-header text-center bg-primary">
            <strong style="color:aliceblue">7.- Estado de la cuenta </strong>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_status_cuenta">SATATUS DE CUENTA:</label>
                        <input type="text" name="ctr_status_cuenta" id="ctr_status_cuenta" class="form-control" value="<?= $ctr['ctr_status_cuenta'] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_saldo_actual">SALDO ACTUAL: <?= '<strong style="font-size:20px;" >'. $ctr['ctr_saldo_actual'].'</strong>' ?></label>
                        <input  type="hidden" name="ctr_saldo_actual" id="ctr_saldo_actual" class="form-control inputN" value="<?= $ctr['ctr_saldo_actual'] ?>" readonly>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="ctr_nota">Observaciones</label>
                        <textarea name="ctr_nota" id="ctr_nota" class="form-control" cols="30" rows="5"><?= $ctr['ctr_nota'] ?></textarea>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-9 mt-5"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button class="btn btn-primary text-center float-right btn-block" name="btnGuadarDatosContrato"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    $actualizar = new ContratosControlador();
    $actualizar->ctrActualizarContrato();

    ?>
</form>


<div class="card">
    <div class="card-header">
        <h5 class="card-title">Fotos
            <button class="btn btn-primary float-right btnshowFotos"><i class="fa fa-plus"></i></button>
        </h5>
    </div>
    <div class="card-body d-none card-fotos">
        <div class="row">
            <div class="col-md-6">
                <label for="">Cliente con el producto</label>
                <img class="img-fluid img-responsive" id="img_clt_cliente" style="width:100%" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Comprobante de domicilio</label>

                <img class="img-fluid img-responsive" id="img_clt_comprobante" style="width:100%" src="" alt="">
            </div>

            <div class="col-md-6">
                <label for="">Credencial frontal</label>

                <img class="img-fluid img-responsive" id="img_clt_cred_fro" style="width:100%" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Credencial trasera</label>

                <img class="img-fluid img-responsive" id="img_clt_cred_tra" style="width:100%" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Pagaré</label>

                <img class="img-fluid img-responsive" id="img_clt_pagare" style="width:100%" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Fachada</label>

                <img class="img-fluid img-responsive" id="img_clt_fachada" style="width:100%" src="" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agregarFotosCliente"><i class="fa fa-plus"></i> Agregar fotos</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <label for="">Credencial frontal</label>

                <img class="img-fluid img-responsive" style="width:100%" id="img_fdr_cred_fro" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Credencial trasera</label>

                <img class="img-fluid img-responsive" style="width:100%" id="img_fdr_cred_tra" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Comprobante de domicilio</label>

                <img class="img-fluid img-responsive" style="width:100%" id="img_fdr_comprobante" src="" alt="">
            </div>
            <div class="col-md-6">
                <label for="">Pagaré</label>

                <img class="img-fluid img-responsive" style="width:100%" id="img_fdr_pagare" src="" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agregarFotosFiador"><i class="fa fa-plus"></i> Agregar fotos</button>
            </div>
        </div>
    </div>

    <!-- Modal Fotos Cliente -->
    <div class="modal fade" id="agregarFotosCliente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fotos del cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formFotosCliente" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="containeir">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_cliente">Foto cliente/producto</label>
                                        <input type="file" class="form-control" name="img_cliente" id="img_cliente" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_cred_fro">Foto credencial frontal</label>
                                        <input type="file" class="form-control" name="img_cred_fro" id="img_cred_fro" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_cred_tra">Foto credencial trasera</label>
                                        <input type="file" class="form-control" name="img_cred_tra" id="img_cred_tra" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_pagare">Foto pagaré</label>
                                        <input type="file" class="form-control" name="img_pagare" id="img_pagare" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_fachada">Foto fachada</label>
                                        <input type="file" class="form-control" name="img_fachada" id="img_fachada" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_comprobante">Foto comprobante domicilio</label>
                                        <input type="file" class="form-control" name="img_comprobante" id="img_comprobante" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Fotos Fiador -->
    <div class="modal fade" id="agregarFotosFiador" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fotos del fiador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formFotosFiador" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="containeir">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_cred_fro">Foto credencial frontal</label>
                                        <input type="file" class="form-control" name="img_cred_fro" id="img_cred_fro" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_cred_tra">Foto credencial trasera</label>
                                        <input type="file" class="form-control" name="img_cred_tra" id="img_cred_tra" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_comprobante">Foto comprobante domicilio</label>
                                        <input type="file" class="form-control" name="img_comprobante" id="img_comprobante" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="img_pagare">Foto pagaré</label>
                                        <input type="file" class="form-control" name="img_pagare" id="img_pagare" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(".btnshowFotos").on("click", function() {
            var ctrs_id = $("#ctrs_id").val();
            // Ocultar el boton de mostrar fotos
            var datos = new FormData();
            datos.append("btnshowFotos", true);
            datos.append("ctrs_id", ctrs_id);

            $.ajax({
                type: "POST",
                url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                data: datos,
                cache: false,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(".btnshowFotos").attr("disabled", false);
                    $(".btnshowFotos").html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Cargando...</span>`);
                },
                success: function(res) {
                    $(".card-fotos").removeClass("d-none")
                    $(".btnshowFotos").addClass("d-none")


                    var fotos_clt = JSON.parse(res.ctr_fotos)
                    $("#img_clt_cliente").attr("src", fotos_clt.img_cliente)
                    $("#img_clt_comprobante").attr("src", fotos_clt.img_comprobante)
                    $("#img_clt_cred_fro").attr("src", fotos_clt.img_cred_fro)
                    $("#img_clt_cred_tra").attr("src", fotos_clt.img_cred_tra)
                    $("#img_clt_pagare").attr("src", fotos_clt.img_pagare)
                    $("#img_clt_fachada").attr("src", fotos_clt.img_fachada)

                    var fotos_fdr = JSON.parse(res.clts_fotos_fiador)

                    $("#img_fdr_comprobante").attr("src", fotos_fdr.img_comprobante)
                    $("#img_fdr_cred_fro").attr("src", fotos_fdr.img_cred_fro)
                    $("#img_fdr_cred_tra").attr("src", fotos_fdr.img_cred_tra)
                    $("#img_fdr_pagare").attr("src", fotos_fdr.img_pagare)
                }
            })
        })
    </script>
</div>