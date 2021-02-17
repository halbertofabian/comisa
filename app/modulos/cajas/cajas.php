<?php cargarComponente('breadcrumb', '', 'Gestión de caja'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-4 col-12">
            <form method="post">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="cja_nombre">Nombre de la caja </label>
                        <input type="text" name="cja_nombre" id="cja_nombre" class="form-control" placeholder="">
                    </div>

                    <input type="hidden" value="<?php echo $_SESSION['session_suc']['scl_id'] ?>" name="cja_id_sucursal">

                    <!-- <div class="form-group col-12">

                        <label for="cja_id_sucursal">Sucursal a la que se le asignará está caja</label>
                        <select class="form-control" name="cja_id_sucursal" id="cja_id_sucursal">
                            <option value="<?php echo $_SESSION['session_suc']['scl_id'] ?>"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></option>
                            <?php
                            $sucursal = SucursalesModelo::mdlMostrarSucursales();
                            foreach ($sucursal as $key => $scl) :
                            ?>
                                <option value="<?php echo $scl['scl_id']  ?>"><?php echo $scl['scl_nombre']  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="col-12">
                        <button class="btn btn-primary float-right" name="btnRegistrarCaja"> Registrar caja </button>
                    </div>
                </div>
                <?php
                $caja = new CajasControlador();
                $caja->ctrAgregarCajas();
                ?>
            </form>
        </div>

        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lista de cajas</h4>

                            <hr>
                            <div class="row ">
                                <?php

                                $cajas = CajasModelo::mdlMostrarCajas();
                                foreach ($cajas as $key => $cja) :
                                ?>
                                    <div class="col-md-6">
                                        <P> <strong class="text-primary"> <?php echo $cja['cja_nombre'] ?></strong> </P>
                                        <span><?php echo $cja['cja_usuario_registro'] ?></span> <br>
                                        <span><?php echo $cja['cja_fecha_registro'] ?></span>
                                        <br>
                                        <hr>
                                        <?php if ($cja['cja_uso'] == 0) : ?>
                                            <strong class="text-danger">Cerrada</strong>
                                        <?php else : ?>
                                            <a href="<?php echo HTTP_HOST.'cortes/view-r/'.$cja['cja_copn_id'] ?>" class="btn btn-success">Abierta</a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>


                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>