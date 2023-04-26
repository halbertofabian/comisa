<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="">Almacenes</label>
                            <select class="form-control select2" name="" id="ams_id">
                                <option value="">-Seleccionar-</option>
                                <?php
                                $almacenes = AlmacenesModelo::mdlMostrarAlmacenesByTipoVendedor();
                                foreach ($almacenes as $ams) : ?>
                                    <option value="<?= $ams['ams_id'] ?>" ams_nombre="<?= $ams['ams_nombre'] ?>"><?= $ams['ams_nombre'] ?></option>
                                <?php endforeach; ?>
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
                                    <th>SERIE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbody_productos">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 d-none" id="btnImprimirReporte">
                        <button type="button" class="btn btn-primary float-right btnImprimirReporte"><i class="fa fa-file-pdf-o"></i> Imprimir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var tbody_productos = "";

    function mostrarProductos() {
        var ams_id = $("#ams_id").val();
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
                    respuesta.forEach(res => {
                        tbody_productos +=
                            `
                                <tr id="${res.spds_id}">
                                    <td>${res.mpds_descripcion}-${res.mpds_modelo}</td>
                                    <td class="serie">${res.spds_serie_completa}</td>
                                    <td>
                                        <button class="btn btn-danger btnQuitarProducto" spds_id="${res.spds_id}" ams_nombre="${res.ams_nombre}"><i class="fa fa-times"></i></button>
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
                // Si se encontró una descripción duplicada, detener la ejecución del código
                $(this).val("");
                return false;
            } else {
                var datos = new FormData()
                datos.append('spds_id', res.spds_id);
                datos.append('ams_nombre', ams_nombre);
                datos.append('spds_almacen', ams_id);
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
                                        <button class="btn btn-danger btnQuitarProducto" spds_id="${res.spds_id}" ams_nombre="${ams_nombre}"><i class="fa fa-times"></i></button>
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

            }

        }
    });

    $(document).on('click', '.btnQuitarProducto', function() {
        var spds_id = $(this).attr('spds_id');
        var ams_nombre = $(this).attr('ams_nombre');
        var datos = new FormData()
        datos.append('spds_id', spds_id);
        datos.append('ams_nombre', ams_nombre);
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
    });

    $('.btnImprimirReporte').on('click', function() {
        var ams_id = $("#ams_id").val();
        window.open(urlApp + "app/report/reporte-mercancia.php?ams_id=" + ams_id, "_blank");
    });

    $('#ams_id').on('change', function() {
        mostrarProductos();
    });
</script>