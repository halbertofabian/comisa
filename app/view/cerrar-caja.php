<?php
if ($_SESSION['session_usr']['usr_caja'] <= 0) {
    AppControlador::msj('warning', 'CAJA CERRADA', 'Usted aún no ha abierto caja', HTTP_HOST . '');
    return;
}
cargarComponente('breadcrumb', '', 'Cierre de caja');

?>

<div class="container">
    <form id="formCerrarCaja" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-success">Caja abierta</h4>
                        <?php $copn = CajasModelo::mdlMostrarCajasById($_SESSION['session_usr']['usr_caja']); ?>
                        <input type="hidden" value="<?php echo $copn['cja_id_caja'] ?>" name="cja_id_caja">
                        <input type="hidden" value="<?php echo $copn['copn_id'] ?>" name="copn_id">
                        <input type="hidden" value="<?php echo $copn['copn_ingreso_inicio'] ?>" name="copn_ingreso_inicio">
                        <p class="card-text">Responsable <strong><?php echo $copn['usr_nombre']; ?> </strong> </p>
                        <p class="card-text">Caja <strong><?php echo $copn['cja_nombre']; ?> </strong> </p>
                        <p class="card-text">Sucursal <strong><?php echo $copn['scl_nombre']; ?> </strong> </p>
                        <p class="card-text">Fecha de apertura <strong><?php echo $copn['copn_fecha_abrio']; ?> </strong> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">EFECTIVO</h4>
                        <div class="form-group">
                            <label for="copn_ingreso_efectivo">Introduce la cantidad en efectivo</label>
                            <input type="text" name="copn_ingreso_efectivo" id="copn_ingreso_efectivo" class="form-control inputN" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">BANCO</h4>
                        <div class="form-group">
                            <label for="copn_ingreso_banco">Introduce la cantidad en banco</label>
                            <input type="text" name="copn_ingreso_banco" id="copn_ingreso_banco" class="form-control inputN" placeholder="Transaferencias / Depositos / Pagos con Tarjeta">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary float-right" name="btnCerrarCaja">Cerrar caja</button>
            </div>
        </div>
    </form>
</div>