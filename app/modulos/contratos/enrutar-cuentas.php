<div class="container-fluid">
    <form id="formBuscarEnrute" method="post">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="ctr_ruta">RUTA</label>
                    <select name="ctr_ruta" id="ctr_ruta" class="form-control select2">
                        <?php
                        for ($i = 1; $i <= 100; $i++) :
                        ?>
                            <option value="R<?= $i ?>">R<?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="ctr_cuenta"># CUENTA </label>
                    <input type="text" name="ctr_cuenta" id="ctr_cuenta" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ctr_cliente">NOMBRE </label>
                    <input type="text" name="ctr_cliente" id="ctr_cliente" class="form-control" placeholder="" readonly>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">

                    <input type="submit" class="btn btn-primary float-right" value="BUSCAR">
                </div>
            </div>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <input type="text" id="ctr_id" name="ctr_id">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ctr_orden">Nº ORDEN</label>
                        <input type="numer" step="0.1" name="ctr_orden" id="ctr_orden" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="ctr_forma_pago">FORMA DE PAGO</label>
                    <select name="ctr_forma_pago" id="ctr_forma_pago" class="form-control forma_pago">
                        <option value=""></option>
                        <option value="SEMANALES">SEMANALES</option>
                        <option value="CATORCENALES">CATORCENALES</option>
                        <option value="QUINCENALES">QUINCENALES</option>
                        <option value="MENSUALES">MENSUALES</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">DIA PAGO</label>
                    <div class="d-dia_1 d-none">
                        <select name="ctr_dia_pago" id="ctr_dia_pago" class="form-control">
                            <option value=""></option>
                            <option value="LUNES">LUNES</option>
                            <option value="MARTES">MARTES</option>
                            <option value="MIERCOLES">MIERCOLES</option>
                            <option value="JUEVES">JUEVES</option>
                            <option value="VIERNES">VIERNES</option>
                            <option value="SABADO">SABADO</option>
                            <option value="DOMINGO">DOMINGO</option>
                        </select>
                    </div>
                    <div class="d-dia_2 d-none">
                        <div class="form-group">
                            <input type="text" name="ctr_dia_pago_2" id="ctr_dia_pago_2" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="d-dia-p d-none">
                        <div class="form-group">
                            <label for="">PROXIMO DIA DE PAGO</label>
                            <input type="date" name="" id="" class="form-control" placeholder="">
                        </div>
                    </div>

                </div>
                <div class="form-group col-md-4">
                    <label for="ctr_pago_credito">PAGO</label>
                    <input type="text" id="ctr_pago_credito" name="ctr_pago_credito" class="form-control inputN">
                </div>
                <div class="form-group col-md-4">
                    <label for="">FECHA INICIO PAGO</label>
                    <input type="text" class="form-control date" id="ctr_proximo_pago" name="ctr_proximo_pago">
                </div>

                <div class="form-group col-md-4">
                    <label for="">TOTAL</label>
                    <input type="text" class="form-control inputN" id="ctr_total" name="ctr_total">
                </div>
                <div class="form-group col-md-4">
                    <label for="">ENG</label>
                    <input type="text" class="form-control inputN" id="ctr_enganche" name="ctr_enganche">
                </div>
                <div class="form-group col-md-4">
                    <label for="">PAGO ADICIONAL</label>
                    <input type="text" class="form-control inputN" id="ctr_pago_adicional" name="ctr_pago_adicional">
                </div>
                <div class="form-group col-md-4">
                    <label for="">SALDO</label>
                    <input type="text" class="form-control inputN" id="ctr_saldo" name="ctr_saldo">
                </div>
                <div class="form-group col-md-4">
                    <label for="">SALDO ACUAL</label>
                    <input type="text" class="form-control inputN" id="ctr_saldo_actual" name="ctr_saldo_actual">
                    <input type="text" id="ctr_saldo_base" name="ctr_saldo_base">
                </div>


                <div class="form-group col-md-4">
                    <label for="">FECHA ULTIMO PAGO</label>
                    <input type="text" class="form-control date" id="ctr_ultima_fecha_abono" name="ctr_ultima_fecha_abono">
                </div>
                <div class="form-group col-md-4">
                    <label for="">TOTAL PAGADO</label>
                    <input type="text" class="form-control inputN" readonly id="ctr_total_pagado" name="ctr_total_pagado">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">STATUS</label>
                        <input type="text" class="form-control" id="ctr_status_cuenta" name="ctr_status_cuenta">
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="">FECHA REAGENDA</label>
                    <input type="date" class="form-control" id="cra_fecha_reagenda" name="cra_fecha_reagenda">
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <label class="form-check-label mt-4">
                            <input type="checkbox" class="form-check-input" value="POR LOCALIZAR" id="cra_estado" name="cra_estado">
                            POR LOCALIZAR
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-right">GUARDAR ENRUTAMIENTO</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>RUTA</th>
                        <th># CUENTA</th>
                        <th>FECHA PROXIMO COBRO</th>
                        <th>FECHA REAGENDA</th>
                        <th>ORDEN</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>


