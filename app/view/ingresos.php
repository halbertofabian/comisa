<script>
    var pagina = ""
</script>
<?php cargarComponente('breadcrumb', '', 'Ingresos'); ?>
<div class="container">
    <form action="" method="post">
        <div class="row">

            <div class="col-md-2 col-6">
                <div class="form-group">
                    <label for="igs_monto">Ingreso</label>
                    <input type="text" name="igs_monto" id="igs_monto" class="form-control inputN" placeholder="">
                </div>
            </div>
            <div class="col-md-7 col-6">
                <div class="form-group">
                    <label for="igs_concepto">Concepto</label>
                    <input type="text" name="igs_concepto" id="igs_concepto" class="form-control " required placeholder="">
                </div>
            </div>
            <!-- <div class="col-md-2 col-6">
            <div class="form-group">
                <label for="igs_fecha_registro">Fecha</label>
                <input type="date" name="igs_fecha_registro" id="igs_fecha_registro" class="form-control theDate" required placeholder="">
            </div>
        </div> -->
            <div class="form-group col-md-3 col-6">
                <label for="igs_mp">Método de pago</label>
                <select name="igs_mp" id="igs_mp" class="form-control">
                    <option value="EFECTIVO">EFECTIVO</option>
                    <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                    <option value="DEPOSITO">DEPOSITO</option>
                    <option value="TARJETA">TARJETA DE CREDITO / DEBITO </option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" name="btnAgregarIngreso" class="btn btn-primary float-right mt-1">Ingresar</button>
            </div>
        </div>
        <?php
        $crearIngreso = new IngresosControlador();
        $crearIngreso->ctrAgregarIngresos();

        ?>
    </form>

    <hr>
    <div class="container">
        <div class="row">
            <!-- <div class="col-12 mt-1">
            <button type="button" id="daterange-btn" class="d-none d-sm-inline-block btn btn-default   mr-sm-2 shadow-sm  float-right mb-4">
                <span>
                    <i class="fa fa-calendar"></i> Rango de fecha
                </span>
                <i class="fa fa-caret-down"></i>
            </button>
        </div> -->


            <div class="col-12">
                <table class="table tablas table-striped tablaIngresos">
                    <thead class="">
                        <tr>
                            <th># Número</th>
                            <th>Concepto</th>
                            <th>Cantidad</th>
                            <th>Metodo de pago</th>
                            <th>Fecha registro</th>
                            <th>Usuario registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //var_dump($rutas);
                        if (isset($rutas[1]) && $rutas[2]) {
                            $ingresos = IngresosModelo::mdlConsultarIngresos2Fecha($rutas[1], $rutas[2]);
                        } else {
                            $ingresos = IngresosModelo::mdlMostrarIngresos();
                        }


                        foreach ($ingresos as $key => $igs) :
                        ?>
                            <tr>
                                <td><?php echo $igs['igs_id'] ?></td>
                                <td><?php echo $igs['igs_concepto'] ?></td>
                                <td><?php echo  number_format($igs['igs_monto'], 2) ?></td>
                                <td><?php echo $igs['igs_mp'] ?></td>
                                <td><?php echo $igs['igs_fecha_registro'] ?></td>
                                <td><?php echo $igs['igs_usuario_registro'] ?></td>
                                <td>
                                    <?php if ($_SESSION['session_usr']['usr_rol'] == "Administrador") :  ?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-filter" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <button class="dropdown-item text-dark btnEliminarIngreso" igs_id="<?php echo $igs['igs_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar ingreso </button>


                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>


                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
    if (localStorage.getItem("capturarRango") != null) {
        $("#daterange-btn span").html(localStorage.getItem("capturarRango"))

    } else {
        $("#daterange-btn span").html('<i class="fa fa-calendar"></i> Rango de fecha');
    }


    $('#daterange-btn').daterangepicker({
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                'Este mes': [moment().startOf('month'), moment().endOf('month')],
                'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment(),
            endDate: moment()
        },
        function(start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

            var fechaInicial = start.format('YYYY-MM-DD');

            var fechaFinal = end.format('YYYY-MM-DD');

            var capturarRango = $("#daterange-btn span").html();

            localStorage.setItem("capturarRango", capturarRango);

            window.location = urlApp + 'ingresos/' + fechaInicial + "/" + fechaFinal;



        }

    )


    $(".daterangepicker.opensright .range_inputs .cancelBtn").on("click", function() {

        localStorage.removeItem("capturarRango");
        localStorage.removeItem("capturarRangoIngreso");

        localStorage.clear();
        window.location = urlApp + 'ingresos/';
    })

    /*=============================================
    CAPTURAR HOY
    =============================================*/
    $(".daterangepicker.opensright .ranges li").on("click", function() {

        var textoHoy = $(this).attr("data-range-key");

        if (textoHoy == "Hoy") {

            var d = new Date();

            var dia = d.getDate();
            var mes = d.getMonth() + 1;
            var año = d.getFullYear();


            dia = ("0" + dia).slice(-2);
            mes = ("0" + mes).slice(-2);

            var fechaInicial = año + "-" + mes + "-" + dia;
            var fechaFinal = año + "-" + mes + "-" + dia;

            localStorage.setItem("capturarRango", "Hoy");
            localStorage.setItem("capturarRangoIngreso", "Hoy");


            window.location = urlApp + 'ingresos/' + fechaInicial + "/" + fechaFinal;

        }

    })
</script>