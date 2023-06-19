
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
                // $("#btn-actualizar-saldos").html(`<button type="button" class="btn btn-primary btn-block" id="btnActualizarSaldos">Actualizar</button>`);
                $("#ec_cliente").val(res.ctr_cliente);
                $("#ec_fecha_inicio").val(res.ctr_proximo_pago);


                $("#ctr_elaboro").val(res.ctr_elaboro);
                $("#ctr_id").val(res.ctr_id);
                $("#cra_contrato").val(res.ctr_id);

                $("#ec_precio").val($.number(res.ctr_total));
                $("#ec_enganche").val($.number(res.ctr_enganche));
                $("#ec_pago_adicional").val($.number(res.ctr_pago_adicional));
                $("#ec_pago").val($.number(res.ctr_pago_credito));
                $("#ec_saldo").val($.number(res.ctr_saldo));
                $("#ec_saldo_base").val(res.ctr_saldo_base);
                $("#ec_saldo_actual").val(res.ctr_saldo_actual);
                $("#abs_descuento").attr('max', res.ctr_saldo_actual)
                $("#ec_ultima_fecha").val(formatDateTime(res.ctr_ultima_fecha_abono));
                var total_pagado = res.ctr_total_pagado === null || res.ctr_total_pagado === 'null' ? 0 : res.ctr_total_pagado;

                $(".div-descuento").removeClass('d-none');
                var total_aux_pagado = Number(res.ctr_enganche) + Number(res.ctr_pago_adicional)

                if (res.ctr_forma_pago == "SEMANALES") {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.cra_fecha_cobro);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 7);

                    // var adeudo = Number((semanas * res.ctr_pago_credito - total_pagado)) + Number(res.ctr_pago_credito);
                    var adeudo = Number(semanas * res.ctr_pago_credito - total_pagado);

                    var adeudo_aux = adeudo;
                    if (adeudo_aux > 0) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    // var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    var semanas_atrasadas = semanas;
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Semanas <br> atrasadas");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - res.ctr_saldo_actual + total_aux_pagado)));
                }
                else if (res.ctr_forma_pago == "CATORCENALES") {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.cra_fecha_cobro);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 14);

                    // var adeudo = Number((semanas * res.ctr_pago_credito - total_pagado)) + Number(res.ctr_pago_credito);
                    var adeudo = Number(semanas * res.ctr_pago_credito - total_pagado);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    // var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    var semanas_atrasadas = semanas;
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Catorcenas <br> atrasadas");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - (res.ctr_saldo_actual + total_aux_pagado))));
                }
                else if (res.ctr_forma_pago == "QUINCENALES") {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.cra_fecha_cobro);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 15);

                    // var adeudo = Number((semanas * res.ctr_pago_credito - total_pagado)) + Number(res.ctr_pago_credito);
                    var adeudo = Number(semanas * res.ctr_pago_credito - total_pagado);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    // var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    var semanas_atrasadas = semanas;
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Quincenas <br> atrasadas");
                    $("#ec_total_pagado").val($.number(total_pagado));
                }
                else {
                    var ctr_saldo = Number(res.ctr_total - res.ctr_enganche - res.ctr_pago_adicional);
                    var semanas_credito = Number(Math.ceil(ctr_saldo / res.ctr_pago_credito));

                    var fecha_hoy = new Date();
                    var fecha = new Date(res.cra_fecha_cobro);

                    var diasdif = fecha_hoy.getTime() - fecha.getTime();
                    var dias = Math.round(diasdif / (1000 * 60 * 60 * 24));

                    //semanas del primer dia de pago hasta la fecha
                    var semanas = Math.ceil(dias / 30);

                    // var adeudo = Number((semanas * res.ctr_pago_credito - total_pagado)) + Number(res.ctr_pago_credito);
                    var adeudo = Number(semanas * res.ctr_pago_credito - total_pagado);

                    var adeudo_aux = adeudo;
                    if (semanas <= semanas_credito) {
                        $("#ec_adeudo_corriente").val($.number(adeudo_aux));
                    } else {
                        $("#ec_adeudo_corriente").val(0);
                    }
                    // var semanas_atrasadas = Number(Math.ceil(adeudo_aux / res.ctr_pago_credito));
                    var semanas_atrasadas = semanas;
                    $("#ec_atraso").val(semanas_atrasadas);
                    $("#label").html("Meses <br> atrasados");
                    $("#ec_total_pagado").val($.number(Number(ctr_saldo - res.ctr_saldo_actual + total_aux_pagado)));
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
                                var abs_id_contrato = "";
                                var abs_id_cobrador = "";

                                var saldo = Number($("#ec_saldo_actual").val());
                                res.forEach((element, index) => {

                                    var saldo_aux = '-';
                                    var boton = "-";
                                    var btn_foto = "";
                                    if (element.abs_estado_abono == 'AUTORIZADO') {
                                        saldo_aux = $.number(saldo, 2);
                                        boton = `<button class="btn btn-outline-danger btnCancelarAbono" abs_id="${element.abs_id}" abs_monto="${abs_monto}" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fa fa-times"></i></button>`;
                                    } else if (element.abs_estado_abono == 'DESCUENTO POR AUTORIZAR') {
                                        boton = `<button class="btn btn-outline-success btnVerificarDescuento" abs_id="${element.abs_id}" abs_codigo="${element.abs_codigo}" data-toggle="tooltip" data-placement="top" title="Autorizar descuento"><i class="fa fa-check"></i></button>`;
                                    }

                                    if (element.abs_foto_deposito != "") {
                                        btn_foto = `<a class="btn btn-link btnMostrarFotoDeposito" href="#" role="button" abs_foto_deposito="${element.abs_foto_deposito}"><i class="fa fa-eye"></i> Ver foto</a>`;
                                    }

                                    var usr_nombre = element.abs_mp == "DESCUENTO" ? "-" : element.usr_nombre

                                    tbody_estado_cuenta +=
                                        `
                                            <tr>
                                                <td>${element.abs_folio}</td>
                                                <td>${usr_nombre}</td>
                                                <td>${element.abs_fecha_cobro}</td>
                                                <td class="text-center">${element.abs_mp} <br> ${element.abs_referancia} <br> ${btn_foto}  </td>
                                                <td>${element.abs_nota}</td>
                                                <td>${$.number(element.abs_monto, 2)}</td>
                                                <td>${saldo_aux}</td>
                                                <td>${element.abs_estado_abono}</td>
                                                <td>${element.abs_motivo_cancelacion}</td>
                                                <td>
                                                    ${boton}
                                                </td>
                                            </tr>
                                            `;
                                    if (element.abs_estado_abono == 'AUTORIZADO') {
                                        saldo = Number(saldo) + Number(element.abs_monto);
                                    }
                                    abs_id_contrato = element.abs_id_contrato;
                                    abs_id_cobrador = element.abs_id_cobrador;


                                });




                                $("#tbody_estado_cuenta").html(tbody_estado_cuenta);
                                $("#abs_id_contrato").val(abs_id_contrato);
                                $("#abs_id_cobrador").val(abs_id_cobrador);

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
$(document).on("click", ".btnEliminarGasto", function () {
    var tgts_id = $(this).attr("tgts_id");
    swal({
        title: `¿Esta seguro de eliminar el ingreso #${tgts_id}?`,
        icon: "warning",
        buttons: ['No', 'Si, eliminar'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("tgts_id", tgts_id);
                datos.append("btnEliminarGasto", true);
                $.ajax({
                    url: urlApp + 'app/modulos/gastos/gastos.ajax.php',
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

$(".abs_codigo").hide();
$(".btnVerificar").hide();
$(document).on("click", ".btnCancelarAbono", function () {
    var abs_id = $(this).attr("abs_id");
    var datos = new FormData();
    datos.append('abs_id', abs_id);
    datos.append('btnBuscarCodigo', true);
    $.ajax({
        type: 'POST',
        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
        data: datos,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.abs_codigo != "") {
                $(".titulo").text("Verificar");
                $(".abs_codigo").show();
                $(".btnVerificar").show();
                $(".btnSolicitar").hide();
                $(".abs_motivo_cancelacion").hide();

                $("#abs_id").val(res.abs_id);
                $("#mdlCancelarAbono").modal("show");
            } else {
                $("#abs_id").val(abs_id);
                $(".titulo").text("Cancelar abono");

                $(".abs_codigo").hide();
                $(".btnVerificar").hide();
                $(".btnSolicitar").show();
                $(".abs_motivo_cancelacion").show();
                $("#mdlCancelarAbono").modal("show");
            }
        }
    });

})
$(document).on("click", ".btnSolicitar", function () {
    var abs_id = $("#abs_id").val();
    var abs_motivo_cancelacion = $("#abs_motivo_cancelacion").val();

    if (abs_motivo_cancelacion == "") {
        $("#abs_motivo_cancelacion").focus();
        return toastr.error("El motivo de cancelación es obligatorio", '¡ERROR!');
    }
    var datos = new FormData();
    datos.append('abs_id', abs_id);
    datos.append('abs_motivo_cancelacion', abs_motivo_cancelacion);
    datos.append('btnSolicitar', true);
    $.ajax({
        type: 'POST',
        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
        data: datos,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            stopLoadButton();
            if (res.status) {
                toastr.success(res.mensaje, '¡Muy bien!');
                $(".titulo").text("Verificar");
                $(".abs_codigo").show();
                $(".btnVerificar").show();
                $(".btnSolicitar").hide();
                $(".abs_motivo_cancelacion").hide();

            }
        }
    });
});

$(document).on("click", ".btnVerificar", function () {
    var abs_id = $("#abs_id").val();
    var abs_codigo = $("#abs_codigo").val();
    if (abs_codigo == "") {
        $("#abs_codigo").focus();
        return toastr.error("El código es obligatorio", '¡ERROR!');
    }
    var datos = new FormData();
    datos.append('abs_id', abs_id);
    datos.append('abs_codigo', abs_codigo);
    datos.append('btnVerificar', true);
    $.ajax({
        type: 'POST',
        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
        data: datos,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.status) {
                toastr.success(res.mensaje, '¡Muy bien!');
                $("#abs_id").val("");
                $("#abs_codigo").val("");
                $("#abs_motivo_cancelacion").val("");
                $(".titulo").text("Cancelar abono");

                $(".abs_codigo").hide();
                $(".btnVerificar").hide();
                $(".btnSolicitar").show();
                $(".abs_motivo_cancelacion").show();
                $("#mdlCancelarAbono").modal("hide");

                mostrarEstado();

            } else {
                toastr.error(res.mensaje, '¡ERROR!');
            }
        }
    });
});

$("#formAplicarDesto").on('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append('btnAplicarDesto', true);
    $.ajax({
        type: 'POST',
        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
        data: datos,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.status) {
                toastr.success(res.mensaje, '¡Muy bien!');
                $("#formAplicarDesto")[0].reset();
                mostrarEstado();
            } else {
                toastr.error(res.mensaje, '¡ERROR!');

            }
        }
    });
})

