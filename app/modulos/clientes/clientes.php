<?php
if (isset($rutas[1]) && $rutas[1] == 'new') :
    cargarComponente('breadcrumb', '', 'Nuevo cliente');
?>
    <div class="container">
        <form id="formNewClientAdd">
            <div class="row">
                <!-- 
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="">FOLIO DE CONTROL:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="">CUENTA Nº:</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                </div>
            -->
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="">FECHA:</label>
                        <input type="date" name="clts_fecha_registro" id="clts_fecha_registro" class="form-control theDate" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>DATOS DEL CLIENTE:</strong>
                    </div>
                </div>
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
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>DATOS DEL CONYUGE:</strong>
                    </div>
                </div>


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

                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>DATOS DEL FIADOR:</strong>
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

                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>REFERENCIAS:</strong>
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
                <!--
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>LLENADO POR EL CLIENTE:</strong>
                    </div>
                </div>
                <div class="col-md-3 col-12">

                    <div class="alert alert-secondary" role="alert">
                        <strong>FORMA DE PAGO</strong>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <input type="text" name="cts_fp" id="cts_fp" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="alert alert-secondary" role="alert">
                        <strong>FECHA PROXIMO PAGO</strong>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <input type="date" name="cts_fecha_pp" id="" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="alert alert-secondary" role="alert">
                        <strong>DIA Y HORARIO DE PAGO DEL CLIENTE</strong>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <select name="cts_dia_pago" id="cts_dia_pago" class="form-control">
                            <option value="">SELECCIONE DIA</option>
                            <option value="LUNES">LUNES</option>
                            <option value="MARTES">MARTES</option>
                            <option value="MIERCOLES">MIERCOLES</option>
                            <option value="JUEVES">JUEVES</option>
                            <option value="VIERNES">VIERNES</option>
                            <option value="SABADO">SABADO</option>
                            <option value="DOMINGO">DOMINGO</option>
                        </select>
                        <input type="time" name="cts_horario_pago" id="cts_horario_pago" class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="alert alert-secondary" role="alert">
                        <strong>PLAZO DE CREDITO</strong>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <input type="text" name="cts_plazo_credito" id="cts_plazo_credito" class="form-control">
                    </div>
                </div>
                -->


                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-sm-block float-right btn-load">GUARDAR</button>
                </div>
            </div>
        </form>
    </div>
<?php elseif (isset($rutas[1]) && $rutas[1] == 'importar') :
    cargarComponente('breadcrumb_nivel_1', '', 'Importar lista de clientes', array(['ruta' => 'clientes', 'label' => 'Listar clientes'])); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>Importa tu lista de clientes</h3>
                <p>Instrucciones:</p>
                <ol>

                    <li> Descarga el archivo de ejemplo <a href="<?php echo HTTP_HOST . '' ?>" class="btn"> <i class="fa fa-download"></i> Descargar ejemplo</a></li>
                    <li> Llena tu Excel siguiendo el ejemplo </li>
                    <li> Guardalo con extensión .xls o .csv </li>
                    <li> De click en seleccionar archivo </li>
                    <li> Cargue el archivo excel permitido </li>
                    <li> Una vez realizado estos pasos, da click en el botón Importar productos </li>

                </ol>
            </div>
            <div class="col-12 col-md-6">

                <div class=" card-body">
                    <h4 class="card-title">Cargar archivo</h4>
                    <form method="post" enctype="multipart/form-data" id="formImportarClientes">
                        <input type="file" class="form-control" name="input_file" id="input_file">
                        <button type="submit" class="btn btn-success mt-1 float-right btnImportarClientes btn-load">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            Importar clientes
                        </button>
                    </form>

                </div>
            </div>

        </div>

    </div>
