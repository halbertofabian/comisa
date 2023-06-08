<div class="row btnEmpezarInventario">
    <div class="col-12 mb-3">
        <?php
        $diaSemana = date('N');
        if ($diaSemana == 5) :
        ?>
            <button type="button" class="btn btn-success float-right" id="btnEmpezarInventario"><i class="fa fa-list"></i> Empezar inventario</button>
        <?php endif; ?>
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
        <button type="button" class="btn btn-danger float-right" id="btnCerrarInventario"><i class="fa fa-window-close"></i> Cerrar inventario</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        mostrarTodoElInventario();
    });

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
                        <td>${itr.mpds_descripcion + '-' + itr.mpds_modelo}</td>
                        <td>
                            <div class="input-group">
                                <input type="number" class="form-control itr_if_usr" id="itr_if_usr${itr.itr_id}" value="${itr.itr_if_usr}" mpds_descripcion="${itr.mpds_descripcion}" placeholder="Ingrese el inventario final" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btnAgregarInventario" type="button" itr_id="${itr.itr_id}">AGREGAR</button>
                                </div>
                            </div>
                        </td>
                        <td>
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
                } else {
                    $('.btnEmpezarInventario').removeClass('d-none')
                    $('.btnCerrarInventario').addClass('d-none')
                    $('.itr_if_usr').attr('readonly', true);
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
            success: function(res) {
                if (res.status) {
                    swal({
                        title: '¡Bien!',
                        text: res.mensaje,
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        window.localStorage.removeItem('mostrar_inventario');
                        mostrarTodoElInventario();
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
            } else {}
        });

    });

    function reporteInventario() {
        window.open(urlApp + "app/report/reporte-inventario.php?reporte=true", "_blank");
    }
</script>