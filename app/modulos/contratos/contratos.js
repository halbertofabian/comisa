

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
            var bandera;
            $('#tbodyProductos tr').each(function () {
                nomProducrto = $(this).find("td").eq(2).html();
                if (nomProducrto.toUpperCase() === ui.item.label) {
                    toastr.warning(`¡El producto <strong>${ui.item.label}</strong> ya fue agregado a la lista!`, 'ADVETENCIA')
                    bandera = "existe";
                    $(this).val("");
                    return false;
                } else {
                    bandera = "no existe";
                }
            });

            if (bandera == "no existe") {
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
                    <td>${ui.item.label}</td>
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

    const listaPrincipal = document.getElementById("listaPrincipal");
    const lista1 = document.getElementById("lunes");
    const lista2 = document.getElementById("martes");
    const lista3 = document.getElementById("miercoles");
    const lista4 = document.getElementById("jueves");
    const lista5 = document.getElementById("viernes");
    const lista6 = document.getElementById("sabado");
    const lista7 = document.getElementById("domingo");

    Sortable.create(lista1, {
        animation: 150,

    });
    Sortable.create(lista2, {
        animation: 150,

    });
    Sortable.create(lista3, {
        animation: 150,
    });
    Sortable.create(lista4, {
        animation: 150,
        group: 'shared',
    });
    Sortable.create(lista5, {
        animation: 150,
    });
    Sortable.create(lista6, {
        animation: 150,
    });
    Sortable.create(lista7, {
        animation: 150,
    });

    $("#crt_ruta").on("change", function (e) {
        e.preventDefault();
        var crt_ruta = $(this).val();
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p>
                                        <div class="form-group">
                                            <label for="dia_semanal">Seleccionar día</label>
                                            <select class="form-control" name="dia_semanal" id="dia_semanal" ctr_id="${element.ctr_id}">
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
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#listaPrincipal").html(listaPrincipal);

            }
        });
    });

    $("#Buscador").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#listaPrincipal .col-xl-12").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });


    $(document).on("change", "#dia_semanal", function (e) {
        e.preventDefault();
        var dia;
        var ctr_dia = $(this).val();
        var ctr_id = $(this).attr("ctr_id");

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
                    imprimirContratos();
                    consultarCartelera();
                }

            }
        });
    });

    function imprimirContratos() {
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p>
                                        <div class="form-group">
                                            <label for="dia_semanal">Seleccionar día</label>
                                            <select class="form-control" name="dia_semanal" id="dia_semanal" ctr_id="${element.ctr_id}">
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
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#listaPrincipal").html(listaPrincipal);

            }
        });
    }
    consultarCartelera()
    function consultarCartelera() {
        var datos = new FormData();
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "MARTES") {
                        listar_martes +=
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "MIERCOLES") {
                        listar_miercoles +=
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "JUEVES") {
                        listar_jueves +=
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "VIERNES") {
                        listar_viernes +=
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "SABADO") {
                        listar_sabado +=
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                    } else if (nombreDia == "DOMINGO") {
                        listar_domingo +=
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
                                    <p class="card-text"><strong>Clave:</strong> </p>
                                    <p class="text-right">
                                        <button class="btn btn-danger btnEliminarCartelera" cra_id="${element.cra_id}" ctr_id="${element.ctr_id}"><i class="fa fa-trash"></i></button>
                                    </p>
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
});
