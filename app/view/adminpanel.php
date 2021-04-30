<?php

$cjas = CajasModelo::mdlMostrarCajasDisponibles($_SESSION['session_suc']['scl_id'], 1);

if (isset($_POST['btnBuscarByCorteCaja'])) {
    $cts_id = $_POST['cja_copn_id'];
    $caja = CajasModelo::mdlMostrarCajasById($cts_id);
    $option = '<option value="' . $cts_id . '">' . $caja['cja_nombre'] . '</option>';
} else {
    $cts_id = 0;
    $option = '<option value="0">Elije una caja para consultar</option>';
}
?>

<div class="container">
    <form method="post" action="#id_corte">
        <div class="row">

            <div class="col-12 col-md-5">

                <div class="form-group">
                    <label for="cja_copn_id"> <strong class="text-primary"> CAJAS ACTIVAS </strong> </label>
                    <select class="form-control" name="cja_copn_id" id="cja_copn_id">
                        <?php echo $option; ?>
                        <?php foreach ($cjas as $key => $cja) : ?>

                            <option value="<?php echo $cja['cja_copn_id'] ?>"> <?php echo $cja['cja_nombre'] ?> </option>

                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="col-md-4 col-12 mt-1 ">
                <input type="submit" class="btn btn-primary" name="btnBuscarByCorteCaja" value="Consultar">
            </div>

        </div>
    </form>
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5><strong class="text-primary"> Fichas pagadas 💲 </strong></h5>
                        <p class="card-text font-small-3"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <?php
                            $vfch_monto_total = CortesModelo::mdlConsultarTodasVentasFichaAdminByCorte($cts_id, 'PAGADO');

                            ?>
                            <span class="text-primary">$ <?php echo number_format($vfch_monto_total['vfch_monto_total'], 2) ?> MXN</span>
                        </h3>
                        <!-- <button type="button" class="btn btn-primary">View Sales</button> -->
                        <!-- <img src="<?php echo HTTP_HOST . 'app/assets' ?>/images/img-app/logo_sead_3.png" class="congratulation-medal" width="30px" alt="" /> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5><strong class="text-primary"> Ingresos ⬆ </strong></h5>
                        <p class="card-text font-small-3"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <?php
                            $igs_monto_total = CortesModelo::mdlConsultarTodasIngresosAdminByCorte($cts_id);
                            ?>
                            <span class="text-primary">$ <?php echo number_format($igs_monto_total['igs_monto_total'], 2) ?> MXN</span>
                        </h3>
                        <!-- <button type="button" class="btn btn-primary">View Sales</button> -->
                        <!-- <img src="<?php echo HTTP_HOST . 'app/assets' ?>/images/img-app/logo_sead_3.png" class="congratulation-medal" width="30px" alt="" /> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5><strong class="text-primary"> Gastos ⬇ </strong></h5>
                        <p class="card-text font-small-3"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <?php
                            $tgts_monto_total = CortesModelo::mdlConsultarTodasGastosAdminByCorte($cts_id);
                            ?>
                            <span class="text-primary">$ <?php echo number_format($tgts_monto_total['tgts_monto_total'], 2) ?> MXN</span>
                        </h3>
                        <!-- <button type="button" class="btn btn-primary">View Sales</button> -->
                        <!-- <img src="<?php echo HTTP_HOST . 'app/assets' ?>/images/img-app/logo_sead_3.png" class="congratulation-medal" width="30px" alt="" /> -->
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->


            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5> <strong class="text-primary"> Fichas canceladas ❌ </strong></h5>
                        <p class="card-text font-small-3"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <?php
                            $vfch_monto_total = CortesModelo::mdlConsultarTodasVentasFichaAdminByCorte($cts_id, 'CANCELADO');

                            ?>
                            <span class="text-danger">$ <?php echo number_format($vfch_monto_total['vfch_monto_total'], 2) ?> MXN</span>
                        </h3>
                        <!-- <button type="button" class="btn btn-primary">View Sales</button> -->
                        <!-- <img src="<?php echo HTTP_HOST . 'app/assets' ?>/images/img-app/logo_sead_3.png" class="congratulation-medal" width="30px" alt="" /> -->
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Detalles</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 mr-25 mb-0"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">

                                        <?php
                                        $totalCaja = 0;
                                        $cajaV = CortesModelo::mdlConsultarTodasVentasFichaAdminByCorteMP($cts_id, 'PAGADO', 'EFECTIVO');
                                        $cajaI = CortesModelo::mdlConsultarTodasIngresosAdminByCorteMP($cts_id);

                                        $totalCaja = $cajaV['monto_total'] + $cajaI['igs_monto'];

                                        ?>
                                        <h6 class="font-weight-bolder mb-0">$ <?php echo number_format($totalCaja, 2);  ?> MXN</h6>
                                        <p class="card-text font-small-3 mb-0">CAJA ⬆</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-info mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <?php
                                        $totalBanco = 0;
                                        $bancoV = CortesModelo::mdlConsultarTodasVentasFichaAdminByCorteMPE($cts_id, 'PAGADO');
                                        $bancoI = CortesModelo::mdlConsultarTodasIngresosAdminByCorteMPE($cts_id);
                                        $totalBanco = $bancoV['monto_total'] + $bancoI['igs_monto'];

                                        ?>
                                        <h6 class="font-weight-bolder mb-0">$ <?php echo number_format($totalBanco, 2);  ?> MXN</h6>
                                        <p class="card-text font-small-3 mb-0">BANCO ⬆</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="media">
                                    <div class="avatar bg-light-danger mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <?php
                                        $totalCajaG = 0;
                                        $cajaG = CortesModelo::mdlConsultarTodasGastosAdminByCorteMP($cts_id);
                                        $totalCajaG = $cajaG['tgts_cantidad'];

                                        ?>
                                        <h6 class="font-weight-bolder mb-0">$ <?php echo number_format($totalCajaG, 2);  ?> MXN</h6>
                                        <p class="card-text font-small-3 mb-0">CAJA ⬇</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <?php
                                        $totalBancoG = 0;
                                        $bancoG = CortesModelo::mdlConsultarTodasGastosAdminByCorteMPE($cts_id);
                                        $totalBancoG = $bancoG['tgts_cantidad'];

                                        ?>
                                        <h6 class="font-weight-bolder mb-0">$ <?php echo number_format($totalBancoG, 2);  ?> MXN</h6>
                                        <p class="card-text font-small-3 mb-0">BANCO ⬇</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 col-sm-6 col-12">
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <?php
                                        $total = ($totalCaja + $totalBanco) - ($totalCajaG + $totalBancoG);

                                        ?>
                                        <hr>
                                        <h6 class="font-weight-bolder mb-0 text-primary">$ <?php echo number_format($total, 2);  ?> MXN</h6>
                                        <p class="card-text font-small-3 mb-0">TOTAL FICHAS + INGRESOS - GASTOS </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>


    </section>
</div>