
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 18/08/2021 12:07
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
$(document).ready(function () {
    $("#formActualizarSaldos").on("submit", function (e) {
        e.preventDefault()
        var excel = $("#input_saldos").val()
        if (excel == "") {
            return swal("Error", "Seleccione un archivo excel", "error");
        }
        swal({
            title: "¿Estas seguro de querer importar la lista de saldos?",
            text: "Asegurate de tener el archivo con los requerimientos solicitados",
            icon: "info",
            buttons: ["Calcelar", "Si, importar lista"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var datos = new FormData()

                    var files = $("#input_saldos")[0].files[0]

                    datos.append("btnImportarSaldos", true)
                    datos.append("archivoExcel", files)


                    $.ajax({

                        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {

                            startLoadButton()


                        },
                        success: function (respuesta) {
                            stopLoadButton('Importar clientes')

                            if (respuesta.status) {

                                swal({
                                    title: respuesta.mensaje,
                                    text: "Se actualizaron " + respuesta.update + " cuentas ",
                                    icon: "success",
                                    buttons: [false, "OK"],
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        } else {


                                        }
                                    })

                            } else {

                                swal({
                                    title: "Error",
                                    text: respuesta.mensaje,
                                    icon: "error",
                                    buttons: [false, "Intentar de nuevo"],
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        } else {
                                            window.location.reload();

                                        }
                                    })

                            }

                        }
                    })
                }
            });
    })
});

function mostrarEstado() {
    var ec_ruta = $("#ec_ruta").val();
    var ec_cuenta = $("#ec_cuenta").val();

    if (ec_cuenta == "") {
        toastr.warning("La cuenta es obligatoria", "¡ADVERTENCIA!");
        return false;
    }

    var datos = new FormData();
    datos.append("ec_ruta", ec_ruta);
    datos.append("ec_cuenta", ec_cuenta);
    datos.append("btn_consultar_cuenta", true);
    $.ajax({
        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            // startLoadButton()

        },
        success: function (res) {
            if (res == false) {
                toastr.error(`El numero de cuenta <strong>${ec_cuenta}</strong> no existe, verifica por favor si es correcto`, "ERROR");
                $('input[type="text"]').val('');
                $('input[type="date-time"]').val('');
                $("#btn-export-pdf").html("");
                $("#btn-actualizar-saldos").html("");
            } else {
                $("#btn-export-pdf").html(`<a target="_blank" href="${urlApp}app/report/reporte-estado-cuenta.php?ec_ruta=${ec_ruta}&ec_cuenta=${ec_cuenta}" class="btn btn-success btn-block mb-2">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar
        </a>`);
                $("#btn-actualizar-saldos").html(`<button type="button" class="btn btn-primary btn-block" id="btnActualizarSaldos">Actualizar</button>`);
                $("#ec_cliente").val(res.ctr_cliente);
                $("#ec_fecha_inicio").val(res.ctr_proximo_pago);


                $("#ctr_elaboro").val(res.ctr_elaboro);
                $("#ctr_id").val(res.ctr_id);
                $("#ec_precio").val($.number(res.ctr_total));
                $("#ec_enganche").val($.number(res.ctr_enganche));
                $("#ec_pago_adicional").val($.number(res.ctr_pago_adicional));
                $("#ec_pago").val($.number(res.ctr_pago_credito));
                $("#ec_saldo").val($.number(res.ctr_saldo));
                $("#ec_saldo_base").val(res.ctr_saldo_base);
                $("#ec_saldo_actual").val(res.ctr_saldo_actual);
                $("#ec_ultima_fecha").val(res.ctr_ultima_fecha_abono);

                if (res.ctr_forma_pago == "SEMANALES") {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.ctr_proximo_pago);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 7);

                    var adeudo = Number((semanas * res.ctr_pago_credito - res.ctr_total_pagado)) + Number(res.ctr_pago_credito);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Semanas <br> atrasadas");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - res.ctr_saldo_actual)));
                }
                else if (res.ctr_forma_pago == "CATORCENALES") {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.ctr_proximo_pago);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 14);

                    var adeudo = Number((semanas * res.ctr_pago_credito - res.ctr_total_pagado)) + Number(res.ctr_pago_credito);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Catorcenas <br> atrasadas");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - res.ctr_saldo_actual)));
                }
                else if (res.ctr_forma_pago == "QUINCENALES") {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.ctr_proximo_pago);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 15);

                    var adeudo = Number((semanas * res.ctr_pago_credito - res.ctr_total_pagado)) + Number(res.ctr_pago_credito);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Quincenas <br> atrasadas");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - res.ctr_saldo_actual)));
                }
                else {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.ctr_proximo_pago);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 30);

                    var adeudo = Number((semanas * res.ctr_pago_credito - res.ctr_total_pagado)) + Number(res.ctr_pago_credito);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Meses <br> atrasados");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - res.ctr_saldo_actual)));
                }

                var datos2 = new FormData();
                datos2.append("ctr_id", res.ctr_id);
                datos2.append("btn_consultar_cuenta2", true);
                $.ajax({
                    url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                    method: "POST",
                    data: datos2,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                        // startLoadButton()

                    },
                    success: function (res) {
                        var datos3 = new FormData();
                        datos3.append("cra_id", res.cra_id);
                        datos3.append("btn_consultar_cuenta3", true);
                        $.ajax({
                            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                            method: "POST",
                            data: datos3,
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            beforeSend: function () {
                                // startLoadButton()

                            },
                            success: function (res) {
                                var tbody_estado_cuenta = "";
                                res.forEach(element => {
                                    tbody_estado_cuenta +=
                                        `
                                    <tr>
                                        <td>${element.abs_fecha_cobro}</td>
                                        <td>${$.number(element.abs_monto)}</td>
                                        <td></td>
                                    </tr>
                            `;
                                });
                                $("#tbody_estado_cuenta").html(tbody_estado_cuenta);

                            }
                        })

                    }
                })
            }
        }
    });
}