<?php elseif (isset($rutas[1]) && $rutas[1] == 'buscar') :
    cargarComponente('breadcrumb', '', 'Busque de clientes por nombre'); ?>

    <div class="container">
        <form>

            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="">Buscar cliente</label>
                        <input type="text" name="clts_nombre_aux" id="clts_nombre_aux" class="form-control" placeholder="INTRODUCE UN NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12 ">
                    <div class="form-group mt-4">
                        <button type="button" id="btn_buscar_infoC" class="btn btn-primary btn-sm-block  btn-load">BUSCAR</button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>RUTA</th>
                                        <th>NOMBRE</th>
                                        <th>TELÉFONO</th>
                                        <th>DOMICILIO</th>

                                    </tr>
                                </thead>
                                <tbody id="TbFiltroNombre">
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </form>
    </div>
<?php elseif (isset($rutas[1]) && $rutas[1] == 'editar') :
    cargarComponente('breadcrumb', '', 'Editar cliente');
    $id = 0;
    if ($rutas[2] > 0) {
        $id = $rutas[2];
    }
    $clt = ClientesModelo::mdlMostrarClientes($id);
    //preArray($clt);

?>
    <div class="container">
        <form id="" enctype="multipart/formdata">
            <div class="row">
                <div class="row ">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">

                                    <strong>1.- DATOS DEL CLIENTE: <span id="cts_ruta"></span> </strong>
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
            </div>
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                        <strong>6.- : </strong>
                    </div>
                </div>

            </div>
        </form>
    </div>


<?php else :
    cargarComponente('breadcrumb', '', 'Lista de clientes');
