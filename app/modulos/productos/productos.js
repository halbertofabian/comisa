
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

//AGREGAR SERIES

$("#autocomplete_pdt_serie").autocomplete({
    source: urlApp + 'app/modulos/productos/productos.ajax.php',
    select: function (event, ui) {
        $("#sr_id").val(ui.item.pds_id_producto);
        $("#sr_codigo").val(ui.item.pds_sku);
        $("#sr_producto").val(ui.item.label);
    },

});

var datos = [];

$("#formAddSerie").on("submit", function (e) {
    e.preventDefault();
    var autocomplete_pdt_serie = $("#autocomplete_pdt_serie").val();
    var pdt_serie = $("#pdt_serie").val();
    var sr_id = $("#sr_id").val();
    var sr_codigo = $("#sr_codigo").val();
    var sr_producto = $("#sr_producto").val();
    var tbodySeries = "";

    if (autocomplete_pdt_serie == "" || pdt_serie == "") {
        toastr.warning("Por favor llene los campos para agregar la serie", "¡ADVERTENCIA!");
        return false;
    } else if (checkId(pdt_serie)) {
        toastr.error("El numero de serie <b>" + pdt_serie + "</b> ya fue agregada!", "¡ERROR!");
        return false;
    }
    var sku = sr_codigo.split("/")[0];
    if (sku == undefined) {
        sku = "";
    }

    tbodySeries =
        `
        <tr>
            <td>${sku}</td>
            <td>${sr_producto}</td>
            <td for="serie">${pdt_serie}</td>
            <td>
                <button class="btn btn-danger btnQuitarProductoSerie" pdt_serie="${pdt_serie}"><i class="fa fa-trash-alt"></i> Borrar</button>
            </td>
        </tr>

        `;
    var data =
    {
        "id": sr_id,
        "codigo": sr_codigo,
        "producto": sr_producto,
        "serie": pdt_serie,

    }
    if (datos == "") {
        datos.push(data);
        $("#productos_series").val(JSON.stringify(datos));
    } else {
        var productos = $("#productos_series").val();
        datos = JSON.parse(productos);
        datos.push(data);
        $("#productos_series").val(JSON.stringify(datos));
    }
    $("#tbodySeries").append(tbodySeries);

    // $("#autocomplete_pdt_serie").val("");
    $("#pdt_serie").val("");

});

function checkId(serie) {
    let ids = document.querySelectorAll('#tbodySeries td[for="serie"]');
    return [].filter.call(ids, td => td.textContent === serie).length === 1;
}
function checkId2(serie) {
    let ids = document.querySelectorAll('#lista_series td[for="serie"]');
    return [].filter.call(ids, td => td.textContent === serie).length === 1;
}
$("#tbodySeries").on("click", ".btnQuitarProductoSerie", function (e) {
    e.preventDefault();
    var pdt_serie = $(this).attr("pdt_serie");
    var products = $("#productos_series").val();
    var productos = JSON.parse(products);
    for (var i = productos.length; i--;) {
        if (productos[i].serie === pdt_serie) {
            productos.splice(i, 1);
        }
    }
    $("#productos_series").val(JSON.stringify(productos));
    $(this).closest('tr').remove();

    if (productos == "") {
        datos = [];
    }
});
$(document).on("click", ".btnGuardarSeries", function (e) {
    e.preventDefault();
    var productos = $("#productos_series").val();
    if (productos == "[]" || productos == "") {
        toastr.error("Por favor, agrega datos a la lista!", "ERROR");
        return false;
    }
    var data = new FormData();
    data.append("spds_producto", productos);
    data.append("btnGuardarSeries", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/productos/productos.ajax.php',
        data: data,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        /*beforeSend: function () {
            startLoadButton()
        },*/
        success: function (res) {
            if (res.status) {
                toastr.success(res.mensaje, "Correcto!");
                $("#tbodySeries").html("");
                $("#productos_series").val("");
                datos = [];
            }

        }
    })
});

//AGREGAR SERIES DESDE NEW PRODUCTO
var series_array = [];
$(".btnGenerarSeriePds").on("click", function (e) {
    e.preventDefault();
    var lista_series = "";
    var pds_serie = $("#pds_serie").val();

    if (pds_serie == "") {
        toastr.warning("El número de serie es requerido!", "¡ADVERTENCIA!");
        return false;
    } else if (checkId2(pds_serie)) {
        toastr.error("El numero de serie <b>" + pds_serie + "</b> ya fue agregada!", "¡ERROR!");
        return false;
    }

    lista_series =
        `
        <tr>
            <td for="serie">${pds_serie}</td>
            <td>
                <button class="btn btn-danger btn-sm btnQuitarSerie" pds_serie="${pds_serie}"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        `;
    var data =
    {
        "pds_serie": pds_serie,
    }
    if (series_array == "") {
        series_array.push(data);
        $("#pds_series_array").val(JSON.stringify(series_array));
    } else {
        var productos = $("#pds_series_array").val();
        series_array = JSON.parse(productos);
        series_array.push(data);
        $("#pds_series_array").val(JSON.stringify(series_array));
    }
    $("#lista_series").append(lista_series);
    $("#pds_serie").val("");
});

$('#pds_serie').keypress(function (e) {
    if (e.which == 13) {
        return false;
    }
});

$("#lista_series").on("click", ".btnQuitarSerie", function (e) {
    e.preventDefault();

    var pds_serie = $(this).attr("pds_serie");
    var datos = $("#pds_series_array").val();
    var series = JSON.parse(datos);
    for (var i = series.length; i--;) {
        if (series[i].pds_serie === pds_serie) {
            series.splice(i, 1);
        }
    }
    $("#pds_series_array").val(JSON.stringify(series));
    $(this).closest('tr').remove();

    if (series == "") {
        $("#pds_series_array").val("");
        series_array = [];
    }
});