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
                                <option value="TM">Traslado de mercancia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="">Almacenes</label>
                            <input type="hidden" name="" id="scl_url">
                            <input type="hidden" id="scl_nombre" value="<?= $_SESSION['session_suc']['scl_nombre'] ?>">
                            <input type="hidden" id="usr_nombre" value="<?= $_SESSION['session_usr']['usr_nombre'] ?>">
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
                        <form id="formSerieCompleta" method="post">
                            <div class="form-group">
                                <label for="auto_complete_producto">Digite la serie del producto</label>
                                <input type="text" class="form-control" name="" id="auto_complete_producto" placeholder="Escriba el número de serie y seleccione...">
                            </div>
                        </form>
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
                                    <th></th>
                                    <th># SERIE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody_productos">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-light float-left d-none" id="btnGenerarTraslado"><i class="fa fa-truck"></i> Realizar traslado externo</button>
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


<!-- Modal -->
<div class="modal fade" id="mdlValidarTrasladoExterno" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Validar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formValidarTraslado">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="usr_contraseña">Contraseña</label>
                                <input type="hidden" name="ams_id" id="ams_id_traslado">
                                <input type="password" class="form-control" name="usr_contraseña" id="usr_contraseña" placeholder="Introduce la contraseña" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Validar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#formSerieCompleta").on('submit', function(e) {
        e.preventDefault();
        var serie_completa = $('#auto_complete_producto').val();

        var datos = new FormData()
        datos.append('auto_complete_serie', serie_completa)
        datos.append('btnSerieCompleta', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {

                if (!res) {
                    toastr.error('No existe la serie, intenta de nuevo', '¡ERROR!');
                    $('#auto_complete_producto').val("");

                } else {

                    var tipo = $("#tipo").val();
                    var ams_id = $("#ams_id").val();
                    var ams_nombre = $('option:selected', $("#ams_id")).attr('ams_nombre');
                    // var res = ui.item;
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
                                        mostrarProductos();
                                        $('#auto_complete_producto').val("");
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
            }
        });

    })

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
                $("#ams_vendedor").html("");
                $("#tbody_productos").html("");
                var numSerie = $(".serie").length;
                if (numSerie > 0) {
                    $("#btnImprimirReporte").removeClass("d-none");
                    $("#btnGenerarTraslado").removeClass("d-none");
                } else {
                    $("#btnImprimirReporte").addClass("d-none");
                    $("#btnGenerarTraslado").addClass("d-none");
                }
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
                    var options = "";
                    var datos_almacenes = new FormData()
                    datos_almacenes.append('btnMostrarAlmacenesVM', true);
                    $.ajax({
                        type: 'POST',
                        url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
                        data: datos_almacenes,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(almacenes) {
                            almacenes.forEach(ams => {
                                var selected = "";
                                if (ams.ams_id == ams_id) {
                                    selected = "selected";
                                }
                                options += `<option value="${ams.ams_id}" ${selected} ams_nombre="${ams.ams_nombre}">${ams.ams_nombre}</option>`;
                            });

                            tbody_productos = "";
                            respuesta.forEach(res => {
                                var button = "";
                                if (tipo == "CV") {
                                    button = `<button class="btn btn-danger btnQuitarProducto" spds_id="${res.spds_id}" ams_nombre="${res.ams_nombre}" spds_serie_completa="${res.spds_serie_completa}"><i class="fa fa-times"></i></button>`;
                                }
                                tbody_productos +=
                                    `
                                <tr id="${res.spds_id}">
                                    <td class="col-4">${res.mpds_descripcion}-${res.mpds_modelo}</td>
                                    <td class="col-4">
                                        <select class="form-control select2 btnCambiarAlmacen" name="" id="" spds_id="${res.spds_id}">
                                            ${options}
                                        </select>
                                    </td>
                                    <td class="serie col-4">${res.spds_serie_completa}</td>
                                    <td class="col-4">
                                        ${button}
                                    </td>
                                </tr>
                             `;
                            });
                            $("#tbody_productos").html(tbody_productos);
                            $(".select2").select2();

                            var numSerie = $(".serie").length;
                            if (numSerie > 0) {
                                $("#btnImprimirReporte").removeClass("d-none");
                                $("#btnGenerarTraslado").removeClass("d-none");
                            } else {
                                $("#btnImprimirReporte").addClass("d-none");
                                $("#btnGenerarTraslado").addClass("d-none");
                            }
                        }
                    });
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
                                mostrarProductos();
                                $('#auto_complete_producto').val("");
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
                        mostrarProductos();
                        $("#" + spds_id).remove();
                        var numSerie = $(".serie").length;
                        if (numSerie > 0) {
                            $("#btnImprimirReporte").removeClass("d-none");
                            $("#btnGenerarTraslado").removeClass("d-none");
                        } else {
                            $("#btnImprimirReporte").addClass("d-none");
                            $("#btnGenerarTraslado").addClass("d-none");
                        }
                    } else {
                        quitarTraspasoMercancia(spds_id, spds_serie_completa, ams_nombre);
                    }
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                    mostrarProductos();
                }

            }
        });

    });

    $('#btnImprimirReporte').on('click', function() {
        var tipo = $("#tipo").val();
        if (tipo == 'TM') {
            var scl_url = $("#scl_url").val();
            var ams_vendedor = $("#ams_vendedor").val();
            var usr_nombre = $("#usr_nombre").val();
            var scl_nombre_origen = $("#scl_nombre").val();
            var scl_nombre_destino = $('option:selected', $("#ams_id")).attr('ams_nombre');
            var array_sucursales = [scl_nombre_origen, scl_nombre_destino];
            var encoded_array = encodeURIComponent(JSON.stringify(array_sucursales));

            window.open(scl_url + "app/report/reporte-mercancia.php?ams_id=" + ams_vendedor + "&usr_nombre=" + encodeURIComponent(usr_nombre) + "&sucursales=" + encoded_array, "_blank");
        } else {
            var ams_id = $("#ams_id").val();
            window.open(urlApp + "app/report/reporte-mercancia.php?ams_id=" + ams_id, "_blank");
        }
    });

    $('#ams_id').on('change', function() {
        var tipo = $("#tipo").val();
        if (tipo == 'TM') {
            var scl_url = $('option:selected', $("#ams_id")).attr('scl_url');
            $("#scl_url").val(scl_url);
            $(".ams_almacen").removeClass('d-none');
            $("#ams_vendedor").html("");

            mostrarVendedoresSucursal();

            $("#tbody_productos").html("");
            var numSerie = $(".serie").length;
            if (numSerie > 0) {
                $("#btnImprimirReporte").removeClass("d-none");
                $("#btnGenerarTraslado").removeClass("d-none");
            } else {
                $("#btnImprimirReporte").addClass("d-none");
                $("#btnGenerarTraslado").addClass("d-none");
            }
        } else {
            $(".ams_almacen").addClass('d-none');
            $("#tbody_productos").html("");
            var numSerie = $(".serie").length;
            if (numSerie > 0) {
                $("#btnImprimirReporte").removeClass("d-none");
                $("#btnGenerarTraslado").removeClass("d-none");
            } else {
                $("#btnImprimirReporte").addClass("d-none");
                $("#btnGenerarTraslado").addClass("d-none");
            }
            mostrarProductos();
        }
    });
    $('#ams_vendedor').on('change', function() {
        mostrarProductosSucursal();
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
                    mostrarProductosSucursal();

                    $('#auto_complete_producto').val("");

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
                        $("#btnGenerarTraslado").removeClass("d-none");
                    } else {
                        $("#btnImprimirReporte").addClass("d-none");
                        $("#btnGenerarTraslado").addClass("d-none");
                    }
                } else {
                    toastr.error(res.mensaje, '¡ERROR!');
                }
            }
        });
    }

    function mostrarVendedoresSucursal() {
        var scl_url = $("#scl_url").val();
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
                if (res) {
                    res.forEach(ams => {
                        vendedores += `<option value="${ams.ams_id}">${ams.ams_nombre}</option>`;
                    });
                }
                $("#ams_vendedor").html(vendedores);
            }

        });
    }


    function mostrarProductosSucursal() {
        var ams_id = $("#ams_vendedor").val();
        var scl_url = $("#scl_url").val();
        var datos = new FormData()
        $.ajax({
            type: 'GET',
            url: scl_url + 'api/public/mostrar_productos_vendedor/' + ams_id,
            // data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(respuesta) {
                if (respuesta) {

                    tbody_productos = "";
                    respuesta.forEach(res => {
                        tbody_productos +=
                            `
                                <tr id="${res.spds_id}">
                                    <td>${res.mpds_descripcion}-${res.mpds_modelo}</td>
                                    <td>
                                    </td>
                                    <td class="serie">${res.spds_serie_completa}</td>
                                    <td>
                                    </td>
                                </tr>
                             `;
                    });
                    $("#tbody_productos").html(tbody_productos);
                    $(".select2").select2();
                    var numSerie = $(".serie").length;
                    if (numSerie > 0) {
                        $("#btnImprimirReporte").removeClass("d-none");
                        $("#btnGenerarTraslado").removeClass("d-none");
                    } else {
                        $("#btnImprimirReporte").addClass("d-none");
                        $("#btnGenerarTraslado").addClass("d-none");
                    }

                }
            }
        });
    }


    $(document).on('change', '.btnCambiarAlmacen', function() {
        var spds_almacen = $(this).val();
        var spds_id = $(this).attr('spds_id');
        var ams_nom = $('option:selected', $(this)).attr('ams_nombre');
        var ams_nombre = $('option:selected', $("#ams_id")).attr('ams_nombre');
        swal({
            title: '¿Esta seguro de cambiar el producto a ' + ams_nom + '?',
            text: 'Esta accion no es reversible',
            icon: 'warning',
            buttons: ['No', 'Si, cambiar'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append('spds_id', spds_id);
                if (ams_nom != 'BODEGA') {
                    datos.append('spds_almacen', spds_almacen);
                    datos.append('spds_situacion', 'SALIDA');
                }
                datos.append('ams_nombre', ams_nombre);
                datos.append('bcra_nota', '');
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
                            toastr.success(res.mensaje, '¡Muy bien!');
                            mostrarProductos();
                        } else {
                            toastr.error(res.mensaje, '¡ERROR!');
                            mostrarProductos();
                        }
                    }
                });
            } else {
                mostrarProductos();
            }
        });
    });

    $('#btnGenerarTraslado').on('click', function() {
        var ams_id = $("#ams_id").val();
        swal({
            title: '¿Esta seguro de hacer el traslado externo?',
            text: 'Si no estas seguro de que es esto por favor pregunta antes de realizar cualquier traslado externo. No olvides generar e imprimir tu reporte antes de realizar tu traslado',
            icon: 'warning',
            buttons: ['No', 'Si, realizar'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $("#ams_id_traslado").val(ams_id);
                $("#usr_contraseña").val("");
                $("#mdlValidarTrasladoExterno").modal('show');
            } else {}
        });
    });

    $('#formValidarTraslado').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnGenerarTraslado', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    swal({
                        title: '¡Bien!',
                        text: res.mensaje,
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        mostrarProductos();
                        $("#mdlValidarTrasladoExterno").modal('hide');
                    });
                } else {
                    mostrarProductos();
                    swal({
                        title: 'Error',
                        text: res.mensaje,
                        icon: 'error',
                        buttons: [false, 'Intentar de nuevo'],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {} else {}
                    })
                }
            }
        });
    });
</script>