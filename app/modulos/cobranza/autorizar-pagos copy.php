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
        <div class="col-md-12" style="overflow-y:scroll; height:500px">
            <table class="table table-striped table-bordered tablePagos">
                <thead>
                    <tr class="text-center">
                        <th></th>
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
    <div class="row d-none savePago">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <form id="formAutorizarPagos" method="post">
                <div class="form-group">
                    <label for="">Guardar como... </label>
                    <input type="text" class="form-control" value="" name="igs_total_efectivo" id="igs_total_efectivo">
                    <input type="text" class="form-control" value="" name="igs_total_banco" id="igs_total_banco">
                    <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" value="<?= fechaCastellano(FECHA_ACTUAL) ?>">
                    <input type="hidden" name="usr_id" id="usr_id_save" value="">
                    <input type="hidden" id="fecha_text" value="<?= fechaCastellano(FECHA_ACTUAL) ?>">
                    <button class="btn btn-primary float-right mt-1 btnAutorizarPagos">Guardar y autorizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlBanco" tabindex="-1" role="dialog" aria-labelledby="mdlBancoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlBancoLabel">Asignar cuenta de banco</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAsignarCuentaBanco" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="abs_cuenta_e">Cuenta</label>
                                <select class="form-control " name="abs_cuenta_e" id="abs_cuenta_e" required>

                                    <option value="">Seleccione una cuenta</option>
                                    <?php
                                    $cuentas = CuentasModelo::mdlMostrarCuentas();
                                    foreach ($cuentas as $key => $cbco) : ?>

                                        <option value="<?php echo $cbco['cbco_id'] ?>"><?php echo $cbco['cbco_nombre'] ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="abs_referencia_e">Referencia</label>
                            <input type="text" name="abs_referencia_e" id="abs_referencia_e" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" name="abs_id_e" id="abs_id_e">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right">Asignar cuenta</button>
                        </div>
                    </div>
                </form>
            </div>

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

        swal({
                title: "¿Estas seguro de autorizar estos cobros?",
                text: "Esta acción no es revercible",
                icon: "warning",
                buttons: ['No', 'Si, autorizo'],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
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

                            $(".btnAutorizarPagos").html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Cargando...`);
                            $(".btnAutorizarPagos").attr('disabled', true)

                        },
                        success: function(res) {
                            if (res.status) {
                                toastr.success(res.mensaje, '¡Muy bien!');
                                setTimeout(function() {
                                    window.open(res.pagina, '_blank');
                                window.location.href = res.pagina2

                                }, 200)
                                $('#urs_id').val("").trigger('change');
                                buscarPagos("");
                            } else {
                                toastr.error(res.mensaje, '¡Error!');

                            }
                            $(".btnAutorizarPagos").attr('disabled', false)
                            $(".btnAutorizarPagos").html(`Guardar y autorizar`);
                        }
                    });
                }
            });


    })


    $(".tablePagos tbody").on("click", "button.btnCancelarPago", function() {
        var abs_id = $(this).attr("abs_id");
        // var usr_id = $(this).attr("usr_id");
        // var usr_nombre = $(this).attr("usr_nombre");
        swal({
                title: "¿Estás seguro de cancelar este pago?",
                text: "Esta accion no es reversible",
                icon: "warning",
                buttons: ["No, cancelar", "Si, confirmar "],
                dangerMode: false,
                closeOnClickOutside: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    swal("Esctibe el motivo por el cúal estas cancelado este pago", {
                            content: {
                                element: "input",
                                attributes: {
                                    type: "text",
                                    value: "",
                                },
                            },
                        })
                        .then((abs_motivo_cancelacion) => {
                            if (abs_motivo_cancelacion == "") {
                                toastr.error('Error', 'Escribe el motivo...')
                            } else {
                                var datos = new FormData();

                                datos.append("btnCancelarPago", true);
                                datos.append("abs_motivo_cancelacion", abs_motivo_cancelacion)
                                datos.append("abs_id", abs_id)
                                // datos.append("usr_id", usr_id)


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

                                        if (res.status) {

                                            toastr.success(res.mensaje, '¡Muy bien!');
                                            setTimeout(function() {
                                                buscarPagos($("#urs_id").val());
                                            }, 200)


                                        } else {

                                            toastr.error(res.mensaje, '¡Error!');
                                            setTimeout(function() {
                                                buscarPagos($("#urs_id").val());
                                            }, 200)

                                        }

                                    }
                                })
                            }
                        });

                }
            })
    })



    function buscarPagos(urs_id) {

        if (urs_id != "") {
            $("#usr_id_save").val(urs_id)
            $(".savePago").removeClass("d-none");
        } else {
            $(".savePago").addClass("d-none");
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

                    var buttonAgregarCuenta = "";
                    var buttonCancelar = "";
                    if (urs_id != "") {
                        cobrador = pgs.usr_nombre;
                        buttonCancelar = `<button type="button" class="btn btn-outline-danger btnCancelarPago" abs_id="${pgs.abs_id}">CANCELAR</button>`;
                    }

                    pgs_total += Number(pgs.abs_monto);

                    if (pgs.abs_mp == 'EFECTIVO') {
                        pgs_total_efectivo += Number(pgs.abs_monto);
                    } else {
                        pgs_total_banco += Number(pgs.abs_monto);

                        buttonAgregarCuenta = `<button class="btn btn-sm btn-link text-danger btnModCuentaBanco" abs_id="${pgs.abs_id}" abs_cuenta="${pgs.abs_cuenta_id}" abs_referencia="${pgs.abs_referancia}" >Cuenta de banco</button>`;

                    }
                    tbodyPagos +=

                        `
                        <tr>
                        
                            <td>${buttonCancelar}</td>
                            <td>${pgs.abs_id}</td>
                            <td>${pgs.usr_nombre}</td>
                            <td>${pgs.ctr_cliente}</td>
                            <td>${pgs.ctr_numero_cuenta}</td>
                            <td>${$.number(pgs.ctr_saldo_actual,2)}</td>
                            <td>${$.number(pgs.abs_monto,2)}</td>
                            <td>
                            ${pgs.abs_mp} <br>
                            <strong class="text-primary"> ${pgs.abs_cuenta_text} </strong> <br>
                            ${buttonAgregarCuenta}
                            </td>
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

                $("#igs_total_efectivo").val(pgs_total_efectivo)
                $("#igs_total_banco").val(pgs_total_banco)
            }
        });
    }

    $(".tablePagos tbody").on("click", "button.btnModCuentaBanco", function() {
        $('#mdlBanco').modal('show')
        var abs_id = $(this).attr('abs_id');
        var abs_cuenta = $(this).attr('abs_cuenta');
        var abs_referencia = $(this).attr('abs_referencia');
        $("#abs_id_e").val(abs_id)
        // $("#abs_cuenta_e").val(abs_cuenta)
        $('#abs_cuenta_e').val(abs_cuenta).trigger('change');
        $("#abs_referencia_e").val(abs_referencia)
    });


    $("#formAsignarCuentaBanco").on("submit", function(e) {
        e.preventDefault();

        var datos = new FormData(this)
        datos.append("btnAsignarCuentaBanco", true);
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
                if (res) {

                    toastr.success('Cuenta agregada', '¡Muy bien!');
                    setTimeout(function() {
                        buscarPagos($("#urs_id").val());
                    }, 200)
                    // buscarPagos($("#urs_id").val());

                }
                $('#mdlBanco').modal('hide')

            }
        })
    })
</script>