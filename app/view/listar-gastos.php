<script>
    var pagina = ""
</script>
<?php
// if ($_SESSION['session_usr']['usr_rol'] != "Administrador") :
//     cargarComponente ('acceso-restringido', '', '');
//     return;
// endif;
cargarComponente('breadcrumb', '', 'Listar Gastos'); ?>


<div class="container">



    <div class="row d-none" id="lista-gastos-categoria">
        <div class="col-12">
            <a href="<?php echo HTTP_HOST . 'gastos' ?>" class="btn btn-primary float-right ml-1">Agregar gasto</a>
            <button class="btn btn-dark float-right mb-1 btnListarGastos"><i class="fa fa-list" aria-hidden="true"></i> Lista</button>
        </div>
        <?php
        $totalGastos = 0;
        $cetegorias = GastosModelo::mdlConsultarCategorias();

        foreach ($cetegorias as $key => $gts) :
            $gastosT = 0;
        ?>
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="text-primary"> <?php echo $gts['gts_nombre'] ?></strong>
                        <p class="card-text">Presupuesto mensual <strong>$ <?php echo number_format($gts['gts_presupuesto'], 2) ?> </strong> </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table tablaGastos table-light tablas  table-striped">
                                        <thead>
                                            <tr>
                                                <th>#Número de gasto</th>
                                                <th>Concepto</th>
                                                <th>Fecha de gasto</th>
                                                <th>Cantidad</th>
                                                <th>Metodo de pago</th>
                                                <th>Usuario registro</th>
                                                <th>Nota</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $gastos = GastosModelo::mdlConsultarGastos("", $gts['gts_id']);
                                            foreach ($gastos as $key => $tgts) :
                                                $gastosT += $tgts['tgts_cantidad'];
                                            ?>
                                                <tr>

                                                    <td><?php echo $tgts['tgts_id'] ?></td>
                                                    <td><?php echo $tgts['tgts_concepto'] ?></td>
                                                    <td><?php echo $tgts['tgts_fecha_gasto'] ?></td>
                                                    <td><?php echo $tgts['tgts_cantidad'] ?></td>
                                                    <td><?php echo $tgts['tgts_mp'] ?></td>
                                                    <td><?php echo $tgts['tgts_usuario_registro'] ?></td>
                                                    <td><?php echo $tgts['tgts_nota'] ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-filter" aria-hidden="true"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <?php if ($_SESSION['session_usr']['usr_rol'] == "Administrador") :  ?>
                                                                    <button class="dropdown-item text-dark btnEliminarGasto" tgts_id="<?php echo $tgts['tgts_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar gasto </button>
                                                                <?php endif; ?>
                                                                <button class="dropdown-item text-dark btnEditarNota" nota="<?php echo $tgts['tgts_nota'] ?>" idNota="<?php echo $tgts['tgts_id'] ?>" data-toggle="modal" data-target="#mdlEditarNota"> <i class="fa fa-edit" aria-hidden="true"></i> Editar nota</button>


                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="text-primary">Total </span><strong>$ <?php $totalGastos += $gastosT;
                                                                            echo  number_format($gastosT, 2);  ?></strong>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <hr>
        <div class="col-12">
            <h5><?php echo 'Total de gastos $ ' . number_format($totalGastos, 2) ?></h5>

        </div>
    </div>

    <div class="row " id="lista-gastos">
        <!-- <div class="col-12">
            <a href="<?php echo HTTP_HOST . 'gastos' ?>" class="btn btn-primary float-right ml-1">Agregar gasto</a>

            <button class="btn btn-dark float-right mb-1 btnListarGastosCat "><i class="fa fa-th" aria-hidden="true"></i> Categoría</button>
        </div> -->
        <div class="col-12">

            <div class="table-responsive">
                <table class="table tablaGastos table-light tablas  dt-responsive table-striped">
                    <thead>
                        <tr>
                            <th>#Número de gasto</th>
                            <th>Categoría</th>
                            <th>Concepto</th>
                            <th>Fecha de gasto</th>
                            <th>Cantidad</th>
                            <th>Metodo de pago</th>
                            <th>Usuario registro</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $gastos = GastosModelo::mdlConsultarGastos();
                        foreach ($gastos as $key => $tgts) :

                        ?>
                            <tr>

                                <td><?php echo $tgts['tgts_id'] ?></td>
                                <td><?php echo $tgts['gts_nombre'] ?></td>
                                <td><?php echo $tgts['tgts_concepto'] ?></td>
                                <td><?php echo $tgts['tgts_fecha_gasto'] ?></td>
                                <td><?php echo $tgts['tgts_cantidad'] ?></td>
                                <td><?php echo $tgts['tgts_mp'] ?></td>
                                <td><?php echo $tgts['tgts_usuario_registro'] ?></td>
                                <!-- <td><?php echo $tgts['tgts_nota'] ?></td> -->

                                <td>
                                    <?php
                                    $cajaAbierta = GastosModelo::mdlConsultarCajaAbierta($tgts['tgts_id_corte']);
                                    if ($cajaAbierta['copn_fecha_cierre'] == NULL) :
                                    ?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-filter" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">

                                                <button class="dropdown-item text-dark btnEliminarGasto" tgts_id="<?php echo $tgts['tgts_id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar gasto </button>

                                                <!-- <button class="dropdown-item text-dark btnEditarNota" nota="<?php echo $tgts['tgts_nota'] ?>" idNota="<?php echo $tgts['tgts_id'] ?>" data-toggle="modal" data-target="#mdlEditarNota"> <i class="fa fa-edit" aria-hidden="true"></i> Editar nota</button> -->


                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlEditarNota" tabindex="-1" aria-labelledby="mdlEditarNotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlEditarNotaLabel">Editar nota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group col-12 col-md-12">
                        <label for="nota">Nota</label>
                        <textarea class="form-control" name="nota" id="nota" cols="30" rows="5"></textarea>
                        <input type="hidden" name="id" id="idNota">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    <button type="submit" name="btnEditarNota" class="btn btn-primary">Editar nota</button>
                </div>
                <?php
                $editarNota = new GastosControlador();
                $editarNota->ctrEditarNota('tbl_gastos_tgts', 'tgts_nota', 'tgts_id', 'listar-gastos');
                ?>
            </form>
        </div>
    </div>
</div>