$("#form_consultar_cuenta").on("submit", function (e) {
    e.preventDefault();
    mostrarEstado();

});

$(document).on("click", "#btnActualizarSaldos", function () {
    var ctr_id = $("#ctr_id").val();
    var ec_ruta = $("#ec_ruta").val();
    var ec_cuenta = $("#ec_cuenta").val();
    var ec_saldo_base = $("#ec_saldo_base").val();
    var ec_saldo_actual = $("#ec_saldo_actual").val();

    swal({
        title: "¿Esta seguro de actualizar el saldo base y saldo actual?",
        icon: "warning",
        buttons: ['No', 'Si, actualizar'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("ctr_id", ctr_id);
                datos.append("ec_saldo_base", ec_saldo_base);
                datos.append("ec_saldo_actual", ec_saldo_actual);
                datos.append("btnActualizarSaldos", true);
                $.ajax({
                    url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        if (res.status) {
                            swal({
                                title: "¡Bien!", text: res.mensaje, type: "success", icon: "success"
                            }).then(function () {
                                $("#ec_ruta").val(ec_ruta);
                                $("#ec_cuenta").val(ec_cuenta);
                                $("#btn_consultar_cuenta").click();
                            });

                        } else {
                            swal("¡Error!", res.mensaje, "error");
                        }
                    }
                })
            }
        });
});

$(document).on("click", ".btnEliminarIngreso", function () {
    var igs_id = $(this).attr("igs_id");
    swal({
        title: `¿Esta seguro de eliminar el ingreso #${igs_id}?`,
        icon: "warning",
        buttons: ['No', 'Si, eliminar'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("igs_id", igs_id);
                datos.append("btnEliminarIngreso", true);
                $.ajax({
                    url: urlApp + 'app/modulos/ingresos/ingresos.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        if (res.status) {
                            swal({
                                title: "¡Bien!", text: res.mensaje, type: "success", icon: "success"
                            }).then(function () {
                                window.location.reload();
                            });

                        } else {
                            swal("¡Error!", res.mensaje, "error");
                        }
                    }
                })
            }
        });
});