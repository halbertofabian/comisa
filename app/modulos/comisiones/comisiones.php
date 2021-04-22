<?php
cargarComponente('breadcrumb', '', 'Comisiones Cobradores / Vendedores');

?>
<div class="container">
    <form method="post" id="formCalculoComisiones">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="id_igs_usuario_responsable">Usuario: </label>
                    <select class="form-control select2" name="id_igs_usuario_responsable" id="id_igs_usuario_responsable">
                        <option value="">Seleccione un usuario</option>
                        <?php

                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                        // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                        foreach ($usuarios as $key => $usr) :
                        ?>
                            <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="igs_fecha_inicio">Fecha inicio</label>
                    <input type="date" name="igs_fecha_inicio" id="igs_fecha_inicio" class="form-control " placeholder="">
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="igs_fecha_fin">Fecha fin</label>
                    <input type="date" name="igs_fecha_fin" id="igs_fecha_fin" class="form-control theDate" placeholder="">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-load" id="btnRepComision">Buscar</button>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="alert alert-dark col-12" role="alert">
                <strong>Cobranza</strong>
            </div>
            <table class="table table-responsive">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>

                        <th>Fecha</th>
                        <th>Usuario_Registro</th>
                        <th>Metodo de pago</th>
                        <th>Referencia</th>
                        <th>Monto</th>
                        <th>Comisión</th>
                        <th>Concepto</th>
                        <th>Tipo</th>
                        <th>Nombre_Responsable</th>
                    </tr>
                </thead>
                <tbody id="tblComisiones">

                </tbody>
            </table>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="igs_fecha_inicio">Cobro </label>
                    <input type="text" name="igs_cobro" id="igs_cobro" class="form-control inputN" placeholder="" readonly>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="alert alert-dark col-12" role="alert">
                <strong>Debe</strong>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="tblDebe">

                </tbody>
            </table>
        </div>

        <!-- <div class="row">
        <div class="alert alert-dark col-12" role="alert">
            <strong>PRESTAMOS (DEUDA EXTERNA)</strong>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody id="tblPrestamo">

            </tbody>
        </table>
    </div> -->
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="igs_comision">Comision </label>
                            <input type="text" name="igs_comision" id="igs_comision" class="form-control inputN" placeholder="" readonly>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="alert alert-primary" role="alert">
                        <strong>PARAMETROS</strong>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="com_cobranza">COBRANZA % </label>
                            <input type="text" name="com_cobranza" id="com_cobranza" class="form-control " placeholder="" value="10">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="com_cobranza">COBRANZA DE CREDICONTADO % </label>
                            <input type="text" name="com_cobranza_credicontado" id="com_cobranza_credicontado" class="form-control " placeholder="" value="5">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="com_se">S/E % </label>
                            <input type="text" name="com_se" id="com_se" class="form-control " placeholder="" value="5">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="com_contado">CONTADO % </label>
                            <input type="text" name="com_contado" id="com_contado" class="form-control " placeholder="" value="10">
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="igs_descuento">Descuento -DEBE </label>
                    <input type="text" name="igs_descuento" id="igs_descuento" class="form-control inputN" placeholder="" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="igs_descuento_imss">Descuento - IMSS </label>
                    <input type="text" name="igs_descuento_imss" id="igs_descuento_imss" class="form-control inputN" placeholder="" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="igs_Apagar">A pagar </label>
                    <input type="text" name="igs_Apagar" id="igs_Apagar" class="form-control inputN" placeholder="" >
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="igs_pago">Pago</label>

                            <input type="text" name="igs_pagox" id="igs_pagox" class="form-control inputN" readonly >
        

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="igs_deuda_ext">Deuda</label>
                            <input type="text" name="igs_deuda_ext" id="igs_deuda_ext" class="form-control inputN" readonly placeholder="">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="igs_abono_deuda"> Abono </label>
                            <input type="text" name="igs_abono_deuda" id="igs_abono_deuda" class="form-control inputN" value="0" placeholder="">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="igs_nueva_deuda"> Nueva deuda (Deuda - abono) </label>
                            <input type="text" name="igs_nueva_deuda" id="igs_nueva_deuda" class="form-control inputN" readonly placeholder="">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="form-group mb-5">

            <button class="btn btn-primary float-right btn-load" id=" " name="btnCalcularComisiones">GUARDAR</button>
        </div>

        <!-- <?php
                //   $registroComision = new ComisionesControlador();
                //   $registroComision -> ctrCalcularComisiones();

                ?>
         -->


    </form>

</div>