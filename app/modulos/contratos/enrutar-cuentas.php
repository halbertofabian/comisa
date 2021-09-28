<style>
    .days {
        width: 30rem;
        min-height: 300px;
    }

    .table tr td {
        vertical-align: text-top;
    }

    #listaPrincipal .card {
        cursor: move;
    }

    #lista1 .card {
        background-color: #0275d8;
        color: #fff;
    }

    #lista2 .card {
        background-color: #292b2c;
        color: #fff;
    }

    #lista3 .card {
        background-color: #5cb85c;
        color: #fff;
    }

    #lista4 .card {
        background-color: #d9534f;
        color: #fff;
    }

    #lista5 .card {
        background-color: #f0ad4e;
        color: #fff;
    }

    #lista6 .card {
        background-color: #5bc0de;
        color: #fff;
    }

    #lista7 .card {
        background-color: #f7f7f7;
    }
</style>
<div class="containeir">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="crt_ruta">Número de ruta</label>
                                <select class="form-control" name="crt_ruta" id="crt_ruta">
                                    <option value="">--Seleccionar ruta--</option>
                                    <?php
                                    for ($i = 1; $i <= 20; $i++) :
                                        $ruta = $i <= 9 ? "0" . $i : $i;

                                    ?>
                                        <option value="R<?= $i ?>"><?= $ruta ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscador" aria-label="Buscador" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="listaPrincipal" style="overflow-y: scroll; max-height: 450px;">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-8"></div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label for="metodo_pgo">Forma de pago</label>
                                <select class="form-control" name="metodo_pgo" id="metodo_pgo">
                                    <option value="SEMANALES" selected>SEMANALES</option>
                                    <option value="CATORCENALES">CATORCENALES</option>
                                    <option value="QUINCENALES">QUINCENALES</option>
                                    <option value="MENSUALES">MENSUALES</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-responsive" width="100%">
                        <tr>
                            <td>
                                <div class="card days border border-primary">
                                    <h3 class="card-title text-center">Lunes</h3>
                                    <div class="card-body" id="lista1">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-secondary">
                                    <h3 class="card-title text-center">Martes</h3>
                                    <div class="card-body" id="lista2">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-success">
                                    <h3 class="card-title text-center">Miercoles</h3>
                                    <div class="card-body" id="lista3">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-danger">
                                    <h3 class="card-title text-center">Jueves</h3>
                                    <div class="card-body" id="lista4">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-warning">
                                    <h3 class="card-title text-center">Viernes</h3>
                                    <div class="card-body" id="lista5">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-info">
                                    <h3 class="card-title text-center">Sábado</h3>
                                    <div class="card-body" id="lista6">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-light">
                                    <h3 class="card-title text-center">Domingo</h3>
                                    <div class="card-body" id="lista7">

                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>