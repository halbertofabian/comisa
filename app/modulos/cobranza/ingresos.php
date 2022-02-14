<?php
$fecha_inicio = date('Y-m-d');
$fecha_fin = date('Y-m-d');
?>
<div class="containeir">
    <form method="POST">
        <div class="row">
            <div class="col-xl-2 col-sm-12 col-12">
                <div class="form-group">
                    <label for="fecha_inicio">Fecha inicio</label>
                    <?php if (isset($_POST['fecha_inicio'])) : ?>
                        <input type="date" class="form-control" name="fecha_inicio" value="<?= $_POST['fecha_inicio'] ?>" id="fecha_inicio" placeholder="">
                    <?php else : ?>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?= $fecha_inicio ?>" placeholder="">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-2 col-sm-12 col-12">
                <div class="form-group">
                    <label for="fecha_fin">Fecha fin</label>
                    <?php if (isset($_POST['fecha_fin'])) : ?>
                        <input type="date" class="form-control" name="fecha_fin" value="<?= $_POST['fecha_fin'] ?>" id="fecha_fin" placeholder="">
                    <?php else : ?>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= $fecha_fin ?>" placeholder="">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-2">
                <label></label><br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
            </div>
        </div>
        <?php
        $ingresos = new IngresosControlador();
        $ingresos->ctrMostrarIngresos();
        ?>
    </form>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped tablas dt-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CONCEPTO</th>
                        <th>MONTO</th>
                        <th>FECHA REGISTRO</th>
                        <th>USUARIO REGISTRO</th>
                        <th>METODO DE PAGO</th>
                        <th>REFERENCIA</th>
                        <th>TIPO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ingresos = IngresosControlador::ctrMostrarIngresos();
                    foreach ($ingresos as $ingreso) :
                    ?>
                        <tr>
                            <td><?= $ingreso['igs_id'] ?></td>
                            <td><?= $ingreso['igs_concepto'] ?></td>
                            <td><?= $ingreso['igs_monto'] ?></td>
                            <td><?= $ingreso['igs_fecha_registro'] ?></td>
                            <td><?= $ingreso['igs_usuario_registro'] ?></td>
                            <td><?= $ingreso['igs_mp'] ?></td>
                            <td><?= $ingreso['igs_referencia'] ?></td>
                            <td><?= $ingreso['igs_tipo'] ?></td>
                            <td>
                                <?php if ($_SESSION['session_usr']['usr_rol'] == "Jefe de cobranza") : ?>
                                    <div class="btn-group" role="group" aria-label="">
                                        <button type="button" class="btn btn-danger btnEliminarIngreso" igs_id="<?= $ingreso['igs_id'] ?>"><i class="fa fa-trash"></i></button>
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