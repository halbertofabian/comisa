<div class="row">
    <div class="col-12 mb-3">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#mdlAgregarModelos">Agregar</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped tablas">
            <thead class="thead-light">
                <tr>
                    <th>#SUCURSAL</th>
                    <th>#MODELO</th>
                    <th>PRODUCTO</th>
                    <th>PROVEEDOR</th>
                    <th>CREDITO</th>
                    <th>ENGANCHE</th>
                    <th>PAGO SEMANAL</th>
                    <th>CONTADO</th>
                    <th>A UN MES</th>
                    <th>A DOS MESES</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $modelos = ProductosModelo::mdlMostrarModelos();
                foreach ($modelos as $mpds) : ?>
                    <tr>
                        <td><?= $mpds['mpds_suc'] ?></td>
                        <td><?= $mpds['mpds_modelo'] ?></td>
                        <td><?= $mpds['mpds_descripcion'] ?></td>
                        <td><?= $mpds['pvs_nombre'] ?></td>
                        <td><?= number_format($mpds['mpds_credito']) ?></td>
                        <td><?= number_format($mpds['mpds_enganche']) ?></td>
                        <td><?= number_format($mpds['mpds_pago_semanal']) ?></td>
                        <td><?= number_format($mpds['mpds_contado']) ?></td>
                        <td><?= number_format($mpds['mpds_un_mes']) ?></td>
                        <td><?= number_format($mpds['mpds_dos_meses']) ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="button" class="btn btn-warning btnEditarModelo" mpds_id="<?= $mpds['mpds_id'] ?>"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btnEliminarModelo" mpds_id="<?= $mpds['mpds_id'] ?>"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlAgregarModelos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formRegistrarModelos">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="mpds_suc">SUCURSAL</label>
                                <input type="text" class="form-control" name="mpds_suc" value="<?= SUCURSAL ?>" readonly placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="mpds_modelo">MODELO</label>
                                <input type="text" class="form-control" name="mpds_modelo" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mpds_proveedor">Proveedor</label>
                                <select class="form-control select2" name="mpds_proveedor" required>
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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="mpds_descripcion">NOMBRE DE LA MERCANCIA</label>
                                <input type="text" class="form-control text-uppercase" name="mpds_descripcion" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_credito">Crédito <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_credito" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_enganche">Enganche <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_enganche" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_pago_semanal">Pago semanal <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_pago_semanal" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_contado">Contado <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_contado" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_un_mes">A un mes <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_un_mes" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_dos_meses">A dos meses <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_dos_meses" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlEditarModelos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarModelos">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="mpds_suc">SUCURSAL</label>
                                <input type="hidden" name="mpds_id" id="mpds_id">
                                <input type="text" class="form-control" name="mpds_suc" id="mpds_suc" readonly placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="mpds_modelo">MODELO</label>
                                <input type="hidden" class="form-control" name="mpds_modelo_copy" id="mpds_modelo_copy" required placeholder="">
                                <input type="text" class="form-control" name="mpds_modelo" id="mpds_modelo" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mpds_proveedor">Proveedor</label>
                                <select class="form-control select2" name="mpds_proveedor" id="mpds_proveedor" required>
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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="mpds_descripcion">NOMBRE DE LA MERCANCIA</label>
                                <input type="hidden" class="form-control text-uppercase" name="mpds_descripcion_copy" id="mpds_descripcion_copy" required placeholder="">
                                <input type="text" class="form-control text-uppercase" name="mpds_descripcion" id="mpds_descripcion" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_credito">Crédito <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_credito" id="mpds_credito" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_enganche">Enganche <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_enganche" id="mpds_enganche" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_pago_semanal">Pago semanal <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_pago_semanal" id="mpds_pago_semanal" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_contado">Contado <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_contado" id="mpds_contado" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_un_mes">A un mes <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_un_mes" id="mpds_un_mes" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label for="mpds_dos_meses">A dos meses <strong class="text-primary"></strong></label>
                                <input type="text" name="mpds_dos_meses" id="mpds_dos_meses" class="form-control inputN" placeholder="" value="0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#formRegistrarModelos').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnRegistrarModelos', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/productos/productos.ajax.php',
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
                        location.reload();
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

    $(document).on('click', '.btnEliminarModelo', function() {
        var mpds_id = $(this).attr("mpds_id");
        swal({
            title: '¿Esta seguro de eliminar este modelo?',
            text: 'Esta accion no es reversible',
            icon: 'warning',
            buttons: ['No', 'Si, eliminar'],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var datos = new FormData()
                datos.append('mpds_id', mpds_id);
                datos.append('btnEliminarModelo', true);
                $.ajax({
                    type: 'POST',
                    url: urlApp + 'app/modulos/productos/productos.ajax.php',
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
                                location.reload();
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

    $(document).on('click', '.btnEditarModelo', function() {
        var mpds_id = $(this).attr("mpds_id");
        var datos = new FormData();
        datos.append('mpds_id', mpds_id);
        datos.append('btnMostrarModeloByID', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/productos/productos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if(res){
                   $("#mpds_id").val(res.mpds_id);
                   $("#mpds_suc").val(res.mpds_suc);
                   $("#mpds_modelo_copy").val(res.mpds_modelo);
                   $("#mpds_modelo").val(res.mpds_modelo);
                   $("#mpds_descripcion_copy").val(res.mpds_descripcion);
                   $("#mpds_descripcion").val(res.mpds_descripcion);
                   $("#mpds_proveedor").val(res.mpds_proveedor).trigger("change");
                   $("#mpds_credito").val(res.mpds_credito);
                   $("#mpds_enganche").val(res.mpds_enganche);
                   $("#mpds_pago_semanal").val(res.mpds_pago_semanal);
                   $("#mpds_contado").val(res.mpds_contado);
                   $("#mpds_un_mes").val(res.mpds_un_mes);
                   $("#mpds_dos_meses").val(res.mpds_dos_meses);

                   $("#mdlEditarModelos").modal("show");
                }
            }
        });
    });

    $('#formEditarModelos').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnEditarModelos', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/productos/productos.ajax.php',
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
                        location.reload();
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