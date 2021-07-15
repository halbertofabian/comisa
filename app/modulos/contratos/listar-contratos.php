<?php

$contratos = ContratosModelo::mdlConsultarContratosAll();
?>

<div class="row">


    <div class="col-12">

        <table class="table table-striped table-hover tablas">
            <thead>
                <tr>
                    <th># FOLIO</th>
                    <th>FECHA</th>
                    <th>VENDEDOR</th>
                    <th>CLIENTE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contratos as $key => $cts) : ?>
                <tr>
                <td> <a href="<?= HTTP_HOST.'contratos/buscar/'.$cts['ctr_id']?>" class="btn btn-primary"> <?= $cts['ctr_folio'].'<br>'.$cts['clts_folio_nuevo'] ?> </a> </td>
                <td><?= $cts['ctr_fecha_contrato'] ?></td>
                <td><?= $cts['usr_nombre'] ?></td>
                <td><?= $cts['ctr_cliente'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</div>