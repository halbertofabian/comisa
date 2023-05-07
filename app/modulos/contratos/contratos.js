

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
    // obtenerUltimoOrden();
    function obtenerUltimoOrden() {
        var crt_ruta = $("#crt_ruta").val();
        var datos = new FormData();
        datos.append("crt_ruta", crt_ruta);
        datos.append("btnObtenerUltimaOrden", true);
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
                if (res.orden == null) {
                    $("#cra_posicion").val(1);
                } else {
                    $("#cra_posicion").val(res.orden);
                }
            }
        });
    }


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
                textseparado5 = res.clts_tbj_ant_conyuge.split(separador)
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

    function checkNombre(nombreProducto) {
        let ids = document.querySelectorAll('#tbodyProductos td[for="nombreProducto"]');
        return [].filter.call(ids, td => td.textContent === nombreProducto).length === 1;
    }

    var tbodyProductos = "";
    var data = [];

    $("#autocomplete_pdt").autocomplete({
        source: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        select: function (event, ui) {
            var nombreProducto = ui.item.label;
            if (checkNombre(nombreProducto)) {
                toastr.error("El producto <b>" + nombreProducto + "</b> ya fue agregado a la lista!", "¡ERROR!");
                $(this).val("");
                return false;
            }

            var cadena = ui.item.pds_sku;
            var sku = cadena.split("/")[0];
            if (sku == undefined) {
                sku = "";
            }

            tbodyProductos =
                `
                <tr id="${sku}">
                    <td>${sku}</td>
                    <td style="display:flex; justify-content: center">
                        <span class="input-group-btn">
                            <button class="btn btn-default menos" btn_menos="${sku}" type="button">-</button>
                        </span>
                        <input type="text" class="form-control" style="width:50px;text-align: center;" id="contador${sku}" cps_id="${sku}" value="1" min="1">
                        <span class="input-group-btn">
                            <button class="btn btn-default mas" btn_mas="${sku}" type="button">+</button>
                        </span>
                    </td>
                    <td for="nombreProducto">${nombreProducto}</td>
                    <td>
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

            if (productos == "") {
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
            $("#productos_contratos").val("");
        }

    });
    $("tfoot").on("click", ".btnGuardarProductos", function (e) {
        e.preventDefault();
        var productos_contratos = $("#productos_contratos").val();
        if (productos_contratos == "") {
            toastr.warning("Agregar productos a la lista", "¡ADVERTENCIA!");
            return false;
        }
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

    $("#tbodyProductos").on("click", ".mas", function (e) {
        var id = $(this).attr("btn_mas");
        $("#contador" + id).val(Number($("#contador" + id).val()) + 1);

        var products = $("#productos_contratos").val();
        var productos = JSON.parse(products);
        for (var i = productos.length; i--;) {
            if (productos[i].sku == id) {
                productos[i].cantidad = Number($("#contador" + id).val());
            }
        }
        $("#productos_contratos").val(JSON.stringify(productos));

    });

    $("#tbodyProductos").on("click", ".menos", function (e) {
        var id = $(this).attr("btn_menos");
        $("#contador" + id).val(Number($("#contador" + id).val()) - 1);
        if ($("#contador" + id).val() == "0") {
            $("#contador" + id).val("1");
        }
        var products = $("#productos_contratos").val();
        var productos = JSON.parse(products);
        for (var i = productos.length; i--;) {
            if (productos[i].sku == id) {
                productos[i].cantidad = Number($("#contador" + id).val());
            }
        }
        $("#productos_contratos").val(JSON.stringify(productos));
    });

    $("#formActualizarStatus").on("submit", function (e) {
        e.preventDefault();
        var input_file = $("#input_file").val();
        if (input_file == "") {
            toastr.warning("Por favor seleccione un archivo!", "ADVERTENCIA");
            return false;
        }

        swal({
            title: "¿Estas seguro de querer importar la lista para cambio de status?",
            text: "Asegurate de tener el archivo con los requerimientos solicitados",
            icon: "info",
            buttons: ["Calcelar", "Si, importar lista"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var datos = new FormData()
                    var files = $("#input_file")[0].files[0]
                    datos.append("btnImportarStatus", true)
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
                            stopLoadButton('Redirigiendo...')

                            if (respuesta.status) {

                                swal({
                                    title: respuesta.mensaje,
                                    text: "Se actualizaron " + respuesta.update + " contratos ",
                                    icon: "success",
                                    buttons: [false, "Ver lista"],
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            window.location.reload();
                                        } else {
                                            window.location.reload();

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
                                            window.location.reload();
                                        } else {
                                            window.location.reload();

                                        }
                                    })

                            }

                        }
                    })
                }
            });
    });

    //ENRUTAR CONTRATOS

    // function asignarPosiciones() {
    //     $("#accordion .posicion").each(function (index) {
    //         if ($(this).attr("data-position") != (index + 1)) {
    //             $(this).attr("data-position", (index + 1)).addClass("updated");
    //         }
    //     });
    //     guardandoPosiciones();
    // }


    // $("#martes").sortable({
    //     update: function (event, iu) {
    //         $(this).children().each(function (index) {
    //             if ($(this).attr("data-position") != (index + 1)) {
    //                 $(this).attr("data-position", (index + 1)).addClass("updated");
    //             }
    //         });
    //         guardandoPosiciones();
    //     }
    // })
    // // $('#martes').disableSelection();
    // $("#miercoles").sortable({
    //     update: function (event, iu) {
    //         $(this).children().each(function (index) {
    //             if ($(this).attr("data-position") != (index + 1)) {
    //                 $(this).attr("data-position", (index + 1)).addClass("updated");
    //             }
    //         });
    //         guardandoPosiciones();
    //     }
    // })
    // $("#jueves").sortable({
    //     update: function (event, iu) {
    //         $(this).children().each(function (index) {
    //             if ($(this).attr("data-position") != (index + 1)) {
    //                 $(this).attr("data-position", (index + 1)).addClass("updated");
    //             }
    //         });
    //         guardandoPosiciones();
    //     }
    // })
    // $("#viernes").sortable({
    //     update: function (event, iu) {
    //         $(this).children().each(function (index) {
    //             if ($(this).attr("data-position") != (index + 1)) {
    //                 $(this).attr("data-position", (index + 1)).addClass("updated");
    //             }
    //         });
    //         guardandoPosiciones();
    //     }
    // })
    // $("#sabado").sortable({
    //     update: function (event, iu) {
    //         $(this).children().each(function (index) {
    //             if ($(this).attr("data-position") != (index + 1)) {
    //                 $(this).attr("data-position", (index + 1)).addClass("updated");
    //             }
    //         });
    //         guardandoPosiciones();
    //     }
    // })
    // $("#domingo").sortable({
    //     update: function (event, iu) {
    //         $(this).children().each(function (index) {
    //             if ($(this).attr("data-position") != (index + 1)) {
    //                 $(this).attr("data-position", (index + 1)).addClass("updated");
    //             }
    //         });
    //         guardandoPosiciones();
    //     }
    // })



    function guardandoPosiciones() {
        var pocisiones = [];
        $(".updated").each(function () {
            pocisiones.push([$(this).attr("data-index"), $(this).attr("data-position")]);
            $(this).removeClass("updated");
        })

        var datos = new FormData();
        datos.append("posiciones", JSON.stringify(pocisiones));
        datos.append("btnCambiarPosiciones", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res) {
                    consultarCartelera();
                }
            }
        });
    }

    if ($("#crt_ruta").val() != "") {
        obtenerUltimoOrden();
        var crt_ruta = $("#crt_ruta").val();
        var metodo_pgo = $("#metodo_pgo").val();
        var datos = new FormData()
        datos.append("crt_ruta", crt_ruta)
        datos.append("metodo_pgo", metodo_pgo)
        datos.append("btnSelectedRuta", true)
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            // beforeSend: function () {
            //     startLoadButton()
            // },
            success: function (res) {
                consultarCartelera();
                var listaPrincipal = "";
                res.forEach(element => {
                    listaPrincipal +=
                        `
                    <div class="col-xl-12">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                    <h5 class="card-title">${element.ctr_folio}</h5>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                    <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                    <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                    <p>
                                        <div class="form-group">
                                            <label for="cra_orden"># Orden</label>
                                            <input type="number" class="form-control cra_orden" name="" id="cra_orden${element.ctr_id}" ctr_id="${element.ctr_id}">
                                        </div>
                                    </p>
                                    <p>
                                        <div class="form-group">
                                            <label for="dia_semanal">Seleccionar día</label>
                                            <select class="form-control dia_semanal" name="dia_semanal" id="dia_semanal${element.ctr_id}" ctr_id="${element.ctr_id}">
                                                <option value="">--Seleccionar--</option>
                                                <option value="LUNES">LUNES</option>
                                                <option value="MARTES">MARTES</option>
                                                <option value="MIERCOLES">MIERCOLES</option>
                                                <option value="JUEVES">JUEVES</option>
                                                <option value="VIERNES">VIERNES</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                            </select>
                                        </div>
                                    </p>
                                    <p>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-success btn-block btnGuardarCtsSemanal" ctr_id="${element.ctr_id}">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#listaPrincipal").html(listaPrincipal);

            }
        });
    }
    function consultarSemanales() {
        var crt_ruta = $("#crt_ruta").val();
        var metodo_pgo = $("#metodo_pgo").val();
        if (metodo_pgo == "SEMANALES") {
            var datos = new FormData()
            datos.append("crt_ruta", crt_ruta)
            datos.append("metodo_pgo", metodo_pgo)
            datos.append("btnSelectedRuta", true)
            $.ajax({
                url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                // beforeSend: function () {
                //     startLoadButton()
                // },
                success: function (res) {
                    consultarCartelera();
                    var listaPrincipal = "";
                    res.forEach(element => {
                        listaPrincipal +=
                            `
                <div class="col-xl-12">
                        <div class="card" style="border-style: dotted;">
                            <div class="card-body">
                                <h5 class="card-title">${element.ctr_folio}</h5>
                                <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                <p>
                                    <div class="form-group">
                                        <label for="cra_orden"># Orden</label>
                                        <input type="number" class="form-control cra_orden" name="" id="cra_orden${element.ctr_id}" ctr_id="${element.ctr_id}">
                                    </div>
                                </p>
                                <p>
                                    <div class="form-group">
                                        <label for="dia_semanal">Seleccionar día</label>
                                        <select class="form-control dia_semanal" name="dia_semanal" id="dia_semanal${element.ctr_id}" ctr_id="${element.ctr_id}">
                                            <option value="">--Seleccionar--</option>
                                            <option value="LUNES">LUNES</option>
                                            <option value="MARTES">MARTES</option>
                                            <option value="MIERCOLES">MIERCOLES</option>
                                            <option value="JUEVES">JUEVES</option>
                                            <option value="VIERNES">VIERNES</option>
                                            <option value="SABADO">SABADO</option>
                                            <option value="DOMINGO">DOMINGO</option>
                                        </select>
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success btn-block btnGuardarCtsSemanal" ctr_id="${element.ctr_id}">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                    });
                    $("#listaPrincipal").html(listaPrincipal);

                }
            });
        } else if (metodo_pgo == "CATORCENALES") {
            consultarCatorcenales();
        } else if (metodo_pgo == "QUINCENALES") {
            consultarQuincenales();
        } else {
            consultarMensuales();
        }

    }

    function consultarCatorcenales() {
        var metodo_pgo = $("#metodo_pgo").val();
        var crt_ruta = $("#crt_ruta").val();
        if (metodo_pgo == "CATORCENALES") {
            var datos = new FormData()
            datos.append("crt_ruta", crt_ruta)
            datos.append("metodo_pgo", metodo_pgo)
            datos.append("btnSelectedRuta", true)
            $.ajax({
                url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                // beforeSend: function () {
                //     startLoadButton()
                // },
                success: function (res) {
                    consultarCartelera();
                    var listaPrincipal = "";
                    res.forEach(element => {
                        listaPrincipal +=
                            `
                <div class="col-xl-12">
                        <div class="card" style="border-style: dotted;">
                            <div class="card-body">
                                <h5 class="card-title">${element.ctr_folio}</h5>
                                <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                <p>
                                    <div class="form-group">
                                        <label for="cra_orden"># Orden</label>
                                        <input type="number" class="form-control" name="" id="cra_orden${element.ctr_id}" ctr_id="${element.ctr_id}">
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="ctr_fecha${element.ctr_id}">Dia del mes</label>
                                                <input type="date" class="form-control" name="" id="ctr_catorcenal${element.ctr_id}">
                                            </div>
                                        </div>
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success btn-block btnGuardarCtsCatorcenal" ctr_id="${element.ctr_id}">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                    });
                    $("#listaPrincipal").html(listaPrincipal);

                }
            });
        } else if (metodo_pgo == "SEMANALES") {
            consultarSemanales();
        } else if (metodo_pgo == "CATORCENALES") {
            consultarCatorcenales();
        } else {
            consultarQuincenales();
        }
    }

    function consultarQuincenales() {
        var metodo_pgo = $("#metodo_pgo").val();
        var crt_ruta = $("#crt_ruta").val();
        if (metodo_pgo == "QUINCENALES") {
            var datos = new FormData()
            datos.append("crt_ruta", crt_ruta)
            datos.append("metodo_pgo", metodo_pgo)
            datos.append("btnSelectedRuta", true)
            $.ajax({
                url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                // beforeSend: function () {
                //     startLoadButton()
                // },
                success: function (res) {
                    consultarCartelera();
                    var listaPrincipal = "";
                    res.forEach(element => {
                        listaPrincipal +=
                            `
                <div class="col-xl-12">
                        <div class="card" style="border-style: dotted;">
                            <div class="card-body">
                                <h5 class="card-title">${element.ctr_folio}</h5>
                                <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                <p>
                                    <div class="form-group">
                                        <label for="cra_orden"># Orden</label>
                                        <input type="number" class="form-control" name="" id="cra_orden${element.ctr_id}" ctr_id="${element.ctr_id}">
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-xl-6 col-6">
                                            <div class="form-group">
                                                <label for="ctr_dia1">Dia 1</label>
                                                <input type="number" class="form-control" name="" id="ctr_dia1${element.ctr_id}" maxlength="2" min="0">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-6">
                                            <div class="form-group">
                                                <label for="ctr_dia2">Dia 2</label>
                                                <input type="number" class="form-control" name="" id="ctr_dia2${element.ctr_id}"  maxlength="2" min="0">
                                            </div>
                                        </div>
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success btn-block btnGuardarCts" ctr_id="${element.ctr_id}">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                    });
                    $("#listaPrincipal").html(listaPrincipal);

                }
            });
        } else if (metodo_pgo == "SEMANALES") {
            consultarSemanales();
        } else if (metodo_pgo == "CATORCENALES") {
            consultarCatorcenales();
        } else {
            consultarMensuales();
        }

    }
    function consultarMensuales() {
        var metodo_pgo = $("#metodo_pgo").val();
        var crt_ruta = $("#crt_ruta").val();
        if (metodo_pgo == "MENSUALES") {
            var datos = new FormData()
            datos.append("crt_ruta", crt_ruta)
            datos.append("metodo_pgo", metodo_pgo)
            datos.append("btnSelectedRuta", true)
            $.ajax({
                url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                // beforeSend: function () {
                //     startLoadButton()
                // },
                success: function (res) {
                    consultarCartelera();
                    var listaPrincipal = "";
                    res.forEach(element => {
                        listaPrincipal +=
                            `
                <div class="col-xl-12">
                        <div class="card" style="border-style: dotted;">
                            <div class="card-body">
                                <h5 class="card-title">${element.ctr_folio}</h5>
                                <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                <p>
                                    <div class="form-group">
                                        <label for="cra_orden"># Orden</label>
                                        <input type="number" class="form-control" name="" id="cra_orden${element.ctr_id}" ctr_id="${element.ctr_id}">
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="ctr_fecha${element.ctr_id}">Dia del mes</label>
                                                <input type="number" class="form-control" name="" id="ctr_fecha${element.ctr_id}">
                                            </div>
                                        </div>
                                    </div>
                                </p>
                                <p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success btn-block btnGuardarCtsMensual" ctr_id="${element.ctr_id}">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                    });
                    $("#listaPrincipal").html(listaPrincipal);

                }
            });
        } else if (metodo_pgo == "SEMANALES") {
            consultarSemanales();
        } else if (metodo_pgo == "CATORCENALES") {
            consultarCatorcenales();
        } else {
            consultarQuincenales();
        }

    }


    $(document).on("change", "#crt_ruta", function (e) {
        consultarSemanales();
        obtenerUltimoOrden();
    });
    $(document).on("change", "#metodo_pgo", function (e) {
        consultarCatorcenales();
        obtenerUltimoOrden();
    });

    $("#Buscador").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#listaPrincipal .col-xl-12").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });


    $(document).on("click", ".btnGuardarCtsSemanal", function () {
        $("#loader").addClass("d-none");
        var dia;
        var ctr_id = $(this).attr("ctr_id");
        var ctr_dia = $("#dia_semanal" + ctr_id).val();
        var cra_orden = $("#cra_orden" + ctr_id).val();
        var crt_ruta = $("#crt_ruta").val();
        if (ctr_dia == "") {
            toastr.warning("El dia es obligatorio", "¡ADVERTENCIA!");
            return false;
        }
        else if (cra_orden == "") {
            toastr.warning("El numero de orden es obligatorio", "¡ADVERTENCIA!");
            return false;
        }

        if (ctr_dia == "LUNES") {
            dia = $("#ctr_lunes").val();
        } else if (ctr_dia == "MARTES") {
            dia = $("#ctr_martes").val();
        } else if (ctr_dia == "MIERCOLES") {
            dia = $("#ctr_miercoles").val();
        } else if (ctr_dia == "JUEVES") {
            dia = $("#ctr_jueves").val();
        } else if (ctr_dia == "VIERNES") {
            dia = $("#ctr_viernes").val();
        } else if (ctr_dia == "SABADO") {
            dia = $("#ctr_sabado").val();
        } else if (ctr_dia == "DOMINGO") {
            dia = $("#ctr_domingo").val();
        }
        var datos = new FormData();
        datos.append("ctr_id", ctr_id);
        datos.append("ctr_fecha", dia);
        datos.append("ctr_dia_pago", ctr_dia);
        datos.append("cra_orden", cra_orden);
        datos.append("crt_ruta", crt_ruta);
        datos.append("btnInsertContrato", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res) {
                    $("#loader").removeClass("d-none");
                    $("#loader").html('<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>');
                    imprimirContratos();
                    consultarCartelera();
                    obtenerUltimoOrden();

                }

            }
        });
    });

    $(document).on("click", ".btnGuardarCts", function () {
        $("#loader").addClass("d-none");
        var ctr_id = $(this).attr("ctr_id");
        var cra_orden = $("#cra_orden" + ctr_id).val();
        var crt_ruta = $("#crt_ruta").val();
        var ctr_dia1 = Number($("#ctr_dia1" + ctr_id).val());
        var ctr_dia2 = Number($("#ctr_dia2" + ctr_id).val());
        var dia_actual = Number($("#dia_actual").val());
        var mes_actual = $("#mes_actual").val();
        var mes_siguiente = $("#mes_siguiente").val();

        if (cra_orden == "") {
            toastr.warning("El numero de orden es obligatorio", "¡ADVERTENCIA!");
            return false;
        }

        if (ctr_dia1 == "" || ctr_dia2 == "") {
            toastr.warning("Los campos dia 1 y dia 2 son obligatorios", "¡ADVERTENCIA!");
            return false;
        }
        if (ctr_dia1 < 0 || ctr_dia1 > 31) {
            toastr.warning("El dia debe estar comprendido entre 1 - 31", "¡ADVERTENCIA!");
            return false;
        }
        if (ctr_dia2 < 0 || ctr_dia2 > 31) {
            toastr.warning("El dia debe estar comprendido entre 1 - 31", "¡ADVERTENCIA!");
            return false;
        }


        //DIA2
        var dia1 = "";
        if (ctr_dia1 >= dia_actual) {
            dia1 = ctr_dia1 <= 9 ? mes_actual + "-0" + ctr_dia1 : mes_actual + "-" + ctr_dia1;
        } else {
            dia1 = ctr_dia1 <= 9 ? mes_siguiente + "-0" + ctr_dia1 : mes_siguiente + "-" + ctr_dia1;
        }
        //DIA1
        var dia2 = "";
        if (ctr_dia2 >= dia_actual) {
            dia2 = ctr_dia2 <= 9 ? mes_actual + "-0" + ctr_dia2 : mes_actual + "-" + ctr_dia2;
        } else {
            dia2 = ctr_dia2 <= 9 ? mes_siguiente + "-0" + ctr_dia2 : mes_siguiente + "-" + ctr_dia2;
        }
        var ctr_dia = ctr_dia1 + "-" + ctr_dia2;

        var datos = new FormData();
        datos.append("ctr_id", ctr_id);
        datos.append("cra_orden", cra_orden);
        datos.append("crt_ruta", crt_ruta);
        datos.append("ctr_fecha1", dia1);
        datos.append("ctr_fecha2", dia2);
        datos.append("ctr_dia_pago", ctr_dia);
        datos.append("btnInsertContrato2", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res) {
                    $("#loader").removeClass("d-none");
                    $("#loader").html('<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>');
                    imprimirContratos();
                    consultarCartelera();
                    obtenerUltimoOrden();
                }

            }
        });
    });
    $(document).on("click", ".btnGuardarCtsCatorcenal", function () {
        $("#loader").addClass("d-none");
        var ctr_id = $(this).attr("ctr_id");
        var cra_orden = $("#cra_orden" + ctr_id).val();
        var crt_ruta = $("#crt_ruta").val();
        var ctr_fecha = $("#ctr_catorcenal" + ctr_id).val();

        const dias = [
            'LUNES',
            'MARTES',
            'MIERCOLES',
            'JUEVES',
            'VIERNES',
            'SABADO',
            'DOMINGO',
        ];
        var fecha = new Date(ctr_fecha).getDay();
        var ctr_dia_catorcenal = dias[fecha];


        if (cra_orden == "") {
            toastr.warning("El numero de orden es obligatorio", "¡ADVERTENCIA!");
            return false;
        }

        if (ctr_fecha == "") {
            toastr.warning("La fecha es obligatoria", "¡ADVERTENCIA!");
            return false;
        }


        var datos = new FormData();
        datos.append("ctr_id", ctr_id);
        datos.append("ctr_fecha", ctr_fecha);
        datos.append("ctr_dia_pago", ctr_dia_catorcenal);
        datos.append("cra_orden", cra_orden);
        datos.append("crt_ruta", crt_ruta);
        datos.append("btnInsertContrato4", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res) {
                    $("#loader").removeClass("d-none");
                    $("#loader").html('<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>');
                    imprimirContratos();
                    consultarCartelera();
                    obtenerUltimoOrden();
                }

            }
        });
    });
    $(document).on("click", ".btnGuardarCtsMensual", function () {
        $("#loader").addClass("d-none");
        var ctr_id = $(this).attr("ctr_id");
        var cra_orden = $("#cra_orden" + ctr_id).val();
        var crt_ruta = $("#crt_ruta").val();
        var ctr_fecha = Number($("#ctr_fecha" + ctr_id).val());
        var mes_actual = $("#mes_actual").val();
        var mes_siguiente = $("#mes_siguiente").val();
        var dia_actual = Number($("#dia_actual").val());

        if (cra_orden == "") {
            toastr.warning("El numero de orden es obligatorio", "¡ADVERTENCIA!");
            return false;
        }

        if (ctr_fecha == "") {
            toastr.warning("La dia del mes es obligatoria", "¡ADVERTENCIA!");
            return false;
        }
        if (ctr_fecha < 0 || ctr_fecha > 31) {
            toastr.warning("El dia debe estar comprendido entre 1 - 31", "¡ADVERTENCIA!");
            return false;
        }


        var dia_fecha = "";
        if (ctr_fecha >= dia_actual) {
            dia_fecha = ctr_fecha <= 9 ? mes_actual + "-0" + ctr_fecha : mes_actual + "-" + ctr_fecha;
        } else {
            dia_fecha = ctr_fecha <= 9 ? mes_siguiente + "-0" + ctr_fecha : mes_siguiente + "-" + ctr_fecha;
        }


        var datos = new FormData();
        datos.append("ctr_id", ctr_id);
        datos.append("ctr_fecha", dia_fecha);
        datos.append("ctr_dia_pago", ctr_fecha);
        datos.append("cra_orden", cra_orden);
        datos.append("crt_ruta", crt_ruta);
        datos.append("btnInsertContrato3", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                if (res) {
                    $("#loader").removeClass("d-none");
                    $("#loader").html('<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div>');
                    imprimirContratos();
                    consultarCartelera();
                    obtenerUltimoOrden();
                }

            }
        });
    });

    function imprimirContratos() {
        var metodo_pgo = $("#metodo_pgo").val();
        if (metodo_pgo == "CATORCENALES") {
            consultarCatorcenales();
        } else if (metodo_pgo == "QUINCENALES") {
            consultarQuincenales();
        } else if (metodo_pgo == "MENSUALES") {
            consultarMensuales();
        } else {
            consultarSemanales();
        }
    }
    consultarCartelera();
    function consultarCartelera() {
        var crt_ruta = $("#crt_ruta").val();
        var lunes = $("#ctr_lunes").val();
        var martes = $("#ctr_martes").val();
        var miercoles = $("#ctr_miercoles").val();
        var jueves = $("#ctr_jueves").val();
        var viernes = $("#ctr_viernes").val();
        var sabado = $("#ctr_sabado").val();
        var domingo = $("#ctr_domingo").val();
        var fecha_hoy = $("#fecha_hoy").val();
        if (crt_ruta == "") {
            return;
        }
        var datos = new FormData();
        datos.append("lunes", lunes);
        datos.append("domingo", domingo);
        datos.append("crt_ruta", crt_ruta);
        datos.append("btnConsultarCartelera", true);
        $.ajax({
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (res) {
                var listar_lunes = "";
                var listar_martes = "";
                var listar_miercoles = "";
                var listar_jueves = "";
                var listar_viernes = "";
                var listar_sabado = "";
                var listar_domingo = "";
                res.forEach(element => {
                    const fechaComoCadena = element.cra_fecha_cobro;
                    var orden = element.cra_orden;
                    if (orden == null || orden == "") {
                        orden = "";
                    } else {
                        orden = element.cra_orden;
                    }
                    const dias = [
                        'LUNES',
                        'MARTES',
                        'MIERCOLES',
                        'JUEVES',
                        'VIERNES',
                        'SABADO',
                        'DOMINGO',
                    ];
                    const numeroDia = new Date(fechaComoCadena).getDay();
                    const nombreDia = dias[numeroDia];
                    if (nombreDia == "LUNES") {

                        listar_lunes +=
                            `
                        <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                    <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-light btn-sm" data-toggle="collapse" href="#lunes${element.cra_id}" role="button" aria-expanded="false" aria-controls="lunes">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="lunes${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "MARTES") {

                        listar_martes +=
                            `
                    <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                   <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-light btn-sm" data-toggle="collapse" href="#martes${element.cra_id}" role="button" aria-expanded="false" aria-controls="martes">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="martes${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "MIERCOLES") {

                        listar_miercoles +=
                            `
                    <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                   <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-light btn-sm" data-toggle="collapse" href="#miercoles${element.cra_id}" role="button" aria-expanded="false" aria-controls="miercoles">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="miercoles${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "JUEVES") {

                        listar_jueves +=
                            `
                         <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                   <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-light btn-sm" data-toggle="collapse" href="#jueves${element.cra_id}" role="button" aria-expanded="false" aria-controls="jueves">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="jueves${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "VIERNES") {

                        listar_viernes +=
                            `
                         <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                   <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-light btn-sm" data-toggle="collapse" href="#viernes${element.cra_id}" role="button" aria-expanded="false" aria-controls="viernes">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="viernes${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "SABADO") {

                        listar_sabado +=
                            `
                         <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                   <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-light btn-sm" data-toggle="collapse" href="#sabado${element.cra_id}" role="button" aria-expanded="false" aria-controls="sabado">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="sabado${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "DOMINGO") {

                        listar_domingo +=
                            `
                         <div class="col-xl-6 col-12 posicion" data-index="${element.cra_id}" data-position="${element.cra_orden}">
                            <div class="card" style="border-style: dotted;">
                                <div class="card-body">
                                   <p class="card-text" data-toggle="modal"><h5>Orden: <span class="badge badge-primary">${orden}</span></h5></p>
                                    <p class="card-text"><strong>Domiclio:</strong> ${element.clts_domicilio}, ${element.clts_col}</p>
                                    <p class="card-text" data-toggle="modal"><strong>No. de cuenta y ruta:</strong> ${element.ctr_numero_cuenta} ${element.ctr_ruta}</p>
                                    <p>
                                        <a class="btn btn-outline-dark btn-sm" data-toggle="collapse" href="#domingo${element.cra_id}" role="button" aria-expanded="false" aria-controls="domingo">
                                            <i class="fa fa-eye"> Ver más </i>
                                        </a>
                                    </p>
                                    <div class="collapse" id="domingo${element.cra_id}">
                                        <p class="card-text"><strong>Nombre del cliente:</strong> ${element.ctr_cliente}</p>
                                        <p class="card-text"><strong>Forma de pago:</strong> ${element.ctr_forma_pago}</p>
                                        <p class="card-text"><strong>Día de pago:</strong> ${element.ctr_dia_pago}</p>
                                        <p class="card-text"><strong>Día asignado por el cobrador:</strong> </p>
                                        <p class="text-right">
                                            <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    }
                });
                $("#lunes").html(listar_lunes);
                $("#martes").html(listar_martes);
                $("#miercoles").html(listar_miercoles);
                $("#jueves").html(listar_jueves);
                $("#viernes").html(listar_viernes);
                $("#sabado").html(listar_sabado);
                $("#domingo").html(listar_domingo);
                $("#loader").addClass("d-none");
                // asignarPosiciones();
                obtenerUltimoOrden();
            }
        });
    }

    $(document).on("click", ".btnEliminarCartelera", function () {
        var cra_id = $(this).attr("cra_id");
        var ctr_id = $(this).attr("ctr_id");
        var crt_ruta = $("#crt_ruta").val();
        swal({
            title: "¿Estas seguro de eliminar el contrato enrutado?",
            icon: "warning",
            buttons: ["Calcelar", "Si, eliminar"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var datos = new FormData()
                    datos.append("cra_id", cra_id)
                    datos.append("ctr_id", ctr_id)
                    datos.append("btnEliminarCartelera", true)
                    $.ajax({
                        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function (res) {
                            if (res) {
                                toastr.success("El contrato se ha eliminado correctamente!", "CORRECTO!");
                                if (crt_ruta) {
                                    imprimirContratos();
                                }
                                consultarCartelera();
                            }
                        }
                    });
                }

            });
    });


    //REGISTRAR CONTRATO

    var tbodyProductosContrato = "";
    var array = [];

    $("#buscar_productos").autocomplete({
        source: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        select: function (event, ui) {
            var nombreProducto = ui.item.label;
            if (checkId(nombreProducto)) {
                toastr.error("El producto <b>" + nombreProducto + "</b> ya fue agregado a la lista!", "¡ERROR!");
                $(this).val("");
                return false;
            }
            var cadena = ui.item.pds_sku;
            var sku = cadena.split("/")[0];
            if (sku == undefined) {
                sku = "";
            }

            tbodyProductosContrato =
                `
                <tr id="${ui.item.pds_id_producto}">
                    <td>${sku}</td>
                    <td for="nombreProducto">${nombreProducto}</td>
                    <td style="display:flex; justify-content: center">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn_min" min="${ui.item.pds_id_producto}" type="button">-</button>
                        </span>
                        <input type="text" class="form-control" disabled style="width:50px;text-align: center;" id="contadorContrato${ui.item.pds_id_producto}" cps_id="${ui.item.pds_id_producto}" value="1" min="1">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn_max" max="${ui.item.pds_id_producto}" type="button">+</button>
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger eliminarProductoContrato" pds_id_producto="${ui.item.pds_id_producto}"><i class="fa fa-trash"></i> Borrar</button>
                    </td>
                </tr>
                `;

            var datos = {
                "pds_id_producto": ui.item.pds_id_producto,
                "sku": sku,
                "nombreProducto": ui.item.label,
                "cantidad": 1,
            };

            if (array == "") {
                array.push(datos);
                $("#productos_contrato").val(JSON.stringify(array));
            } else {
                var productos = $("#productos_contrato").val();
                array = JSON.parse(productos);
                array.push(datos);
                $("#productos_contrato").val(JSON.stringify(array));
            }
            $("#tbodyProductosContrato").append(tbodyProductosContrato);

            $(this).val("");
            return false;
        }

    });
    function checkId(nombreProducto) {
        let ids = document.querySelectorAll('#tbodyProductosContrato td[for="nombreProducto"]');
        return [].filter.call(ids, td => td.textContent === nombreProducto).length === 1;
    }

    $("#tbodyProductosContrato").on("click", ".btn_max", function (e) {
        var id = $(this).attr("max");
        $("#contadorContrato" + id).val(Number($("#contadorContrato" + id).val()) + 1);

        var products = $("#productos_contrato").val();
        var productos = JSON.parse(products);
        for (var i = productos.length; i--;) {
            if (productos[i].pds_id_producto == id) {
                productos[i].cantidad = Number($("#contadorContrato" + id).val());
            }
        }
        $("#productos_contrato").val(JSON.stringify(productos));

    });

    $("#tbodyProductosContrato").on("click", ".btn_min", function (e) {
        var id = $(this).attr("min");
        $("#contadorContrato" + id).val(Number($("#contadorContrato" + id).val()) - 1);
        if ($("#contadorContrato" + id).val() == "0") {
            $("#contadorContrato" + id).val("1");
        }
        var products = $("#productos_contrato").val();
        var productos = JSON.parse(products);
        for (var i = productos.length; i--;) {
            if (productos[i].pds_id_producto == id) {
                productos[i].cantidad = Number($("#contadorContrato" + id).val());
            }
        }
        $("#productos_contrato").val(JSON.stringify(productos));
    });

    $("#tbodyProductosContrato").on("click", ".eliminarProductoContrato", function (e) {
        e.preventDefault()
        var pds_id_producto = $(this).attr("pds_id_producto");
        var products = $("#productos_contrato").val();
        var productos = JSON.parse(products);
        for (var i = productos.length; i--;) {
            if (productos[i].pds_id_producto === pds_id_producto) {
                productos.splice(i, 1);
            }
        }


        // $("#" + sku).remove();
        $(this).closest('tr').remove();
        $("#productos_contrato").val(JSON.stringify(productos));


        if (productos == "") {
            array = [];
            $("#productos_contrato").val("");
        }

    });

    //OBTENER VALORES
    $(document).on("change", "#ctr_pago_credito", function (e) {
        var ctr_pago_credito = $(this).val();
        var ctr_saldo = $("#ctr_saldo").val();

        $("#ctrs_plazo_credito").val(Number(ctr_saldo / ctr_pago_credito));
    });

    $(".grupo").keyup(function () {
        sumarSaldo();
    });

    function sumarSaldo() {
        var suma = 0;
        var total_venta = $("#total_venta").val();
        $('.grupo').each(function () {
            suma += Number($(this).val());
        });
        var saldo = total_venta - suma;
        $("#ctr_saldo").val(Number(saldo));

        var ctr_saldo = $("#ctr_saldo").val();
        var ctr_pago_credito = $("#ctr_pago_credito").val();
        $("#ctrs_plazo_credito").val(Math.ceil(Number(ctr_saldo / ctr_pago_credito)));
    }



    $("#formNewContratoAdd").on("submit", function (e) {
        e.preventDefault();
        var productos_contrato = $("#productos_contrato").val();
        if (productos_contrato == "") {
            toastr.warning("Agregar productos a la lista", "¡ADVERTENCIA!");
            return false;
        }
        var datos = new FormData(this);
        datos.append("btnContratoAdd", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
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
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        });
                } else {
                    toastr.error(res.mensaje, 'Error');
                }
            }
        })
    });


    //Fomularios para subir las imagenes del contrato
    $("#formFotosCliente").on("submit", function (e) {
        e.preventDefault();
        var ctrs_id = $("#ctrs_id").val();
        var datos = new FormData(this);
        datos.append("ctrs_id", ctrs_id);
        datos.append("btnAgregarFotosCliente", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
                    toastr.success(res.mensaje, "Muy bien");
                    $("#agregarFotosCliente").modal("hide");
                    $(".btnshowFotos").trigger("click");
                    $("#formFotosCliente")[0].reset();
                } else {
                    toastr.error(res.mensaje, 'Error');
                    $("#agregarFotosCliente").modal("hide");
                    $(".btnshowFotos").trigger("click");
                }
            }
        })

    });

    $("#formFotosFiador").on("submit", function (e) {
        e.preventDefault();
        var ctrs_id = $("#ctrs_id").val();
        var datos = new FormData(this);
        datos.append("ctrs_id", ctrs_id);
        datos.append("btnAgregarFotosFiador", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (res) {
                if (res.status) {
                    toastr.success(res.mensaje, "Muy bien");
                    $("#agregarFotosFiador").modal("hide");
                    $(".btnshowFotos").trigger("click");
                    $("#formFotosFiador")[0].reset();
                } else {
                    toastr.error(res.mensaje, 'Error');
                    $("#agregarFotosFiador").modal("hide");
                    $(".btnshowFotos").trigger("click");
                }
            }
        })

    });

    var tbodyProductos2 = "";
    var data2 = [];

    $("#autocomplete_pdt2").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                method: "POST",
                dataType: "json",
                data: {
                    auto_complete_producto: request.term
                },
                success: function (data) {
                    response(data);
                }

            });
        },
        minLength: 2,
        select: function (event, ui) {
            var ctrs_id = $("#ctrs_id").val();
            var res = ui.item;
            var encontrado = false;
            $(".serie").each(function () {
                if ($(this).text() == res.spds_serie_completa) {
                    toastr.warning('El producto ' + res.mpds_descripcion + '-' + res.mpds_modelo + '-' + res.spds_serie_completa + ' ya se agrego a su lista.', 'ADVERTENCIA!');
                    encontrado = true;
                    return false;
                }
            });

            if (encontrado) {
                $(this).val("");
                return false;
            }

            var datos = new FormData();
            datos.append('spds_id', res.spds_id);
            datos.append('ctrs_id', ctrs_id);
            datos.append('btnAsignarAlmacenContrato', true);
            $.ajax({
                type: 'POST',
                url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                data: datos,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (respuesta) {
                    if (respuesta.status) {
                        tbodyProductos2 =
                            `
                        <tr id="${res.spds_serie_completa}">
                            <td>${res.mpds_descripcion}-${res.mpds_modelo}</td>
                            <td class="serie">${res.spds_serie_completa}</td>
                            <td>
                                <button type="button" class="btn btn-danger btnQuitarProducto2" spds_id="${res.spds_id}" sku="${res.spds_serie_completa}"><i class="fa fa-times"></i> Cancelar</button>
                            </td>
                        </tr>
                        `;
                        var datos = {
                            "spds_id": res.spds_id,
                            "sku": res.spds_serie_completa,
                            "nombreProducto": res.mpds_descripcion + '-' + res.mpds_modelo,
                            "cantidad": 1,
                        };
                        var productos = $("#productos_contratos").val();

                        if (productos == "") {
                            data2.push(datos);
                            $("#productos_contratos").val(JSON.stringify(data2));
                        } else {
                            var productos = $("#productos_contratos").val();
                            data2 = JSON.parse(productos);
                            data2.push(datos);
                            $("#productos_contratos").val(JSON.stringify(data2));
                        }

                        $("#tbodyProductos").append(tbodyProductos2);

                        $("#autocomplete_pdt2").val("");
                        guardarModelosProductos();
                    } else {
                        toastr.error(respuesta.mensaje, '¡ERROR!');
                        $('#autocomplete_pdt2').val("");
                    }
                }
            });


        }
    });
});

$(document).on("click", ".btnQuitarProducto2", function () {
    var sku = $(this).attr("sku");
    var spds_id = $(this).attr("spds_id");
    if (spds_id != undefined) {
        $("#bcra_spds_id").val(spds_id);
    }

    $("#bcra_sku").val(sku);
    $("#mdlMotivoCancelacion").modal('show');

});
$(document).on("click", "#btnQuitarProducto2", function () {
    var sku = $("#bcra_sku").val();
    var spds_id = $("#bcra_spds_id").val();
    var bcra_nota = $("#bcra_nota").val();
    if(bcra_nota == ""){
        return toastr.warning('El motivo es obligatorio', 'ADVERTENCIA!');
    }
    var datos = new FormData();
    if (spds_id != "") {
        datos.append('spds_id', spds_id);
    }
    datos.append('bcra_nota', bcra_nota);
    datos.append('btnQuitarProductoContrato', true);
    $.ajax({
        type: 'POST',
        url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
        data: datos,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (res) {
            if (res.status) {
                var products = $("#productos_contratos").val();
                var productos = JSON.parse(products);
                for (var i = productos.length; i--;) {
                    if (productos[i].sku === sku) {
                        productos.splice(i, 1);
                    }
                }

                $("#" + sku).remove();
                // $(this).closest('tr').remove();
                $("#productos_contratos").val(JSON.stringify(productos));


                if (productos == "") {
                    data = [];
                    $("#productos_contratos").val("[]");
                }

                guardarModelosProductos();
            } else {
                toastr.error(res.mensaje, '¡ERROR!');
            }

        }
    });


});

function guardarModelosProductos() {
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
            if (respuesta.status) {
                toastr.success(respuesta.mensaje, '¡Muy bien!');
                $("#mdlMotivoCancelacion").modal("hide");
                $("#bcra_nota").val("");
            } else {
                toastr.error(respuesta.mensaje, '¡ERROR!');
            }

        }
    })
}
