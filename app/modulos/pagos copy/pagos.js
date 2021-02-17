
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
   buscarAlumnoMatricula(usr_matricula)
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
                            <td>${fpg.usr_nombre}</td>
                            
                            <td>${fpg.pqt_nombre}</td>
                            <td>${fpg.fpg_fecha_registro}</td>
                            <td>
                                 <button type="button" class="btn btn-warning btnAbonar" fpg_id="${fpg.fpg_id}"><i class="fa fa-money" aria-hidden="true"></i> Abonar</button>
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

            } else {
                $("#tbodyDataPagosAlumnos").html('');
                $("#usr_nombre_text").html('');

                toastr.error(res.mensaje, '¡Error!')
            }
        },
    })
}
var dataDetalleAbono = "";

$(".tablaAbonosAlumno tbody").on("click", ".btnAbonar", function () {
    $("#rowDataPagosAlumnos").addClass('d-none');
    $("#rowDataAbonosAlumnos").removeClass('d-none');

    $("#usr_matricula").attr('readonly', true)

    var fpg_id = $(this).attr("fpg_id");

    BuscarFichaPago(fpg_id)


})

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

$("#formAbonoAlumno").on("submit", function (e) {

    e.preventDefault();

    if ($("#ppg_monto").val() <= 0) {
        toastr.error('El monto no puede ser menor a 0', '¡Error!')
        return;
    }

    if ($("#ppg_monto").val() > Number($("#ppg_adeudo").val())) {
        toastr.error('El monto no puede ser mayor al adeudo', '¡Error!')
        return;
    }



    swal({
        title: "¿Estás seguro de realizar un abono?",
        text: "Se realizará un abono de $ " + $("#ppg_monto").val() + " cuyo concepto es de " + $("#ppg_concepto").val(),
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
                            toastr.success(res.mensaje, 'Muy bien!')

                            BuscarFichaPago($("#fpg_id").val())
                            BuscarAbonoConcepto($("#ppg_concepto").val(), $("#fpg_id").val())
                            $("#ppg_mp").val("EFECTIVO")
                            $("#ppg_referencia").val("")


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