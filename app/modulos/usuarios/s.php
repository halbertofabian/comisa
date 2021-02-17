<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "update") :
    cargarComponente('breadcrumb_nivel_1', '', 'Editar usuario #' . $rutas[2], array(['ruta' => 'usuarios', 'label' => 'Listar usuarios']));

    $usr = UsuariosModelo::mdlMostrarUsuarios($rutas[2]); ?>
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="usr_nombre">Nombre</label>
                        <input type="text" name="usr_nombre" id="usr_nombre" value="<?php echo $usr['usr_nombre'] ?>" class="form-control" placeholder="Escribe el nombre de usuario" required>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_telefono">Teléfono</label>
                        <input type="text" name="usr_telefono" id="usr_telefono" value="<?php echo $usr['usr_telefono'] ?>" class="form-control" placeholder="Escribe el telefono">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_correo">Correo electrónico</label>
                        <input type="email" name="usr_correo" id="usr_correo" value="<?php echo $usr['usr_correo'] ?>" class="form-control" placeholder="Escribe el correo electrónico" required>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_clave">Contraseña</label>
                        <input type="password" name="usr_clave" id="usr_clave" class="form-control" placeholder="Escribe la contraseña">
                        <input type="hidden" value="<?php echo $usr['usr_clave'] ?>" name="usr_clave_hidden">
                        <input type="hidden" value="<?php echo $usr['usr_id'] ?>" name="usr_id">

                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_rol">Perfil</label>
                        <select name="usr_rol" id="usr_rol" class="form-control">
                            <option value="<?php echo $usr['usr_rol'] ?>"><?php echo $usr['usr_rol'] ?></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Ejecutivo">Ejecutivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="usr_direccion">Dirección</label>
                        <input type="email" name="usr_direccion" value="<?php echo $usr['usr_direccion'] ?>" id="usr_direccion" class="form-control" placeholder="Escribe la dirección">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <input type="submit" value="Actualizar usuario" name="btnActualizarUsuario" id="btnActualizarUsuario" class="btn btn-primary float-right mt-4">
                    </div>
                </div>
            </div>
            <?php
            $actualizarUsuario = new UsuariosControlador();
            $actualizarUsuario->ctrActualizarUsuarios();
            ?>
        </form>
    </div>

<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "new") :
    cargarComponente('breadcrumb_nivel_1', '', 'Nuevo usuario', array(['ruta' => 'usuarios', 'label' => 'Listar usuarios']));

?>


    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="usr_nombre">Nombre</label>
                        <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" placeholder="Escribe el nombre de usuario" required>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_telefono">Teléfono</label>
                        <input type="text" name="usr_telefono" id="usr_telefono" class="form-control" placeholder="Escribe el telefono">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_correo">Correo electrónico</label>
                        <input type="email" name="usr_correo" id="usr_correo" class="form-control" placeholder="Escribe el correo electrónico" required>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>

                        <div class="position-relative">
                            <input id="usr_clave" name="usr_clave" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="icon-eye float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_rol">Perfil</label>
                        <select name="usr_rol" id="usr_rol" class="form-control">
                            <option value="Administrador">Administrador</option>
                            <option value="Ejecutivo">Ejecutivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-group">
                        <label for="usr_direccion">Dirección</label>
                        <input type="email" name="usr_direccion" id="usr_direccion" class="form-control" placeholder="Escribe la dirección">
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <input type="submit" value="Guardar usuario" name="btnGuardarUsuario" id="btnGuardarUsuario" class="btn btn-primary float-right mt-4" placeholder="Escribe la dirección">
                    </div>
                </div>
            </div>
            <?php
            $guardarUsuario = new UsuariosControlador();
            $guardarUsuario->ctrAgregarUsuarios();
            ?>
        </form>
    </div>


<?php else : 
    cargarComponente('breadcrumb', '', 'Lista de usuarios');
    
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo HTTP_HOST. 'usuarios/new' ?>" class="btn btn-primary float-right">Nuevo usuario</a>
            </div>
            <div class="col-12 mt-4">
                <div class="table-responsive">
                    <table class="table tablas tablaUsuarios">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo electrónico</th>
                                <th>Rol</th>
                                <th>Dirección</th>
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
                                    <td><?php echo $usr['usr_telefono'] ?></td>
                                    <td><?php echo $usr['usr_correo'] ?></td>
                                    <td><?php echo $usr['usr_rol'] ?></td>
                                    <td><?php echo $usr['usr_direccion'] ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-filter" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item text-dark btnEliminarUsuario" usr_id="<?php echo $usr['usr_id'] ?>"><i class="fas fa-trash"></i> Eliminar </button>
                                                <a class="dropdown-item text-dark" href="<?php echo HTTP_HOST. 'usuarios/update/' . $usr['usr_id'] ?>"> <i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
                                                <!-- <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a> -->
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