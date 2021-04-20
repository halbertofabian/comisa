
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/01/2021 03:01
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


// $(document).ready(function () {
//     var flujo_usr = $("#flujo_usr").val();
//     buscarFlujoCaja(flujo_usr)
// })

$("#igs_mp").on("change", function () {

    var igs_mp = $(this).val()



    if (igs_mp != 'EFECTIVO') {
        $("#content-cuenta").removeClass("d-none");
        $("#igs_referencia").val("");
        $("#igs_cuenta").val("");
    } else {
        $("#content-cuenta").addClass("d-none");
        $("#igs_referencia").val("");
        $("#igs_cuenta").val("");
    }

})



$("#copn_id_caja").on("change", function () {
    var cja_id_caja = $(this).val();
    var datos = new FormData()

    datos.append("cja_id_caja", cja_id_caja)
    datos.append("btnBuscarCajaSaldo", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/cajas/cajas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            $("#copn_ingreso_inicio").val(res.cja_saldo);

        }
    })
})



$("#flujo_usr").on("change", function () {
    var flujo_usr = $("#flujo_usr").val();
    buscarFlujoCaja(flujo_usr)
})



function buscarIngesosByCaja(igs_id_corte, usr_id) {
    var datos = new FormData();
    datos.append("btnConsultarIngresosByCaja", true)
    datos.append("igs_id_corte", igs_id_corte)
    datos.append("usr_id", usr_id)
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ingresos/ingresos.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            var datos = "";

            var igs_efectivo = 0;
            var igs_banco = 0;

            res.forEach(igs => {

                if (igs.igs_mp == 'EFECTIVO') {
                    igs_efectivo += Number(igs.igs_monto);

                }
                if (igs.igs_mp != 'EFECTIVO') {
                    igs_banco += Number(igs.igs_monto);
                }

                datos +=
                    `
                    <tr id="marcador_igs_${igs.igs_id}" class="row_click">
                    
                        <td>${igs.igs_id}</td>
                        <td>${igs.igs_usuario_registro}</td>
                        <td>${igs.igs_fecha_registro}</td>
                        <td>${igs.igs_monto}</td>
                        <td>${igs.igs_mp}</td>
                        <td>${igs.igs_concepto}  ${igs.igs_tipo}</td>
                        <td>${igs.usr_nombre}</td>
                        <td class="text-center"> 
                        <input type="checkbox" class="chx_marcador_ingresos" marcador="${igs.igs_id}" > 
                        </td>
                        
                    
                    </tr>
                
                `;

            });


            $("#tbodyIngresos").html(datos);
            $("#igs_efectivo").html(igs_efectivo);
            $("#igs_banco").html(igs_banco);
            $("#igs_efectivo_input").val(igs_efectivo);
            $("#igs_banco_input").val(igs_banco);

            var totalEfectivo = $("#igs_efectivo_input").val() - $("#tgts_efectivo_input").val()
            $("#total_efectivo_input").val(totalEfectivo)
            $("#total_efectivo").html(totalEfectivo)

            $("#copn_ingreso_efectivo").val(totalEfectivo)
            $("#copn_saldo").val(totalEfectivo)


            var totalBanco = $("#igs_banco_input").val() - $("#tgts_banco_input").val()
            $("#total_banco_input").val(totalBanco)
            $("#total_banco").html(totalBanco)
            $("#copn_ingreso_banco").val(totalBanco)


            $("#total_ing").html(Number($("#igs_efectivo_input").val()) + Number($("#igs_banco_input").val()))

            $("#total_gts").html(Number($("#tgts_efectivo_input").val()) + Number($("#tgts_banco_input").val()))

            $("#total").html(Number(totalEfectivo) + Number(totalBanco))



        }
    })

}



$(".table-igs tbody ").on("click", ".chx_marcador_ingresos", function () {
    var marcador = $(this).attr("marcador")



    if ($(this).prop('checked')) {
        $("#marcador_igs_"+marcador).addClass("bg-info")
    } else {

        $("#marcador_igs_"+marcador).removeClass("bg-info")

    }
})

$(".table-gts tbody ").on("click", ".chx_marcador_gastos", function () {
    var marcador = $(this).attr("marcador")



    if ($(this).prop('checked')) {
        $("#marcador_gts_"+marcador).addClass("bg-info")
    } else {

        $("#marcador_gts_"+marcador).removeClass("bg-info")

    }
})


