<?php
//$contratos = ContratosModelo::mdlConsultarContratosAll();
?>

<!-- <div class="row">


    <div class="col-12">

        <table class="table table-striped table-hover tablas">
            <thead>
                <tr>
                    <th># FOLIO</th>
                    <th>FECHA</th>
                    <th>VENDEDOR</th>
                    <th>CLIENTE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contratos as $key => $cts) : ?>
                <tr>
                <td> <a href="<?= HTTP_HOST . 'contratos/buscar/' . $cts['ctr_id'] ?>" class="btn btn-primary"> <?= $cts['ctr_folio'] . '<br>' . $cts['clts_folio_nuevo'] ?> </a> </td>
                <td><?= $cts['ctr_fecha_contrato'] ?></td>
                <td><?= $cts['usr_nombre'] ?></td>
                <td><?= $cts['ctr_cliente'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</div> -->

<div class="card">

    <div class="card-header text-center bg-primary">

        <div class="row" style="color:aliceblue">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_folio">FILTRO DE BUSQUEDA</label>
                    <input type="text" name="ctr_folio" id="ctr_folio" class="form-control" placeholder="">
                    <small id="helpId" class="">Nº FOLIO / Nº CONTRATO / Nº TICKET</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_vendedor">VENDEDOR</label>
                    <select name="ctr_vendedor" id="ctr_vendedor" class="form-control select2">
                        <option value=""></option>
                        <?php
                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($usuarios as $key => $usr) :
                        ?>
                            <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_fecha_inicio">FECHA INICIO </label>
                    <input type="date" name="ctr_fecha_inicio" id="ctr_fecha_inicio" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_fecha_fin">FECHA FIN </label>
                    <input type="date" name="ctr_fecha_fin" id="ctr_fecha_fin" class="form-control">
                </div>
            </div>
            <div class="col-9"></div>
            <div class="col-3">
                <button type="submit" class="btn btn-block  float-right" id="btnListarContratos" style="background-color:#fff;border: 1px solid #fff; color:#103760">Buscar</button>
            </div>

        </div>

    </div>
    <div class="card-body" style="height:500px; overflow-y: scroll;">
        <div class="row">
            <div class="col-12  table-responsive">
                <table class="table table-striped table-hover" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>+Opciones</th>
                            <th>Nº</th>
                            <th>CODIGO</th>
                            <th>Nº CUENTA</th>
                            <th>RUTA</th>
                            <th>CLIENTE</th>
                            <th>VENDEDOR</th>
                            <th>FECHA DE VENTA</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyContratos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
            Descargar</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        listarContrato();
    })
    $("#btnListarContratos").on("click", function() {


        var ctr_folio = $("#ctr_folio").val();
        var ctr_vendedor = $("#ctr_vendedor").val();
        var ctr_fecha_inicio = $("#ctr_fecha_inicio").val();
        var ctr_fecha_fin = $("#ctr_fecha_fin").val();
        listarContrato(ctr_folio, ctr_vendedor, ctr_fecha_inicio, ctr_fecha_fin);
    })

    function listarContrato(ctr_folio = "",
        ctr_vendedor = "",
        ctr_fecha_inicio = "",
        ctr_fecha_fin = "") {

        $("#tbodyContratos").html("");
        var datos = new FormData();

        datos.append("ctr_folio", ctr_folio)
        datos.append("ctr_vendedor", ctr_vendedor)
        datos.append("ctr_fecha_inicio", ctr_fecha_inicio)
        datos.append("ctr_fecha_fin", ctr_fecha_fin)

        datos.append("btnListarContratos", true);

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                //startLoadButton()
            },
            success: function(res) {
                console.log(res);
                var tbodyContratos = "";

                res.forEach(ctr => {

                    tbodyContratos +=
                        `
                        <tr class="text-center">

                            <td>
                               <div class="btn-group">
                                <a href="${urlApp+'contratos/buscar/'+ctr.ctr_id}"  class="btn btn-warning text-center">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="${urlApp+'app/report/contrato-ventas.php?ctr_id='+ctr.ctr_id}" target="_blacnk"  class="btn btn-secondary text-center btnImprimirContrato" ctr_id="${ctr.ctr_id}" >
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                               </div>
                            </td>
                            <td>${ctr.ctr_folio}</td>
                            <td></td>
                            <td>${ctr.ctr_numero_cuenta}</td>
                            <td>${ctr.ctr_ruta}</td>
                            <td>${ctr.ctr_cliente}</td>
                            <td>${ctr.usr_nombre}</td>
                            <td>${ctr.ctr_fecha_contrato}</td>
                        
                        </tr>
                        
                        `;


                });
                $("#tbodyContratos").html(tbodyContratos);
            }
        })


    }
</script>