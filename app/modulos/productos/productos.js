
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 20/10/2020 21:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$(".btnDisplayProductos").on("click", function () {
    
    var display = $(this).attr('data-display')
    if (display != "") {
        $("#card-filtro-producto").removeClass('d-none')
        $(this).attr('data-display', "")
        $(this).html(`<i class="fa fa-minus"></i>`)
    } else {

        $("#card-filtro-producto").addClass('d-none')
        $(this).attr('data-display', "d-none")
        $(this).html(`<i class="fa fa-plus"></i>`)

    }
})

$(".pds_content").mousemove(function () {
    var pds_id = $(this).attr('pds_id');
    $(".pds_id_move").addClass('d-none')
    $("#" + pds_id).removeClass('d-none')
})

$("#checkboxAllProducto").change("click", function () {


    if ($("#checkboxAllProducto").is(':checked')) {
        $(".pds_action_product").prop("checked", true)

    } else {
        $(".pds_action_product").prop("checked", false)
    }




})


$("#formImportarProductosComisa").on("submit", function (e) {
    e.preventDefault()

    var excel = $("#input_file").val()

    if (excel == "") {
        return swal("Error", "Seleccione un archivo excel", "error");
    }


    swal({
        title: "¿Estas seguro de querer importar la lista de productos?",
        text: "Asegurate de tener el archivo con los requerimientos solicitados",
        icon: "info",
        buttons: ["Calcelar", "Si, importar lista"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData()

                var files = $("#input_file")[0].files[0]

                var pds_ams_id = $("#pds_ams_id").val()

                datos.append("btnImportarProductos", true)
                datos.append("archivoExcel", files)
                datos.append("pds_ams_id", pds_ams_id)


                $.ajax({

                    url: urlApp + 'app/modulos/productos/productos.ajax.php',
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
                        stopLoadButton('Redirigiendo...')

                        if (respuesta.status) {

                            swal({
                                title: respuesta.mensaje,
                                text: "Se registraron " + respuesta.insert + " productos \n Se actualizaron " + respuesta.update + " productos ",
                                icon: "success",
                                buttons: [false, "Ver lista"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./productos"
                                    } else {
                                        window.location.href = "./productos"

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
                                        window.location.href = "./productos"
                                    } else {
                                        window.location.href = "./productos"

                                    }
                                })

                        }

                    }
                })
            }
        });
})