function buscarGastosByCaja(tgts_id_corte, usr_id) {
    var datos = new FormData();
    datos.append("btnConsultarGastosByCaja", true)
    datos.append("tgts_id_corte", tgts_id_corte)
    datos.append("usr_id", usr_id)
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/gastos/gastos.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            var datos = "";

            var tgts_efectivo = 0;
            var tgts_banco = 0;

            res.forEach(tgts => {

                if (tgts.tgts_mp == 'EFECTIVO') {
                    tgts_efectivo += Number(tgts.tgts_cantidad);
                }
                if (tgts.tgts_mp != 'EFECTIVO') {
                    tgts_banco += Number(tgts.tgts_cantidad);
                }
                datos +=
                    `
                    <tr id="marcador_gts_${tgts.tgts_id}">
                    
                        <td>${tgts.tgts_id}</td>
                        <td>${tgts.tgts_usuario_registro}</td>
                        <td>${tgts.tgts_fecha_gasto}</td>
                        <td>${tgts.tgts_cantidad}</td>
                        <td>${tgts.tgts_mp}</td>
                        <!--<td>${tgts.gts_nombre}</td>-->
                        <td>${tgts.gts_nombre} ${tgts.tgts_concepto}</td>
                        <td>${tgts.usr_nombre}</td>
                        <td class="text-center" > <input type="checkbox" class="chx_marcador_gastos" marcador="${tgts.tgts_id}" name="" id=""> </td>
                        
                    
                    </tr>
                
                `;

            });

            $("#tbodyGastos").html(datos);

            $("#tgts_efectivo").html(tgts_efectivo);
            $("#tgts_banco").html(tgts_banco);

            $("#tgts_efectivo_input").val(tgts_efectivo);
            $("#tgts_banco_input").val(tgts_banco);

            var totalEfectivo = $("#igs_efectivo_input").val() - $("#tgts_efectivo_input").val()
            $("#total_efectivo_input").val(totalEfectivo)
            $("#total_efectivo").html(totalEfectivo)
            $("#copn_ingreso_efectivo").val(totalEfectivo)
            $("#copn_saldo").val(totalEfectivo)


            var totalBanco = $("#igs_banco_input").val() - $("#tgts_banco_input").val()
            $("#total_banco_input").val(totalBanco)
            $("#total_banco").html(totalBanco)
            $("#copn_ingreso_banco").val(totalBanco)


            $("#total_gts").html(totalEfectivo + totalBanco)

            $("#total_ing").html(Number($("#igs_efectivo_input").val()) + Number($("#igs_banco_input").val()))

            $("#total_gts").html(Number($("#tgts_efectivo_input").val()) + Number($("#tgts_banco_input").val()))

            $("#total").html(Number(totalEfectivo) + Number(totalBanco))

        }
    })

}

function buscarCajaCorte(usr_caja) {
    var datos = new FormData();
    datos.append("btnBuscarCajaCorte", true)
    datos.append("usr_caja", usr_caja)
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/cajas/cajas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res)

            $("#cja_id_caja_input").val(res.cja_id_caja)
            $("#copn_id_input").val(res.copn_id)
            $("#copn_ingreso_inicio_input").val(res.copn_ingreso_inicio)
            $("#usr_caja_input").val(res.usr_caja);
            $("#usr_id_input").val(res.usr_id);



            $("#cja_responsable").html(res.usr_nombre);
            $("#usr_responsable").html(res.usr_nombre);
            $("#cja_nombre").html(res.cja_nombre);
            $("#cja_sucursal").html(res.scl_nombre);
            $("#cja_fecha_apertura").html(res.copn_fecha_abrio);
        }
    })
}

