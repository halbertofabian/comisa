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
            cargarComponente('breadcrumb_nivel_1', '', 'Editar alumnos #' . $rutas[2], array(['ruta' => 'alumnos', 'label' => 'Listar alumnos']));

            $usr = UsuariosModelo::mdlMostrarUsuarios($rutas[2]); ?>
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
                    $editarUsuario->ctrActualizarUsuarios('alumnos');
                    ?>
                </form>
            </div>

        <?php
        elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "view") :
            cargarComponente('breadcrumb_nivel_1', '', 'Ver alumno', array(['ruta' => 'alumnos', 'label' => 'Listar alumnos']));
            $usr = UsuariosModelo::mdlMostrarUsuarios($rutas[2]); ?>
            <fieldset disabled>

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
                                    <input type="text" name="usr_calle" id="usr_calle" value="<?php echo $usr['usr_calle'] ?>" class="form-control" placeholder="Escribe la calle" required>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label for="usr_ne">Número ext</label>
                                    <input type="text" name="usr_ne" id="usr_ne" value="<?php echo $usr['usr_ne'] ?>" class="form-control" placeholder="" required>
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
                                    <input type="text" name="usr_cp" id="usr_cp" value="<?php echo $usr['usr_cp'] ?>" class="form-control" placeholder="Escribe el código postal" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_colonia">Colonia</label>
                                    <input type="text" name="usr_colonia" id="usr_colonia" value="<?php echo $usr['usr_colonia'] ?>" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_estado">Estado</label>
                                    <input type="text" name="usr_estado" id="usr_estado" value="<?php echo $usr['usr_estado'] ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="usr_municipio">Municipio</label>
                                    <input type="text" name="usr_municipio" id="usr_municipio" value="<?php echo $usr['usr_municipio'] ?>" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <!-- <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" value="Guardar cambios" name="btnActualizarUsuario" id="btnGuardarUsuario" class="btn btn-primary float-right ">
                                </div>
                            </div> -->
                        </div>
                        <?php
                        // $editarUsuario = new UsuariosControlador();
                        // $editarUsuario->ctrActualizarUsuarios('alumnos');
                        ?>
                    </form>
                </div>

            </fieldset>


        <?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "new") :
            cargarComponente('breadcrumb_nivel_1', '', 'Nuevo alumno', array(['ruta' => 'alumnos', 'label' => 'Listar alumnos']));

        ?>


            <div class="container">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <?php

                                $usr_id = UsuariosControlador::ctrConsultarSiguienteUsuario($_SESSION['session_suc']['scl_sub_fijo']);

                                ?>
                                <label for="usr_matricula">Matricula</label>
                                <input type="text" name="usr_matricula" id="usr_matricula" class="form-control" placeholder="Escribe el nombre completo del alumno" value="<?php echo $usr_id ?>" readonly required>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="usr_nombre">Nombre(s)</label>
                                <input type="text" name="usr_nombre" id="usr_nombre" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="usr_app">Apellido paterno</label>
                                <input type="text" name="usr_app" id="usr_app" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
                            </div>

                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="usr_apm">Apellido materno</label>
                                <input type="text" name="usr_apm" id="usr_apm" class="form-control" placeholder="Escribe el nombre completo del alumno" required>
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
                                <input type="email" name="usr_correo" id="usr_correo" class="form-control" placeholder="Escribe el correo electrónico">
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>


                                <input id="usr_clave" name="usr_clave" type="password" class="form-control">

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
                                <input type="text" name="usr_calle" id="usr_calle" class="form-control" placeholder="Escribe la calle" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="usr_ne">Número ext</label>
                                <input type="text" name="usr_ne" id="usr_ne" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="usr_ni">Número int</label>
                                <input type="text" name="usr_ni" id="usr_ni" class="form-control" placeholder="S/N">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="usr_cp">Código postal</label>
                                <input type="text" name="usr_cp" id="usr_cp" class="form-control" placeholder="Escribe el código postal" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_colonia">Colonia</label>
                                <input type="text" name="usr_colonia" id="usr_colonia" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_estado">Estado</label>
                                <input type="text" name="usr_estado" id="usr_estado" class="form-control" value="Tamaulipas" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="usr_municipio">Municipio</label>
                                <input type="text" name="usr_municipio" id="usr_municipio" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" value="Guardar usuario" name="btnGuardarUsuario" id="btnGuardarUsuario" class="btn btn-primary float-right ">
                            </div>
                        </div>
                    </div>
                    <?php
                    $guardarUsuario = new UsuariosControlador();
                    $guardarUsuario->ctrAgregarUsuarios('alumnos');
                    ?>
                </form>
            </div>

        <?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "importar") :
            cargarComponente('breadcrumb_nivel_1', '', 'Importar lista de alumnos', array(['ruta' => 'alumnos', 'label' => 'Listar alumnos'])); ?>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h3>Exporta tu lista de productos</h3>
                        <p>Instrucciones:</p>
                        <ol>

                            <li> Descarga el archivo de ejemplo <a href="<?php echo HTTP_HOST . 'app/upload/file_examples/ejemplo_importar_alumnos.xls' ?>" class="btn"> <i class="fa fa-download"></i> Descargar ejemplo</a></li>
                            <li> Llena tu Excel siguiendo el ejemplo </li>
                            <li> Guardalo con extensión .xls o .csv </li>
                            <li> De click en importar </li>
                            <li> Cargue el archivo excel permitido </li>
                            <li> Una vez realizado estos pasos, da click en el botón Importar productos </li>

                        </ol>
                    </div>
                    <div class="col-12 col-md-6">

                        <div class=" card-body">
                            <h4 class="card-title">Cargar archivo</h4>
                            <form method="post" enctype="multipart/form-data" id="formImportarProductos">
                                <input type="file" class="form-control" name="input_file" id="input_file">
                                <button type="submit" class="btn btn-success mt-1 float-right btnImportarProductos">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                    Importar alumnos
                                </button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

    </div>



