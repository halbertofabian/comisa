
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 31/01/2021 16:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
 

$("#formNewClientAdd").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnNewClientAdd", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/clientes/clientes.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            console.log(res)

            if (res.status) {
                stopLoadButton('GUARDAR')

                swal({
                    title: "¡Muy bien!",
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
                toastr.error(res.mensaje, 'Error')
                stopLoadButton('INTENTAR DE NUEVO')
            }
        }
    })
})

$("#formImportarClientes").on("submit", function (e) {
    e.preventDefault()

    var excel = $("#input_file").val()

    if (excel == "") {
        return swal("Error", "Seleccione un archivo excel", "error");
    }


    swal({
        title: "¿Estas seguro de querer importar la lista de clientes?",
        text: "Asegurate de tener el archivo con los requerimientos solicitados",
        icon: "info",
        buttons: ["Calcelar", "Si, importar lista"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData()

                var files = $("#input_file")[0].files[0]

                datos.append("btnImportarClientes", true)
                datos.append("archivoExcel", files)


                $.ajax({

                    url: urlApp + 'app/modulos/clientes/clientes.ajax.php',
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
                                text: "Se registraron " + respuesta.insert + " clientes \n Se actualizaron " + respuesta.update + " clientes ",
                                icon: "success",
                                buttons: [false, "Ver lista"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./clientes"
                                    } else {
                                        window.location.href = "./clientes"

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
                                        window.location.href = "./clientes"
                                    } else {
                                        window.location.href = "./clientes"

                                    }
                                })

                        }

                    }
                })
            }
        });
})


function buscarCliente(cts_id) {
    var datos = new FormData();

    datos.append("cts_id", cts_id);
    datos.append("btnVerCliente", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/clientes/clientes.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            stopLoadButton('VER')

            console.log(res)

            $('#mdlMostrarCliente').modal('show')

            $("#cts_ruta").html(res.cts_ruta)
            $("#cts_nombre").val(res.cts_nombre)
            $("#cts_telefono_1").val(res.cts_telefono_1)
            $("#cts_domicilio").val(res.cts_domicilio)
            $("#cts_colonia").val(res.cts_colonia)
            $("#cts_calles").val(res.cts_calles)
            $("#cts_fachada_color").val(res.cts_fachada_color)
            $("#cts_puerta_color").val(res.cts_puerta_color)
            $("#cts_credencial_elector").val(res.cts_credencial_elector)
            $("#cts_trabajo").val(res.cts_trabajo)
            $("#cts_puesto").val(res.cts_puesto)
            $("#cts_direccion_trabajo").val(res.cts_direccion_trabajo)
            $("#cts_colonia_trabajo").val(res.cts_colonia_trabajo)
            $("#cts_telefono_trabajo").val(res.cts_telefono_trabajo)
            $("#cts_antiguedad_trabajo").val(res.cts_antiguedad_trabajo)
            $("#cts_tipo_casa").val(res.cts_tipo_casa)
            $("#cts_tiempo_casa").val(res.cts_tiempo_casa)
            $("#cts_nombre_casa").val(res.cts_nombre_casa)
            $("#cts_reg_propiedad").val(res.cts_reg_propiedad)
        }
    })
}

$(".tablaClientes tbody").on("click", "button.btnVerCliente", function () {
    var cts_id = $(this).attr('cts_id')
    buscarCliente(cts_id)
})

$("#cts_buscar_cliente").on("change", function () {
    var cts_id = $(this).val()

    $(".content-cliente").removeClass('d-none')

    buscarCliente(cts_id)


})