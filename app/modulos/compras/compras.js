
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 11/02/2021 21:19
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#formAddProveedor").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearProveedor", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/compras/compras.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#pvs_nombre").val("")
                $('#mdlProveedor').modal('hide')

                $('#cps_proveedor option').remove();
                listarProveedores();
                $("#cps_proveedor option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})







$(".tablaCompras tbody").on("click", "button.btnLiquidarCompra", function () {

    var cps_folio = $(this).attr("cps_folio")
    swal({
        title: "¿Seguro de querer liquidar esta compra?",
        text: "La compra con folio " + cps_folio + " será liquidada. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, liquidar la compra con folio " + cps_folio],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append("btnLiquidarCompra", true)
                datos.append("cps_folio", cps_folio)

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/compras/compras.ajax.php',
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
                })

            }
        })



})

$(".tablaCompras tbody").on("click", "button.btnEliminarCompra", function () {
    var cps_folio = $(this).attr("cps_folio");

    swal({
        title: "¿Seguro de querer eliminar esta compra?",
        text: "La compra con número " + cps_folio + " será eliminada y todo lo relacionado, es decir también los abonos realizados a esta compra. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar la compra con número " + cps_folio],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("cps_folio", cps_folio);
                datos.append("btnEliminarCompra", true);

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/compras/compras.ajax.php',
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

//cargar excel
$(".btnImportarProductosExcel").on("click", function (e) {
    e.preventDefault()

    var excel = $("#cps_excel").val()

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

                var files = $("#cps_excel")[0].files[0];
                var cps_ams_id = $("#cps_ams_id").val();


                datos.append("btnImportarProductosExcel", true);
                datos.append("archivoExcel", files);
                datos.append("cps_ams_id", cps_ams_id);


                $.ajax({

                    url: urlApp + 'app/modulos/compras/compras.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                        $(".btnImportarProductosExcel").attr("disabled", true)
                        $(".btnImportarProductosExcel").removeClass("btn-success")
                        $(".btnImportarProductosExcel").addClass("btn-secondary")
                        $(".btnImportarProductosExcel").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span> 
                        Importando productos ...`);


                    },
                    success: function (respuesta) {
                        $(".btnImportarProductosExcel").attr("disabled", false)
                        $(".btnImportarProductosExcel").addClass("btn-success")
                        $(".btnImportarProductosExcel").removeClass("btn-secondary")
                        $(".btnImportarProductosExcel").html(`<i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Importar productos`);

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
                                        console.log(respuesta);
                                        var compras = respuesta.data;
                                        var tbodyCompra = "";
                                        var tbodycmpgeneral = "";
                                        compras.forEach(cmp => {
                                            tbodyCompra +=
                                                `
                                            <tr>
                                                <td></td>
                                                <td>${cmp.pds_nombre}</td>
                                                <td>${cmp.pds_sku}</td>
                                                <td>${cmp.pds_stok}</td>
                                                <td>${cmp.pds_pu}</td>
                                                <td>${cmp.total}</td>
                                            </tr>
                                            `;
                                        });
                                        //alert(respuesta.sumaCompra)
                                        $("#tbodyNuevaCompra").html(tbodyCompra);
                                        $("#totaldecompra").text(respuesta.sumaCompra);
                                        tbodycmpgeneral =
                                            `
                                            <tr>
                                                
                                                <td>${respuesta.sumaArticulos}</td>
                                                <td><span id="span_sumacmp">${respuesta.sumaCompra}</span></td>
                                                <td><span id="span_constoenvio">0</span></td>
                                                <td><span id="span_gt">${respuesta.sumaCompra}</span></td>
                                            </tr>
                                            `;
                                        $("#tbodygeneral").html(tbodycmpgeneral);

                                        $("#cps_num_articulos").val(respuesta.sumaArticulos);
                                        $("#cps_total").val(respuesta.sumaCompra);
                                        $("#cps_gran_total").val(respuesta.sumaCompra);




                                        // window.location.href = "./compras"
                                    } else {
                                        //  window.location.href = "./compras"

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
                                        window.location.href = "./compras"
                                    } else {
                                        window.location.href = "./compras"

                                    }
                                })

                        }

                    }
                })
            }
        });
})


$("#abs_costoEnvio").on("keyup", function () {
    var teclasoltada = $(this).val();
    $("#span_constoenvio").text(teclasoltada);

    var smcmp = $("#totaldecompra").html();
    var cte = $("#span_constoenvio").html();
    var grantotal = Number(smcmp) + Number(cte);

    $("#span_gt").text(grantotal);
    $("#cps_gran_total").val(grantotal);
});0.

$("#form_compra").on("submit", function (e) {
    e.preventDefault()

    var datos = new FormData(this);
    datos.append("btnGuardarCompra", true);
    //alert($(this).serialize());
    // return
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/compras/compras.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {0

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})