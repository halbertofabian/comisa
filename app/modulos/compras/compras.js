
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