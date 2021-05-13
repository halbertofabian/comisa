<?php
cargarComponente('breadcrumb', '', 'Nuevo contrato');
?>
<div class="container">
    <form id="form_new_contrato" enctype="multipart/formdata">
        
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="">Buscar cliente</label>
                        <select class="form-control select2" name="select_id_cliente" id="cts_buscar_cliente">
                            <option value="">Buscar cliente</option>
                            <?php
                            $clientes = ClientesModelo::mdlMostrarClientes();

                            foreach ($clientes as $key => $cts) :
                            ?>
                                <option value="<?php echo $cts['clts_id'] ?>"><?php echo $cts['clts_nombre'] . ' ' . $cts['clts_ruta'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-12 content-cliente d-none">
                                <div class="form-group">
                                    <label for="ctrs_id"><strong class="text-primary">*</strong>FOLIO DE CONTRATO:</label>
                                    <input type="text" name="ctrs_id" id="ctrs_id" class="form-control" placeholder="FOLIO DE CONTRATO" required>
                                </div>
                            </div>
            </div>
            <div class="row content-cliente d-none">
                <div class="col-12">
                    
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                    <button type="button" id="btn_infPersonal" class="btn btn-default  "><i class="fa fa-plus"></i></i></button>
                                    <strong>1.- DATOS DEL CLIENTE: <span id="cts_ruta"></span> </strong>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none" id="dts-client">
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_nombre"><strong class="text-primary">*</strong>NOMBRE:</label>
                                    <input type="text" name="clts_nombre" id="clts_nombre" class="form-control" placeholder="NOMBRE">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_telefono"><strong class="text-primary">*</strong>TELÉFONO:</label>
                                    <input type="number" name="clts_telefono" id="clts_telefono" class="form-control" placeholder="TELÉFONO">
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_domicilio"><strong class="text-primary">*</strong>DOMICILIO:</label>
                                    <input type="text" name="clts_domicilio" id="clts_domicilio" class="form-control" placeholder="DOMICILIO">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_col"><strong class="text-primary">*</strong>COL:</label>
                                    <input type="text" name="clts_col" id="clts_col" class="form-control" placeholder="COLONIA">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_entre_calles"><strong class="text-primary">*</strong>ENTRE CALLES:</label>
                                    <input type="text" name="clts_entre_calles" id="clts_entre_calles" class="form-control" placeholder="ENTRE CALLES">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_fachada_color">FACHADA DE COLOR:</label>
                                    <input type="text" name="clts_fachada_color" id="clts_fachada_color" class="form-control" placeholder="FACHADA DE COLOR">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_puerta_color">PUERTA COLOR:</label>
                                    <input type="text" name="clts_puerta_color" id="clts_puerta_color" class="form-control" placeholder="PUERTA COLOR">
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_cred_elector_n">CRED. ELECTOR Nº:</label>
                                    <input type="text" name="clts_cred_elector_n" id="clts_cred_elector_n" class="form-control" placeholder="CRED. ELECTOR Nº">
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
                                    <input type="text" name="clts_trabajo" id="clts_trabajo" class="form-control" placeholder="TRABAJA EN">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_puesto"><strong class="text-primary">*</strong>PUESTO:</label>
                                    <input type="text" name="clts_puesto" id="clts_puesto" class="form-control" placeholder="PUESTO">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_direccion_tbj"><strong class="text-primary">*</strong>DIRECCIÓN:</label>
                                    <input type="text" name="clts_direccion_tbj" id="clts_direccion_tbj" class="form-control" placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_col_tbj"><strong class="text-primary">*</strong>COL:</label>
                                    <input type="text" name="clts_col_tbj" id="clts_col_tbj" class="form-control" placeholder="COL">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tel_tbj">TEL:</label>
                                    <input type="number" name="clts_tel_tbj" id="clts_tel_tbj" class="form-control" placeholder="TEL">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_antiguedad_trabajo">ANTIGÜEDAD:</label>
                                    <input type="number" name="clts_antiguedad_trabajo" id="clts_antiguedad_trabajo" class="form-control" placeholder="ANTIGÜEDAD">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_antiguedad_trabajo_1">ELIJE TIEMPO:</label>
                                    <select name="clts_antiguedad_trabajo_1" id="clts_antiguedad_trabajo_1" class="form-control">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="AÑOS">AÑOS</option>
                                        <option value="MESES">MESES</option>
                                        <option value="DIAS">DIAS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_igs_mensual_tbj">INGRESO MENSUAL:</label>
                                    <input type="number" name="clts_igs_mensual_tbj" id="clts_igs_mensual_tbj" class="form-control" placeholder="INGRESO MENSUAL">
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
                                        <option value="PROPIA">PROPIA</option>
                                        <option value="RENTADA">RENTADA</option>
                                        <option value="PRESTADA">PRESTADA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tiempo_casa"><strong class="text-primary">*</strong>TIEMPO VIVIENDO AQUÍ:</label>
                                    <input type="number" name="clts_tiempo_casa" id="clts_tiempo_casa" class="form-control" placeholder="TIEMPO VIVIENDO AQUÍ">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tiempo_casa_1">ELIJE TIEMPO:</label>
                                    <select name="clts_tiempo_casa_1" id="clts_tiempo_casa_1" class="form-control">
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="AÑOS">AÑOS</option>
                                        <option value="MESES">MESES</option>

                                        <option value="DIAS">DIAS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_vivienda_anomde">A NOMBRE DE:</label>
                                    <input type="text" name="clts_vivienda_anomde" id="clts_vivienda_anomde" class="form-control" placeholder="A NOMBRE DE">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_nreg_propiedad">Nº REG. DE LA PROPIEDAD:</label>
                                    <input type="text" name="clts_nreg_propiedad" id="clts_nreg_propiedad" class="form-control" placeholder="Nº REG. DE LA PROPIEDAD">
                                </div>
                            </div>


                        </div>
                    
                </div>

            </div>
            <div class="row content-cliente d-none">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                <button type="button" id="btn_infconyug" class="btn btn-default  "><i class="fa fa-plus"></i></i></button>
                                <strong>2.- DATOS DEL CÓNYUGE: </strong>
                            </div>
                        </div>
                    </div>
                    <div class="row d-none" id="dts-conyug">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="clts_nom_conyuge">NOMBRE:</label>
                                <input type="text" name="clts_nom_conyuge" id="clts_nom_conyuge" class="form-control" placeholder="NOMBRE">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_conyuge">TRABAJA EN:</label>
                                <input type="text" name="clts_tbj_conyuge" id="clts_tbj_conyuge" class="form-control" placeholder="TRABAJA EN">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_puesto_conyuge">PUESTO:</label>
                                <input type="text" name="clts_tbj_puesto_conyuge" id="clts_tbj_puesto_conyuge" class="form-control" placeholder="PUESTO">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_dir_conyuge">DIRECCION:</label>
                                <input type="text" name="clts_tbj_dir_conyuge" id="clts_tbj_dir_conyuge" class="form-control" placeholder="DIRECCION">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_col_conyuge">COL:</label>
                                <input type="text" name="clts_tbj_col_conyuge" id="clts_tbj_col_conyuge" class="form-control" placeholder="COL">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tbj_tel_conyuge">TELEFONO:</label>
                                <input type="text" name="clts_tbj_tel_conyuge" id="clts_tbj_tel_conyuge" class="form-control" placeholder="TELEFONO">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_anttrabajo_conyuge">ANTIGÜEDAD:</label>
                                <input type="number" name="clts_anttrabajo_conyuge" id="clts_anttrabajo_conyuge" class="form-control" placeholder="TIEMPO">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="clts_tiempo_trabajo_conyuge">ELIJE TIEMPO:</label>
                                <select name="clts_tiempo_trabajo_conyuge" id="clts_tiempo_trabajo_conyuge" class="form-control">
                                    <option value="">SELECCIONE UNA OPCION</option>
                                    <option value="AÑOS">AÑOS</option>
                                    <option value="MESES">MESES</option>
                                    <option value="DIAS">DIAS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row content-cliente d-none">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>3.- DATOS DEL FIADOR: </strong>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_nom_fiador">NOMBRE:</label>
                        <input type="text" name="clts_nom_fiador" id="clts_nom_fiador" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_parentesco_fiador">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_fiador" id="clts_parentesco_fiador" class="form-control" placeholder="PARENTESCO">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tel_fiador">TEL:</label>
                        <input type="text" name="clts_tel_fiador" id="clts_tel_fiador" class="form-control" placeholder="TEL">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_dir_fiador">DIRECCIÓN:</label>
                        <input type="text" name="clts_dir_fiador" id="clts_dir_fiador" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_col_fiador">COLONIA:</label>
                        <input type="text" name="clts_col_fiador" id="clts_col_fiador" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_fiador">TRABAJA EN:</label>
                        <input type="text" name="clts_tbj_fiador" id="clts_tbj_fiador" class="form-control" placeholder="TRABAJA EN">
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_dir_fiador">DIRECCION:</label>
                        <input type="text" name="clts_tbj_dir_fiador" id="clts_tbj_dir_fiador" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_tel_fiador">TEL:</label>
                        <input type="text" name="clts_tbj_tel_fiador" id="clts_tbj_tel_fiador" class="form-control" placeholder="TELEFONO">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tbj_col_fiador">COL:</label>
                        <input type="text" name="clts_tbj_col_fiador" id="clts_tbj_col_fiador" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_fc_elector_fiador">FOLIO CRED.ELECTOR:</label>
                        <input type="text" name="clts_fc_elector_fiador" id="clts_fc_elector_fiador" class="form-control" placeholder="FOLIO CRED.ELECTOR">
                    </div>
                </div>

                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_anttrabajo_fiador">ANTIGÜEDAD:</label>
                        <input type="number" name="clts_anttrabajo_fiador" id="clts_anttrabajo_fiador" class="form-control" placeholder="TIEMPO">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tiempo_trabajo_fiador">ELIJE TIEMPO:</label>
                        <select name="clts_tiempo_trabajo_fiador" id="clts_tiempo_trabajo_fiador" class="form-control">
                            <option value="">SELECCIONE UNA OPCION</option>
                            <option value="AÑOS">AÑOS</option>
                            <option value="MESES">MESES</option>
                            <option value="DIAS">DIAS</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row content-cliente d-none">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>4.- REFERENCIAS: </strong>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_nom_ref1">NOMBRE:</label>
                        <input type="text" name="clts_nom_ref1" id="clts_nom_ref1" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_parentesco_ref1">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_ref1" id="clts_parentesco_ref1" class="form-control" placeholder="PARENTESCO">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="clts_dir_ref1">DIRECCION:</label>
                        <input type="text" name="clts_dir_ref1" id="clts_dir_ref1" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_col_ref1">COL:</label>
                        <input type="text" name="clts_col_ref1" id="clts_col_ref1" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tel_ref1">TEL:</label>
                        <input type="text" name="clts_tel_ref1" id="clts_tel_ref1" class="form-control" placeholder="TELEFONO">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_nom_ref2">NOMBRE:</label>
                        <input type="text" name="clts_nom_ref2" id="clts_nom_ref2" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_parentesco_ref2">PARENTESCO:</label>
                        <input type="text" name="clts_parentesco_ref2" id="clts_parentesco_ref2" class="form-control" placeholder="PARENTESCO">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="clts_dir_ref2">DIRECCION:</label>
                        <input type="text" name="clts_dir_ref2" id="clts_dir_ref2" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_col_ref2">COL:</label>
                        <input type="text" name="clts_col_ref2" id="clts_col_ref2" class="form-control" placeholder="COL">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_tel_ref2">TEL:</label>
                        <input type="text" name="clts_tel_ref2" id="clts_tel_ref2" class="form-control" placeholder="TELEFONO">
                    </div>
                </div>
            </div>
            <div class="row content-cliente d-none">
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
            <div class="row content-cliente d-none">
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
        
    </form>
</div>