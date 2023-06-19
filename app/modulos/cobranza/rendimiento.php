<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="fcbz_ano">Año</label>
                    <select class="form-control select2" name="fcbz_ano" id="fcbz_ano">
                        <!-- <option value="">Selecionar ruta</option> -->
                        <?php
                        for ($i = 2023; $i <= date('Y'); $i++) :
                            $selected = '';
                            if (date('Y') == $i) {
                                $selected = 'selected';
                            }
                        ?>
                            <option value="<?= $i ?>" <?= $selected ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="rto_ficha">Ficha</label>
                    <select class="form-control select2" name="rto_ficha" id="rto_ficha">

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="rto_ruta">Ruta</label>
                    <select class="form-control select2" name="rto_ruta" id="rto_ruta">
                        <option value="">-Seleccionar-</option>

                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <label for="usr_id_r">Usuario</label>
                <select class="form-control" name="usr_id_r" id="usr_id_r">
                </select>
            </div>
        </div>

    </div>
    <div class="col-12"></div>
    <div class="col-md-6">
        <div class="card" style="height: 180px">
            <div class="card-header" id="usr_nombre">

            </div>
            <div class="card-body text-center">
                <h1 class="text-center" id="rto_total_cuentas"></h1>
                <h6 class="text-center">Total de cuentas</h6>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 180px">
            <div class="card-header">
                Porcentaje de cobro:
            </div>
            <div class="card-body text-center">
                <h1 class="text-center" id="porcentaje_cobrado"></h1>
                <div class="progress">
                    <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 380px">
            <div class="card-header text-center">
                Cuentas por metodos de pago
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="rto_total_semanales"></h3>
                                <p class="card-text text-center">Semanales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="rto_total_catorcenales"></h3>
                                <p class="card-text text-center">Catorcenales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="rto_total_quincenales"></h3>
                                <p class="card-text text-center">Quincenales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="rto_total_mensuales"></h3>
                                <p class="card-text text-center">Mensuales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 380px">
            <div class="card-header text-center">
                Objetivo: 100%
            </div>
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="rto_total_cuentas_cobro"></h3>
                                <p class="card-text text-center">Total de cuentas a cobro</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="total_cuentas_cobradas"></h3>
                                <p class="card-text text-center">Cuentas cobradas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="total_cuentas_acumulado"></h3>
                                <p class="card-text text-center">Cobranza</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 id="total_ganado"></h3>
                                <p class="card-text text-center">Ganancía</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var fcbz_ano = $("#fcbz_ano").val();

        mostratFichasAnio(fcbz_ano);
    })

    function mostratFichasAnio(fcbz_ano) {
        $('#rto_ficha option').remove();
        var datos = new FormData();
        datos.append("fcbz_ano", fcbz_ano);
        datos.append("btnConsultarFichasByAnio", true);
        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                // startLoadButton()

            },
            success: function(res) {
                // console.log(res)
                res.forEach(element => {

                    $('#rto_ficha').prepend(`<option value='${element.fcbz_id}' >Ficha ${element.fcbz_numero} - DEL ${element.fcbz_fecha_inicio} AL ${element.fcbz_fecha_termino} </option>`);

                });
                $("#rto_ficha option:selected").last().val();

                var fcbz_id = $("#rto_ficha").val();
                var rto_ruta = $("#rto_ruta").val();

                mostratRendimientoFicha(rto_ruta, fcbz_id);
                mostrarRutas(fcbz_id);
            }

        })
    }

    function mostrarRutas(fcbz_id) {
        $('#rto_ruta option').remove();
        var datos = new FormData();
        datos.append("fcbz_id", fcbz_id);
        datos.append("btnConsultarRutas", true);
        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                $('#rto_ruta').append(`<option selected value='' >-Seleccionar-</option>`)
                res.forEach(element => {

                    $('#rto_ruta').append(`<option value='${element.rto_ruta}' >${element.rto_ruta} </option>`);

                });

            }

        })
    }

    $("#rto_ruta").on("change", function() {
        var rto_ruta = $(this).val();
        var fcbz_id = $("#rto_ficha").val();

        mostratRendimientoFicha(rto_ruta, fcbz_id)
    })

    $("#usr_id_r").on("change", function() {
        var usr_id_r = $(this).val();
        var rto_ruta = $("#rto_ruta").val();
        var fcbz_id = $("#rto_ficha").val();

        mostratRendimientoFicha(rto_ruta, fcbz_id)
    })

    $("#rto_ficha").on("change", function() {
        var fcbz_id = $(this).val();
        mostrarRutas(fcbz_id);
        setTimeout(() => {
            var rto_ruta = $("#rto_ruta").val();
            mostratRendimientoFicha(rto_ruta, fcbz_id);
        }, 1000);

    })

    function mostratRendimientoFicha(rto_ruta, fcbz_id) {
        $('#usr_id_r option').remove();
        var datos = new FormData();
        datos.append("rto_ruta", rto_ruta);
        datos.append("fcbz_id", fcbz_id);
        datos.append("btnConsultarRendimiento", true);
        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                if (rto_ruta == "") {
                    $('#usr_id_r').append(`<option selected value=''>-Todos-</option>`)
                    $("#usr_nombre").text("Todos");
                    var rto_total_cuentas = 0;
                    var rto_total_semanales = 0;
                    var rto_total_catorcenales = 0;
                    var rto_total_quincenales = 0;
                    var rto_total_mensuales = 0;
                    var rto_total_cuentas_cobro = 0;
                    res.forEach(element => {
                        rto_total_cuentas += Number(element.rto_total_cuentas);
                        rto_total_semanales += Number(element.rto_total_semanales);
                        rto_total_catorcenales += Number(element.rto_total_catorcenales);
                        rto_total_quincenales += Number(element.rto_total_quincenales);
                        rto_total_mensuales += Number(element.rto_total_mensuales);
                        rto_total_cuentas_cobro += Number(element.rto_total_cuentas_cobro);
                    });
                    $("#rto_total_cuentas").text($.number(rto_total_cuentas));
                    $("#rto_total_semanales").text($.number(rto_total_semanales));
                    $("#rto_total_catorcenales").text($.number(rto_total_catorcenales));
                    $("#rto_total_quincenales").text($.number(rto_total_quincenales));
                    $("#rto_total_mensuales").text($.number(rto_total_mensuales));
                    $("#rto_total_cuentas_cobro").text($.number(rto_total_cuentas_cobro));

                    var datos = new FormData()
                    datos.append('fcbz_id', fcbz_id);
                    datos.append('btnConsultarRendimientoV2', true);
                    $.ajax({
                        type: 'POST',
                        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                        data: datos,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            $("#total_cuentas_cobradas").text($.number(respuesta.total_cuentas_cobradas));
                            $("#total_cuentas_acumulado").text("$" + $.number(respuesta.total_cuentas_acumulado, 2));
                            $("#total_ganado").text("$" + $.number(respuesta.total_ganado, 2));

                            var porcentaje_cobrado = (Number(respuesta.total_cuentas_cobradas) / rto_total_cuentas_cobro) * 100;

                            $("#porcentaje_cobrado").text(Math.trunc(porcentaje_cobrado) + "%");
                            $("#progressbar").attr("style", "width:" + Math.trunc(porcentaje_cobrado) + "%");
                        }
                    });

                } else {
                    $('#usr_id_r').append(`<option selected value='' >-Seleccionar-</option>`)
                    res.forEach(element => {
                        $('#usr_id_r').append(`<option value='${element.usr_id}' usr_nombre="${element.usr_nombre}">${element.usr_nombre} </option>`);
                    });
                    var usr_nombre = $('option:selected', $("#usr_id_r")).attr('usr_nombre');
                    $("#usr_nombre").text("Nombre del cobrador: " + usr_nombre);
                    $("#rto_total_cuentas").text($.number(res.rto_total_cuentas));
                    $("#rto_total_semanales").text($.number(res.rto_total_semanales));
                    $("#rto_total_catorcenales").text($.number(res.rto_total_catorcenales));
                    $("#rto_total_quincenales").text($.number(res.rto_total_quincenales));
                    $("#rto_total_mensuales").text($.number(res.rto_total_mensuales));
                    $("#rto_total_cuentas_cobro").text($.number(res.rto_total_cuentas_cobro));

                    var datos = new FormData()
                    datos.append('fcbz_id', fcbz_id);
                    datos.append('usr_id', $("#usr_id_r").val()); //  res[0].usr_id
                    datos.append('btnConsultarRendimientoV3', true);
                    $.ajax({
                        type: "POST",
                        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                        data: datos,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // console.log(response)
                            $("#total_cuentas_cobradas").text($.number(response.total_cuentas_cobradas));
                            $("#total_cuentas_acumulado").text("$" + $.number(response.total_cuentas_acumulado, 2));
                            $("#total_ganado").text("$" + $.number(response.total_ganado, 2));

                            $("#porcentaje_cobrado").text(Math.trunc(response.porcentaje_cobrado) + "%");
                            $("#progressbar").attr("style", "width:" + Math.trunc(response.porcentaje_cobrado) + "%");
                        }
                    });
                }
            }

        })
    }

    $("#fcbz_ano").on("change", function() {
        var fcbz_ano = $(this).val();
        mostratFichasAnio(fcbz_ano)
    })
</script>