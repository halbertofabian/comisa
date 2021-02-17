<?php
cargarComponente('breadcrumb', '', 'Generar traspaso');

?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">Número de traspaso</label>
                <input type="text" name="" id="" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">Usuario registro</label>
                <input type="text" name="" id="" class="form-control" value="<?php echo $_SESSION['session_usr']['usr_nombre']; ?>" readonly>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">TIPO</label>
                <select class="form-control" name="" id="">
                    <option>ENTRADA</option>
                    <option>SALIDA</option>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="form-group">
                <label for="">DE:</label>
                <select class="form-control" name="tps_ams_id_origen" id="tps_ams_id_origen">
                    <option value="">Seleccione un almacén origén</option>
                    <?php

                    $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('I', $_SESSION['session_suc']['scl_id']);
                    // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                    foreach ($sucursales as $key => $scl) :
                    ?>
                        <option value="<?php echo $scl['ams_id'] ?>"><?php echo $scl['scl_nombre'] . ' - ' . $scl['ams_nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="">A: </label>
                <select class="form-control" name="" id="">
                    <option value="">Seleccione un almacén destinio</option>
                    <?php

                    $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('I', $_SESSION['session_suc']['scl_id']);
                    // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                    foreach ($sucursales as $key => $scl) :
                    ?>
                        <option value="<?php echo $scl['scl_id'] ?>"><?php echo $scl['scl_nombre'] . ' - ' . $scl['ams_nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="form-group">
                <label for="">Usuario recibe: </label>
                <select class="form-control" name="" id="">
                    <option value="">Seleccione un usuario</option>
                    <?php

                    $usuarios = UsuariosModelo::mdlMostrarUsuarios();
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

        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Almacén origen
                </div>
                <div class="card-body">
                <div class="form-group d-none scan-ams-origen">
                  <label for=""> Código / Nombre del producto </label>
                  <input type="text" name="" id="" class="form-control" placeholder="Escanea el código del producto o dígite el nombre ">
                </div>
                    <div class="table">
                        <table class="table tblAms">
                            <thead>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th>CANTIDAD DISPONIBLE</th>
                                    <th>CANTIDAD A PASAR</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody id="tblAmsOrigen">
                                <!-- <tr>
                                    <td>ALACENA</td>
                                    <td>18</td>
                                    <td><input type="number" value="1" class="form-control"></td>
                                    <td><button class="btn btn-primary"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                        </button></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>

        </div>

        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Almacén destino
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer text-muted">

                </div>
            </div>

        </div>

    </div>
</div>