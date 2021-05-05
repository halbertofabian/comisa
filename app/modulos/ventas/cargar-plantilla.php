<?php
cargarComponente('breadcrumb', '', 'Carga de datos de plantilla');

?>

<div class="container">
    <form id="form_cargar_plantilla" >
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
                <button type="submit" class="d-none btn btn-primary  btn-load" id="btn_cargar_plantilla">Crear</button>
            </div>
        </div>

    </form>
</div>