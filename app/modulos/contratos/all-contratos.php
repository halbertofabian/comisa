<?php

$contratos = ContratosModelo::mdlConsultarContratosAll();


?>

<div class="row d-load">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cargar archivo</h4>
                <form method="post" enctype="multipart/form-data" id="formActualizarStatus">
                    <div class="row">
                        <div class="col-xl-5">
                            <input type="file" class="form-control" name="input_file" id="input_file" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="col-xl-5">
                            <button type="submit" class="btn btn-success btn-load">Actualizar status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered tablas">
            <thead>
                <tr>
                    <th>VER</th>
                    <th>#TICKET</th>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>CURP</th>
                    <th>DOMICILIO</th>
                    <th>STATUS</th>


                </tr>
            </thead>
            <tbody>

                <?php foreach ($contratos as $key => $ctr) : ?>
                    <tr>
                        <td> <a href="<?= HTTP_HOST . 'contratos/buscar/' . $ctr['ctr_id'] ?>" class="btn btn-primary"><?= $ctr['ctr_id'] ?></a></td>
                        <td><?= $ctr['ctr_folio'] ?></td>
                        <td><?= $ctr['ctr_numero_cuenta'] . '' . $ctr['ctr_ruta'] ?></td>
                        <td><?= dstring($ctr['ctr_cliente']) ?></td>
                        <td><?= $ctr['clts_curp'] ?></td>
                        <td><?= dstring($ctr['clts_domicilio'] . ' ' . $ctr['clts_col']) ?></td>
                        <td><?= dstring($ctr['ctr_status_cuenta']) ?></td>


                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>



<script>
    $(document).ready(function() {
        $(".d-load").addClass('d-none')
    })
</script>