?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="<?php echo HTTP_HOST . 'clientes/importar' ?>" class="btn btn-success">Importar clientes</a>

                        <a href="<?php echo HTTP_HOST . 'clientes/new' ?>" class="btn btn-primary float-right">Nuevo cliente</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table tablas tablaClientes">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>VER</th>
                                    <th>RUTA</th>
                                    <th>NOMBRE</th>
                                    <th>TELÉFONO</th>
                                    <th>DIRECCIÓN</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $clientes = ClientesModelo::mdlMostrarClientes();
                                foreach ($clientes as $key => $cts) :
                                ?>
                                    <tr>
                                        <td><?php echo $cts['clts_id'] ?></td>
                                        <td>
                                            <button class="btn btn-light btnVerCliente " cts_id="<?php echo $cts['clts_id'] ?>" data-toggle="modal" data-target="#mdlMostrarCliente_<?php echo $cts['clts_id'] ?>">
                                                VER
                                            </button>
                                        </td>
                                        <td><?php echo $cts['clts_ruta'] ?></td>
                                        <td><?php echo $cts['clts_nombre'] ?></td>
                                        <td>
                                            <a href="tel:<?php echo $cts['clts_telefono'] ?>" class="btn btn-light">
                                                <?php echo $cts['clts_telefono'] ?>
                                            </a>

                                        </td>
                                        <td><?php echo $cts['clts_domicilio'] . ' ' . $cts['clts_col'] ?></td>
                                        <td></td>

                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="mdlMostrarCliente_<?php echo $cts['clts_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mdlMostrarClienteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="mdlMostrarClienteLabel"></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <fieldset disabled>
                                                        <div class="container">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                                                            <strong>DATOS DEL CLIENTE:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_nombre"><strong class="text-primary">*</strong>NOMBRE:</label>
                                                                            <input type="text" name="clts_nombre" value="<?= $cts['clts_nombre'] ?>" class="form-control" placeholder="NOMBRE">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_telefono"><strong class="text-primary">*</strong>TELÉFONO:</label>
                                                                            <input type="number" name="clts_telefono" value="<?= $cts['clts_telefono'] ?>" class="form-control" placeholder="TELÉFONO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_domicilio"><strong class="text-primary">*</strong>DOMICILIO:</label>
                                                                            <input type="text" name="clts_domicilio" value="<?= $cts['clts_domicilio'] ?>" class="form-control" placeholder="DOMICILIO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_col"><strong class="text-primary">*</strong>COL:</label>
                                                                            <input type="text" name="clts_col" value="<?= $cts['clts_col'] ?>" class="form-control" placeholder="COLONIA">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_entre_calles"><strong class="text-primary">*</strong>ENTRE CALLES:</label>
                                                                            <input type="text" name="clts_entre_calles" value="<?= $cts['clts_entre_calles'] ?>" class="form-control" placeholder="ENTRE CALLES">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_fachada_color">FACHADA DE COLOR:</label>
                                                                            <input type="text" name="clts_fachada_color" value="<?= $cts['clts_fachada_color'] ?>" class="form-control" placeholder="FACHADA DE COLOR">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_puerta_color">PUERTA COLOR:</label>
                                                                            <input type="text" name="clts_puerta_color" value="<?= $cts['clts_puerta_color'] ?>" class="form-control" placeholder="PUERTA COLOR">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_cred_elector_n">CRED. ELECTOR Nº:</label>
                                                                            <input type="text" name="clts_cred_elector_n" value="<?= $cts['clts_cred_elector_n'] ?>" class="form-control" placeholder="CRED. ELECTOR Nº">
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
                                                                            <input type="text" name="clts_trabajo" value="<?= $cts['clts_trabajo'] ?>" class="form-control" placeholder="TRABAJA EN">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_puesto"><strong class="text-primary">*</strong>PUESTO:</label>
                                                                            <input type="text" name="clts_puesto" value="<?= $cts['clts_puesto'] ?>" class="form-control" placeholder="PUESTO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_direccion_tbj"><strong class="text-primary">*</strong>DIRECCIÓN:</label>
                                                                            <input type="text" name="clts_direccion_tbj" value="<?= $cts['clts_direccion_tbj'] ?>" class="form-control" placeholder="DIRECCION">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_col_tbj"><strong class="text-primary">*</strong>COL:</label>
                                                                            <input type="text" name="clts_col_tbj" value="<?= $cts['clts_col_tbj'] ?>" class="form-control" placeholder="COL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tel_tbj">TEL:</label>
                                                                            <input type="number" name="clts_tel_tbj" value="<?= $cts['clts_tel_tbj'] ?>" class="form-control" placeholder="TEL">
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $array = explode("-", $cts['clts_antiguedad_tbj']);

                                                                    ?>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_antiguedad_trabajo">ANTIGÜEDAD:</label>
                                                                            <input type="number" name="clts_antiguedad_trabajo" value="<?= $array[0] ?>" class="form-control" placeholder="ANTIGÜEDAD">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_antiguedad_trabajo_1">ELIJE TIEMPO:</label>
                                                                            <select name="clts_antiguedad_trabajo_1" class="form-control">
                                                                                <option value="<?= $array[1] ?>" selected='selected'><?= $array[1] ?></option>
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
                                                                            <input type="number" name="clts_igs_mensual_tbj" value="<?= $cts['clts_igs_mensual_tbj'] ?>" class="form-control" placeholder="INGRESO MENSUAL">
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
                                                                            <select name="clts_tipo_vivienda" class="form-control">
                                                                                <option value="<?= $cts['clts_tipo_vivienda'] ?>" selected='selected'><?= $cts['clts_tipo_vivienda'] ?></option>‌
                                                                                <option value="">SELECCIONE UNA OPCION</option>
                                                                                <option value="PROPIA">PROPIA</option>
                                                                                <option value="RENTADA">RENTADA</option>
                                                                                <option value="PRESTADA">PRESTADA</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $array1 = explode("-", $cts['clts_antiguedad_viviendo']);

                                                                    ?>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tiempo_casa"><strong class="text-primary">*</strong>TIEMPO VIVIENDO AQUÍ:</label>
                                                                            <input type="number" name="clts_tiempo_casa" value="<?= $array1[0] ?>" class="form-control" placeholder="TIEMPO VIVIENDO AQUÍ">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tiempo_casa_1">ELIJE TIEMPO:</label>
                                                                            <select name="clts_tiempo_casa_1" class="form-control">
                                                                                <option value="<?= $array1[1] ?>" selected='selected'><?= $array1[1] ?></option>
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
                                                                            <input type="text" name="clts_vivienda_anomde" value="<?= $cts['clts_vivienda_anomde'] ?>" class="form-control" placeholder="A NOMBRE DE">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_nreg_propiedad">Nº REG. DE LA PROPIEDAD:</label>
                                                                            <input type="text" name="clts_nreg_propiedad" value="<?= $cts['clts_nreg_propiedad'] ?>" class="form-control" placeholder="Nº REG. DE LA PROPIEDAD">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                                                            <strong>DATOS DEL CONYUGE:</strong>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_nom_conyuge">NOMBRE:</label>
                                                                            <input type="text" name="clts_nom_conyuge" value="<?= $cts['clts_nom_conyuge'] ?>" class="form-control" placeholder="NOMBRE">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_conyuge">TRABAJA EN:</label>
                                                                            <input type="text" name="clts_tbj_conyuge" value="<?= $cts['clts_tbj_conyuge'] ?>" class="form-control" placeholder="TRABAJA EN">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_puesto_conyuge">PUESTO:</label>
                                                                            <input type="text" name="clts_tbj_puesto_conyuge" value="<?= $cts['clts_tbj_puesto_conyuge'] ?>" class="form-control" placeholder="PUESTO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_dir_conyuge">DIRECCION:</label>
                                                                            <input type="text" name="clts_tbj_dir_conyuge" value="<?= $cts['clts_tbj_dir_conyuge'] ?>" class="form-control" placeholder="DIRECCION">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_col_conyuge">COL:</label>
                                                                            <input type="text" name="clts_tbj_col_conyuge" value="<?= $cts['clts_tbj_col_conyuge'] ?>" class="form-control" placeholder="COL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_tel_conyuge">TELEFONO:</label>
                                                                            <input type="text" name="clts_tbj_tel_conyuge" value="<?= $cts['clts_tbj_tel_conyuge'] ?>" class="form-control" placeholder="TELEFONO">
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $array2 = explode("-", $cts['clts_tbj_ant_conyuge']);

                                                                    ?>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_anttrabajo_conyuge">ANTIGÜEDAD:</label>
                                                                            <input type="number" name="clts_anttrabajo_conyuge" value="<?= $array2[0] ?>" class="form-control" placeholder="TIEMPO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tiempo_trabajo_conyuge">ELIJE TIEMPO:</label>
                                                                            <select name="clts_tiempo_trabajo_conyuge" class="form-control">
                                                                                <option value="<?= $array2[1] ?>" selected='selected'><?= $array2[1] ?></option>
                                                                                <option value="">SELECCIONE UNA OPCION</option>
                                                                                <option value="AÑOS">AÑOS</option>
                                                                                <option value="MESES">MESES</option>
                                                                                <option value="DIAS">DIAS</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                                                            <strong>DATOS DEL FIADOR:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_nom_fiador">NOMBRE:</label>
                                                                            <input type="text" name="clts_nom_fiador" value="<?= $cts['clts_nom_fiador'] ?>" class="form-control" placeholder="NOMBRE">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_parentesco_fiador">PARENTESCO:</label>
                                                                            <input type="text" name="clts_parentesco_fiador" value="<?= $cts['clts_parentesco_fiador'] ?>" class="form-control" placeholder="PARENTESCO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tel_fiador">TEL:</label>
                                                                            <input type="text" name="clts_tel_fiador" value="<?= $cts['clts_tel_fiador'] ?>" class="form-control" placeholder="TEL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_dir_fiador">DIRECCIÓN:</label>
                                                                            <input type="text" name="clts_dir_fiador" value="<?= $cts['clts_dir_fiador'] ?>" class="form-control" placeholder="DIRECCION">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_col_fiador">COLONIA:</label>
                                                                            <input type="text" name="clts_col_fiador" value="<?= $cts['clts_col_fiador'] ?>" class="form-control" placeholder="COL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_fiador">TRABAJA EN:</label>
                                                                            <input type="text" name="clts_tbj_fiador" value="<?= $cts['clts_tbj_fiador'] ?>" class="form-control" placeholder="TRABAJA EN">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_dir_fiador">DIRECCION:</label>
                                                                            <input type="text" name="clts_tbj_dir_fiador" value="<?= $cts['clts_tbj_dir_fiador'] ?>" class="form-control" placeholder="DIRECCION">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_tel_fiador">TEL:</label>
                                                                            <input type="text" name="clts_tbj_tel_fiador" value="<?= $cts['clts_tbj_tel_fiador'] ?>" class="form-control" placeholder="TELEFONO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tbj_col_fiador">COL:</label>
                                                                            <input type="text" name="clts_tbj_col_fiador" value="<?= $cts['clts_tbj_col_fiador'] ?>" class="form-control" placeholder="COL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_fc_elector_fiador">FOLIO CRED.ELECTOR:</label>
                                                                            <input type="text" name="clts_fc_elector_fiador" value="<?= $cts['clts_fc_elector_fiador'] ?>" class="form-control" placeholder="FOLIO CRED.ELECTOR">
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $array3 = explode("-", $cts['clts_tbj_ant_fiador']);


                                                                    ?>

                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_anttrabajo_fiador">ANTIGÜEDAD:</label>
                                                                            <input type="number" name="clts_anttrabajo_fiador" value="<?= $array3[0] ?>" class="form-control" placeholder="TIEMPO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tiempo_trabajo_fiador">ELIJE TIEMPO:</label>
                                                                            <select name="clts_tiempo_trabajo_fiador" class="form-control">
                                                                                <option value="<?= $array3[1] ?>" selected='selected'><?= $array3[1] ?></option>
                                                                                <option value="">SELECCIONE UNA OPCION</option>
                                                                                <option value="AÑOS">AÑOS</option>
                                                                                <option value="MESES">MESES</option>
                                                                                <option value="DIAS">DIAS</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                                                            <strong>REFERENCIAS:</strong>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_nom_ref1">NOMBRE:</label>
                                                                            <input type="text" name="clts_nom_ref1" value="<?= $cts['clts_nom_ref1'] ?>" class="form-control" placeholder="NOMBRE">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_parentesco_ref1">PARENTESCO:</label>
                                                                            <input type="text" name="clts_parentesco_ref1" value="<?= $cts['clts_parentesco_ref1'] ?>" class="form-control" placeholder="PARENTESCO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_dir_ref1">DIRECCION:</label>
                                                                            <input type="text" name="clts_dir_ref1" value="<?= $cts['clts_dir_ref1'] ?>" class="form-control" placeholder="DIRECCION">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_col_ref1">COL:</label>
                                                                            <input type="text" name="clts_col_ref1" value="<?= $cts['clts_col_ref1'] ?>" class="form-control" placeholder="COL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tel_ref1">TEL:</label>
                                                                            <input type="text" name="clts_tel_ref1" value="<?= $cts['clts_tel_ref1'] ?>" class="form-control" placeholder="TELEFONO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_nom_ref2">NOMBRE:</label>
                                                                            <input type="text" name="clts_nom_ref2" value="<?= $cts['clts_nom_ref2'] ?>" class="form-control" placeholder="NOMBRE">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_parentesco_ref2">PARENTESCO:</label>
                                                                            <input type="text" name="clts_parentesco_ref2" value="<?= $cts['clts_parentesco_ref2'] ?>" class="form-control" placeholder="PARENTESCO">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_dir_ref2">DIRECCION:</label>
                                                                            <input type="text" name="clts_dir_ref2" value="<?= $cts['clts_dir_ref2'] ?>" class="form-control" placeholder="DIRECCION">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_col_ref2">COL:</label>
                                                                            <input type="text" name="clts_col_ref2" value="<?= $cts['clts_col_ref2'] ?>" class="form-control" placeholder="COL">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label for="clts_tel_ref2">TEL:</label>
                                                                            <input type="text" name="clts_tel_ref2" value="<?= $cts['clts_tel_ref2'] ?>" class="form-control" placeholder="TELEFONO">
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </form>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>