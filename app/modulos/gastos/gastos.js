listarCategorias();

$("#formAddCategoria").on("submit", function (e) {
    
    e.preventDefault()

    var datos = new FormData(this)

    datos.append("btnCrearCategoria", true)

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

            if (res.status) {
                toastr.success(res.mensaje, 'Correcto')
                $("#gts_nombre").val("")
                $("#gts_presupuesto").val("")

                $('#mdlCategoria').modal('hide')

                $('#tgts_categoria option').remove();
                listarCategorias();
                $("#tgts_categoria option:selected").last().val()

            } else {
                toastr.error(res.mensaje, 'Error')

            }

        }
    });
})




function listarCategorias() {
    var datos = new FormData()

    datos.append("btnListarCategorias", true)

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

            res.forEach(element => {

                $('#tgts_categoria').prepend(`<option value='${element.gts_id}' >${element.gts_nombre}</option>`);

            });




        }
    });
}


$(".btnListarGastosCat").on("click", function () {
    $("#lista-gastos-categoria").removeClass('d-none')
    $("#lista-gastos").addClass('d-none')

})

$(".btnListarGastos").on("click", function () {
    $("#lista-gastos").removeClass('d-none')
    $("#lista-gastos-categoria").addClass('d-none')

})


$(".tablaGastos tbody").on("click", "button.btnEliminarGasto", function () {
    var tgts_id = $(this).attr("tgts_id");

    swal({
        title: "¿Seguro de querer eliminar este gasto?",
        text: "El gasto con número " + tgts_id + " será eliminado. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar el gasto con número " + tgts_id],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("tgts_id", tgts_id);
                datos.append("btnEliminarGasto", true);

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

$(".tablaCategorias tbody").on("click", "button.btnEliminarCategoria", function () {
    var gts_id = $(this).attr("gts_id");

    swal({
        title: "¿Seguro de querer eliminar esta categoría?",
        text: "La categoría con número " + gts_id + " será eliminada y todo lo relacionado. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar la categoría con número " + gts_id],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("gts_id", gts_id);
                datos.append("btnEliminarCategoria", true);

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

$("#btnGuardarGastoGas").on("click", function () {
    var gtsg_usuario = $("#gtsg_usuario").val()
    var gtsg_cantidad = Number($("#gtsg_cantidad").val())

    var errormsj = "";

    if (gtsg_usuario == "") {
        errormsj += "Necesita seleccionar un usuario \n";
    }
    if (gtsg_cantidad <= 0) {
        errormsj += "Necesita ingresar una cantidad mayor a 0 \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }
    

    swal({
        title: "¿Estás seguro de agregar gasto de gasolina a " + $('select[name="gtsg_usuario"] option:selected').text() + " ?",
        text: "  CANTIDAD: " + gtsg_cantidad,
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();

                datos.append("gtsg_usuario", gtsg_usuario)
                datos.append("gtsg_cantidad", gtsg_cantidad)
                datos.append("btnGuardarGastoGas", true)
                

                $.ajax({

                    url: urlApp + 'app/modulos/gastos/gastos.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                        startLoadButton()


                    },
                    success: function (res) {

                        if (res.status) {
                            stopLoadButton("Guardar")
                            $("#gtsg_usuario").val("")
                            $("#gtsg_cantidad").val("")
                            toastr.success(res.mensaje, "¡Muy bien!")

                            var flujo_usr = $("#flujo_usr").val();
                           buscarFlujoCaja(flujo_usr)
                        } else {
                            stopLoadButton("Intentar de nuevo")
                            toastr.error(res.mensaje, "¡Error!")

                        }


                    }
                })
            }
        })




})