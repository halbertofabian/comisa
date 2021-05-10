<script>
    var pagina = ""
</script>
<?php cargarComponente('breadcrumb', '', 'Reporte de ingresos'); ?>
<div class="container">

    <div class="container">
        <form method="post" id="formCalculoComisiones">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="igs_usuario">Usuario: </label>
                        <select class="form-control select2" name="igs_usuario" id="igs_usuario">
                            <option value="">Seleccione un usuario</option>
                            <option value="">TODOS LOS USUARIOS</option>
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

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="igs_fecha_inicio">Fecha inicio</label>
                        <input type="date" name="igs_fecha_inicio" id="igs_fecha_inicio" class="form-control " placeholder="">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="igs_fecha_fin">Fecha fin</label>
                        <input type="date" name="igs_fecha_fin" id="igs_fecha_fin" class="form-control theDate" placeholder="">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-load" id="btnMostrarKardex">Buscar</button>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 ">
                    <div class="alert alert-dark col-12" role="alert">
                        <strong>Resumen de ingresos </strong>
                    </div>
                    <div class="col-md-12 " style="overflow:scroll; height: 550px;">

                        <div class="card">

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Monto</th>
                                        <th>Metodo</th>
                                        <th>Fecha</th>

                                    </tr>


                                    </tr>
                                </thead>
                                <tbody id="KardexIngresosUsr">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br> <br>
                    <div class="alert alert-dark col-12" role="alert">
                        SUMA TOTAL DE INGRESOS: $ <strong id="sumigs"></strong>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="alert alert-dark col-12" role="alert">
                        <strong>Resumen de gastos</strong>
                    </div>
                    <div class="col-md-12 " style="overflow:scroll; height: 550px;">

                        <div class="card">

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Monto</th>
                                        <th>Metodo</th>
                                        <th>Fecha</th>

                                    </tr>


                                    </tr>
                                </thead>
                                <tbody id="KardexGastosUsr">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br> <br>
                    <div class="alert alert-dark col-12" role="alert">
                        SUMA TOTAL DE GASTOS: $ <strong id="sumgts"></strong>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 ">
                    <div class="alert alert-dark " role="alert">
                        DIFERENCIA: $ <strong id="dif"></strong>
                    </div>
                </div>
            </div>

        </form>
    </div>