<script>
    $("#formBuscarEnrute").on("submit", function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append("btnBuscarEnrute", true);
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
                console.log(res)

                if (res.ctr) {
                    $("#ctr_cliente").val(res.ctr.ctr_cliente)
                    if (res.ctr.ctr_orden <= 0) {
                        $("#ctr_orden").val("")
                    } else {
                        $("#ctr_orden").val(res.ctr.ctr_orden)
                    }
                    // $("#ctr_forma_pago").val(res.ctr.ctr_forma_pago)

                    $("#ctr_dia_pago").val(res.ctr.ctr_dia_pago);
                    $("#ctr_dia_pago_2").val(res.ctr.ctr_dia_pago);
                    $("#ctr_pago_credito").val(res.ctr.ctr_pago_credito)
                    $("#ctr_proximo_pago").val(res.ctr.ctr_proximo_pago)
                    $("#ctr_total").val(res.ctr.ctr_total)
                    $("#ctr_enganche").val(res.ctr.ctr_enganche)
                    $("#ctr_pago_adicional").val(res.ctr.ctr_pago_adicional)
                    $("#ctr_saldo").val(res.ctr.ctr_saldo)

                    $("#ctr_saldo_actual").val(res.ctr.ctr_saldo_actual)
                    $("#ctr_ultima_fecha_abono").val(res.ctr.ctr_ultima_fecha_abono)
                    $("#ctr_total_pagado").val(res.ctr.ctr_total_pagado)
                    $("#ctr_status_cuenta").val(res.ctr.ctr_status_cuenta)
                    $("#ctr_saldo_base").val(res.ctr.ctr_saldo_base)
                    $("#ctr_id").val(res.ctr.ctr_id)

                    $('#ctr_forma_pago').val(res.ctr.ctr_forma_pago).trigger('change');

                    $("#ctr_orden").focus()


                    saldo();


                } else {
                    toastr.error("Esta cuenta no exiete en esta ruta", 'ADVERTENCIA')
                }
            }
        })
    })



    $("#ctr_forma_pago").on("change", function() {
        var forma_pago = $(this).val();
        // if()
        if (forma_pago == 'SEMANALES') {
            $(".d-dia_1").removeClass('d-none')
            $(".d-dia-p").addClass('d-none')
            $(".d-dia_2").addClass('d-none')
        } else if (forma_pago == 'CATORCENALES') {
            $(".d-dia_1").removeClass('d-none')
            $(".d-dia-p").removeClass('d-none')
            // $(".d-dia-p").addClass('d-none')
            $(".d-dia_2").addClass('d-none')

        } else if (forma_pago == 'QUINCENALES' || forma_pago == 'MENSUALES') {
            $(".d-dia_2").removeClass('d-none')

            $(".d-dia-p").addClass('d-none')
            $(".d-dia_1").addClass('d-none')
        } else {
            $(".d-dia_1").addClass('d-none')
            $(".d-dia-p").addClass('d-none')
            $(".d-dia_2").addClass('d-none')
        }
    })

    function saldo() {
        var ctr_total = Number($("#ctr_total").val().replace(/,/g, ""));
        var ctr_enganche = Number($("#ctr_enganche").val().replace(/,/g, ""));
        var ctr_pago_adicional = Number($("#ctr_pago_adicional").val().replace(/,/g, ""));
        var saldo = ctr_total - ctr_enganche - ctr_pago_adicional;
        $("#ctr_saldo").val(saldo)
        $("#ctr_saldo_base").val(saldo)
        var ctr_saldo = Number($("#ctr_saldo").val().replace(/,/g, ""));

        var ctr_saldo_actual = Number($("#ctr_saldo_actual").val().replace(/,/g, ""));

        var ctr_total_pagado = ctr_saldo - ctr_saldo_actual;

        $("#ctr_total_pagado").val(ctr_total_pagado)


    }
    $(".inputN").on("keyup", function() {
        saldo()
    })
</script>