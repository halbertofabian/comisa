<script>
    var pagina = ""
</script>

<?php cargarComponente('breadcrumb', '', 'Listado de ingresos'); ?>
<div class="container">
    <!-- 
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
        
    </form> 
    -->
    <?php
    $crearIngreso = new IngresosControlador();
    $crearIngreso->ctrAgregarIngresos();

    ?>
    <hr>
    <div class="container">
        <div class="row">

            <div class="col-12">
                <?php
                $fechaInicio = isset($rutas[1]) ? $rutas[1] : '';
                $fechaFin = isset($rutas[2]) ? $rutas[2] : '';
                $puedeEditar = $_SESSION['session_usr']['usr_rol'] == "Administrador"
                    || $_SESSION['session_usr']['usr_rol'] == "Jefe administrativo";
                ?>
                <table id="tabla-listar-ingresos"
                    class="table table-striped tablaIngresos dt-responsive"
                    data-fecha-inicio="<?= htmlspecialchars($fechaInicio, ENT_QUOTES, 'UTF-8') ?>"
                    data-fecha-fin="<?= htmlspecialchars($fechaFin, ENT_QUOTES, 'UTF-8') ?>"
                    data-puede-editar="<?= $puedeEditar ? '1' : '0' ?>"
                    style="width:100%">
                    <thead class="">
                        <tr>
                            <th># Número</th>
                            <th>Concepto</th>
                            <th>Cantidad</th>
                            <th>Metodo de pago</th>
                            <th>Fecha registro</th>
                            <th>Usuario registro</th>
                            <th>Referencia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
