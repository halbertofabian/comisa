<?php

$contratos = ContratosModelo::mdlConsultarContratosAll();
preArray($contratos);

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
                        <td> <a href="<?= HTTP_HOST.'contratos/buscar/'.$ctr['ctr_id'] ?>" class="btn btn-primary" ><?= $ctr['ctr_id'] ?></a></td>
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