
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 12:00
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */



if (pagina == "pagos/new") {
    buscarAlumnoMatricula($("#usr_matricula").val())
    BuscarFichaPago($("#fpg_id").val())
    BuscarAbonoConcepto($("#ppg_concepto").val(), $("#fpg_id").val())
}




$("#formBuscarAlumnoPagos").on("submit", function (e) {

    e.preventDefault();
    var usr_matricula = $("#usr_matricula").val()
    var scl_sub_fijo = $("#scl_sub_fijo").val();
    buscarAlumnoMatricula(scl_sub_fijo + "" + usr_matricula)
})

function buscarAlumnoMatricula(usr_matricula = "") {

    var datos = new FormData();
    datos.append("usr_matricula", usr_matricula);
    datos.append("btnRevisarPagos", true)

    $.ajax({

        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
        },
        success: function (res) {

            if (res.status) {
                $("#usr_nombre_text").html(res.alumno);
                var contenido = "";

                if (res.data != "") {


                    res.data.forEach(fpg => {

                        contenido +=
                            `
                        <tr>
                            <td>${fpg.usr_matricula}</td>
                            <td>${fpg.usr_nombre} ${fpg.usr_app} ${fpg.usr_apm}</td>
                            
                            <td>${fpg.pqt_nombre}</td>
                            <td>${fpg.fpg_fecha_registro}</td>
                            <td>
                                 <a href="${urlApp + 'pagos/new/' + fpg.usr_matricula + '/' + fpg.fpg_id}" class="btn btn-warning btnAbonar" fpg_id="${fpg.fpg_id}"><i class="fa fa-money" aria-hidden="true"></i> Abonar</a>
                            </td>
                        </tr>

                    `
                    });
                    $("#tbodyDataPagosAlumnos").html(contenido);
                } else {

                    $("#tbodyDataPagosAlumnos").html(
                        `
                         <tr class="text-center">
                            <td colspan="5"> <strong> No hay registros </strong></td>
                        </tr>
                    
                    `);


                }
                toa

            } else {
                $("#tbodyDataPagosAlumnos").html('');
                $("#usr_nombre_text").html('');

                toastr.error(res.mensaje, '¡Error!')
            }
        },
    })
}
var dataDetalleAbono = "";

// $(".tablaAbonosAlumno tbody").on("click", ".btnAbonar", function () {
//     $("#rowDataPagosAlumnos").addClass('d-none');
//     $("#rowDataAbonosAlumnos").removeClass('d-none');

//     $("#usr_matricula").attr('readonly', true)

//     var fpg_id = $(this).attr("fpg_id");

//     BuscarFichaPago(fpg_id)


// })

$("#ppg_concepto").on("change", function () {


    var ppg_concepto = $(this).val();
    if (ppg_concepto == "") {
        toastr.error('Selecione un concepto', '¡Error!')
        $(".tbodyDataAbonosAlumnosConcepto").html('')
        return;
    }


    var fpg_id = $("#fpg_id").val()

    BuscarAbonoConcepto(ppg_concepto, fpg_id)

})

