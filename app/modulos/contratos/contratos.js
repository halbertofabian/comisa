

/**
 *  Desarrollador: 
 *  Fecha de creación: 12/05/2021 09:28
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
$(document).ready(function () {


    $("#cts_buscar_cliente").on("change", function () {
        var clts_id = $(this).val();
        $(".content-cliente").removeClass('d-none');

        buscarInfoCliente(clts_id);
    })

    $("#btn_infPersonal").on("click", function () {
        if ($("#dts-client").hasClass("d-none")) {
            $("#dts-client").removeClass("d-none");
        } else {
            $("#dts-client").addClass("d-none");
        }
    })

    $("#btn_infconyug").on("click", function () {
        if ($("#dts-conyug").hasClass("d-none")) {
            $("#dts-conyug").removeClass("d-none");
        } else {
            $("#dts-conyug").addClass("d-none");
        }

    })
    function buscarInfoCliente(clts_id) {
        var datos = new FormData();

        datos.append("clts_id", clts_id);
        datos.append("btnMostrarInfCltId", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                //startLoadButton()
            },
            success: function (res) {
                separador = "-"
                // stopLoadButton('VER')
                $("#cts_ruta").html(res.cts_ruta)
                $("#clts_nombre").val(res.clts_nombre)
                $("#clts_telefono").val(res.clts_telefono)
                $("#clts_domicilio").val(res.clts_domicilio)
                $("#clts_col").val(res.clts_col)
                $("#clts_entre_calles").val(res.clts_entre_calles)
                $("#clts_fachada_color").val(res.clts_fachada_color)
                $("#clts_puerta_color").val(res.clts_puerta_color)
                $("#clts_cred_elector_n").val(res.clts_cred_elector_n)

                $("#clts_trabajo").val(res.clts_trabajo)
                $("#clts_puesto").val(res.clts_puesto)
                $("#clts_direccion_tbj").val(res.clts_direccion_tbj)
                $("#clts_col_tbj").val(res.clts_col_tbj)
                $("#clts_tel_tbj").val(res.clts_tel_tbj)
                textseparado = res.clts_antiguedad_tbj.split(separador)
                $("#clts_antiguedad_trabajo").val(textseparado[0])
                $("#clts_antiguedad_trabajo_1").val(textseparado[1])
                $("#clts_igs_mensual_tbj").val(res.clts_igs_mensual_tbj)

                $("#clts_tipo_vivienda").val(res.clts_tipo_vivienda)
                textseparado2 = res.clts_antiguedad_viviendo.split(separador)

                $("#clts_tiempo_casa").val(textseparado2[0])//
                $("#clts_tiempo_casa_1").val(textseparado2[1])
                $("#clts_vivienda_anomde").val(res.clts_vivienda_anomde)
                $("#clts_nreg_propiedad").val(res.clts_nreg_propiedad)

                $("#clts_nom_conyuge").val(res.clts_nom_conyuge)
                $("#clts_tbj_conyuge").val(res.clts_tbj_conyuge)
                $("#clts_tbj_puesto_conyuge").val(res.clts_tbj_puesto_conyuge)
                $("#clts_tbj_dir_conyuge").val(res.clts_tbj_dir_conyuge)
                $("#clts_tbj_col_conyuge").val(res.clts_tbj_col_conyuge)
                $("#clts_tbj_tel_conyuge").val(res.clts_tbj_tel_conyuge)
                textseparado3 = res.clts_tbj_ant_conyuge.split(separador)
                $("#clts_anttrabajo_conyuge").val(textseparado3[0])//
                $("#clts_tiempo_trabajo_conyuge").val(textseparado3[1])

                $("#clts_nom_fiador").val(res.clts_nom_fiador)
                $("#clts_parentesco_fiador").val(res.clts_parentesco_fiador)
                $("#clts_tel_fiador").val(res.clts_tel_fiador)
                $("#clts_dir_fiador").val(res.clts_dir_fiador)
                $("#clts_col_fiador").val(res.clts_col_fiador)
                $("#clts_tbj_fiador").val(res.clts_tbj_fiador)
                $("#clts_tbj_dir_fiador").val(res.clts_tbj_dir_fiador)
                $("#clts_tbj_tel_fiador").val(res.clts_tbj_tel_fiador)
                $("#clts_tbj_col_fiador").val(res.clts_tbj_col_fiador)
                $("#clts_fc_elector_fiador").val(res.clts_fc_elector_fiador)
                textseparado4 = res.clts_tbj_ant_fiador.split(separador)
                $("#clts_anttrabajo_fiador").val(textseparado4[0])//
                $("#clts_tiempo_trabajo_fiador").val(textseparado4[1])

                $("#clts_nom_ref1").val(res.clts_nom_ref1)
                $("#clts_parentesco_ref1").val(res.clts_parentesco_ref1)
                $("#clts_dir_ref1").val(res.clts_dir_ref1)
                $("#clts_col_ref1").val(res.clts_col_ref1)
                $("#clts_tel_ref1").val(res.clts_tel_ref1)
                $("#clts_nom_ref2").val(res.clts_nom_ref2)
                $("#clts_parentesco_ref2").val(res.clts_parentesco_ref2)
                $("#clts_dir_ref2").val(res.clts_dir_ref2)
                $("#clts_col_ref2").val(res.clts_col_ref2)
                $("#clts_tel_ref2").val(res.clts_tel_ref2)

            }
        })
    }


    $("#form_new_contrato").on("submit", function (e) {
        e.preventDefault();

        var datos = new FormData(this);
        datos.append("btnNewContratoAdd", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                startLoadButton()
            },
            success: function (res) {
                stopLoadButton()
                if (res.status) {

                    swal({
                        title: "Muy bien!, Se creo el contrato",
                        text: "ESTADO DE LAS FOTOS: \n" + "Cliente con producto: " + res.msg1 + "\n Pagare: " + res.msg2 + "\n Facha de casa: " + res.msg3 + "\n",
                        icon: "success",
                        buttons: [false, "OK"],
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.href = res.pagina
                            } else {
                                location.href = res.pagina
                            }
                        })

                } else {

                    swal({
                        title: "Error",
                        text: res.mensaje,
                        icon: "error",
                        buttons: [false, "Intentar de nuevo"],
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.href = res.pagina
                            } else {
                                location.href = res.pagina
                            }
                        })

                }

            }
        })
    })

    $("#btn_Mostar_ctrs").on("click", function (e) {
        e.preventDefault();
        nom = $("#ctrs_cliente_aux").val();
        ctr = $("#ctrs_Naux").val();

        var datos = new FormData();
        datos.append("nombre", nom);
        datos.append("id_ctr", ctr);
        datos.append("btn_Mostar_ctrs", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                // startLoadButton()
            },
            success: function (res) {
                if (res.status) {
                    var tblDatos = ""
                    res.ctrs.forEach(ctr => {
                        tblDatos +=
                            `
                        <tr>
                        <td><a href="${res.pagina}contratos/editar/${ctr.ctrs_id}">${ctr.ctrs_id}</a></td>
                        <td>${ctr.ctrs_cuenta}</td>  
                        <td>${ctr.clts_nombre}</td>  
                        <td>${ctr.ctrs_fecha_registro}</td>  
                        
                        </tr>
                    `;

                    })

                    $("#tbl_list_ctrs").html(tblDatos)
                }
            }
        })
    })

    $("#form-edita-contrato").on("submit", function (e) {
        e.preventDefault();
        var datos = new FormData(this);
        datos.append("btnEditarctrs", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                //startLoadButton()
            },
            success: function (res) {
                //stopLoadButton()
                if (res.status) {

                    swal({
                        title: "Muy bien!, Se actualizaron datos del contrato",
                        text: "ESTADO DE LAS FOTOS: \n" + "Cliente con producto: " + res.msg1 + "\n Pagare: " + res.msg2 + "\n Facha de casa: " + res.msg3 + "\n",
                        icon: "success",
                        buttons: [false, "OK"],
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.href = res.pagina
                            } else {
                                location.href = res.pagina
                            }
                        })

                } else {

                    swal({
                        title: "Error",
                        text: res.mensaje,
                        icon: "error",
                        buttons: [false, "Intentar de nuevo"],
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.href = res.pagina
                            } else {
                                location.href = res.pagina
                            }
                        })

                }

            }
        })
    })


    $("#formRegistarVentas").on("submit", function (e) {
        e.preventDefault();
        var datos = new FormData(this);
        datos.append("btnRegistrarVentasContrato", true);

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                //startLoadButton()
            },
            success: function (res) {
                //stopLoadButton()
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


    })
    $(".btnMostrarImg").on("click", function () {
        urlImg = $(this).attr("src");
        $(".imagenURL").attr("src", urlImg);
        $("#modelId").modal("show");
    });


    $("#formGuardarContrato").on("submit", function (e) {
        e.preventDefault();

        var datos = new FormData(this);
        datos.append("btnGuadarDatosContrato", true);

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function () {
                //startLoadButton()
            },
            success: function (res) {

                console.log(res);

            }
        })
    })


    $("#btnImportarContratos").on("submit", function () {

    })

    $("#formImportarContratos").on("submit", function (e) {
        e.preventDefault()

        var excel = $("#input_file").val()

        if (excel == "") {
            return swal("Error", "Seleccione un archivo excel", "error");
        }


        swal({
            title: "¿Estas seguro de querer importar la lista de contratos?",
            text: "Asegurate de tener el archivo con los requerimientos solicitados",
            icon: "info",
            buttons: ["Calcelar", "Si, importar lista"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var datos = new FormData()

                    var files = $("#input_file")[0].files[0]

                    datos.append("btnImportarContratos", true)
                    datos.append("archivoExcel", files)


                    $.ajax({

                        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
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
                            stopLoadButton('Importar contratos')

                            if (respuesta.status) {

                                swal({
                                    title: respuesta.mensaje,
                                    text: "Se registraron " + respuesta.insert + " contratos \n Se actualizaron " + respuesta.update + " contratos ",
                                    icon: "success",
                                    buttons: [false, "Ver lista"],
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.href = respuesta.pagina
                                        } else {


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
                                            window.location.href = urlApp + "contratos/listar"
                                        } else {
                                            window.location.href = urlApp + "contratos/listar"

                                        }
                                    })

                            }

                        }
                    })
                }
            });
    })

    var tbodyProductos = "";
    var data = [];

    $("#autocomplete_pdt").autocomplete({
        source: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        select: function (event, ui) {
            var nomProducrto = "";
            $('#tbl_mercancia > tbody  > tr').each(function () {
                nomProducrto = $(this).find("td").eq(2).html();
            });

            if (nomProducrto === ui.item.label) {
                toastr.warning(`¡El producto <strong>${ui.item.label}</strong> ya fue agregado a la lista!`, 'ADVETENCIA')
                $(this).val("");
                return false;
            } else {
                var cadena = ui.item.pds_sku;
                var sku = cadena.split("/")[0];
                if (sku == undefined) {
                    sku = "";
                }

                tbodyProductos =
                    `
                <tr id="${sku}">
                    <td style="width:20%; text-align:center">${sku}</td>
                    <td style="width:20%; text-align:center">1</td>
                    <td style="width:50%; text-align:center">${ui.item.label}</td>
                    <td style="width:10%; text-align:center">
                        <button type="button" class="btn btn-danger btnQuitarProducto" sku="${sku}"><i class="fa fa-trash"></i> Borrar</button>
                    </td>
                </tr>
                `;
                var datos = {
                    "sku": sku,
                    "nombreProducto": ui.item.label,
                    "cantidad": 1,
                };
                var productos = $("#productos_contratos").val();
                data = JSON.parse(productos);
                if (data == "") {
                    data.push(datos);
                    $("#productos_contratos").val(JSON.stringify(data));
                } else {
                    var productos = $("#productos_contratos").val();
                    data = JSON.parse(productos);
                    data.push(datos);
                    $("#productos_contratos").val(JSON.stringify(data));
                }

                $("#tbodyProductos").append(tbodyProductos);

                $(this).val("");
                return false;

            }
        }
    });
    $("#tbodyProductos").on("click", ".btnQuitarProducto", function (e) {
        e.preventDefault()
        var pdt_sku = $(this).attr("sku");
        var products = $("#productos_contratos").val();
        var productos = JSON.parse(products);
        for (var i = productos.length; i--;) {
            if (productos[i].sku === pdt_sku) {
                productos.splice(i, 1);
            }
        }


        // $("#" + sku).remove();
        $(this).closest('tr').remove();
        $("#productos_contratos").val(JSON.stringify(productos));


        if (productos == "") {
            data = [];
        }

    });
    $("tfoot").on("click", ".btnGuardarProductos", function (e) {
        e.preventDefault()
        swal({
            title: "¿Estas seguro de querer guardar estos productos para este contrato?",
            icon: "warning",
            buttons: ["Calcelar", "Si, Guardar productos"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    var datos = new FormData()

                    var productos = $("#productos_contratos").val();
                    var ctrs_id = $("#ctrs_id").val();

                    datos.append("btnGuardarProductos", true);
                    datos.append("ctr_productos", productos);
                    datos.append("ctrs_id", ctrs_id);

                    $.ajax({
                        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        beforeSend: function () {
                            // startLoadButton()
                        },
                        success: function (respuesta) {
                            // stopLoadButton('Importar contratos')

                            if (respuesta.status) {
                                swal({
                                    title: respuesta.mensaje,
                                    icon: "success",
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        }
                                    })

                            } else {
                                swal({
                                    title: respuesta.mensaje,
                                    icon: "error",
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        }
                                    })
                            }

                        }
                    })

                }
            });

    });

    $(document).on("click", ".btnProductos", function () {
        var ctr_id = $(this).attr("ctr_id");
        var datos = new FormData()
        var tbody_productos = "";
        datos.append("ctrs_id", ctr_id);
        datos.append("btnMostrarProductos", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function () {
                // startLoadButton()
            },
            success: function (res) {
                var productos = JSON.parse(res.ctr_productos);
                productos.forEach(element => {
                    tbody_productos +=
                        `
                        <tr>
                            <td>${element.sku}</td>
                            <td>${element.cantidad}</td>
                            <td>${element.nombreProducto}</td>
                        </tr>
                `;
                });

                $("#tbody_productos").html(tbody_productos);
            }
        })
    });

});
