<style>
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

    #loader {
        position: fixed;
        z-index: 999;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 50px;
        height: 50px;
    }
</style>
<?php
$fecha_hoy = date("Y-m-d");
$monday = date('Y-m-d', strtotime('monday this week'));
$tuesday = date('Y-m-d', strtotime('tuesday this week'));
$wednesday = date('Y-m-d', strtotime('wednesday this week'));
$thursday  = date('Y-m-d', strtotime('thursday this week'));
$friday = date('Y-m-d', strtotime('friday this week'));
$saturday  = date('Y-m-d', strtotime('saturday this week'));
$sunday = date('Y-m-d', strtotime('sunday this week'));


$mes_actual = date('Y-m', strtotime('this month'));
$mes_siguiente = date('Y-m', strtotime('+1 month'));
$dia_actual = date('d', strtotime('this month'));

// $orden = ContratosModelo::mdlConsultarOrdenPorRuta();

?>
<div class="containeir">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="crt_ruta">Número de ruta</label>
                                <?php if ($_SESSION['session_usr']['usr_rol'] == "Cobrador") : ?>
                                    <input type="text" class="form-control" name="crt_ruta" id="crt_ruta" readonly value="<?= $_SESSION['session_usr']['usr_ruta'] ?>">
                                <?php else : ?>
                                    <select class="form-control" name="crt_ruta" id="crt_ruta">
                                        <option value="">--Seleccionar ruta--</option>
                                        <?php
                                        for ($i = 1; $i <= 20; $i++) :
                                            $ruta = $i <= 9 ? "0" . $i : $i;
                                        ?>
                                            <option value="R<?= $i ?>"><?= $ruta ?></option>
                                        <?php endfor; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                            <input type="hidden" id="ctr_lunes" value="<?= $monday ?>">
                            <input type="hidden" id="ctr_martes" value="<?= $tuesday ?>">
                            <input type="hidden" id="ctr_miercoles" value="<?= $wednesday ?>">
                            <input type="hidden" id="ctr_jueves" value="<?= $thursday ?>">
                            <input type="hidden" id="ctr_viernes" value="<?= $friday ?>">
                            <input type="hidden" id="ctr_sabado" value="<?= $saturday ?>">
                            <input type="hidden" id="ctr_domingo" value="<?= $sunday ?>">
                            <input type="hidden" id="fecha_hoy" value="<?= $fecha_hoy ?>">
                            <input type="hidden" id="mes_actual" value="<?= $mes_actual ?>">
                            <input type="hidden" id="mes_siguiente" value="<?= $mes_siguiente ?>">
                            <input type="hidden" id="dia_actual" value="<?= $dia_actual ?>">
                        </div>
                        <div class="col-6">
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
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="form-group">
                                <label for="cra_posicion">Siguiente # Orden</label>
                                <input type="text" class="form-control" name="cra_posicion" id="cra_posicion" readonly>
                            </div>
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
                        <div class="col-xl-12 col-12">
                            <div id="accordion" style="overflow-y: scroll; max-height: 550px;">
                                <div class="card">
                                    <div class="card-header" id="uno">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#Lunes" aria-expanded="false" aria-controls="Lunes">
                                                Lunes
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Lunes" class="collapse" aria-labelledby="uno" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-primary">
                                            <h3 class="card-title text-center">Lunes <?= $monday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="lunes">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="dos">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Martes" aria-expanded="false" aria-controls="Martes">
                                                Martes
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Martes" class="collapse" aria-labelledby="dos" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-secondary">
                                            <h3 class="card-title text-center">Martes <?= $tuesday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="martes">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="tres">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Miercoles" aria-expanded="false" aria-controls="Miercoles">
                                                Miercoles
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Miercoles" class="collapse" aria-labelledby="tres" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-success">
                                            <h3 class="card-title text-center">Miercoles <?= $wednesday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="miercoles">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="cuatro">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Jueves" aria-expanded="false" aria-controls="Jueves">
                                                Jueves
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Jueves" class="collapse" aria-labelledby="cuatro" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-danger">
                                            <h3 class="card-title text-center">Jueves <?= $thursday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="jueves">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="cinco">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Viernes" aria-expanded="false" aria-controls="Viernes">
                                                Viernes
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Viernes" class="collapse" aria-labelledby="cinco" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-warning">
                                            <h3 class="card-title text-center">Viernes <?= $friday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="viernes">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="seis">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Sabado" aria-expanded="false" aria-controls="Sabado">
                                                Sabado
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Sabado" class="collapse" aria-labelledby="seis" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-info">
                                            <h3 class="card-title text-center">Sábado <?= $saturday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="sabado">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="siete">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#Domingo" aria-expanded="false" aria-controls="Domingo">
                                                Domingo
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="Domingo" class="collapse" aria-labelledby="siete" data-parent="#accordion">
                                        <div class="card days border pl-5 pr-5 border-light">
                                            <h3 class="card-title text-center">Domingo <?= $sunday ?></h3>
                                            <div class="card-body">
                                                <div class="row" id="domingo">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loader">

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>