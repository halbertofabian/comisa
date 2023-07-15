<div class="row">
    <div class="col-md-2 col-12">
        <div class="form-group">
            <label for="fcbz_ano">Año</label>
            <select class="form-control select2" name="fcbz_ano" id="fcbz_ano">
                <!-- <option value="">Selecionar ruta</option> -->
                <?php
                for ($i = 2000; $i <= date('Y'); $i++) :
                    $selected = '';
                    if (date('Y') == $i) {
                        $selected = 'selected';
                    }
                ?>
                    <option value="<?= $i ?>" <?= $selected ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>
    <div class="col-md-3 col-12">
        <div class="form-group">
            <label for="rto_ficha">Ficha</label>
            <select class="form-control select2" name="rto_ficha" id="rto_ficha">

            </select>
        </div>
    </div>
    <div class="col-md-2 col-12">
        <br>
        <button type="button" class="btn btn-primary btnGenerarReporFicha"><i class="fa fa-file-pdf-o"></i> Reporte</button>
    </div>
    <div class="col-md-5 col-12 mb-3 btnEmpezarInventario">
        <?php
        // $diaSemana = date('N');
        // if ($diaSemana == 5) :
        ?>
            <button type="button" class="btn btn-success float-right" id="btnEmpezarInventario"><i class="fa fa-list"></i> Empezar inventario</button>
        <?php //endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>DESCRIPCIÓN Y MODELO</th>
                    <th>INVENTARIO FINAL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tbody_inventario">

            </tbody>
        </table>
    </div>
</div>
<div class="row btnCerrarInventario d-none">
    <div class="col-12 mt-3">
        <button type="button" class="btn btn-danger float-right btn-load" id="btnCerrarInventario"><i class="fa fa-window-close"></i> Cerrar inventario</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        mostrarTodoElInventario();
        var fcbz_ano = $("#fcbz_ano").val();
        mostratFichasAnio(fcbz_ano);
    });

    function mostratFichasAnio(fcbz_ano) {
        $('#rto_ficha option').remove();
        var datos = new FormData();
        datos.append("fcbz_ano", fcbz_ano);
        datos.append("btnConsultarFichasByAnio", true);
        $.ajax({
            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(res) {
                res.forEach(element => {
                    $('#rto_ficha').prepend(`<option value='${element.fcbz_numero}' >Ficha ${element.fcbz_numero} - DEL ${element.fcbz_fecha_inicio} AL ${element.fcbz_fecha_termino} </option>`);
                });
                $("#rto_ficha option:selected").last().val();
                // var opciones = $("#rto_ficha option");
                // var opcionSeleccionada = $("#rto_ficha option:selected");
                // var indiceSeleccionado = opciones.index(opcionSeleccionada);

                // if (indiceSeleccionado > 0) {
                //     var opcionAnterior = opciones.eq(indiceSeleccionado - 1).val();
                //     $('#rto_ficha').val(opcionAnterior).trigger('change');
                // } else {
                //     console.log("No hay opción anterior");
                // }
            }

        })
    }

    function mostrarTodoElInventario() {
        var datos = new FormData()
        datos.append('btnMostrarInventario', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var tbody_inventario = "";
                res.forEach(itr => {
                    var estado = "";
                    if (itr.itr_if == itr.itr_if_usr) {
                        estado = `<strong class="text-success"><i class="fa fa-check fa-2x"></i></strong>`;
                    } else if (itr.itr_if != itr.itr_if_usr && itr.itr_if_usr != null) {
                        estado = `<strong class="text-danger"><i class="fa fa-times fa-2x"></i></strong>`;
                    }
                    tbody_inventario +=
                        `
                    <tr>
                        <td class="col-6">${itr.mpds_descripcion + '-' + itr.mpds_modelo}</td>
                        <td class="col-4">
                            <div class="input-group">
                                <input type="number" class="form-control itr_if_usr" id="itr_if_usr${itr.itr_id}" value="${itr.itr_if_usr}" mpds_descripcion="${itr.mpds_descripcion}" placeholder="Ingrese el inventario final" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btnAgregarInventario" disabled type="button" itr_id="${itr.itr_id}">AGREGAR</button>
                                </div>
                            </div>
                        </td>
                        <td class="col-2">
                            ${estado}
                        </td>
                    </tr>
                    `;
                });

                $("#tbody_inventario").html(tbody_inventario);
                var mostrar_inventario = window.localStorage.getItem('mostrar_inventario');
                if (mostrar_inventario) {
                    $('.btnEmpezarInventario').addClass('d-none')
                    $('.btnCerrarInventario').removeClass('d-none')
                    $('.itr_if_usr').attr('readonly', false);
                    $('.btnAgregarInventario').attr('disabled', false);
                } else {
                    $('.btnEmpezarInventario').removeClass('d-none')
                    $('.btnCerrarInventario').addClass('d-none')
                    $('.itr_if_usr').attr('readonly', true);
                    $('.btnAgregarInventario').attr('disabled', true);
                }
            }
        });
    }
    $(document).on('click', '.btnAgregarInventario', function() {
        var itr_id = $(this).attr('itr_id');
        var itr_if_usr = $("#itr_if_usr" + itr_id).val();

        if (itr_if_usr == "" || itr_if_usr < 0) {
            return toastr.warning('El inventario no puede estar vacio o ser menor a 0', 'ADVERTENCIA!');
        }
        var datos = new FormData()
        datos.append('itr_id', itr_id);
        datos.append('itr_if_usr', itr_if_usr);
        datos.append('btnAgregarInventario', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    swal({
                        title: '¡Bien!',
                        text: 'El registro se realizo correctamente.',
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        mostrarTodoElInventario();
                    });
                }
            }
        });
    });


    $('#btnCerrarInventario').on('click', function() {
        var isValid = true;
        $('.itr_if_usr').each(function() {
            var value = $(this).val().trim();
            var mpds_descripcion = $(this).attr('mpds_descripcion');
            if (value === '') {
                isValid = false;
                toastr.warning('El inventario final para ' + mpds_descripcion + ' esta vacio.', 'ADVERTENCIA!');
                return false;
            }
        });
        if (!isValid) {
            return false;
        }
        var datos = new FormData()
        datos.append('btnCerrarInventario', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: function() {
                startLoadButton();
            },
            success: function(res) {
                stopLoadButton('<i class="fa fa-window-close"></i> Cerrar inventario')
                if (res.status) {
                    swal({
                        title: '¡Bien!',
                        text: res.mensaje,
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        window.localStorage.removeItem('mostrar_inventario');
                        mostrarTodoElInventario();
                        reporteInventario();
                    });
                } else {
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

    $('#btnEmpezarInventario').on('click', function() {
        swal({
            title: '¿Esta seguro de empezar el inventario?',
            text: 'Esta accion no es reversible',
            icon: 'warning',
            buttons: ['No', 'Si, empezar'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append('btnEmpezarInventario', true);
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
                                window.localStorage.setItem('mostrar_inventario', true)
                                mostrarTodoElInventario();
                                // reporteInventario();
                            });
                        } else {
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
            } else {}
        });

    });

    function reporteInventario() {
        window.open(urlApp + "app/report/reporte-inventario.php?reporte=true", "_blank");
    }

    $("#fcbz_ano").on("change", function() {
        var fcbz_ano = $(this).val();
        mostratFichasAnio(fcbz_ano)
    })

    $(document).on('click', '.btnGenerarReporFicha', function() {
        var rto_ficha = $("#rto_ficha").val();
        window.open(urlApp + "app/report/reporte-inventario-ficha.php?reporte=true&rto_ficha=" + rto_ficha, "_blank");
    });
</script>