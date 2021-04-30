<?php
if ($_SESSION['session_usr']['usr_caja'] > 0) {
    AppControlador::msj('warning', 'CAJA ABIERTA', 'Usted tiene abierta una caja, no es posible abrir una en estos momentos', HTTP_HOST . '');
}
cargarComponente('breadcrumb', '', 'Abir caja');
?>

<div class="container">
    <div class="row">

        <?php $cajas = CajasModelo::mdlMostrarCajasDisponibles($_SESSION['session_suc']['scl_id']);

        if (sizeof($cajas) == 0) {
            AppControlador::msj('warning', 'No hay cajas disponibles', 'Necesitan crear una caja o cerrar una ya existente', HTTP_HOST);
        }
        ?>

        <div class="col-md-4 col-12">
            <form method="post">
                <div class="row">
                    <div class="col-12">

                        <label for="copn_id_caja">Cajas disponibles para <strong class="text-primary"><?php echo $_SESSION['session_suc']['scl_nombre'] ?> </strong> </label>
                        <select name="copn_id_caja" id="copn_id_caja" class="form-control">
                            <?php

                            foreach ($cajas as $key => $cjs) :

                            ?>
                                <option value="<?php echo $cjs['cja_id_caja'] ?>"><?php echo $cjs['cja_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="copn_ingreso_inicio">Monto inicial</label>
                            <input type="text" name="copn_ingreso_inicio" id="copn_ingreso_inicio" class="form-control inputN">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-right" name="btnAbrirCaja">Abrir caja</button>
                    </div>
                </div>
                <?php
                $abrirCaja = new CajasControlador();
                $abrirCaja->ctrAbrirCaja();
                ?>
            </form>
        </div>
    </div>
</div>