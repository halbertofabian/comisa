<?php
cargarComponente('breadcrumb', '', 'Nuevo contrato');
?>
<div class="container">
    <div class="form">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="form-group">
                    <label for="">Buscar cliente</label>
                    <select class="form-control select2" name="" id="cts_buscar_cliente">
                        <option value="">Buscar cliente</option>
                        <?php
                        $clientes = ClientesModelo::mdlMostrarClientes();
                        foreach ($clientes as $key => $cts) :
                        ?>
                            <option value="<?php echo $cts['cts_id'] ?>"><?php echo $cts['cts_nombre'] . ' ' . $cts['cts_ruta'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <fieldset disabled class="content-cliente d-none">
                    <div class="container">
                        <form method="post" id="">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                                        <strong>1.- DATOS DEL CLIENTE: <span id="cts_ruta"></span> </strong>
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
        <div class="row">
            <div class="col-12">

                <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                    <strong>2.- DATOS DEL CÓNYUGE: </strong>
                </div>
            </div>

            <div class="col-md-8 col-12">
                <div class="form-group">
                    <label for="">NOMBRE:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">TRABAJA EN:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">PUESTO:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">DIRECCIÓN:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">COL:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">TELÉFONO:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="">TIEMPO TRABAJANDO ALLÍ:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                    <strong>3.- DATOS DEL FIADOR: </strong>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">NOMBRE:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">PARENTESCO:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">TEL:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-8 col-12">
                <div class="form-group">
                    <label for="">DIRECCIÓN:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">COLONIA:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">TRABAJA EN:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">DIERCCIÓN:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">TEL:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">COL:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">FOLIO CRED. ELECTOR:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">ANTIGÜEDAD:</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-dark" role="alert" style="height: 10px; padding: 30px;">
                    <strong>4.- REFERENCIAS: </strong>
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="form-group">
                    <label for="">NOMBRE</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">PARENTESCO</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">DIRECCIÓN</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">COL</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">TEL</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-8 col-12">
                <div class="form-group">
                    <label for="">NOMBRE</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">PARENTESCO</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">DIRECCIÓN</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">COL</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="form-group">
                    <label for="">TEL</label>
                    <input type="text" name="" id="" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
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

                            <input type="text" class="form-control">
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <strong>DIA Y HORARIO DE PAGO DEL CLIENTE</strong>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for=""></label>
                                <select class="form-control" name="" id="">
                                    <option>SABADO</option>
                                    <option>DOMINGO</option>
                                    <option>LUNES</option>
                                    <option>MARTES</option>
                                    <option>MIERCOLES</option>
                                    <option>JUEVES</option>
                                    <option>VIERNES</option>
                                </select>
                            </div>
                            <input type="time" class="form-control">
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
                            <input type="date" class="form-control">
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>
                            <strong>PLAZO DE CRÉDITO</strong>
                        </td>
                        <td>
                            <input type="number" class="form-control" placeholder="Exprese en semanas">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>