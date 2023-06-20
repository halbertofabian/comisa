<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body table-responsive">
                    <table class="table tablas">
                        <thead>
                            <tr>
                                <th colspan="8">Listar de observaciones</th>
                            </tr>
                            <tr>
                                <th>Folio</th>
                                <th>Ruta</th>
                                <th>Cuenta</th>
                                <th>Cliente</th>
                                <th>Observación</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $observaciones = ContratosModelo::mdlMostrarTodasObaservacionesPendiente();
                            foreach ($observaciones as $key => $obs) :
                            ?>
                                <tr>

                                    <td> <a target="_blank" href="<?= HTTP_HOST . 'contratos/buscar/' . $obs['obs_ctr_id'] ?>"><?= $obs['ctr_folio'] ?> </a></td>
                                    <td><?= $obs['ctr_ruta'] ?></td>
                                    <td><?= $obs['ctr_numero_cuenta'] ?></td>
                                    <td><?= $obs['ctr_cliente'] ?></td>
                                    <td><?= $obs['obs_observaciones'] ?></td>
                                    <td><?= $obs['obs_usuario'] ?></td>
                                    <td><?= fechaCastellano($obs['obs_fecha']) ?></td>
                                    <td>

                                        <button class="btn btn-success btnCompletar" obs_id="<?= $obs['obs_id']  ?>">Completar</button>

                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $(".btnCompletar").on("click", function() {

        let obs_id = $(this).attr("obs_id");

        var datos = new FormData();
        datos.append("obs_id", obs_id)
        datos.append("btnCompletar", true);

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                //startLoadButton()
            },
            success: function(res) {

                if (res) {
                    swal({
                            title: 'Observación completada',
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
                            title: 'Ocurrio un error, intenta de nuevo',
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
        });

    });
</script>