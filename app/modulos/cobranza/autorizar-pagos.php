<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form method="post" id="formBuscarPagos">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="urs_id">Selecione el cobrador</label>
                            <select name="urs_id" id="urs_id" class="form-control select2" placeholder="">
                                <option value=""></option>
                                <?php
                                $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                                foreach ($usuarios as $key => $usr) :
                                ?>
                                    <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" name="btnMostrarAbonos" class="btn btn-dark mt-1 float-right mb-1">Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th># OPERACIÓN </th>
                        <th>COBRADOR</th>
                        <th>CLIENTE</th>
                        <th>NUMERO DE CUENTA</th>
                        <th>SALDO ACTUAL</th>
                        <th>PAGO</th>
                        <th>METODO DE PAGO</th>
                        <th>REFERENCIA</th>
                        <th>NOTA</th>
                        <th>FECHA PAGO</th>
                    </tr>
                </thead>
                <tbody id="tbodyPagos" class="text-center">

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-text text-center" id="pgs_total"></h4>
                    <p class="card-title text-center">TOTAL</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-text text-center" id="pgs_total_efectivo"></h4>
                    <p class="card-title text-center">EFECTIVO</p>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-text text-center" id="pgs_total_banco"></h4>

                    <p class="card-title text-center">BANCO</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <form id="formAutorizarPagos" method="post">
                <div class="form-group">
                    <label for="">Guardar como... </label>
                    <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" value="<?= fechaCastellano(FECHA_ACTUAL) ?>">
                    <input type="text" name="usr_id" id="usr_id_save" value="">
                    <input type="text" id="fecha_text" value="<?= fechaCastellano(FECHA_ACTUAL) ?>">
                    <button class="btn btn-primary float-right mt-1">Guardar y autorizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        buscarPagos("");

    })
    $("#urs_id").on("change", function(e) {
        buscarPagos($(this).val());
    })

    $("#formBuscarPagos").on("submit", function(e) {
        e.preventDefault();

        buscarPagos($("#urs_id").val());
    })

    $("#formAutorizarPagos").on("submit", function(e) {
        e.preventDefault();

        var datos = new FormData(this);
        datos.append("btnAutorizarPagos", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {

            },
            success: function(res) {
                toastr.success(res.mensaje, '¡Muy bien!');
                setTimeout(function() {
                    // window.location.href = res.pagina;
                }, 200)
            }
        });
    })

    function buscarPagos(urs_id) {

        if (urs_id != "") {
            $("#usr_id_save").val(urs_id)
        }

        var datos = new FormData()

        datos.append("urs_id", urs_id)
        datos.append("btnConsultarPagos", true)

        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {},
            success: function(res) {
                console.log(res)
                var tbodyPagos = "";
                var pgs_total = 0;
                var pgs_total_efectivo = 0;
                var pgs_total_banco = 0;
                var cobrador = "";
                res.forEach(pgs => {

                    if (urs_id != "") {
                        cobrador = pgs.usr_nombre;
                    }

                    pgs_total += Number(pgs.abs_monto);

                    if (pgs.abs_mp == 'EFECTIVO') {
                        pgs_total_efectivo += Number(pgs.abs_monto);
                    } else {
                        pgs_total_banco += Number(pgs.abs_monto);

                    }
                    tbodyPagos +=

                        `
                        <tr>
                        
                            <td>${pgs.abs_id}</td>
                            <td>${pgs.usr_nombre}</td>
                            <td>${pgs.ctr_cliente}</td>
                            <td>${pgs.ctr_numero_cuenta}</td>
                            <td>${$.number(pgs.ctr_saldo_actual,2)}</td>
                            <td>${$.number(pgs.abs_monto,2)}</td>
                            <td>${pgs.abs_mp}</td>
                            <td>${pgs.abs_referancia}</td>
                            <td>${pgs.abs_nota}</td>
                            <td>${pgs.abs_fecha_cobro}</td>
                        
                        <tr>
                    
                    `;

                });
                var fecha_text = $("#fecha_text").val();

                $("#usr_nombre").val(fecha_text + " " + cobrador);

                $("#tbodyPagos").html(tbodyPagos);
                $("#pgs_total").html($.number(pgs_total, 2));
                $("#pgs_total_efectivo").html($.number(pgs_total_efectivo, 2));
                $("#pgs_total_banco").html($.number(pgs_total_banco, 2));
            }
        });
    }
</script>