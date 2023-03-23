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
                            <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                        </td>
                    </tr>
                 <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>