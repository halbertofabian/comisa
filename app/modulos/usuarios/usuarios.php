<?php

// if ($_SESSION['session_usr']['usr_rol'] != "Administrador") :
//     cargarComponente('acceso-restringido', '', '');
//     return;
// endif;


?>
<div class="card">

    <div class="card-body">

        <?php
        if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "update") :
            cargarComponente('breadcrumb_nivel_1', '', 'Editar usuario #' . $rutas[2], array(['ruta' => 'usuarios', 'label' => 'Listar usuarios']));

            $usr = UsuariosModelo::mdlMostrarUsuarios($rutas[2]); ?>
            <div class="container">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_matricula">Usuario</label>

                                <input type="text" name="usr_matricula" id="usr_matricula" class="form-control" placeholder="Escribe el nombre completo del alumno" value="<?php echo $usr['usr_matricula'] ?>" readonly required>
                                <input type="hidden" name="usr_id" id="usr_id" class="form-control" placeholder="Escribe el nombre completo del alumno" value="<?php echo $usr['usr_id'] ?>" readonly required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="usr_ruta">Número de ruta</label>
                                <select class="form-control" name="usr_ruta" id="usr_ruta">
                                    <option value="0">--Seleccionar ruta--</option>
                                    <?php
                                    for ($i = 1; $i <= 20; $i++) :
                                        $ruta = $i <= 9 ? "0" . $i : $i;
                                        if($usr['usr_ruta'] == "R".$i){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }

                                    ?>
                                        <option <?= $selected ?> value="R<?= $i ?>"><?= $ruta ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="usr_nombre">Nombre</label>
                                <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" placeholder="Escribe el nombre de usuario" value="<?php echo $usr['usr_nombre'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_telefono">Teléfono</label>
                                <input type="text" name="usr_telefono" id="usr_telefono" class="form-control" placeholder="Escribe el telefono" value="<?php echo $usr['usr_telefono'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_correo">Correo electrónico</label>
                                <input type="email" name="usr_correo" id="usr_correo" class="form-control" placeholder="Escribe el correo electrónico" value="<?php echo $usr['usr_correo'] ?>">
                                <input type="hidden" name="usr_correo_v" id="usr_correo_v" class="form-control" value="<?php echo $usr['usr_correo'] ?>">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>
                                <input id="usr_clave" name="usr_clave" type="password" class="form-control">
                                <input id="usr_clave_hidden" name="usr_clave_hidden" type="hidden" class="form-control" value="<?php echo $usr['usr_clave'] ?>" required>

                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_rol">Perfil</label>
                                <select name="usr_rol" id="usr_rol" class="form-control">

                                    <option value="<?php echo $usr['usr_rol'] ?>"><?php echo $usr['usr_rol'] ?></option>
                                    </option>
                                    <?php
                                    $perfiles = AppControlador::obtenerPerfiles();
                                    foreach ($perfiles as $key => $pfl) : ?>
                                        <option value="<?php echo $pfl ?>"><?php echo $pfl ?></option>
                                    <?php endforeach; ?>
                                    <?php

                                    // Auxiliar administrativo
                                    // cobradores
                                    // vendedores
                                    // jefe administrativo
                                    // supervisor
                                    // gerencia
                                    // administrador 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_sueldo">Sueldo</label>
                                <input type="text" name="usr_sueldo" id="usr_sueldo" class="form-control inputN" placeholder="Sueldo del empleado" value="<?php echo $usr['usr_sueldo']  ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_deuda_ext">Deuda externa</label>
                                <input type="text" name="usr_deuda_ext" id="usr_deuda_ext" class="form-control inputN" value="<?php echo $usr['usr_deuda_ext']  ?>">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_vehiculo">VEHICULO / PLACAS </label>
                                <input type="text" name="usr_vehiculo" id="usr_vehiculo" class="form-control" value="<?php echo $usr['usr_vehiculo']  ?>">
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_imss">IMSS</label>
                                <input type="text" name="usr_imss" id="usr_imss" class="form-control inputN" value="<?php echo $usr['usr_imss']  ?>">
                            </div>
                        </div>
                        <?php if ($usr['usr_firma'] != "") : ?>
                            <div class="col-md-4 col-12 text-center">
                                <span>Firma digital</span> <br>
                                <img src="<?php echo HTTP_HOST . '' . $usr['usr_firma'] ?>" alt="">
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_firma">Firma digital</label>
                                    <input type="file" name="usr_firma" id="usr_firma" class="form-control">
                                    <small id="helpId" class="text-muted float-right">200 x 200 px</small>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_firma">Firma digital</label>
                                    <input type="file" name="usr_firma" id="usr_firma" class="form-control">
                                    <small id="helpId" class="text-muted float-right">200 x 200 px</small>
                                </div>
                            </div>
                        <?php endif; ?>

                        <input type="hidden" value="<?php echo $usr['usr_firma'] ?>" name="usr_firma_hidden">

                        <div class="col-12">

                            <hr>
                            <h5>ACCESOS</h5>
                            <?php if ($_SESSION['session_usr']['usr_rol'] == "Administrador" || $_SESSION['session_usr']['usr_rol'] == "Jefe administrativo") : ?>
                                <?php

                                if ($usr['usr_acceso_concentradora']) {
                                    $check = "checked";
                                } else {
                                    $check = "";
                                }


                                ?>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="usr_acceso_concentradora" id="usr_acceso_concentradora" value="1" <?php echo $check ?>>
                                            Acceso a la caja concentradora
                                        </label>
                                    </div>

                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <input type="submit" value="Guardar cambios" name="btnActualizarUsuario" id="btnActualizarUsuario" class="btn btn-primary float-right" placeholder="Escribe la dirección">
                            </div>
                        </div>
                    </div>
                    <?php
                    $actualizarUusario = new UsuariosControlador();
                    $actualizarUusario->ctrActualizarUsuarios2();
                    ?>
                </form>
            </div>

        <?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "new") :
            cargarComponente('breadcrumb_nivel_1', '', 'Nuevo usuario', array(['ruta' => 'usuarios', 'label' => 'Listar usuarios']));

        ?>


            <div class="container">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_matricula">Usuario</label>
                                <?php

                                $usr_id = UsuariosControlador::ctrConsultarSiguienteUsuario('');

                                ?>
                                <input type="text" name="usr_matricula" id="usr_matricula" class="form-control" placeholder="Escribe el nombre completo del alumno" value="<?php echo $usr_id ?>" readonly required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="usr_ruta">Número de ruta</label>
                                <select class="form-control" name="usr_ruta" id="usr_ruta">
                                    <option value="0">--Seleccionar ruta--</option>
                                    <?php
                                    for ($i = 1; $i <= 20; $i++) :
                                        $ruta = $i <= 9 ? "0" . $i : $i;

                                    ?>
                                        <option value="R<?= $i ?>"><?= $ruta ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="usr_nombre">Nombre</label>
                                <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" placeholder="Escribe el nombre de usuario" autofocus required>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_telefono">Teléfono</label>
                                <input type="text" name="usr_telefono" id="usr_telefono" class="form-control" placeholder="Escribe el telefono">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_correo">Correo electrónico</label>
                                <input type="email" name="usr_correo" id="usr_correo" class="form-control" placeholder="Escribe el correo electrónico">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>
                                <input id="usr_clave" name="usr_clave" type="password" value="1234" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_rol">Perfil</label>
                                <select name="usr_rol" id="usr_rol" class="form-control">
                                    <?php
                                    $perfiles = AppControlador::obtenerPerfiles();
                                    foreach ($perfiles as $key => $pfl) : ?>
                                        <option value="<?php echo $pfl ?>"><?php echo $pfl ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_sueldo">Sueldo</label>
                                <input type="text" name="usr_sueldo" id="usr_sueldo" class="form-control inputN" placeholder="Sueldo del empleado">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_deuda_ext">Deuda externa</label>
                                <input type="text" name="usr_deuda_ext" id="usr_deuda_ext" class="form-control inputN" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_firma">Firma digital</label>
                                <input type="file" name="usr_firma" id="usr_firma" class="form-control">
                                <small id="helpId" class="text-muted float-right">200 x 200 px</small>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <input type="submit" value="Guardar usuario" name="btnGuardarUsuario" id="btnGuardarUsuario" class="btn btn-primary float-right" placeholder="Escribe la dirección">
                            </div>
                        </div>
                    </div>
                    <?php
                    $guardarUsuario = new UsuariosControlador();
                    $guardarUsuario->ctrAgregarUsuarios2("usuarios/new");
                    ?>
                </form>
            </div>


        <?php else :
            cargarComponente('breadcrumb', '', 'Lista de usuarios');

        ?>

            <div class="container">
                <div class="row">
                    <div class="col-12 mb-1">
                        <!-- <a href="" class="btn btn-success"><i class="fa fa-upload"></i> Importar</a> -->
                        <?php if ($_SESSION['session_usr']['usr_rol'] == "Administrador") : ?>
                            <a href="<?php echo HTTP_HOST . 'usuarios/new' ?>" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Nuevo usuario</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped tablas dt-responsive tablaUsuarios">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <!-- <th>Código QR</th> -->
                                        <th>Deuda ext.</th>
                                        <th>Deuda int.</th>
                                        <th>Teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>Rol</th>
                                        <th>Usuario registro</th>
                                        <th>Fecha registro</th>


                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                                    foreach ($usuarios as $key => $usr) :
                                    ?>
                                        <tr>
                                            <td><?php echo $usr['usr_nombre'] ?></td>

                                            <td> <strong> <?php echo number_format($usr['usr_deuda_ext'], 2) ?> </strong> </td>
                                            <td> <strong> <?php echo number_format($usr['usr_deuda_int'], 2) ?> </strong> </td>
                                            <td><?php echo $usr['usr_telefono'] ?></td>
                                            <td><?php echo $usr['usr_correo'] ?></td>
                                            <td><?php echo $usr['usr_rol'] ?></td>
                                            <td><?php echo $usr['usr_usuario_registro'] ?></td>
                                            <td><?php echo $usr['usr_fecha_registro'] ?></td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <!-- <button class="dropdown-item text-dark btnEliminarUsuario" usr_id="<?php echo $usr['usr_id'] ?>"><i class="fa fa-trash"></i> Eliminar </button> -->
                                                        <a class="dropdown-item text-dark" href="<?php echo HTTP_HOST . 'usuarios/update/' . $usr['usr_id'] ?>"> <i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                                                        <div class="dropdown-divider"></div>

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

        <?php endif; ?>
    </div>
</div>