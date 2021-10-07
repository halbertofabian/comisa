
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

$("#pds_ams_id").on("change", function () {
    var optseleccionada = $(this).val();
    var datos = new FormData();
    datos.append("selectAlmacen", true);
    datos.append("pds_ams_id", optseleccionada);

    $.ajax({
        url: urlApp + 'app/modulos/productos/productos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {

        },
        success: function (respuesta) {
            // console.log(respuesta)
            var tblDatos = ""
            respuesta.forEach(pds => {
                var pds_sku = pds.pds_sku;
                var pds_sku = pds_sku.split("/");

                if (pds.pds_stok <= pds.pds_stok_min || pds.pds_stok == 0) {
                    color = "danger";

                } else {
                    color = "success";
                }

                if (pds.pds_fecha_modificacion == '0000-00-00 00:00:00') {
                    textin = "Creado el " + pds.pds_fecha_creacion;
                    tipousr = pds.pds_usaurio_registro;

                } else {
                    textin = "Ultima modificación el:" + pds.pds_fecha_modificacion;
                    tipousr = pds.pds_usuario_modifico;
                }

                tblDatos +=
                    `
                        <tr  class="pds_content text-center" pds_id="${pds.pds_id_producto}" style="height: 110px;">
                        <td><input type="checkbox" class="pds_action_product" name="pds_action_product[]" value="${pds.pds_id_producto}"></td>
                        <td><img src="${pds.pds_imagen_portada}" width="50" height="50" alt="no fount"></td>
                        <td>
                            <a href="" class="bt btn-link">${pds.pds_nombre}</a>
                            <div class="d-none pds_id_move" id="pds_id_${pds.pds_id_producto}">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="" style="font-size: 11px; color: #737B82; ">ID: ${pds.pds_id_producto}</p>
                                    </div>
                                    <div class="col-12 btn-group">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-sm btn-default"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-default">Editar rapido</button>
                                    </div>
                                </div>

                            </div>

                        </td>
                        <td>
                            
                        </td>
                        <td>
                            <strong class="text-${color}">${pds.pds_stok}</strong>
                        </td>
                        <td>${pds.pds_categoria}</td>
                        <td>
                                ${textin}<br> <strong class="text-warning">${tipousr}</strong>';
                        </td>
                        </tr>
                    `;

            })

            $("#bodyviewProd").html(tblDatos)

        }

    })
})
$("#bodyviewProd").on("click", ".btnEliminarProducto", function () {
    var pds_id_producto = $(this).attr("pds_id_producto");
    swal({
        title: "ADVERTENCIA",
        text: "¿Esta seguro de eliminar el producto?",
        icon: "warning",
        buttons: ["Calcelar", "Si, eliminar"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("btnEliminarProducto", true);
                datos.append("pds_id_producto", pds_id_producto);

                $.ajax({
                    url: urlApp + 'app/modulos/productos/productos.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                    },
                    success: function (res) {
                        if (res) {
                            swal({
                                title: "ELIMINADO",
                                text: "El producto se a eliminado correctamente!",
                                icon: "success",
                                buttons: [false, "OK"],
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
        })

})