function buscarFlujoCaja(flujo_usr) {
    if (flujo_usr == "") {
        toastr.warning("Seleccione un usuario para continuar", 'Por favor');
        $(".btn-open-cash").addClass('d-none');
        $(".btn-close-cash").addClass('d-none');
        $(".content-abrir-caja").addClass("d-none");
        $(".content-flujo").addClass('d-none');
        $(".content-cerrar-caja").addClass('d-none');

        return;
    }

    var datos = new FormData();
    datos.append("usr_id", flujo_usr)
    datos.append("btnBuscarUsuarios", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {



            if (res.usr_caja == 0) {
                $(".btn-open-cash").removeClass('d-none');
                $(".content-flujo").addClass('d-none');

                $(".content-abrir-caja").removeClass("d-none");

                $("#copn_usuario").val(res.usr_nombre)
                $("#copn_usuario_abrio").val(res.usr_id)

                $(".content-cerrar-caja").addClass('d-none');

                $(".btn-close-cash").addClass('d-none')

            }
            else if (res.usr_caja != 0) {

                $(".btn-open-cash").addClass('d-none');
                $(".content-cerrar-caja").removeClass('d-none');
                $(".content-flujo").removeClass('d-none');
                $(".content-abrir-caja").addClass("d-none");


                buscarIngesosByCaja(res.usr_caja, res.usr_id)
                buscarGastosByCaja(res.usr_caja, res.usr_id)

                $("#igs_usuario").val(res.usr_nombre)
                $("#igs_usuario_responsable").val(res.usr_id)

                $("#tgts_usuario").val(res.usr_nombre)
                $("#tgts_usuario_responsable").val(res.usr_id)


                buscarCajaCorte(res.usr_caja);


            } else {
                $(".btn-open-cash").addClass('d-none');
                $(".content-flujo").addClass('d-none');
                $(".content-abrir-caja").addClass("d-none");
                $(".content-cerrar-caja").addClass('d-none');


            }
        }

    })
}


$("#formIngreso").on("submit", function (e) {

    e.preventDefault();

    if ($("#igs_monto").val() <= 0) {
        toastr.warning('La cantidad no puede ser menor igual a 0', 'Intente con una cantidad valida')
        return;
    }

    swal({
        title: "¿Estás seguro (a) de realizar este ingreso ?",
        text: "  \n TIPO: " + $('select[name="igs_tipo"] option:selected').text() + "\n CANTIDAD: " + $("#igs_monto").val() + "\n METODO DE PAGO: " + $("#igs_mp").val(),
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData(this)
                datos.append("btnAgregarIngreso", true)
                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/ingresos/ingresos.ajax.php',
                    data: datos,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        startLoadButton();
                    },
                    success: function (res) {

                        if (res.status) {

                            stopLoadButton('Registrar ingreso');

                            toastr.success(res.mensaje, '¡Muy bien!');

                            var flujo_usr = $("#flujo_usr").val();
                            buscarFlujoCaja(flujo_usr)
                            limpiarCampos()
                        } else {
                            stopLoadButton('Intentar de nuevo');
                            toastr.error(res.mensaje, '¡Error!');

                        }
                    }
                })

            }
        })



})

$("#formGasto").on("submit", function (e) {

    e.preventDefault();

    var tgts_cantidad = Number($("#tgts_cantidad").val())
    var tgts_categoria = $("#tgts_categoria").val()

    if (tgts_cantidad <= 0) {
        toastr.warning("Asegurate de introducir cantidades mayor a 0", "Error")
        return;
    }

    if (tgts_categoria == "") {
        toastr.warning("Por favor, elije una categoría", "Error")
        return;
    }

    swal({
        title: "¿Estás seguro (a) de realizar este gasto ?",
        text: "  \n CONCEPTO: " + $('select[name="tgts_categoria"] option:selected').text() + "\n CANTIDAD: " + $("#tgts_cantidad").val() + "\n METODO DE PAGO: " + $("#tgts_mp").val(),
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData(this)
                datos.append("btnGuardarGasto", true)
                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/gastos/gastos.ajax.php',
                    data: datos,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        startLoadButton();
                    },
                    success: function (res) {

                        if (res.status) {
                            stopLoadButton('Registrar gasto');
                            toastr.success(res.mensaje, '¡Muy bien!');

                            var flujo_usr = $("#flujo_usr").val();
                            buscarFlujoCaja(flujo_usr)
                            limpiarCampos()

                        } else {
                            stopLoadButton('Intentar de nuevo');

                            toastr.error(res.mensaje, '¡Error!');

                        }
                    }
                })

            }
        })




})

function limpiarCampos() {
    $("#igs_monto").val("")
    $("#igs_concepto").val("")
    $("#igs_mp").val("EFECTIVO")
    $("#tgts_categoria").val("")
    $("#tgts_concepto").val("")
    $("#tgts_cantidad").val("")
    $("#tgts_mp").val("EFECTIVO")
    $("#content-cuenta").addClass("d-none");
    $("#igs_referencia").val("");
    $("#igs_cuenta").val("");
}


$("#inpt_tab")