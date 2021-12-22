<div class="container-fluid table-responsive">

    <?php
    cargarComponente('breadcrumb', '', 'Pagos por autorizar');
    if (isset($rutas[1])) {

        $_POST['urs_id'] = $rutas[1];
        $_POST['btnMostrarAbonos'] = true;
    }
    ?>
    <form method="post" action="">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">COBRADOR</label>
                    <select name="urs_id" id="urs_id" class="form-control select2" placeholder="">
                        <option value=""></option>
                        <?php
                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($usuarios as $key => $usr) :
                        ?>
                            <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <script>
                        var urs_id = <?= isset($_POST['urs_id']) ? $_POST['urs_id'] : ""  ?>;
                        $('#urs_id').val(urs_id).trigger('change');
                    </script>
                    <button type="submit" name="btnMostrarAbonos" class="btn btn-dark mt-1 float-right mb-1">Buscar</button>


                </div>
            </div>
        </div>
    </form>
    <?php
    if (!isset($_POST['btnMostrarAbonos'])) {
        $abonos = CobranzaModelo::mdlMostrarAbonosPorAutorizarByCobrador();
    } else {
        $abonos = CobranzaModelo::mdlMostrarAbonosPorAutorizarByCobrador($_POST['urs_id']);
    }
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover-animation " id="descarga-tbl">

            <thead>
                <?php
                if (isset($_POST['btnMostrarAbonos'])) :
                ?>
                    <tr class="text-center">
                        <th colspan="3">NOMBRE DEL COBRADOR:</th>
                        <th colspan="3" class="text-danger"><?= $abonos[0]['usr_nombre'] ?></th>
                        <th>RUTA</th>
                        <th><?= $abonos[0]['ctr_ruta'] ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                <?php else : ?>
                    <tr class="text-center">
                        <th colspan="3">NOMBRE DEL COBRADOR:</th>
                        <th colspan="3">TODOS</th>
                        <th>RUTA</th>
                        <th>TODAS</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                <?php endif; ?>
                <tr class="text-center">
                    <th>CHK</th>
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

                </tr>
            </thead>
            <tbody class="text-center">

                <?php
                $total_pago = 0;
                $total_efectivo = 0;
                $total_banco = 0;

                foreach ($abonos as $key => $abs) :
                    if ($abs['abs_estado_abono'] == "POR AUTORIZAR") {
                        $total_pago += $abs['abs_monto'];
                    }

                    if ($abs['abs_mp'] == "EFECTIVO" && $abs['abs_estado_abono'] == "POR AUTORIZAR") {
                        $total_efectivo += $abs['abs_monto'];
                    } else if ($abs['abs_mp'] == "BANCO" && $abs['abs_estado_abono'] == "POR AUTORIZAR") {
                        $total_banco += $abs['abs_monto'];
                    }
                ?>
                    <tr class="text-center">

                        <td>

                            <?php if (isset($_POST['btnMostrarAbonos'])) :
                                if ($abs['abs_estado_abono'] == "POR AUTORIZAR") :
                            ?>
                                    <button class="btn btn-link text-danger btnCancelarPago" usr_nombre=<?= $abonos[0]['usr_nombre']  ?> abs_id="<?= $abs['abs_id'] ?>" usr_id="<?= $_POST['urs_id'] ?>">CANCELAR</button>
                                <?php else : ?>
                                    <strong class="text-dnger">CANCELADO</strong>
                            <?php endif;
                            endif; ?>
                        </td>
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
                            <?= $abs['abs_estado_abono'] == 'CANCELADO' ? 'CANCELADO' : '' ?>
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
            </tbody>
        </table>
    </div>
</div>


<script>
    $(".btnCancelarPago").on("click", function() {
        var abs_id = $(this).attr("abs_id");
        var usr_id = $(this).attr("usr_id");
        var usr_nombre = $(this).attr("usr_nombre");
        swal({
                title: "¿Estás seguro de cancelar este pago?",
                text: "",
                icon: "warning",
                buttons: ["No, cancelar", "Si, confirmar "],
                dangerMode: false,
                closeOnClickOutside: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    swal("Esctibe el motivo por el cúal estas cancelado este pago", {
                            content: {
                                element: "input",
                                attributes: {
                                    type: "text",
                                    value: "",
                                },
                            },
                        })
                        .then((abs_motivo_cancelacion) => {
                            if (abs_motivo_cancelacion == "") {
                                toastr.error('Error', 'Escribe el motivo...')
                            } else {
                                var datos = new FormData();

                                datos.append("btnCancelarPago", true);
                                datos.append("abs_motivo_cancelacion", abs_motivo_cancelacion)
                                datos.append("abs_id", abs_id)
                                datos.append("usr_id", usr_id)


                                $.ajax({
                                    type: "POST",
                                    url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                                    data: datos,
                                    dataType: "json",
                                    processData: false,
                                    contentType: false,
                                    beforeSend: function() {

                                    },
                                    success: function(res) {

                                        if (res.status) {

                                            toastr.success(res.mensaje, '¡Muy bien!');
                                            setTimeout(function() {
                                                window.location.href = res.pagina;
                                            }, 200)


                                        } else {

                                            toastr.error(res.mensaje, '¡Error!');
                                            setTimeout(function() {
                                                window.location.href = res.pagina;
                                            }, 200)

                                        }

                                    }
                                })
                            }
                        });

                }
            })
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
                    columns: [1, 2, 3, 5, 6, 7, 8, 9, 8, 9, 10, 11, 12, 13, 14],
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
</script>