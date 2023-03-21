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
                    <th>#</th>
                    <th>#SUCURSAL</th>
                    <th>#MODELO</th>
                    <th>PRODUCTO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $modelos = ProductosModelo::mdlMostrarModelos();
                foreach ($modelos as $mpds) : ?>
                    <tr>
                        <td><?= $mpds['mpds_id'] ?></td>
                        <td><?= $mpds['mpds_suc'] ?></td>
                        <td><?= $mpds['mpds_modelo'] ?></td>
                        <td><?= $mpds['mpds_descripcion'] ?></td>
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
                                <input type="text" class="form-control" name="mpds_suc" id="mpds_suc" value="<?= SUCURSAL ?>" readonly placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="mpds_modelo">MODELO</label>
                                <input type="text" class="form-control" name="mpds_modelo" id="mpds_modelo" required placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="mpds_descripcion">NOMBRE DE LA MERCANCIA</label>
                                <input type="text" class="form-control text-uppercase" name="mpds_descripcion" id="mpds_descripcion" required placeholder="">
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
</script>