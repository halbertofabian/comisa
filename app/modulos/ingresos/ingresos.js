
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/11/2020 13:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */



$(".tablaIngresos tbody").on("click", "button.btnEliminarIngreso", function () {
    var igs_id = $(this).attr("igs_id");

    swal({
        title: "¿Seguro de querer eliminar este ingreso?",
        text: "El ingreso con número " + igs_id + " será eliminado. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar el ingreso con número " + igs_id],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("igs_id", igs_id);
                datos.append("btnEliminarIngreso", true);

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

                        if (res.status) {
                            swal({
                                title: "Muy bien",
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
                                title: "Error",
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
                });
            }
        });
})


$("#btnMostrarIngresosUsr").on("click", function () {

    id_usr = $("#igs_usuario").val();
    finicio = $("#igs_fecha_inicio").val() + "T00:00";
    ffin = $("#igs_fecha_fin").val() + "T23:59";
    //alert (finicio);
    var errormsj = "";

    if (finicio == "T00:00") {
        errormsj += "Seleccione una fecha de inicio valida \n";
    }
    if (ffin == "T00:00") {
        errormsj += "Seleccione una fecha de fin valida \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }

    var datos = new FormData();
    datos.append("igs_usuario_responsable", id_usr)
    datos.append("igs_fecha_inicio", finicio)
    datos.append("igs_fecha_fin", ffin)
    datos.append("btnMostrarIngresosUsr", true)


    $.ajax({

        url: urlApp + 'app/modulos/ingresos/ingresos.ajax.php',
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
            // console.log(respuesta)


            stopLoadButton()
            var tblDatosResumenIngresosUsrs = ""
            var total = 0;
            respuesta.forEach(info => {

                total += Number(info.igs_monto);
                tblDatosResumenIngresosUsrs +=
                    `
                        <tr>
                        <td>${info.igs_id}</td>
                        <td>${info.usr_nombre}</td>
                        <td>${info.igs_concepto}</td>
                        <td>${info.igs_monto}</td>
                        <td>${info.igs_mp}</td>
                        <td>${info.igs_referencia}</td>
                            <td>${info.igs_tipo}</td>
                            <td>${info.igs_fecha_registro}</td>
                            <td>${info.igs_usuario_registro}</td>
                              
                        </tr>
                    `;

            });
            $("#tblDatosIngresosUsr").html(tblDatosResumenIngresosUsrs)
            $("#tigs").text($.number(total, 2))
        }
    })

})

$("td.edita").dblclick(function () {

    var OriginalContent = $(this).text();
    var idcompuesto = $(this).attr("id");
    separador = "/";
    textseparado = idcompuesto.split(separador);
    idigs = textseparado[1];
    if (textseparado[0] == 'monto') {
        $(this).html("<input class='form-control' type='text' value='" + OriginalContent + "' />");
    }
    if (textseparado[0] == 'fecha') {
        $(this).html("<input class='form-control' type='datetime-local' value='" + OriginalContent + "' />");
    }
    if (textseparado[0] == 'ref') {
        $(this).html("<input class='form-control' type='text' value='" + OriginalContent + "' />");
    }
    $(this).children().first().focus();
    $(this).children().first().keypress(function (e) {
        if (e.which == 13) {
            var newContent = $(this).val();
            $(this).parent().text(newContent);

            //******************* */
            var datos = new FormData();
            datos.append("igs_id", idigs)
            datos.append("campo", textseparado[0])
            datos.append("valor", newContent)
            datos.append("editarinfIgs", true)


            $.ajax({

                url: urlApp + 'app/modulos/ingresos/ingresos.ajax.php',
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function () {
                    //startLoadButton()
                },
                success: function (respuesta) {
                    // stopLoadButton()
                    if (respuesta.status) {
                        toastr.success(respuesta.mensaje, 'Muy bien')
                    } else {
                        toastr.info(respuesta.mensaje, 'Algo salio mal')
                    }
                }
                /************ */
            })

        }
    });
    $(this).children().first().blur(function () {
        $(this).parent().text(OriginalContent);


    });
});

$("button.delete").on("click", function () {
    var id = $(this).val();
    var clicked = this;

    swal({
        title: "¿Seguro de querer eliminar este ingreso?",
        text: "El ingreso con número " + id + " será eliminado. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar el ingreso con número " + id],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            
            if (willDelete) {
                
                var datos = new FormData();
                datos.append("igs_id", id)
                datos.append("btnEliminarIngreso", true)

               // $(this).closest('tr').remove();
                
                $.ajax({
                    url: urlApp + 'app/modulos/ingresos/ingresos.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {   
                        
                    },
                    success: function (respuesta) {
                        if (respuesta.status) {
                            $(clicked).closest('tr').remove();

                            toastr.success(respuesta.mensaje, 'Muy bien')
                        } else {
                            toastr.info(respuesta.mensaje, 'Algo salio mal')
                        }
                    }
                })
            }
        });

})

