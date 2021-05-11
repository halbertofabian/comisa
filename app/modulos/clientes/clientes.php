<?php
if (isset($rutas[1]) && $rutas[1] == 'new') :
    cargarComponente('breadcrumb', '', 'Nuevo cliente');
?>
    <div class="container">
        <form id="formNewClientAdd" method="post" >
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
                        <input type="text"  name="clts_nombre" id="clts_nombre" class="form-control" placeholder="NOMBRE">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_telefono"><strong class="text-primary">*</strong>TELÉFONO:</label>
                        <input type="number"  name="clts_telefono" id="clts_telefono" class="form-control" placeholder="TELÉFONO">
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="clts_domicilio"><strong class="text-primary">*</strong>DOMICILIO:</label>
                        <input type="text"  name="clts_domicilio" id="clts_domicilio" class="form-control" placeholder="DOMICILIO">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_col"><strong class="text-primary">*</strong>COL:</label>
                        <input type="text"  name="clts_col" id="clts_col" class="form-control" placeholder="COLONIA">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_entre_calles"><strong class="text-primary">*</strong>ENTRE CALLES:</label>
                        <input type="text"  name="clts_entre_calles" id="clts_entre_calles" class="form-control" placeholder="ENTRE CALLES">
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
                        <input type="text"  name="clts_trabajo" id="clts_trabajo" class="form-control" placeholder="TRABAJA EN">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_puesto"><strong class="text-primary">*</strong>PUESTO:</label>
                        <input type="text"  name="clts_puesto" id="clts_puesto" class="form-control" placeholder="PUESTO">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="clts_direccion_tbj"><strong class="text-primary">*</strong>DIRECCIÓN:</label>
                        <input type="text"  name="clts_direccion_tbj" id="clts_direccion_tbj" class="form-control" placeholder="DIRECCION">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="form-group">
                        <label for="clts_col_tbj"><strong class="text-primary">*</strong>COL:</label>
                        <input type="text"  name="clts_col_tbj" id="clts_col_tbj" class="form-control" placeholder="COL">
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
                            <option value="PROPIA">PROPIA</option>
                            <option value="RENTADA">RENTADA</option>
                            <option value="PRESTADA">PRESTADA</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tiempo_casa"><strong class="text-primary">*</strong>TIEMPO VIVIENDO AQUÍ:</label>
                        <input type="number"  name="clts_tiempo_casa" id="clts_tiempo_casa" class="form-control" placeholder="TIEMPO VIVIENDO AQUÍ">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="clts_tiempo_casa_1">ELIJE TIEMPO:</label>
                        <select name="clts_tiempo_casa_1" id="clts_tiempo_casa_1" class="form-control">
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

                                        <td><?php echo $cts['cts_id'] ?></td>
                                        <td>
                                            <button class="btn btn-light btnVerCliente btn-load" cts_id="<?php echo $cts['cts_id'] ?>" data-toggle="modal" data-target="#mdlMostrarCliente">
                                                VER
                                            </button>
                                        </td>
                                        <td><?php echo $cts['cts_ruta'] ?></td>
                                        <td><?php echo $cts['cts_nombre'] ?></td>
                                        <td>
                                            <a href="tel:<?php echo $cts['cts_telefono_1'] ?>" class="btn btn-light">
                                                <?php echo $cts['cts_telefono_1'] ?>
                                            </a>

                                        </td>
                                        <td><?php echo $cts['cts_domicilio'] . ' ' . $cts['cts_colonia'] ?></td>
                                        <td></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>


