<div class="row">
    <div class="col-12 mb-3">
        <a class="btn btn-primary float-right" href="<?= HTTP_HOST ?>almacenes/preregistro-mercancia" role="button">Agregar pre-registro</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped tablas">
            <thead class="thead-light">
                <tr>
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>USUARIO REGISTRO</th>
                    <th>MERCANCIA</th>
                    <th>APROBAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $mpregistros = AlmacenesModelo::mdlMostrarPreRegistros();
                foreach ($mpregistros as $key => $prm) :
                ?>
                    <tr>
                        <td><?= $prm['prm_folio'] ?></td>
                        <td><?= $prm['prm_fecha_registro'] ?></td>
                        <td><?= $prm['prm_usuario_registro'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= HTTP_HOST ?>app/report/reporte-preregistro-mercancia.php?prm_id=<?= $prm['prm_id'] ?>" target="_blank" role="button"><i class="fa fa-file-pdf-o"></i></a>
                        </td>
                        <td>
                            <?php if ($prm['prm_status'] == "ESPERA") : ?>
                                <button type="button" class="btn btn-success btnAprobarPreRegistro" data-toggle="modal" data-target="#mdlValidarPreRegistro" prm_id="<?= $prm['prm_id'] ?>"><i class="fa fa-check"></i></button>
                            <?php else : ?>
                                <strong><i class="fa fa-check"></i> APROBADO</strong>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlValidarPreRegistro" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Validar pre-registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formValidarCodigo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="prm_codigo">Codigo</label>
                                <input type="hidden" name="prm_id" id="prm_id">
                                <input type="text" class="form-control" name="prm_codigo" id="prm_codigo" placeholder="Ingresa el codigo" required>
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
    $(document).on('click', ".btnAprobarPreRegistro", function() {
        var prm_id = $(this).attr("prm_id");
        $("#prm_id").val(prm_id);
        $("#mdlValidarPreRegistro").modal("show");
    });

    $('#formValidarCodigo').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnAprobarPreRegistro', true);
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