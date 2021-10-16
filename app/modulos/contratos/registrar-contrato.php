<div class="containeir">
    <form id="formNewContratoAdd">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-5 col-md-5 col-sm-12">
                                <label for="">BUSCAR PRODUCTO</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                    </div>
                                    <input type="hidden" name="productos_contrato" id="productos_contrato">
                                    <input type="text" class="form-control" name="buscar_productos" id="buscar_productos" placeholder="Busque el producto y seleccione" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ctr_id_vendedor">VENDEDOR</label>
                                    <select name="ctr_id_vendedor" id="ctr_id_vendedor" class="form-control select2" required>
                                        <option value="">--SELECCIONAR--</option>
                                        <?php
                                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                                        foreach ($usuarios as $key => $usr) :
                                        ?>
                                            <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th># SKU</th>
                                            <th>NOMBRE</th>
                                            <th class="text-center">CANTIDAD</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyProductosContrato">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="ctr_folio">FOLIO:</label>
                                    <input type="text" name="ctr_folio" id="ctr_folio" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="">FECHA:</label>
                                    <input type="date" name="clts_fecha_registro" id="clts_fecha_registro" class="form-control theDate" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>DATOS DEL CLIENTE:</strong>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_nombre"><strong class="text-danger">*</strong> NOMBRE:</label>
                                    <input type="text" name="clts_nombre" id="clts_nombre" class="form-control text-uppercase" placeholder="NOMBRE" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_curp"><strong class="text-danger">*</strong> CURP:</label>
                                    <input type="text" name="clts_curp" id="clts_curp" class="form-control text-uppercase" placeholder="CURP" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_telefono"><strong class="text-danger">*</strong> TELÉFONO:</label>
                                    <input type="number" name="clts_telefono" id="clts_telefono" class="form-control text-uppercase" placeholder="TELÉFONO" required>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_domicilio"><strong class="text-danger">*</strong> DOMICILIO:</label>
                                    <input type="text" name="clts_domicilio" id="clts_domicilio" class="form-control text-uppercase" placeholder="DOMICILIO" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_col"><strong class="text-danger">*</strong> COL:</label>
                                    <input type="text" name="clts_col" id="clts_col" class="form-control text-uppercase" placeholder="COLONIA" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_entre_calles"><strong class="text-danger">*</strong> ENTRE CALLES:</label>
                                    <input type="text" name="clts_entre_calles" id="clts_entre_calles" class="form-control text-uppercase" placeholder="ENTRE CALLES" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_fachada_color">FACHADA DE COLOR:</label>
                                    <input type="text" name="clts_fachada_color" id="clts_fachada_color" class="form-control text-uppercase" placeholder="FACHADA DE COLOR">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_puerta_color">PUERTA COLOR:</label>
                                    <input type="text" name="clts_puerta_color" id="clts_puerta_color" class="form-control text-uppercase" placeholder="PUERTA COLOR">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>DATOS DEL TRABAJO:</strong>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_trabajo"><strong class="text-danger">*</strong> TRABAJA EN:</label>
                                    <input type="text" name="clts_trabajo" id="clts_trabajo" class="form-control text-uppercase" placeholder="TRABAJA EN" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_puesto"><strong class="text-danger">*</strong> PUESTO:</label>
                                    <input type="text" name="clts_puesto" id="clts_puesto" class="form-control text-uppercase" placeholder="PUESTO" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_direccion_tbj"><strong class="text-danger">*</strong> DIRECCIÓN:</label>
                                    <input type="text" name="clts_direccion_tbj" id="clts_direccion_tbj" class="form-control text-uppercase" placeholder="DIRECCION" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_col_tbj"><strong class="text-danger">*</strong> COL:</label>
                                    <input type="text" name="clts_col_tbj" id="clts_col_tbj" class="form-control text-uppercase" placeholder="COL" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tel_tbj"><strong class="text-danger">*</strong> TEL:</label>
                                    <input type="number" name="clts_tel_tbj" id="clts_tel_tbj" class="form-control text-uppercase" placeholder="TEL" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_antiguedad_tbj"><strong class="text-danger">*</strong> TIEMPO TRABAJANDO ALLÍ:</label>
                                    <input type="text" name="clts_antiguedad_tbj" id="clts_antiguedad_tbj" class="form-control text-uppercase" placeholder="ANTIGÜEDAD" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_igs_mensual_tbj"><strong class="text-danger">*</strong> INGRESO MENSUAL:</label>
                                    <input type="text" name="clts_igs_mensual_tbj" id="clts_igs_mensual_tbj" class="form-control text-uppercase" value="0.00" placeholder="INGRESO MENSUAL" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>DATOS DE LA VIVIENDA:</strong>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tipo_vivienda"><strong class="text-danger">*</strong> LA CASA ES:</label>
                                    <select name="clts_tipo_vivienda" id="clts_tipo_vivienda" class="form-control text-uppercase" required>
                                        <option value="">SELECCIONE UNA OPCION</option>
                                        <option value="PROPIA">PROPIA</option>
                                        <option value="RENTADA">RENTADA</option>
                                        <option value="PRESTADA">PRESTADA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_vivienda_anomde"><strong class="text-danger">*</strong> A NOMBRE DE:</label>
                                    <input type="text" name="clts_vivienda_anomde" id="clts_vivienda_anomde" class="form-control text-uppercase" placeholder="A NOMBRE DE" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_antiguedad_viviendo"><strong class="text-danger">*</strong> TIEMPO VIVIENDO AQUÍ:</label>
                                    <input type="text" name="clts_antiguedad_viviendo" id="clts_antiguedad_viviendo" class="form-control text-uppercase" placeholder="TIEMPO VIVIENDO AQUÍ">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_coordenadas">COORDENADAS</label>
                                    <input type="text" name="clts_coordenadas" id="clts_coordenadas" class="form-control" placeholder="COORDENADAS">
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <br><br>
                                    <a href="https://www.google.com.mx/maps/@18.6190914,-99.1834699,14z" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-map-marker"></i> OBTENER COORDENADAS</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>DATOS DEL CONYUGE:</strong>
                                </div>
                            </div>


                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_nom_conyuge">NOMBRE:</label>
                                    <input type="text" name="clts_nom_conyuge" id="clts_nom_conyuge" class="form-control text-uppercase" placeholder="NOMBRE">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_conyuge">TRABAJA EN:</label>
                                    <input type="text" name="clts_tbj_conyuge" id="clts_tbj_conyuge" class="form-control text-uppercase" placeholder="TRABAJA EN">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_puesto_conyuge">PUESTO:</label>
                                    <input type="text" name="clts_tbj_puesto_conyuge" id="clts_tbj_puesto_conyuge" class="form-control text-uppercase" placeholder="PUESTO">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_dir_conyuge">DIRECCION:</label>
                                    <input type="text" name="clts_tbj_dir_conyuge" id="clts_tbj_dir_conyuge" class="form-control text-uppercase" placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_col_conyuge">COL:</label>
                                    <input type="text" name="clts_tbj_col_conyuge" id="clts_tbj_col_conyuge" class="form-control text-uppercase" placeholder="COL">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_tel_conyuge">TELEFONO:</label>
                                    <input type="number" name="clts_tbj_tel_conyuge" id="clts_tbj_tel_conyuge" class="form-control text-uppercase" placeholder="TELEFONO">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_ant_conyuge">TIEMPO TRABAJANDO ALLÍ:</label>
                                    <input type="text" name="clts_tbj_ant_conyuge" id="clts_tbj_ant_conyuge" class="form-control text-uppercase" placeholder="TIEMPO">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_ing_conyuge">INGRESO MENSUAL:</label>
                                    <input type="number" name="clts_tbj_ing_conyuge" id="clts_tbj_ing_conyuge" class="form-control" value="0.00" placeholder="INGRESO MENSUAL">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>DATOS DEL FIADOR:</strong>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_nom_fiador">NOMBRE:</label>
                                    <input type="text" name="clts_nom_fiador" id="clts_nom_fiador" class="form-control text-uppercase" placeholder="NOMBRE">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_parentesco_fiador">PARENTESCO:</label>
                                    <input type="text" name="clts_parentesco_fiador" id="clts_parentesco_fiador" class="form-control text-uppercase" placeholder="PARENTESCO">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tel_fiador">TEL:</label>
                                    <input type="number" name="clts_tel_fiador" id="clts_tel_fiador" class="form-control text-uppercase" placeholder="TEL">
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_dir_fiador">DIRECCIÓN:</label>
                                    <input type="text" name="clts_dir_fiador" id="clts_dir_fiador" class="form-control text-uppercase" placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_col_fiador">COLONIA:</label>
                                    <input type="text" name="clts_col_fiador" id="clts_col_fiador" class="form-control text-uppercase" placeholder="COL">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_fiador">TRABAJA EN:</label>
                                    <input type="text" name="clts_tbj_fiador" id="clts_tbj_fiador" class="form-control text-uppercase" placeholder="TRABAJA EN">
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_dir_fiador">DIRECCION DE SU TRABAJO:</label>
                                    <input type="text" name="clts_tbj_dir_fiador" id="clts_tbj_dir_fiador" class="form-control text-uppercase" placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_tel_fiador">TEL. DE SU TRABAJO:</label>
                                    <input type="number" name="clts_tbj_tel_fiador" id="clts_tbj_tel_fiador" class="form-control text-uppercase" placeholder="TELEFONO">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_col_fiador">COL. DE SU TRABAJO:</label>
                                    <input type="text" name="clts_tbj_col_fiador" id="clts_tbj_col_fiador" class="form-control text-uppercase" placeholder="COL">
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tbj_ant_fiador">TIEMPO TRABAJANDO ALLÍ:</label>
                                    <input type="text" name="clts_tbj_ant_fiador" id="clts_tbj_ant_fiador" class="form-control text-uppercase" placeholder="TIEMPO">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>REFERENCIAS:</strong>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <span class="badge badge-primary">REFERENCIA 1</span>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_nom_ref1"><strong class="text-danger">*</strong> NOMBRE:</label>
                                    <input type="text" name="clts_nom_ref1" id="clts_nom_ref1" class="form-control text-uppercase" placeholder="NOMBRE" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_parentesco_ref1"><strong class="text-danger">*</strong> PARENTESCO:</label>
                                    <input type="text" name="clts_parentesco_ref1" id="clts_parentesco_ref1" class="form-control text-uppercase" required placeholder="PARENTESCO">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_dir_ref1"><strong class="text-danger">*</strong> DIRECCION:</label>
                                    <input type="text" name="clts_dir_ref1" id="clts_dir_ref1" class="form-control text-uppercase" required placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_col_ref1"><strong class="text-danger">*</strong> COL:</label>
                                    <input type="text" name="clts_col_ref1" id="clts_col_ref1" class="form-control text-uppercase" required placeholder="COL">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tel_ref1"><strong class="text-danger">*</strong> TEL:</label>
                                    <input type="number" name="clts_tel_ref1" id="clts_tel_ref1" class="form-control text-uppercase" required placeholder="TELEFONO">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <span class="badge badge-primary">REFERENCIA 2</span>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_nom_ref2"><strong class="text-danger">*</strong> NOMBRE:</label>
                                    <input type="text" name="clts_nom_ref2" id="clts_nom_ref2" class="form-control text-uppercase" required placeholder="NOMBRE">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_parentesco_ref2"><strong class="text-danger">*</strong> PARENTESCO:</label>
                                    <input type="text" name="clts_parentesco_ref2" id="clts_parentesco_ref2" class="form-control text-uppercase" required placeholder="PARENTESCO">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_dir_ref2"><strong class="text-danger">*</strong> DIRECCION:</label>
                                    <input type="text" name="clts_dir_ref2" id="clts_dir_ref2" class="form-control text-uppercase" required placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_col_ref2"><strong class="text-danger">*</strong> COL:</label>
                                    <input type="text" name="clts_col_ref2" id="clts_col_ref2" class="form-control text-uppercase" required placeholder="COL">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tel_ref2"><strong class="text-danger">*</strong> TEL:</label>
                                    <input type="number" name="clts_tel_ref2" id="clts_tel_ref2" class="form-control text-uppercase" required placeholder="TELEFONO">
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <span class="badge badge-primary">REFERENCIA 3</span>
                            </div>
                            <div class="col-md-8 col-12">
                                <div class="form-group">
                                    <label for="clts_nom_ref3">NOMBRE:</label>
                                    <input type="text" name="clts_nom_ref3" id="clts_nom_ref3" class="form-control text-uppercase" placeholder="NOMBRE">
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="clts_parentesco_ref3">PARENTESCO:</label>
                                    <input type="text" name="clts_parentesco_ref3" id="clts_parentesco_ref3" class="form-control text-uppercase" placeholder="PARENTESCO">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="clts_dir_ref3">DIRECCION:</label>
                                    <input type="text" name="clts_dir_ref3" id="clts_dir_ref3" class="form-control text-uppercase" placeholder="DIRECCION">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_col_ref3">COL:</label>
                                    <input type="text" name="clts_col_ref3" id="clts_col_ref3" class="form-control text-uppercase" placeholder="COL">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="clts_tel_ref3">TEL:</label>
                                    <input type="number" name="clts_tel_ref3" id="clts_tel_ref3" class="form-control text-uppercase" placeholder="TELEFONO">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="alert bg-primary text-white" role="alert">
                                    <strong>LLENADO POR EL CLIENTE:</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> CANTIDAD DE PAGO</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="number" name="ctr_pago_credito" id="ctr_pago_credito" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> FORMA DE PAGO</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <select class="form-control" name="ctrs_forma_pago" id="ctrs_forma_pago" required>
                                        <option value="">--SELECCIONAR OPCION--</option>
                                        <option value="SEMANALES">SEMANALES</option>
                                        <option value="CATORCENALES">CATORCENALES</option>
                                        <option value="QUINCENALES">QUINCENALES</option>
                                        <option value="MENSUALES">MENSUALES</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> FECHA PROXIMO PAGO</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="date" name="ctrs_fecha_pp" id="ctrs_fecha_pp" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> DIA Y HORARIO DE PAGO DEL CLIENTE</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <select name="cts_dia_pago" id="cts_dia_pago" class="form-control" required>
                                        <option value="">SELECCIONE DIA</option>
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SABADO">SABADO</option>
                                        <option value="DOMINGO">DOMINGO</option>
                                    </select>
                                    <input type="time" name="cts_horario_pago" id="cts_horario_pago" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong>PLAZO DE CREDITO</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="text" readonly name="ctrs_plazo_credito" id="ctrs_plazo_credito" class="form-control">
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="alert alert-primary" role="alert">
                                    <strong>DATOS DE LA VENTA:</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> TOTAL DE LA VENTA</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="number" name="total_venta" id="total_venta" class="form-control grupo" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> ENGANCHE</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="number" name="enganche" id="enganche" class="form-control grupo" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong><strong class="text-danger">*</strong> PAGO ADICIONAL</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="number" name="sobre_enganche" id="sobre_enganche" class="form-control grupo" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <strong>SOBRE ENGANCHE PENDIENTE</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="number" name="sobre_enganche_pendiente" id="sobre_enganche_pendiente" class="form-control grupo">
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="alert alert-success" role="alert">
                                    <strong>SALDO</strong>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <input type="number" readonly name="ctr_saldo" id="ctr_saldo" class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-sm-block float-right btn-load">GUARDAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>