<?php
cargarComponente('breadcrumb', '', 'Carga de datos de plantilla');

?>

<div class="container">
    <form id="form_cargar_plantilla">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="gts_usuario">Semana: </label>
                    <select class="form-control select2" name="pvts_num_semana" id="pvts_num_semana">
                        <option value="">Seleccione una semana</option>
                        <?php

                        $infPlantilla = VentasModelo::mdlMostrarPlantillas();
                        $meses = array(
                            1 => "Enero",
                            2 => "Febrero",
                            3 => "Marzo",
                            4 => "Abril",
                            5 => "Mayo",
                            6 => "Junio",
                            7 => "Julio",
                            8 => "Agosto",
                            9 => "Septiembre",
                            10 => "Octubre",
                            11 => "Noviembre",
                            12 => "Diciembre",
                        );

                        // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                        foreach ($infPlantilla as $key => $info) :

                            $fechaComoEntero = strtotime($info['pvts_fecha_inicio']);
                            $diain = date("d", $fechaComoEntero);
                            $mes = date("m", $fechaComoEntero);
                            $cadena_formateada = ltrim($mes, "0");

                            $anio = date("Y", $fechaComoEntero);

                            $fechaComoEntero2 = strtotime($info['pvts_fecha_fin']);
                            $diafin = date("d", $fechaComoEntero2);


                        ?>
                            <option value="<?= $info['pvts_id'] ?>">SEMANA <?= $info['pvts_id'] ?> Del <?= $diain ?> al <?= $diafin ?> de <?= $meses[$cadena_formateada] ?> <?= $anio ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 ">
                <table class="table table_cargarPlantilla">
                    <thead class="thead-light">
                        <tr>
                            <th>Vendedor</th>
                            <th>Sabado</th>
                            <th>Domingo</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="inftblcargarPlantilla">


                    </tbody>
                </table>


            </div>

        </div>

        <div class="col-12 col-md-4">
            <div class="form-group mt-1 ">
                <button type="submit" class="d-none btn btn-primary  btn-load" id="btn_cargar_plantilla">Guardar</button>
            </div>
        </div>

    </form>

    <div class="row d-none" id="seccion_pgs_vts">
        <div class="col-12 col-md-8 ">
            <table class="table table_vts_pago">
                <thead class="thead-light">
                    <tr>
                        <th>Vendedor</th>
                        <th>Deuda interna</th>
                        <th>Deuda externa</th>
                        <th>Abono deuda ext</th>
                        <th>A pagar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $aux = "";
                    $rol = "Vendedor";
                    $usuarios = UsuariosModelo::mdlMostrarUsuarios($aux, $rol);
                    foreach ($usuarios as $key => $usr) :
                    ?>
                        <tr>
                            <td> <input type="text" name="" id="" value="<?= $usr['usr_nombre'] ?>" class="form-control" readonly></td>
                            <td><input type="text" name="" id="dint_<?= $usr['usr_id'] ?>" value="<?= $usr['usr_deuda_int'] ?>" class="form-control" readonly></td>
                            <td><input type="text" name="" id="dext_<?= $usr['usr_id'] ?>" value="<?= $usr['usr_deuda_ext'] ?>" class="form-control" readonly></td>
                            <td><input type="text" name="" id="abn_<?= $usr['usr_id'] ?>" class="form-control inputAbono"></td>
                            <td><input type="text" name="" id="apagar_<?= $usr['usr_id'] ?>" class="form-control" readonly>
                            <input type="hidden" id="apagaraux_<?= $usr['usr_id'] ?>" class="form-control" readonly></td>
                        </tr>


                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
        <div class="col-12 col-md-4 ">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">Mayor a</label>
                        <input type="text" name="" id="vtsmas" class="form-control inputN" placeholder="Numero de ventas">
                    </div>

                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">$</label>
                        <input type="text" name="" id="pvtsmas" class="form-control inputN" placeholder="$ >= numero vts">
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">Menor a </label>
                        <input type="text" name="" id="vtsmenos" class="form-control inputN" placeholder="Numero de ventas">
                    </div>

                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="">$</label>
                        <input type="text" name="" id="pvtsmenos" class="form-control inputN" placeholder="$ < Numero vts">
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group mt-1 ">
                        <button type="button" class="btn btn-primary  btn-load float-right" id="btn_cal_pg">Calcular pago</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>