function BuscarAbonoConcepto(ppg_concepto = "", fpg_id = "") {
    var datos = new FormData();
    datos.append("ppg_concepto", ppg_concepto)
    datos.append("fpg_id", fpg_id)
    datos.append("btnBuscarAbonoConcepto", true)

    $.ajax({

        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
        },
        success: function (res) {

            var contenido = "";

            res.forEach(ppg => {

                contenido +=
                    `
                    <tr>

                        <td>${ppg.ppg_id}</td>
                        <td>${ppg.ppg_monto}</td>
                        <td>${ppg.ppg_mp}</td>
                        <td>${ppg.ppg_referencia}</td>
                        <td>${ppg.ppg_adeudo}</td>
                        <td>${ppg.ppg_fecha_registro}</td>
                        <td>${ppg.ppg_usuario_registro}</td>      
                    </tr>

                `;

            });

            $(".tbodyDataAbonosAlumnosConcepto").html(contenido)

            if (ppg_concepto == "PPG_INSCRIPCION") {

                $("#ppg_monto").val(dataDetalleAbono.PPG_INSCRIPCION.adeudo)
                $("#ppg_adeudo").val(dataDetalleAbono.PPG_INSCRIPCION.adeudo)
                $("#ppg_adeudo_text").html(dataDetalleAbono.PPG_INSCRIPCION.adeudo)
                $("#ppg_monto").focus();

            }
            if (ppg_concepto == "PPG_EXAMEN") {

                $("#ppg_monto").val(dataDetalleAbono.PPG_EXAMEN.adeudo)
                $("#ppg_adeudo").val(dataDetalleAbono.PPG_EXAMEN.adeudo)
                $("#ppg_adeudo_text").html(dataDetalleAbono.PPG_EXAMEN.adeudo)
                $("#ppg_monto").focus();

            }
            if (ppg_concepto == "PPG_GUIA") {

                $("#ppg_monto").val(dataDetalleAbono.PPG_GUIA.adeudo)
                $("#ppg_adeudo").val(dataDetalleAbono.PPG_GUIA.adeudo)
                $("#ppg_adeudo_text").html(dataDetalleAbono.PPG_GUIA.adeudo)
                $("#ppg_monto").focus();

            }
            if (ppg_concepto == "PPG_INCORPORACION") {

                $("#ppg_monto").val(dataDetalleAbono.PPG_INCORPORACION.adeudo)
                $("#ppg_adeudo").val(dataDetalleAbono.PPG_INCORPORACION.adeudo)
                $("#ppg_adeudo_text").html(dataDetalleAbono.PPG_INCORPORACION.adeudo)
                $("#ppg_monto").focus();

            }
            if (ppg_concepto == "PPG_CERTIFICADO") {

                $("#ppg_monto").val(dataDetalleAbono.PPG_CERTIFICADO.adeudo)
                $("#ppg_adeudo").val(dataDetalleAbono.PPG_CERTIFICADO.adeudo)
                $("#ppg_adeudo_text").html(dataDetalleAbono.PPG_CERTIFICADO.adeudo)
                $("#ppg_monto").focus();

            }
            if (ppg_concepto == "PPG_SEMANAL") {


                $("#ppg_adeudo").val(dataDetalleAbono.PPG_SEMANAL.adeudo)
                if (dataDetalleAbono.PPG_SEMANAL.adeudo <= 0)
                    $("#ppg_monto").val(0)

                else
                    $("#ppg_monto").val(dataDetalleAbono.PPG_SEMANAL.pago_semanal)




                $("#ppg_adeudo").val(dataDetalleAbono.PPG_SEMANAL.adeudo)
                $("#ppg_adeudo_text").html(dataDetalleAbono.PPG_SEMANAL.adeudo)
                $("#ppg_monto").focus();

            }

        }
    })
}

function BuscarFichaPago(fpg_id = "") {
    var datos = new FormData();
    datos.append('fpg_id', fpg_id)
    datos.append('btnBuscarFichaPago', true)
    $("#fpg_id").val(fpg_id)
    $.ajax({

        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
        },
        success: function (res) {


            dataDetalleAbono = res;

            $("#PPG_INSCRIPCION_TOTAL").html(res.PPG_INSCRIPCION.total)
            $("#PPG_INSCRIPCION_ADEUDO").html(res.PPG_INSCRIPCION.adeudo)

            $("#PPG_EXAMEN_TOTAL").html(res.PPG_EXAMEN.total)
            $("#PPG_EXAMEN_ADEUDO").html(res.PPG_EXAMEN.adeudo)

            $("#PPG_GUIA_TOTAL").html(res.PPG_GUIA.total)
            $("#PPG_GUIA_ADEUDO").html(res.PPG_GUIA.adeudo)

            $("#PPG_INCORPORACION_TOTAL").html(res.PPG_INCORPORACION.total)
            $("#PPG_INCORPORACION_ADEUDO").html(res.PPG_INCORPORACION.adeudo)

            $("#PPG_CERTIFICADO_TOTAL").html(res.PPG_CERTIFICADO.total)
            $("#PPG_CERTIFICADO_ADEUDO").html(res.PPG_CERTIFICADO.adeudo)

            $("#PPG_SEMANAL_TOTAL").html(res.PPG_SEMANAL.total)
            $("#PPG_SEMANAL_ADEUDO").html(res.PPG_SEMANAL.adeudo)
            $("#PPG_SEMANAL_PAGO").html(res.PPG_SEMANAL.pago_semanal)
        }
    })
}

// $("#formAbonoAlumno").on("submit", function (e) {

