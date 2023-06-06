<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="">Seleccionar tipo</label>
                            <select class="form-control" name="" id="tipo">
                                <option selected value="CV">Cargar a vendedor</option>
                                <option value="TM">Traspaso de mercancia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="">Almacenes</label>
                            <input type="hidden" name="" id="scl_url">
                            <select class="form-control select2" name="" id="ams_id">
                                <option value="">-Seleccionar-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-12 ams_almacen d-none">
                        <div class="form-group">
                            <label for="">Vendedor</label>
                            <select class="form-control select2" name="" id="ams_vendedor">
                                <option value="">-Seleccionar-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="auto_complete_producto">Digite la serie del producto</label>
                            <input type="text" class="form-control" name="" id="auto_complete_producto" placeholder="Escriba el número de serie y seleccione...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>DESCRIPCIÓN Y MODELO</th>
                                    <th># SERIE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody_productos">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary float-right d-none" id="btnImprimirReporte"><i class="fa fa-file-pdf-o"></i> Imprimir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlMotivoCancelacion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Motivo de cancelación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="hidden" id="bcra_tipo">
                            <input type="hidden" id="bcra_spds_id">
                            <input type="hidden" id="bcra_ams_nombre">
                            <input type="hidden" id="bcra_spds_serie_completa">
                            <label for="bcra_nota">Motivo de cancelacion</label>
                            <textarea class="form-control text-uppercase" name="bcra_nota" id="bcra_nota" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnQuitarProducto">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        mostrarAlmacenesByTipo();

    });

    $('#tipo').on('change', function() {
        mostrarAlmacenesByTipo();
    });

    function mostrarAlmacenesByTipo() {
        var tipo = $("#tipo").val();
        var datos = new FormData()
        datos.append('tipo', tipo);
        datos.append('btnMostrarAlmacenesByTipo', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var almacenes = "";
                if (tipo == "CV") {
                    almacenes += `<option value="">Selecciona un almacén</option>`; // Agregar opción vacía
                    res.forEach(ams => {
                        almacenes += `<option value="${ams.ams_id}" ams_nombre="${ams.ams_nombre}">${ams.ams_nombre}</option>`;
                    });
                    $(".ams_almacen").addClass('d-none');
                } else {
                    almacenes += `<option value="">Selecciona un almacén</option>`; // Agregar opción vacía
                    res.forEach(ams => {
                        almacenes += `<option value="${ams.ams_id}" ams_nombre="${ams.ams_nombre}" scl_url="${ams.scl_url}">${ams.ams_nombre}</option>`;
                    });
                    $(".ams_almacen").removeClass('d-none');
                }
                $("#ams_id").html(almacenes);
            }

        });
    }
    var tbody_productos = "";

    function mostrarProductos() {
        var tipo = $("#tipo").val();
        var ams_id = $("#ams_id").val();
        var scl_url = $('option:selected', $("#ams_id")).attr('scl_url');
        $("#scl_url").val(scl_url);
        var datos = new FormData()
        datos.append('ams_id', ams_id);
        datos.append('btnMostrarProductos', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(respuesta) {
                if (respuesta) {
                    var traspaso = false;

                    tbody_productos = "";
                    respuesta.forEach(res => {
                        var button = "";
                        if (tipo == "CV") {
                            button = `<button class="btn btn-danger btnQuitarProducto" spds_id="${res.spds_id}" ams_nombre="${res.ams_nombre}" spds_serie_completa="${res.spds_serie_completa}"><i class="fa fa-times"></i></button>`;
                        }
                        tbody_productos +=
                            `
                                <tr id="${res.spds_id}">
                                    <td>${res.mpds_descripcion}-${res.mpds_modelo}</td>
                                    <td class="serie">${res.spds_serie_completa}</td>
                                    <td>
                                        ${button}
                                    </td>
                                </tr>
                             `;
                    });
                    $("#tbody_productos").html(tbody_productos);
                    var numSerie = $(".serie").length;
                    if (numSerie > 0) {
                        $("#btnImprimirReporte").removeClass("d-none");
                    } else {
                        $("#btnImprimirReporte").addClass("d-none");
                    }
                }
            }
        });
    }
    $('#auto_complete_producto').autocomplete({
        // appendTo: "#modelAddProductos",
        source: function(request, response) {
            $.ajax({
                url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                method: "POST",
                dataType: "json",
                data: {
                    auto_complete_producto: request.term
                },
                success: function(data) {
                    response(data);
                }

            });
        },
        minLength: 2,
        select: function(event, ui) {
            var tipo = $("#tipo").val();
            var ams_id = $("#ams_id").val();
            var ams_nombre = $('option:selected', $("#ams_id")).attr('ams_nombre');
            var res = ui.item;
            var encontrado = false; // Variable de control para descripciones duplicadas

            if (ams_id == "") {
                toastr.warning('No se a seleccionado ningun almacen', 'ADVERTENCIA!');
                $(this).val("");
                return false;
            }

            $(".serie").each(function() {
                if ($(this).text() == res.spds_serie_completa) {
                    toastr.warning('El producto ' + res.mpds_descripcion + '-' + res.mpds_modelo + '-' + res.spds_serie_completa + ' ya se agrego a su lista.', 'ADVERTENCIA!');
                    encontrado = true; // Descripción duplicada encontrada
                    return false;
                }
            });


            if (encontrado) {
                $(this).val("");
                return false;
            } else {
                if (tipo == "CV") {
                    var datos = new FormData()
                    datos.append('spds_id', res.spds_id);
                    datos.append('ams_nombre', ams_nombre);
                    datos.append('spds_almacen', ams_id);
                    datos.append('spds_situacion', 'SALIDA');
                    datos.append('btnAsignarAlmacen', true);
                    $.ajax({
                        type: 'POST',
                        url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                        data: datos,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            if (respuesta.status) {
                                toastr.success(respuesta.mensaje, '¡Muy bien!');
                                tbody_productos =
                                    `
                                <tr id="${res.spds_id}">
                                    <td>${res.mpds_descripcion}-${res.mpds_modelo}</td>
                                    <td class="serie">${res.spds_serie_completa}</td>
                                    <td>
                                        <button class="btn btn-danger btnQuitarProducto" spds_id="${res.spds_id}" ams_nombre="${ams_nombre}" spds_serie_completa="${res.spds_serie_completa}"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                             `;

                                $("#tbody_productos").append(tbody_productos);

                                $('#auto_complete_producto').val("");
                                var numSerie = $(".serie").length;
                                if (numSerie > 0) {
                                    $("#btnImprimirReporte").removeClass("d-none");
                                } else {
                                    $("#btnImprimirReporte").addClass("d-none");
                                }
                                return false;
                            } else {
                                toastr.error(respuesta.mensaje, '¡ERROR!');
                                $('#auto_complete_producto').val("");
                            }

                        }
                    });
                } else {
                    var ams_vendedor = $("#ams_vendedor").val();
                    if (ams_vendedor == "") {
                        $('#auto_complete_producto').val("");
                        toastr.warning('Por favor selecciona al vendedor', 'ADVERTENCIA!');
                        return false;
                    } else {
                        var ams_sucursal_origen = '<?= $_SESSION['session_suc']['scl_nombre'] ?>';
                        var datos = new FormData()
                        datos.append('spds_id', res.spds_id);
                        datos.append('ams_nombre', ams_nombre);
                        datos.append('spds_almacen', ams_id);
                        datos.append('spds_situacion', 'TRASPASO');
                        datos.append('btnAsignarAlmacenTraspaso', true);

                        $.ajax({
                            type: 'POST',
                            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                            data: datos,
                            dataType: 'json',
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {
                                if (respuesta.status) {
                                    traspasarMercancia(res, ams_nombre, ams_sucursal_origen);
                                } else {
                                    toastr.error(respuesta.mensaje, '¡ERROR!');
                                    $('#auto_complete_producto').val("");
                                }

                            }
                        });
                    }

                }


            }

        }
    });

    $(document).on('click', '.btnQuitarProducto', function() {
        var tipo = $("#tipo").val();
        var spds_id = $(this).attr('spds_id');
        var ams_nombre = $(this).attr('ams_nombre');
        var spds_serie_completa = $(this).attr('spds_serie_completa');

        $("#bcra_tipo").val(tipo);
        $("#bcra_spds_id").val(spds_id);
        $("#bcra_ams_nombre").val(ams_nombre);
        $("#bcra_spds_serie_completa").val(spds_serie_completa);

        $("#mdlMotivoCancelacion").modal("show");

    });
    $(document).on('click', '#btnQuitarProducto', function() {
        var tipo = $("#bcra_tipo").val();
        var spds_id = $("#bcra_spds_id").val();
        var ams_nombre = $("#bcra_ams_nombre").val();
        var spds_serie_completa = $("#bcra_spds_serie_completa").val();
        var bcra_nota = $("#bcra_nota").val();

        if (bcra_nota == "") {
            return toastr.warning('El motivo es oblogatorio', 'ADVERTENCIA!');
        }

        var datos = new FormData()
        datos.append('spds_id', spds_id);
        datos.append('ams_nombre', ams_nombre);
        datos.append('bcra_nota', bcra_nota);
        datos.append('btnAsignarAlmacen', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    if (tipo == "CV") {
                        $("#mdlMotivoCancelacion").modal("hide");
                        $("#bcra_nota").val("");
                        toastr.success(res.mensaje, '¡Muy bien!');
                        $("#" + spds_id).remove();
                        var numSerie = $(".serie").length;
                        if (numSerie > 0) {
                            $("#btnImprimirReporte").removeClass("d-none");
                        } else {
                            $("#btnImprimirReporte").addClass("d-none");
                        }
                    } else {
                        quitarTraspasoMercancia(spds_id, spds_serie_completa, ams_nombre);
                    }
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                    quitarTraspasoMercancia
                }

            }
        });

    });

    $('#btnImprimirReporte').on('click', function() {
        var ams_id = $("#ams_id").val();
        window.open(urlApp + "app/report/reporte-mercancia.php?ams_id=" + ams_id, "_blank");
    });

    $('#ams_id').on('change', function() {
        var tipo = $("#tipo").val();
        if (tipo == 'TM') {
            var scl_url = $('option:selected', $("#ams_id")).attr('scl_url');
            $("#scl_url").val(scl_url);
            $(".ams_almacen").removeClass('d-none');
            mostrarVendedoresSucursal();
        } else {
            $(".ams_almacen").addClass('d-none');
            mostrarProductos();
        }
    });

    function traspasarMercancia(producto, ams_nombre, ams_sucursal_origen) {
        var datos_array = [];
        var scl_url = $("#scl_url").val();
        var ams_id = $("#ams_vendedor").val();
        var datos = {
            'producto': JSON.stringify(producto),
            'ams_nombre': ams_sucursal_origen,
            'ams_id': ams_id
        };
        datos_array.push(datos);
        $.ajax({
            type: 'POST',
            url: scl_url + 'api/public/traspaso_mercancia',
            data: JSON.stringify(datos_array),
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    toastr.success(res.mensaje, '¡Muy bien!');
                    tbody_productos =
                        `
                                <tr id="${producto.spds_id}">
                                    <td>${producto.mpds_descripcion}-${producto.mpds_modelo}</td>
                                    <td class="serie">${producto.spds_serie_completa}</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                             `;

                    // <button class="btn btn-danger btnQuitarProducto" spds_id="${producto.spds_id}" ams_nombre="${ams_nombre}" spds_serie_completa="${producto.spds_serie_completa}"><i class="fa fa-times"></i></button>

                    $("#tbody_productos").append(tbody_productos);

                    $('#auto_complete_producto').val("");

                    var numSerie = $(".serie").length;
                    if (numSerie > 0) {
                        $("#btnImprimirReporte").removeClass("d-none");
                    } else {
                        $("#btnImprimirReporte").addClass("d-none");
                    }
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                }
            }
        });
    }

    function quitarTraspasoMercancia(spds_id, spds_serie_completa, ams_nombre) {
        var scl_url = $("#scl_url").val();
        $.ajax({
            type: 'GET',
            url: scl_url + 'api/public/quitar_traspaso_mercancia/' + spds_serie_completa,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    toastr.success(res.mensaje + ' para ' + ams_nombre, '¡Muy bien!');
                    $("#" + spds_id).remove();
                    var numSerie = $(".serie").length;
                    if (numSerie > 0) {
                        $("#btnImprimirReporte").removeClass("d-none");
                    } else {
                        $("#btnImprimirReporte").addClass("d-none");
                    }
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                }
            }
        });
    }

    function mostrarVendedoresSucursal() {
        var scl_url = $("#scl_url").val();
        alert(scl_url)
        $.ajax({
            type: 'GET',
            url: scl_url + 'api/public/mostrar_almacenes',
            // url: urlApp + 'api/public/mostrar_almacenes',
            // data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var vendedores = "";
                vendedores += `<option value="">Selecciona vendedor</option>`; // Agregar opción vacía
                res.forEach(ams => {
                    vendedores += `<option value="${ams.ams_id}">${ams.ams_nombre}</option>`;
                });
                $("#ams_vendedor").html(vendedores);
            }

        });
    }
</script>