<?php

$contratos = ContratosModelo::mdlConsultarContratosAll();
?>

<div class="row">


    <div class="col-12">

        <table class="table table-striped table-hover tablas">
            <thead>
                <tr>
                    <th># FOLIO</th>
                    <th>FECHA </th>
                    <th>VENDEDOR</th>
                    <th>CLIENTE</th>
                    <th>NOTA</th>
                    <th>REFERENCIAS</th>
                    <th>FOTOS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contratos as $key => $cts) : ?>
                <tr>
                <td><?= $cts['ctr_folio'] ?></td>
                <td><?= $cts['ctr_fecha_contrato'] ?></td>
                <td><?= $cts['usr_nombre'] ?></td>
                <td><?= $cts['ctr_cliente'] ?></td>
                <td><?= $cts['ctr_nota'] ?></td>
                <td></td>
                <th></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</div>