//     e.preventDefault();

//     if ($("#ppg_monto").val() <= 0) {
//         toastr.error('El monto no puede ser menor a 0', '¡Error!')
//         return;
//     }

//     if ($("#ppg_monto").val() > Number($("#ppg_adeudo").val())) {
//         toastr.error('El monto no puede ser mayor al adeudo', '¡Error!')
//         return;
//     }



//     swal({
//         title: "¿Estás seguro de realizar un abono?",
//         text: "Se realizará un abono de $ " + $("#ppg_monto").val() + " cuyo concepto es de " + $("#ppg_concepto").val(),
//         icon: "warning",
//         buttons: ['No, cancelar', 'Si, agregar abono'],
//         dangerMode: true,
//     })
//         .then((willDelete) => {
//             if (willDelete) {

//                 var datos = new FormData(this);
//                 datos.append("btnRegistrarAbono", true)

//                 $.ajax({

//                     url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
//                     method: "POST",
//                     data: datos,
//                     cache: false,
//                     contentType: false,
//                     processData: false,
//                     dataType: "json",
//                     beforeSend: function () {

//                     },
//                     success: function (res) {
//                         if (res.status) {
//                             toastr.success(res.mensaje, 'Muy bien!')

//                             BuscarFichaPago($("#fpg_id").val())
//                             BuscarAbonoConcepto($("#ppg_concepto").val(), $("#fpg_id").val())
//                             $("#ppg_mp").val("EFECTIVO")
//                             $("#ppg_referencia").val("")


//                         } else {
//                             toastr.error(res.mensaje, '¡Error!')

//                         }
//                     }
//                 })
//             } else {
//                 swal("!Vaya!", "Operación cancelada", "info");
//             }
//         });



// })

$("#formAbonoAlumno").on("submit", function (e) {

    e.preventDefault();





    swal({
        title: "¿Estás seguro de realizar un abono?",
        text: "Se realizará un abono de $ " + $("#vfch_monto").val(),
        icon: "warning",
        buttons: ['No, cancelar', 'Si, agregar abono'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData(this);
                datos.append("btnRegistrarAbono", true)

                $.ajax({

                    url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                    },
                    success: function (res) {
                        if (res.status) {

                            //toastr.success(res.mensaje, 'Muy bien!')

                            swal({
                                title: "!Muy bien¡",
                                text: res.mensaje,
                                icon: "success",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                                closeOnClickOutside: false,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        location.href = res.pagina
                                    } else {
                                        location.href = res.pagina
                                    }
                                });

                            // BuscarFichaPago($("#fpg_id").val())
                            // BuscarAbonoConcepto($("#ppg_concepto").val(), $("#fpg_id").val())
                            // $("#ppg_mp").val("EFECTIVO")
                            // $("#ppg_referencia").val("")


                        } else {
                            toastr.error(res.mensaje, '¡Error!')

                        }
                    }
                })
            } else {
                swal("!Vaya!", "Operación cancelada", "info");
            }
        });



})

$(".tableAddCart tbody").on("click", "button.btnAgregarPPG", function () {
    var identificador = $(this).attr("ppg_identificador")
    var concepto = $(this).attr("ppg_concepto")
    var adeudo = $(this).attr("ppg_adeudo")
    var ficha = $(this).attr("ppg_ficha")
    var monto = 0;

    if (identificador == "ins") {
        monto = Number($("#ppg_monto_inscripcion").val())
    }
    if (identificador == "exa") {
        monto = Number($("#ppg_monto_examen").val())
    }
    if (identificador == "gui") {
        monto = Number($("#ppg_monto_guia").val())
    }
    if (identificador == "inc") {
        monto = Number($("#ppg_monto_incorporacion").val())
    }
    if (identificador == "cer") {
        monto = Number($("#ppg_monto_certificado").val())
    }
    if (identificador == "sem") {
        monto = Number($("#ppg_monto_semanal").val())
    }

    // Validar que el monto sea mayor a 0 y menor igual que el adeudo

    if (monto <= 0 && adeudo > 0) {
        toastr.error('No puedes ingresar un cantidad 0', '¡Error!')
        return;
    }
    if (monto <= 0 && adeudo <= 0) {
        toastr.error('No es posible ingresar un abono, porque ya se termino de pagar', '¡Error!')
        return;
    }
    if (monto > adeudo) {
        toastr.error('Ingresa un monto entre 1 a ' + adeudo + ' que corresponde a la deuda de este concepto', '¡Error!')
        return;
    }

    var datos = new FormData();

    datos.append("identificador", identificador)
    datos.append("ppg_monto", monto)
    datos.append("ppg_adeudo", adeudo)
    datos.append("ppg_concepto", ficha)
    datos.append("ppg_descuento", $("#ppg_descuento").val())
    datos.append("ppg_ficha_pago", $("#fpg_id").val())
    datos.append("ppg_ficha_venta", $("#vfch_id").val())

    datos.append("btnAgregarPPG", true)

    $.ajax({

        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {

        },
        success: function (res) {
            //console.log(res)
            if (res.status) {
                listarCarrito()

                toastr.success(res.mensaje, 'Muy bien!')

            } else {
                toastr.error(res.mensaje, '¡Error!')

            }


        }
    })
})

