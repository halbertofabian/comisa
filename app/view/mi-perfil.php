<?php cargarComponente('breadcrumb', '', 'Editar mi perfil ');

$usr = UsuariosModelo::mdlMostrarUsuarios($_SESSION['session_usr']['usr_id']);
if ($_SESSION['session_usr']['usr_rol'] != "Alumno") :
?>
    <div class="card">

        <div class="card-body">
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
                                <input type="email" name="usr_correo" id="usr_correo" class="form-control" placeholder="Escribe el correo electrónico" value="<?php echo $usr['usr_correo'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>
                                <input id="usr_clave" name="usr_clave" type="password" class="form-control">
                                <input id="usr_clave_hidden" name="usr_clave_hidden" type="hidden" class="form-control" value="<?php echo $usr['usr_clave'] ?>" required>

                            </div>
                        </div>
                        <!-- <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="usr_rol">Perfil</label>
                        <select name="usr_rol" id="usr_rol" class="form-control">

                            <option value="<?php echo $usr['usr_rol'] ?>"><?php echo $usr['usr_rol'] ?></option>
                            <option value="Administrador">Administrador</option>
                            <option value="Ejecutivo">Ejecutivo</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Caja">Caja</option>
                            <option value="Auditor">Auditor</option>
                        </select>
                    </div>
                </div> -->
                        <div class="col-md-4">

                        </div>
                        <input type="hidden" name="usr_rol" value="<?php echo $usr['usr_rol'] ?>">
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
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <input type="submit" value="Guardar cambios" name="btnActualizarUsuario" id="btnActualizarUsuario" class="btn btn-primary float-right" placeholder="Escribe la dirección">
                            </div>
                        </div>
                    </div>
                    <?php
                    $actualizarUusario = new UsuariosControlador();
                    $actualizarUusario->ctrActualizarUsuarios2("mi-perfil");
                    ?>
                </form>
            </div>
        </div>
    </div>


<?php else : ?>

    <div class="card">

        <div class="card-body">
            <div class="container">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <?php

                                $usr_id = UsuariosControlador::ctrConsultarSiguienteUsuario();

                                ?>
                                <label for="usr_matricula">Matricula</label>
                                <input type="text" name="usr_matricula" id="usr_matricula" class="form-control" placeholder="Escribe el nombre completo del alumno" value="<?php echo $usr['usr_matricula'] ?>" readonly required>
                                <input type="hidden" name="usr_id" value="<?php echo $usr['usr_id'] ?>">
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="usr_nombre">Nombre(s)</label>
                                <input type="text" name="usr_nombre" id="usr_nombre" value="<?php echo $usr['usr_nombre'] ?>" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="usr_app">Apellido paterno</label>
                                <input type="text" name="usr_app" id="usr_app" value="<?php echo $usr['usr_app'] ?>" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="usr_apm">Apellido materno</label>
                                <input type="text" name="usr_apm" id="usr_apm" value="<?php echo $usr['usr_apm'] ?>" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
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
                                <input type="email" name="usr_correo" id="usr_correo" value="<?php echo $usr['usr_correo'] ?>" class="form-control" placeholder="Escribe el correo electrónico">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>


                                <input id="usr_clave" name="usr_clave" type="password" class="form-control">
                                <input id="usr_clave_hidden" name="usr_clave_hidden" type="hidden" value="<?php echo $usr['usr_clave'] ?>" class="form-control">


                            </div>
                        </div>
                        <input type="hidden" value="Alumno" name="usr_rol">
                        <!-- <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_modalidad">Modalidad</label>
                                <select name="usr_modalidad" id="usr_modalidad" class="form-control">
                                    <option value="PRESENCIAL">PRESENCIAL</option>
                                    <option value="ONLINE">ONLINE</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <div class="alert alert-dark" role="alert">
                                <strong>Dirección</strong>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-group">
                                <label for="usr_calle">Calle</label>
                                <input type="text" name="usr_calle" id="usr_calle" value="<?php echo $usr['usr_calle'] ?>" class="form-control" placeholder="Escribe la calle">
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="usr_ne">Número ext</label>
                                <input type="text" name="usr_ne" id="usr_ne" value="<?php echo $usr['usr_ne'] ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="usr_ni">Número int</label>
                                <input type="text" name="usr_ni" id="usr_ni" value="<?php echo $usr['usr_ni'] ?>" class="form-control" placeholder="S/N">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_cp">Código postal</label>
                                <input type="text" name="usr_cp" id="usr_cp" value="<?php echo $usr['usr_cp'] ?>" class="form-control" placeholder="Escribe el código postal">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_colonia">Colonia</label>
                                <input type="text" name="usr_colonia" id="usr_colonia" value="<?php echo $usr['usr_colonia'] ?>" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_estado">Estado</label>
                                <input type="text" name="usr_estado" id="usr_estado" value="<?php echo $usr['usr_estado'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_municipio">Municipio</label>
                                <input type="text" name="usr_municipio" id="usr_municipio" value="<?php echo $usr['usr_municipio'] ?>" class="form-control" placeholder="S/N">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" value="Guardar cambios" name="btnActualizarUsuario" id="btnGuardarUsuario" class="btn btn-primary float-right ">
                            </div>
                        </div>
                    </div>
                    <?php
                    $editarUsuario = new UsuariosControlador();
                    $editarUsuario->ctrActualizarUsuarios('mi-perfil');
                    ?>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>