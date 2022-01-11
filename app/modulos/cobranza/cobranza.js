
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

$("#btn_consultar_cuenta").on("click", function () {
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
            $("#btn-export-pdf").html(`<a target="_blank" href="${urlApp}app/report/reporte-estado-cuenta.php?ec_ruta=${ec_ruta}&ec_cuenta=${ec_cuenta}" class="btn btn-success btn-block">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar
        </a>`);
            $("#ec_cliente").val(res.ctr_cliente);
            $("#ec_fecha_inicio").val(res.ctr_proximo_pago);


            $("#ec_precio").val($.number(res.ctr_total));
            $("#ec_enganche").val($.number(res.ctr_enganche));
            $("#ec_pago_adicional").val($.number(res.ctr_pago_adicional));
            $("#ec_pago").val($.number(res.ctr_pago_credito));
            $("#ec_saldo").val($.number(res.ctr_saldo));
            $("#ec_saldo_base").val($.number(res.ctr_saldo_base));
            $("#ec_saldo_actual").val($.number(res.ctr_saldo_actual));
            $("#ec_ultima_fecha").val(res.ctr_ultima_fecha_abono);

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
    });
});