$(document).on('click', '.btnVerificarDescuento', function () {
    var abs_id_descuento = $(this).attr("abs_id");
    $("#abs_id_descuento").val(abs_id_descuento);
    $("#mdlVerificarDescuento").modal("show");
    $("#abs_codigo_descuento").focus();

});

$(document).on('click', '.btnAprobarDescuento', function () {
    var abs_id_descuento = $("#abs_id_descuento").val();
    var abs_codigo_descuento = $("#abs_codigo_descuento").val();
    if (abs_codigo_descuento == "") {
        $("#abs_codigo_descuento").focus();
        return toastr.error("El código es obligatorio", '¡ERROR!');
    }
    var datos = new FormData()
    datos.append('abs_id', abs_id_descuento);
    datos.append('abs_codigo', abs_codigo_descuento);
    datos.append('btnAprobarDescuento', true);
    $.ajax({
        type: 'POST',
        url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
        data: datos,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.status) {
                toastr.success(res.mensaje, '¡Muy bien!');
                $("#mdlVerificarDescuento").modal("hide");
                mostrarEstado();
            } else {
                toastr.error(res.mensaje, '¡ERROR!');
            }
        }
    });
});

$(document).on('click', '.btnMostrarFotoDeposito', function () {
    var abs_foto_deposito = $(this).attr("abs_foto_deposito");
    $("#abs_foto_deposito").attr("src", abs_foto_deposito);
    $("#mdlVerFotoDeposito").modal("show");
});
