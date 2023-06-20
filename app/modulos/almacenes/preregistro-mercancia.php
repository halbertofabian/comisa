<form id="formGuardarPreRegistro">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="prm_folio">FOLIO</label>
                                <input type="hidden" id="dprm_id_prm" value="<?= uniqid(); ?>" name="dprm_id_prm">
                                <input type="text" class="form-control" name="prm_folio" id="prm_folio" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="prm_id_proveedor">PROVEEDOR</label>
                                <select class="form-control select2" name="prm_id_proveedor" id="prm_id_proveedor" required>
                                    <option value="">-Seleccionar-</option>
                                    <?php
                                    $proovedores = ProveedoresModelo::mdlMostrarProveedores();
                                    foreach ($proovedores as $pvs) :
                                    ?>
                                        <option value="<?= $pvs['pvs_id'] ?>"><?= $pvs['pvs_nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                              <label for="prm_tipo">TIPO</label>
                              <select class="form-control" name="prm_tipo" id="prm_tipo" required>
                                <option selected value="COMPRA">COMPRA</option>
                                <option value="DEVOLUCION">DEVOLUCIÓN</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="prm_fecha_registro">FECHA</label>
                                <input type="date" class="form-control" name="prm_fecha_registro" id="prm_fecha_registro" value="<?= date("Y-m-d") ?>" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="dprm_mpds_id">PRODUCTO</label>
                                <select class="form-control select2" name="" id="dprm_mpds_id">
                                    <option value="">-Seleccionar-</option>
                                    <?php
                                    $modelos = ProductosModelo::mdlMostrarModelos();
                                    foreach ($modelos as $mpds) :
                                    ?>
                                        <option value="<?= $mpds['mpds_id'] ?>" mpds_descripcion="<?= $mpds['mpds_descripcion'] ?>"><?= $mpds['mpds_descripcion'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="dprm_cantidad">CANTIDAD</label>
                                <input type="number" class="form-control" min="1" name="dprm_cantidad" id="dprm_cantidad" value="1">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <br>
                                <button type="button" class="btn btn-primary" id="btnAgregarProducto">AGREGAR</button>
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
                    <table class="table table-striped table-responsive-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>DESCRIPCIÓN</th>
                                <th>CANTIDAD</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_detalle_preregistro">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary float-right">GUARDAR</button>
        </div>
    </div>
</form>

<script>
      $(document).ready(function(){
        disabledEnter("formGuardarPreRegistro")
    })

    $('#btnAgregarProducto').on('click', function() {
        var dprm_mpds_id = $("#dprm_mpds_id").val();
        var dprm_descripcion = $('option:selected', $("#dprm_mpds_id")).attr('mpds_descripcion');
        var dprm_cantidad = $("#dprm_cantidad").val();
        var dprm_id_prm = $("#dprm_id_prm").val();
        var encontrado = false; // Variable de control para descripciones duplicadas
        if (dprm_mpds_id == "" || dprm_cantidad <= 0) {
            return toastr.warning('Asegurate de seleccionar un producto y que la cantidad sea mayor a 0', 'ADVERTENCIA!');
        }

        $(".dprm_descripcion").each(function() {
            if ($(this).text() == dprm_descripcion) {
                toastr.warning('El producto ' + dprm_descripcion + ' ya se agrego a su lista.', 'ADVERTENCIA!');
                encontrado = true; // Descripción duplicada encontrada
                return false;
            }
        });

        
        if (encontrado) {
            // Si se encontró una descripción duplicada, detener la ejecución del código
            return false;
        }


        var datos = new FormData()
        datos.append('dprm_mpds_id', dprm_mpds_id);
        datos.append('dprm_descripcion', dprm_descripcion);
        datos.append('dprm_cantidad', dprm_cantidad);
        datos.append('dprm_id_prm', dprm_id_prm);
        datos.append('btnAgregarDetallePreRegistro', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    toastr.success(dprm_descripcion + ' se agrego correctamente.', 'Muy bien!');
                    $("#dprm_cantidad").val("1")
                    $("#dprm_cantidad").focus();
                    mostrarDetallePreRegistro();
                }
            }
        });
    });

    function mostrarDetallePreRegistro() {
        var dprm_id_prm = $("#dprm_id_prm").val();
        var datos = new FormData()
        datos.append('dprm_id_prm', dprm_id_prm);
        datos.append('btnMostrarDetallePreRegistro', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var tbody_detalle_preregistro = "";
                res.forEach(dprm => {
                    tbody_detalle_preregistro +=
                        `
                    <tr>
                        <td class="dprm_descripcion">${dprm.dprm_descripcion}</td>
                        <td class="d-flex">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn_min" btn_min="${dprm.dprm_id}" type="button">-</button>
                            </span>
                            <input type="text" style="width:50px;text-align: center;" id="cont${dprm.dprm_id}" dprm_id="${dprm.dprm_id}" class="form-control cont" value="${dprm.dprm_cantidad}" min="1"/>
                            <span class="input-group-btn">
                                <button class="btn btn-default btn_max" btn_max="${dprm.dprm_id}" type="button">+</button>
                            </span>
                        </td>
                        
                        <td>
                            <button type="button" class="btn btn-danger btnEliminarPreRegistro" dprm_id="${dprm.dprm_id}"><i class="fa fa-times"></i></button>
                        </td>
                    </tr>
                    `;
                });
                $("#tbody_detalle_preregistro").html(tbody_detalle_preregistro);
            }
        });
    }

    $(document).on('click', '.btnEliminarPreRegistro', function() {
        var dprm_id = $(this).attr("dprm_id");
        var datos = new FormData()
        datos.append('dprm_id', dprm_id);
        datos.append('btnEliminarPreRegistro', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    mostrarDetallePreRegistro();
                }
            }
        });
    });
    $(document).on('click', '.btn_max', function() {
        var dprm_id = $(this).attr("btn_max");
        var dprm_cantidad = $("#cont" + dprm_id).val();
        var sumar = Number(dprm_cantidad) + 1;

        var datos = new FormData()
        datos.append('dprm_id', dprm_id);
        datos.append('dprm_cantidad', sumar);
        datos.append('btnActualizarPreRegistro', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    mostrarDetallePreRegistro();
                }
            }
        });
    });
    $(document).on('click', '.btn_min', function() {
        var dprm_id = $(this).attr("btn_min");
        var dprm_cantidad = $("#cont" + dprm_id).val();
        var restar = Number(dprm_cantidad) - 1;
        if (restar == 0) {
            return false;
        }

        var datos = new FormData()
        datos.append('dprm_id', dprm_id);
        datos.append('dprm_cantidad', restar);
        datos.append('btnActualizarPreRegistro', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    mostrarDetallePreRegistro();
                }
            }
        });
    });

    $(document).on('keyup', '.cont', function() {
        var dprm_id = $(this).attr('dprm_id');
        var dprm_cantidad = $(this).val();
        if(dprm_cantidad == "" || dprm_cantidad == "-"){
            return false;
        }
        else if (dprm_cantidad <= 0) {
            $("#cont" + dprm_id).val(1);
            toastr.error('La cantidad debe ser mayor a 0', '¡ERROR!');
            dprm_cantidad = 1;
        }

        var datos = new FormData()
        datos.append('dprm_id', dprm_id);
        datos.append('dprm_cantidad', dprm_cantidad);
        datos.append('btnActualizarPreRegistro', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    mostrarDetallePreRegistro();
                }
            }
        });
    });

    $('#formGuardarPreRegistro').on('submit', function(e) {
        e.preventDefault();
        if ($('#tbody_detalle_preregistro tr').length === 0) {
            return toastr.error('Aun no se agregan productos a su lista.', '¡ERROR!');
        }
        var datos = new FormData(this)
        datos.append('btnGuardarPreRegistro', true);
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
                        location.href = urlApp + "almacenes/listar-pre-registros";
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
</script>