<!-- Modal -->
<div class="modal fade" id="mdlMostrarCliente" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="mdlMostrarClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                        <form  id="x">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                        <strong>DATOS DEL CLIENTE: <span id="cts_ruta"></span> </strong>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="cts_nombre"><strong class="text-primary">*</strong>NOMBRE:</label>
                                        <input type="text" required name="cts_nombre" id="cts_nombre" class="form-control" placeholder="NOMBRE">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_telefono_1"><strong class="text-primary">*</strong>TELÉFONO:</label>
                                        <input type="number" required name="cts_telefono_1" id="cts_telefono_1" class="form-control" placeholder="TELÉFONO">
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="cts_domicilio"><strong class="text-primary">*</strong>DOMICILIO:</label>
                                        <input type="text" required name="cts_domicilio" id="cts_domicilio" class="form-control" placeholder="DOMICILIO">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_colonia"><strong class="text-primary">*</strong>COL:</label>
                                        <input type="text" required name="cts_colonia" id="cts_colonia" class="form-control" placeholder="COL">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_calles"><strong class="text-primary">*</strong>ENTRE CALLES:</label>
                                        <input type="text" required name="cts_calles" id="cts_calles" class="form-control" placeholder="ENTRE CALLES">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_fachada_color">FACHADA DE COLOR:</label>
                                        <input type="text" name="cts_fachada_color" id="cts_fachada_color" class="form-control" placeholder="FACHADA DE COLOR">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_puerta_color">PUERTA COLOR:</label>
                                        <input type="text" name="cts_puerta_color" id="cts_puerta_color" class="form-control" placeholder="PUERTA COLOR">
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="cts_credencial_elector">CRED. ELECTOR Nº:</label>
                                        <input type="text" name="cts_credencial_elector" id="cts_credencial_elector" class="form-control" placeholder="CRED. ELECTOR Nº">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                        <strong>DATOS DEL TRABAJO:</strong>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="form-group">
                                        <label for="cts_trabajo"><strong class="text-primary">*</strong>TRABAJA EN:</label>
                                        <input type="text" required name="cts_trabajo" id="cts_trabajo" class="form-control" placeholder="TRABAJA EN">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_puesto"><strong class="text-primary">*</strong>PUESTO:</label>
                                        <input type="text" required name="cts_puesto" id="cts_puesto" class="form-control" placeholder="PUESTO">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="cts_direccion_trabajo"><strong class="text-primary">*</strong>DIRECCIÓN:</label>
                                        <input type="text" required name="cts_direccion_trabajo" id="cts_direccion_trabajo" class="form-control" placeholder="DIRECCION">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="cts_colonia_trabajo"><strong class="text-primary">*</strong>COL:</label>
                                        <input type="text" required name="cts_colonia_trabajo" id="cts_colonia_trabajo" class="form-control" placeholder="COL">
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="cts_telefono_trabajo">TEL:</label>
                                        <input type="number" name="cts_telefono_trabajo" id="cts_telefono_trabajo" class="form-control" placeholder="TEL">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_antiguedad_trabajo">ANTIGÜEDAD:</label>
                                        <input type="number" name="cts_antiguedad_trabajo" id="cts_antiguedad_trabajo" class="form-control" placeholder="ANTIGÜEDAD">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_antiguedad_trabajo_1">ELIJE TIEMPO:</label>
                                        <select name="cts_antiguedad_trabajo_1" id="cts_antiguedad_trabajo_1" class="form-control">
                                            <option value="AÑOS">AÑOS</option>
                                            <option value="MESES">MESES</option>

                                            <option value="DIAS">DIAS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_ingreso_mensual_trabajo">INGRESO MENSUAL:</label>
                                        <input type="number" name="cts_ingreso_mensual_trabajo" id="cts_ingreso_mensual_trabajo" class="form-control" placeholder="INGRESO MENSUAL">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                        <strong>DATOS DE LA VIVIENDA:</strong>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_tipo_casa">LA CASA ES:</label>
                                        <select name="cts_tipo_casa" id="cts_tipo_casa" class="form-control">
                                            <option value="PROPIA">PROPIA</option>
                                            <option value="RENTADA">RENTADA</option>
                                            <option value="PRESTADA">PRESTADA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_tiempo_casa"><strong class="text-primary">*</strong>TIEMPO VIVIENDO AQUÍ:</label>
                                        <input type="number" required name="cts_tiempo_casa" id="cts_tiempo_casa" class="form-control" placeholder="TIEMPO VIVIENDO AQUÍ">
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="cts_tiempo_casa_1">ELIJE TIEMPO:</label>
                                        <select name="cts_tiempo_casa_1" id="cts_tiempo_casa_1" class="form-control">
                                            <option value="AÑOS">AÑOS</option>
                                            <option value="MESES">MESES</option>

                                            <option value="DIAS">DIAS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="cts_nombre_casa">A NOMBRE DE:</label>
                                        <input type="text" name="cts_nombre_casa" id="cts_nombre_casa" class="form-control" placeholder="A NOMBRE DE">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="cts_reg_propiedad">Nº REG. DE LA PROPIEDAD:</label>
                                        <input type="text" name="cts_reg_propiedad" id="cts_reg_propiedad" class="form-control" placeholder="Nº REG. DE LA PROPIEDAD">
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