<?php else :
            cargarComponente('breadcrumb', '', 'Lista de alumnos');

?>

    <div class="container">
        <form method="post" id="formUserDelete">
            <div class="row">
                <div class="col-12">
                    <div class="mb-1">
                        <a href="<?php echo HTTP_HOST . 'alumnos/importar' ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Importar alumnos"><i class="fa fa-upload"></i></a>
                        <a href="<?php echo HTTP_HOST . 'app/lib/export/alumnos-export.php' ?>" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Exportar alumnos"><i class="fa fa-download"></i></a>
                    </div>
                    <a href="<?php echo HTTP_HOST . 'alumnos/new' ?>" class="btn btn-primary float-right "> <i class="fa fa-plus"></i> Nuevo alumno</a>


                </div>



            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped tablas tablaUsuarios" id="">
                        <thead>
                            <tr>
                                <th>

                                </th>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo electrónico</th>
                                <th>Usuario registro</th>
                                <th>Fecha registro</th>
                                <th>Plantel</th>
                                <!-- <th>Dirección</th> -->
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $usuarios = UsuariosModelo::mdlMostrarUsuarios("", "Alumno");
                            foreach ($usuarios as $key => $usr) :
                            ?>
                                <tr>


                                    <td>
                                        <input type="checkbox" class="pds_action_user" name="pds_action_user[]" value="<?php echo $pds['usr_id'] ?>">
                                    </td>


                                    <td>
                                        <a href="<?php echo HTTP_HOST . 'alumnos/view/' . $usr['usr_id'] ?>" class="btn btn-dark "><i class="fa fa-eye"></i>
                                            <?php echo $usr['usr_matricula'] ?>
                                        </a>

                                    </td>

                                    <td><?php echo $usr['usr_nombre'] . ' ' . $usr['usr_app'] . ' ' . $usr['usr_apm'] ?></td>
                                    <td><?php echo $usr['usr_telefono'] ?></td>
                                    <td><?php echo $usr['usr_correo'] ?></td>
                                    <td><?php echo $usr['usr_usuario_registro'] ?></td>
                                    <td><?php echo $usr['usr_fecha_registro'] ?></td>
                                    <td> <strong> <?php echo $usr['scl_nombre'] ?> </strong> </td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-filter" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button" class="dropdown-item text-dark btnMandarEmailActivacion" usr_correo="<?php echo $usr['usr_correo'] ?>" usr_nombre="<?php echo $usr['usr_nombre'] ?>"> <i class="fa fa-exclamation-circle"></i> Enviar activación</button>
                                                <?php if ($_SESSION['session_usr']['usr_rol'] == "Administrador") : ?>
                                                    <button type="button" class="dropdown-item text-dark btnEliminarUsuario" usr_id="<?php echo $usr['usr_id'] ?>"><i class="fa fa-trash"></i>Eliminar </button>
                                                <?php endif; ?>
                                                <a class="dropdown-item text-dark" href="<?php echo HTTP_HOST . 'alumnos/update/' . $usr['usr_id'] ?>">
                                                    <i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
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

            <div class="col-12 mt-1">
                <div class="row">
                    <div class="col-md-2 col-12">
                        <input type="checkbox" name="" id="show_users_table"> <label for="show_users_table" class="text-link"> Seleccionar todo</label>

                    </div>
                    <div class="col-md-4 col-12">
                        <select name="action_aplication_users_table" class="form-control" id="action_aplication_users_table">
                            <option value="">Seleccione una opción</option>
                            <option value="eliminar">Eliminar</option>
                            <option value="password">Resetear password</option>

                        </select>
                        <button type="submit" class="btn btn-dark btn-sm mb-1 float-right mt-1"> Aplicar</button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<?php endif; ?>


</div>
</div>