$(".btnEmpezarFichaVenta").on("click", function () {
    var datos = new FormData()

    datos.append("btnEmpezarFichaVenta", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".btnEmpezarFichaVenta").attr("disabled", true)
            $(".btnEmpezarFichaVenta").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Creando ficha...`)
            $(".btnEmpezarFichaVenta").addClass('btn-warning')

        },
        success: function (res) {
            if (res.status) {
                $(".btnEmpezarFichaVenta").html('Ficha creada')
                $(".btnEmpezarFichaVenta").removeClass('btn-warning')

                $(".btnEmpezarFichaVenta").addClass('btn-success')
                $("#fieldest_1").attr("disabled", false)
                $("#vfch_id_fake").val(res.vfch_id)
                $("#vfch_id").val(res.vfch_id)

                toastr.success(res.mensaje, 'Muy bien!')



            } else {
                $(".btnEmpezarFichaVenta").attr("disabled", true)

                $(".btnEmpezarFichaVenta").html('Intentar de nuevo')
                $(".btnEmpezarFichaVenta").addClass('btn-danger')

                toastr.error(res.mensaje, '¡Error!')

            }




        },
    })
})

$(".tableCarrito tbody").on("click", "button.btnQuitarElementoCarrito", function () {
    var ppg_id = $(this).attr("ppg_id")

    var datos = new FormData()
    datos.append("btnQuitarElementoCarrito", true)
    datos.append("ppg_id", ppg_id)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {
            if (res) {
                listarCarrito()
            }
        }
    })
})

function listarCarrito() {
    var datos = new FormData()

    datos.append("ppg_ficha_pago", $("#fpg_id").val())
    datos.append("ppg_ficha_venta", $("#vfch_id").val())
    datos.append("vfch_descuento", $("#vfch_descuento").val())
    datos.append("btnListarCarrito", true)
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            $("#vfch_detalle_carrito").val(JSON.stringify(res))

            var sonido = new Audio(urlApp + 'app/assets/audio/scanner-beep-checkout.mp3')
            sonido.play()

            var contenido = "";
            var ppg_sub_total = 0;
            var ppg_total = 0;
            var ppg_monto_total = 0;
            res.forEach(ppg => {
                ppg_sub_total += Number(ppg.ppg_monto);
                if (Number(ppg.ppg_descuento) > 0) {
                    ppg_monto_total = (Number(ppg.ppg_monto)) - (Number(ppg.ppg_monto) * Number(ppg.ppg_descuento) / 100)
                } else {
                    ppg_monto_total = ppg.ppg_monto
                }
                // ppg_monto_total = (Number(ppg.ppg_monto)) - (Number(ppg.ppg_monto) * Number(ppg.ppg_descuento) / 100)
                ppg_total += Number(ppg_monto_total);

                contenido += `                             
                        <tr>
                            <td>${ppg.ppg_concepto}</td>
                            <td>${ppg.ppg_monto}</td>
                            <td>${ppg.ppg_descuento}</td>
                            <td>${ppg_monto_total}</td>
                            <td><button type="button" class="btn btn-outline-danger btnQuitarElementoCarrito btn-outline" ppg_id="${ppg.ppg_id}" ><i class="fa fa-times"></i></button></td>
                        </tr>
                    `
            });
            $("#tbodyCarrito").html(contenido)

            $("#vfch_sub_monto").val(ppg_sub_total)
            $("#vfch_monto").val(ppg_total)

        }
    })

}

$("#btnAplicarCupon").on("click", function () {
    var vfch_cupon = $("#vfch_cupon").val()
    var vfch_alumno = $("#vfch_alumno").val()
    var fpg_id = $("#fpg_id").val()
    var vfch_id = $("#vfch_id").val()

    if (vfch_cupon == "") {
        toastr.error('El campo cupón esta vacio', '¡Error!')
        return;
    }
    var datos = new FormData()

    datos.append("vfch_cupon", vfch_cupon)
    datos.append("vfch_alumno", vfch_alumno)
    datos.append("fpg_id", fpg_id)
    datos.append("vfch_id", vfch_id)
    datos.append("btnAplicarCupon", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Muy bien!')

                $("#ppg_descuento").val(JSON.stringify(res.data))
                $("#vfch_cupon").attr('readonly', true)

            } else {
                toastr.error(res.mensaje, '¡Error!')
            }

        }

    })
})

$(".tablasPagosAlumnos tbody").on("click", "button.btnCanelarFichaPago", function () {
    var vfch_id = $(this).attr("vfch_id");
    swal({
        title: "¿Estás seguro de realizar el proceso de cancelación?",
        text: "Se realizará una petición a los administradores para cancelar la ficha de pago # " + vfch_id,
        icon: "warning",
        buttons: ['No, cancelar', 'Si, cancelar ficha de pago'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal(" Escribe el motivo por el cual estás solicitando su cancelación", {
                    content: "input",
                })
                    .then((value) => {
                        if (value != "") {

                            var vfch_justificacion = value;

                            var datos = new FormData();

                            datos.append("vfch_id", vfch_id);
                            datos.append("vfch_justificacion", vfch_justificacion);
                            datos.append("btnCanelarFichaPago", true);

                            $.ajax({
                                type: "POST",
                                url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
                                data: datos,
                                cache: false,
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                beforeSend: function () {

                                },
                                success: function (res) {

                                    if (res.status) {


                                        swal({
                                            title: "!Muy bien¡",
                                            text: res.mensaje,
                                            icon: "success",
                                            buttons: [false, "Continuar"],
                                            dangerMode: true,
                                            closeOnClickOutside: false,
                                        })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = res.pagina
                                                } else {
                                                    location.href = res.pagina
                                                }
                                            });


                                    } else {
                                        swal({
                                            title: "!Error¡",
                                            text: res.mensaje,
                                            icon: "error",
                                            buttons: [false, "Continuar"],
                                            dangerMode: true,
                                            closeOnClickOutside: false,
                                        })
                                            .then((willDelete) => {
                                                if (willDelete) {
                                                    location.href = res.pagina
                                                } else {
                                                    location.href = res.pagina
                                                }
                                            });

                                    }
                                }
                            })



                        } else {
                            swal(`Debes de escribir el porqué`);

                        }
                    });
            }
        })
})


$(".btnCambioEstadoSolicitud").on("change", function () {


    var vfch_solicitud_cancelacion = $(this).val();
    var vfch_id = $(this).attr("vfch_id");

    swal({
        title: "¿Estás seguro de realizar está operación?",
        text: "Se realizara este aprobación / rechazo a la ficha # " + vfch_id,
        icon: "warning",
        buttons: ['No, cancelar', 'Si, continuar'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData()
                datos.append("vfch_solicitud_cancelacion", vfch_solicitud_cancelacion);
                datos.append("vfch_id", vfch_id);
                datos.append("btnCambioEstadoSolicitud", true);

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/pagos/pagos.ajax.php',
                    data: datos,
                    cache: false,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {

                    },
                    success: function (res) {

                        if (res.status) {

                            swal({
                                title: "!Muy bien¡",
                                text: res.mensaje,
                                icon: "success",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                                closeOnClickOutside: false,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        location.href = res.pagina
                                    } else {
                                        location.href = res.pagina
                                    }
                                });

                        } else {
                            swal({
                                title: "!Error¡",
                                text: res.mensaje,
                                icon: "error",
                                buttons: [false, "Continuar"],
                                dangerMode: true,
                                closeOnClickOutside: false,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        location.href = res.pagina
                                    } else {
                                        location.href = res.pagina
                                    }
                                });
                        }
                    }
                })
            }
        })

})