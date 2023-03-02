<?php
if (isset($rutas) && $rutas['1'] != "") :
    $abonos = CobranzaModelo::mdlMostrarAbonosByFicha($rutas['1']);

?>
    <br>
    <div class="container-fluid mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover-animation text-center " id="descarga-tbl">

                <thead>
                    <?php

                    ?>



                    <tr class="text-center">
                        <!-- <th>CHK</th> -->
                        <th># PAGO</th>
                        <th>CLIENTE</th>
                        <th>NÚMERO DE CUENTA</th>
                        <th>SALDO ANTERIOR</th>
                        <th>NUEVO SALDO</th>
                        <th>PAGO</th>
                        <th>MP</th>
                        <th>REFERENCIA</th>
                        <th>NOTA</th>
                        <th>FECHA DE PAGO</th>
                        <th>FORMA PAGO</th>
                        <th>DÍA PAGO</th>
                        <th>PROXIMA FECHA PAGO</th>
                        <th>ESTADO</th>
                        <th>MOTIVO</th>

                    </tr>
                </thead>
                <tbody class="text-center">


                    <?php
                    $total_pago = 0;
                    $total_efectivo = 0;
                    $total_banco = 0;

                    foreach ($abonos as $key => $abs) :

                        $total_pago += $abs['abs_monto'];


                        if ($abs['abs_mp'] == "EFECTIVO" && $abs['abs_estado_abono'] == "POR AUTORIZAR") {
                            $total_efectivo += $abs['abs_monto'];
                        } else if ($abs['abs_mp'] == "BANCO" && $abs['abs_estado_abono'] == "POR AUTORIZAR") {
                            $total_banco += $abs['abs_monto'];
                        }
                    ?>
                        <tr class="text-center">


                            <td><?= $abs['abs_id'] ?></td>
                            <td><?= $abs['ctr_cliente'] ?></td>
                            <td class="bg-success"><?= $abs['ctr_numero_cuenta'] ?></td>

                            <td><?= number_format($abs['ctr_saldo_actual'], 2) ?></td>
                            <td><?= number_format($abs['ctr_saldo_actual'] - $abs['abs_monto'], 2) ?></td>
                            <td class="bg-success"><?= number_format($abs['abs_monto'], 2) ?></td>
                            <td><?= $abs['abs_mp'] ?></td>
                            <td><?= $abs['abs_referancia'] ?></td>
                            <td><?= $abs['abs_nota'] ?></td>

                            <td><?= $abs['abs_fecha_cobro'] ?></td>
                            <th><?= $abs['ctr_forma_pago'] ?></th>
                            <th><?= $abs['ctr_dia_pago'] ?></th>
                            <th><?= $abs['cra_fecha_cobro'] ?></th>
                            <th>
                                <?= $abs['abs_estado_abono'] ?>
                            </th>
                            <th>

                            </th>

                        </tr>

                    <?php endforeach; ?>
                    <tr>
                        <td>CUENTAS COBRADAS</td>
                        <td>(<?= $key + 1 ?>)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL:</td>
                        <td><?= number_format($total_pago, 2) ?></td>
                        <td>EFECTIVO:</td>
                        <td><?= number_format($total_efectivo, 2) ?></td>
                        <td>BANCO:</td>
                        <td><?= number_format($total_banco, 2) ?></td>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                    <tr class="text-center">
                        <td>NOMBRE DEL COBRADOR:</td>
                        <td class="text-danger"><?= $abonos[0]['usr_nombre'] ?></td>
                        <td>RUTA: <?= $abonos[0]['ctr_ruta'] ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

<?php else : ?>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-5 col-12">
                                <div class="form-group">
                                    <label for="gds_año">Año</label>
                                    <select class="form-control" name="gds_año" id="gds_año">
                                        <?php
                                        $year = date("Y");
                                        for ($i = 2021; $i <= $year; $i++) :
                                            if ($i == $year) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                        ?>
                                            <option <?= $selected ?> value="<?= $i ?>"><?= $i ?></option>;
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table id="datatable_Historial" class="table table-striped table-bordered table-hover tablas ">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th width="80%">Ficha</th>
                    <th width="10%">Acción</th>
                </tr>
            </thead>
        </table>
    </div>

<?php endif; ?>

<script>
    $(document).ready(function() {
        mostrarHistorialTable();
    })

    $('#descarga-tbl').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // {
            //     extend: 'excel',
            //     exportOptions: {
            //         columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
            //     }

            // },
            {
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [0, 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                }
            },
        ],
        // buttons: [
        //     'csv', 'excel', 'pdf'
        // ],

        responsive: true,

        "ordering": false,
        // "scrollY": "500px",
        // "scrollCollapse": true,
        // "paging": false,

        "language": {

            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        },
    });

    function mostrarHistorialTable() {

        // datos.append("btnMostrarCategoriaGastos", true);

        // opcion = 4;
        var gds_año = $("#gds_año").val();

        datatable_Historial = $('#datatable_Historial').DataTable({
            "ajax": {
                "url": urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                "method": 'POST', //usamos el metodo POST
                "data": {
                    gds_año: gds_año,
                    btnMostrarHistorialTable: true
                }, //enviamos opcion 4 para que haga un SELECT
                "dataSrc": ""
            },
            "ordering": false,
            "bDestroy": true,
            "columns": [{
                    "data": "gds_id"
                },
                {
                    "data": "gds_nombre"
                },
                {
                    "data": "gds_buttom"
                },
            ]
        });
    }

    $("#gds_año").on("change", function(){
        mostrarHistorialTable();
    })
</script>