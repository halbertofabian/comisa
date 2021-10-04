<style>
    .days {
        width: 30rem;
        min-height: 300px;
    }

    .table tr td {
        vertical-align: text-top;
    }

    #lunes .card {
        background-color: #0275d8;
        color: #fff;
    }

    #martes .card {
        background-color: #292b2c;
        color: #fff;
    }

    #miercoles .card {
        background-color: #5cb85c;
        color: #fff;
    }

    #jueves .card {
        background-color: #d9534f;
        color: #fff;
    }

    #viernes .card {
        background-color: #f0ad4e;
        color: #fff;
    }

    #sabado .card {
        background-color: #5bc0de;
        color: #fff;
    }

    #domingo .card {
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
                                    $monday = date('Y-m-d', strtotime('monday this week'));
                                    $tuesday = date('Y-m-d', strtotime('tuesday this week'));
                                    $wednesday = date('Y-m-d', strtotime('wednesday this week'));
                                    $thursday  = date('Y-m-d', strtotime('thursday this week'));
                                    $friday = date('Y-m-d', strtotime('friday this week'));
                                    $saturday  = date('Y-m-d', strtotime('saturday this week'));
                                    $sunday = date('Y-m-d', strtotime('sunday this week'));
                                    for ($i = 1; $i <= 20; $i++) :
                                        $ruta = $i <= 9 ? "0" . $i : $i;

                                    ?>
                                        <option value="R<?= $i ?>"><?= $ruta ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <input type="hidden" id="ctr_lunes" value="<?= $monday ?>">
                            <input type="hidden" id="ctr_martes" value="<?= $tuesday ?>">
                            <input type="hidden" id="ctr_miercoles" value="<?= $wednesday ?>">
                            <input type="hidden" id="ctr_jueves" value="<?= $thursday ?>">
                            <input type="hidden" id="ctr_viernes" value="<?= $friday ?>">
                            <input type="hidden" id="ctr_sabado" value="<?= $saturday ?>">
                            <input type="hidden" id="ctr_domingo" value="<?= $sunday ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Buscador" aria-label="Buscador" id="Buscador" aria-describedby="basic-addon1">
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
                        <div class="col-xl-8">
                        </div>
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
                                    <h3 class="card-title text-center">Lunes <?= $monday ?></h3>
                                    <div class="card-body" id="lunes">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-secondary">
                                    <h3 class="card-title text-center">Martes <?= $tuesday ?></h3>
                                    <div class="card-body" id="martes">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-success">
                                    <h3 class="card-title text-center">Miercoles <?= $wednesday ?></h3>
                                    <div class="card-body" id="miercoles">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-danger">
                                    <h3 class="card-title text-center">Jueves <?= $thursday ?></h3>
                                    <div class="card-body" id="jueves">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-warning">
                                    <h3 class="card-title text-center">Viernes <?= $friday ?></h3>
                                    <div class="card-body" id="viernes">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-info">
                                    <h3 class="card-title text-center">Sábado <?= $saturday ?></h3>
                                    <div class="card-body" id="sabado">

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card days border border-light">
                                    <h3 class="card-title text-center">Domingo <?= $sunday ?></h3>
                                    <div class="card-body" id="domingo">

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