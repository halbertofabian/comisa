<?php
cargarComponente('breadcrumb', '', 'Carga de datos de plantilla');

?>

<div class="container">
    <form method="post"  action="">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="gts_usuario">Semana: </label>
                    <select class="form-control select2" name="pvts_num_semana" id="pvts_num_semana">
                        <option value="">Seleccione un usuario</option>
                        <?php
                        $aux = "";
                        $rol = "Vendedor";

                        $usuarios = UsuariosModelo::mdlMostrarUsuarios($aux, $rol);
                        // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                        foreach ($usuarios as $key => $usr) :
                        ?>
                            <option value="<?php echo $usr['usr_id'] ?>"><?php echo $usr['usr_nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 ">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Vendedor</th>
                            <th>Sabado</th>
                            <th>Domingo</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($usuarios as $key => $usr) :
                        ?>
                        <tr>
                        <td> <input data-toggle="tooltip" data-placement="top" title="<?= $usr['usr_nombre']; ?>" type="text" name="vendedor[]" id="" class="form-control" value="<?= $usr['usr_nombre']; ?>" readonly> </td>
                        <td><input type="text" name="sabado[]" id="" class="form-control" ></td>
                        <td><input type="text" name="domingo[]" id="" class="form-control" ></td>
                        <td><input type="text" name="lunes[]" id="" class="form-control" ></td>
                        <td><input type="text" name="martes[]" id="" class="form-control" ></td>
                        <td><input type="text" name="miercoles[]" id="" class="form-control" ></td>
                        <td><input type="text" name="jueves[]" id="" class="form-control" ></td>
                        <td><input type="text" name="viernes[]" id="" class="form-control" ></td>
                        <td><input type="text" name="viernes[]" id="" class="form-control" ></td>
                        </tr>

                           
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>


            </div>

        </div>

        <div class="col-12 col-md-4">
                <div class="form-group mt-1 ">
                    <button type="submit" class="btn btn-primary btn-load" id="btn_cargarr_plantilla">Crear</button>
                </div>
            </div>
            <?php preArray($_POST)?>
    </form>
</div>