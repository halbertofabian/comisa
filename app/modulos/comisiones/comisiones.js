
/**
 *  Desarrollador: 
 *  Fecha de creación: 13/04/2021 11:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#btnRepComision").on("click", function () {

    var id_igs_usuario_responsable = $("#id_igs_usuario_responsable").val()
    var date_inicio = $("#igs_fecha_inicio").val() + "T00:00";
    var date_fin = $("#igs_fecha_fin").val() + "T23:59";

    var datos = new FormData();
    datos.append("id_usr", id_igs_usuario_responsable);
    datos.append("date_inicio", date_inicio);
    datos.append("date_fin", date_fin);
    datos.append("btnRepComision", true);

    if (id_igs_usuario_responsable == "") {
        toastr.warning("Por favor, seleccione un usuario", "ADVERTENCIA")
        return;
    }

    if (date_inicio == "") {
        toastr.warning("Por favor, completa el campo de fecha inicio", "ADVERTENCIA")
        return;
    }
    if (date_fin == "") {
        toastr.warning("Por favor, completa el campo de fecha fin", "ADVERTENCIA")
        return;
    }


    $.ajax({

        url: urlApp + 'app/modulos/comisiones/comisiones.ajax.php',
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
            stopLoadButton('Buscar')
            if (respuesta != "") {
                var tblDatos = ""
                var tblDebe = ""
                var sumacobro = 0
                var sumadescuento = 0
                var comision = 0;
                var cobros = respuesta.cobro
                var gastos = respuesta.debe

                var com_cobranza = $("#com_cobranza").val()
                var com_cobranza_cc = $("#com_cobranza_credicontado").val()
                var com_contado = $("#com_contado").val()
                var com_se = $("#com_se").val()
                var usr_imss = 0;
                var usr_deuda_int = 0;
                cobros.forEach(inf => {
                    var com = 0;
                    usr_imss = inf.usr_imss;
                    usr_deuda_int = inf.usr_deuda_int;

                    if (inf.igs_tipo == 'COBRANZA') {
                        com = inf.igs_monto * com_cobranza / 100;
                    } else if (inf.igs_tipo == 'COBRANZA_CREDICONTADO') {
                        com = inf.igs_monto * com_cobranza_cc / 100;
                    } else if (inf.igs_tipo == 'CONTADO_VENTAS') {
                        com = inf.igs_monto * com_contado / 100;
                    } else if (inf.igs_tipo == 'S/E_VENTAS') {
                        com = inf.igs_monto * com_se / 100;
                    }
                    comision += com;
                    tblDatos +=
                        `
                        <tr>
                        <td></td>
                
                        <td>${inf.igs_fecha_registro}</td>
                        <td>${inf.igs_usuario_registro}</td>
                        <td>${inf.igs_mp}</td>
                        <td>${inf.igs_referencia}</td>
                        <td>${inf.igs_monto}</td>
                        <td>${com}</td>
                        <td>${inf.igs_concepto}</td>
                        <td>${inf.igs_tipo}</td>
                        <td>${inf.usr_nombre}</td>
                        </tr>
                    `;
                    sumacobro = sumacobro + Number(inf.igs_monto);
                });
                $("#tblComisiones").html(tblDatos);
                $("#igs_cobro").val(sumacobro);
                // porcentaje = $("#igs_Porcentajecomision").val();
                $("#igs_comision").val(comision);

                gastos.forEach(infdebe => {
                    tblDebe +=
                        `<tr>
                        <td>${infdebe.tgts_id}</td>
                        <td>${infdebe.tgts_fecha_gasto}</td>
                        <td>${infdebe.tgts_concepto}</td>

                        <td>${infdebe.tgts_cantidad}</td>
                        </tr>
                    `;
                    sumadescuento = sumadescuento + Number(infdebe.tgts_cantidad);

                });
                $("#tblDebe").html(tblDebe);
                $("#igs_descuento").val(sumadescuento);
                $("#igs_descuento_imss").val(usr_imss)
                $("#igs_deuda_int").val(usr_deuda_int)

                
                var igs_deuda_int = $("#igs_deuda_int").val()
                var igs_descuento_imss = $("#igs_descuento_imss").val()


                $("#igs_Apagar").val(comision - sumadescuento - igs_descuento_imss - igs_deuda_int);

                var igs_Apgar = $("#igs_Apagar").val()
                var igs_abono_deuda = $("#igs_abono_deuda").val()

                var igs_pago = igs_Apgar - igs_abono_deuda;
               
                if (igs_Apgar < 0) {
                    $("#igs_pagox").val("0.00");

                } else {
                    $("#igs_pagox").val(igs_pago);

                }

                $("#igs_deuda_ext").val(respuesta.deuda_ext.usr_deuda_ext);


            } else {
                alert("sin datos para mostrar");
            }
            // console.log(respuesta)

        }
    })

})

// $("#igs_Porcentajecomision").on("keyup", function () {
//     porcentaje = $(this).val();
//     sumacobro = $("#igs_cobro").val();
//     gastosDescuento = $("#igs_descuento").val();
//     comision = (Number(sumacobro) * Number(porcentaje)) / 100;
//     $("#igs_comision").val(comision);

//     $("#igs_Apagar").val(comision - Number(gastosDescuento));


// })

$("#igs_abono_deuda,#igs_Apagar").on("keyup", function () {
    //console.log("aquiii");

    var igs_Apgar = $("#igs_Apagar").val();
    var igs_abono_deuda = $("#igs_abono_deuda").val();

    var igs_pago = Number(igs_Apgar) - Number(igs_abono_deuda);

    $("#igs_pagox").val(igs_pago);

   

    var igs_nueva_deuda = $("#igs_nueva_deuda").val();
    var igs_deuda_ext = $("#igs_deuda_ext").val();

    igs_nueva_deuda = Number(igs_deuda_ext) - Number(igs_abono_deuda);
    $("#igs_nueva_deuda").val(igs_nueva_deuda);
})


$("#formCalculoComisiones").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);


    datos.append("btnCalcularComisiones", true)

    swal({
        title: "¿Seguro de querer agregar esta comisión?",
        text: "PAGO: " + $("#igs_pagox").val() + " \n DEUDA EXTERNA: " + $("#igs_deuda_ext").val() + " \n DEUDA INTERNA: " + $("#igs_deuda_int").val() + " \n ABONO: " + $("#igs_abono_deuda").val() + " \n NUEVA DEUDA: " + Number($("#igs_nueva_deuda").val()),
        icon: "warning",
        buttons: ["No, cancelar", "Si, continuar"],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({

                    url: urlApp + 'app/modulos/comisiones/comisiones.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                        startLoadButton()

                    },
                    success: function (res) {

                        if (res.status) {
                            toastr.success(res.mensaje, "¡Muy bien!")
                            stopLoadButton('Rediriendo a mi caja....')
                            $("#btnCalcularComisiones").attr("disabled", true)

                            setTimeout(function () {
                                location.href = res.pagina
                            }, 1000);
                        } else {
                            stopLoadButton("Intentar de nuevo")
                            toastr.error(res.mensaje, "¡Error!")
                            setTimeout(function () {
                                location.href = res.pagina
                            }, 3000);
                        }
                    }
                })
            }
        })




})