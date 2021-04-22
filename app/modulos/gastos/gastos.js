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

$("#gtsg_pxl").on("keyup", function () {
    calculargastoGasolina();
})
$("#gtsg_cantidad").on("keyup", function () {
    calculargastoGasolina();
})
function calculargastoGasolina() {
    var gtsg_precio_litro = $("#gtsg_pxl").val();
    var gtsg_cantidad_litro = $("#gtsg_cantidad").val();
    $("#gtsg_montoApagar").val(gtsg_precio_litro * gtsg_cantidad_litro);
}

$("#gtsg_usuario").on("change", function () {
    var vehiculo = $("#gtsg_usuario option:selected").text();
    var tmp = vehiculo.split("/"); //retorna un array
    //console.log(tmp);
    var num = tmp[1];
    $("#gtsg_placas_v").val(num.trim());

})

$("#btnGuardarGastoGas").on("click", function () {
    var gtsg_usuario = $("#gtsg_usuario").val()
    var vehiculo = $("#gtsg_placas_v").val();
    var gtsg_pxl = $("#gtsg_pxl").val();
    var gtsg_cantidad = $("#gtsg_cantidad").val();
    var gtsg_montoApagar = $("#gtsg_montoApagar").val();
    var gtsg_kilometraje = $("#gtsg_kilometraje").val();




    
var errormsj = "";

    if (gtsg_usuario == "") {
        errormsj += "* Necesita seleccionar un usuario \n";
    }
    if (vehiculo == "") {
        errormsj += "* Verifica que el vehiculo este correcto \n";
    } if (gtsg_pxl <= "") {
        errormsj += "* Introduce un precio mayor a 0 \n";
    }
    if (gtsg_cantidad <= 0) {
        errormsj += "* Necesita ingresar una cantidad mayor a 0 \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }

    swal({
        title: "¿Estás seguro de agregar gasto de gasolina a " + $('select[name="gtsg_usuario"] option:selected').text() + " ?",
        text: "  VEHICULO: " + vehiculo + "\n PRECIO L:$ " + gtsg_pxl + "\n CANTIDAD:" + gtsg_cantidad + "L \n TOTAL A PAGAR:$" + gtsg_montoApagar + "\n KILOMETRAJE:" + gtsg_kilometraje,
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("gtsg_usuario_responsable", gtsg_usuario)
                datos.append("gtsg_vehiculo_placas", vehiculo)
                datos.append("gtsg_precio_litro", gtsg_pxl)
                datos.append("gtsg_cantidad_litros", gtsg_cantidad)
                datos.append("gtsg_monto", gtsg_montoApagar)

                datos.append("gtsg_kilometraje", gtsg_kilometraje)
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

                            $("#gtsg_usuario").val("");
                            $("#gtsg_placas_v").val("");
                            $("#gtsg_pxl").val("");
                            $("#gtsg_cantidad").val("");
                            $("#gtsg_montoApagar").val("");
                            $("#gtsg_kilometraje").val("");
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

$("#btnMostrarResumenGas").on("click", function () {
    id_usr = $("#gtsg_usuario_responsableGas").val();
    finicio = $("#gtsg_fecha_inicio").val() + "T00:00";
    ffin = $("#gtsg_fecha_fin").val() + "T23:59";
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
    datos.append("gtsg_usuario_responsableGas", id_usr)
    datos.append("gtsg_fecha_inicio", finicio)
    datos.append("gtsg_fecha_fin", ffin)
    datos.append("btnMostrarResumenGas", true)


    $.ajax({

        url: urlApp + 'app/modulos/gastos/gastos.ajax.php',
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


            var tblDatosResumenGastos = ""
            respuesta.forEach(info => {

                tblDatosResumenGastos +=
                    `
                        <tr>
                        <td>${info.gtsg_id}</td>
                            <td>${info.gtsg_fecha_registro}</td>
                            <td>${info.gtsg_vehiculo_placas}</td>
                            <td>${info.gtsg_kilometraje}</td>
                            <td>${info.usr_nombre}</td>
                            <td>${info.gtsg_cantidad_litros}</td>
                            <td>${info.gtsg_monto}</td>
                            
                        </tr>
                    `;

            });


            $("#tblDatosResumenGastos").html(tblDatosResumenGastos)


        }
    })



})