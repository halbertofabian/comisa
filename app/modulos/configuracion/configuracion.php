<?php cargarComponente('breadcrumb', '', 'Configuración  <span class="text-primary">' . $_SESSION['session_suc']['scl_nombre'] . '</span>');   ?>
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form method="post" id="formAccesoUsuarioSucursal">
                    <div class="card-body">
                        <h3 class="card-title">Permisos de sucursal</h3>
                        <p class="card-text">Brindales acceso a tus usuarios para poder acceder a está sucursal</p>
                        <ul>
                            <?php
                            $accesos_usr =  json_decode($_SESSION['session_suc']['scl_acceso_usr'], true);
                            $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                            foreach ($usuarios as $key => $usr) :

                                $bandera = false;
                                if ($accesos_usr != NULL) :
                                    for ($i = 0; $i < sizeof($accesos_usr); $i++) :
                                        if ($usr['usr_matricula'] == $accesos_usr[$i]) : ?>

                                            <input type="checkbox" name="scl_acceso_usr[]" checked value="<?php echo $usr['usr_matricula'] ?>" id="ID_<?php echo $usr['usr_matricula'] ?>"> <label for="ID_<?php echo $usr['usr_matricula'] ?>"> <?php echo $usr['usr_matricula'] . ' ' . $usr['usr_nombre'] . ' | <strong class="text-primary">' . $usr['usr_rol'] . '</strong>' ?></label> <br>

                                <?php $bandera = true;
                                        endif;
                                    endfor;

                                endif; ?>

                                <?php if (!$bandera) : ?>
                                    <input type="checkbox" name="scl_acceso_usr[]" value="<?php echo $usr['usr_matricula'] ?>" id="ID_<?php echo $usr['usr_matricula'] ?>"> <label for="ID_<?php echo $usr['usr_matricula'] ?>"> <?php echo $usr['usr_matricula'] . ' ' . $usr['usr_nombre'] . ' | <strong class="text-primary">' . $usr['usr_rol'] . '</strong>' ?></label> <br>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </ul>
                        <button type="submit" class="btn btn-primary float-right mb-2">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>