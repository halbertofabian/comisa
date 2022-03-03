<style>
    body {
        background-color: #F2F3F7
    }

    .card-status {
        height: 200px;
        border-radius: 8px;
        box-sizing: border-box;
        border: 1px solid #dad9da;
        padding: 1rem 1rem;

    }

    .card-status:hover {
        box-shadow: 5px 5px 25px 0.5px #88888885;
        border: 1px solid #005EF9;
        cursor: pointer;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form id="formListarStatus" method="post">
                <div class="form-group">
                    <label for="ctr_ruta">Ruta</label>
                    <select name="ctr_ruta" id="ctr_ruta" class="form-control select2">
                        <option value="">Selecionar ruta</option>
                        <?php
                        for ($i = 1; $i <= 50; $i++) :
                        ?>
                            <option value="R<?= $i ?>">R<?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="row" id="lista_status" style="height: 420px; overflow-y: scroll; padding-right:2rm;">

            </div>
        </div>
        <div class="col-md-8 table-responsive" style="height: 420px; overflow-y: scroll; padding:4px;">
            <table class="table table-striped table-bordered table-hover tablaStatus">
                <thead>
                    <tr class="text-center">
                        <th>#RUTA</th>
                        <th>#CUENTA</th>
                        <th>CLIENTE</th>
                        <th>SALDO</th>
                        <th>FECHA COBRO</th>
                        <th>FECHA REAGENDA</th>
                        <th>ORDEN</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="tbodyStatus">

                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $("#ctr_ruta").on("change", function() {
        listarStatusCliente();
    })

    function listarStatusCliente() {
        var datos = new FormData()
        datos.append("ctr_ruta", $("#ctr_ruta").val());
        datos.append("btnListarStatus", true);


        $.ajax({

            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {},
            success: function(res) {

                var lista_status = "";
                console.log(res)
                res.forEach(etq => {
                    lista_status += " " +
                        `
                    
                <div class="col-md-6">
                    <div class="card card-status btnMostrarStatus" onclick="mostrarStatus('${etq.data.etiqueta}')">
                        <div class="card-body">
                           <center> <img src="${etq.data.icono}" width="50px"></center>
                            <h6 class="card-title text-center">${etq.data.status}</h6>
                            <p class="card-text text-center">
                                <span class="badge bg-danger text-white p-2">${etq.count}</span>
                            </p>
                        </div>
                    </div>
                </div>
                    
                    `;
                });

                $("#lista_status").html(lista_status);

            }
        })
    }




    function mostrarStatus(cra_status) {
        var datos = new FormData()
        datos.append("ctr_ruta", $("#ctr_ruta").val());
        datos.append("cra_status", cra_status);
        datos.append("btnMostrarCuentasStatus", true);
        $.ajax({

            url: urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {},
            success: function(res) {
                console.log(res)

                var tbodyStatus = "";


                res.forEach(cra => {
                    tbodyStatus +=
                        `
                    
                    <tr class="text-center">
                    
                        <td>${cra.ctr_ruta}</td>
                        <td>${cra.ctr_numero_cuenta}</td>
                        <td>${cra.ctr_cliente}</td>
                        <td>${cra.ctr_saldo_actual}</td>
                        <td>${cra.cra_fecha_cobro}</td>
                        <td>${cra.cra_fecha_reagenda}</td>
                        <td>${cra.cra_orden}</td>
                        <td></td>
                    
                    </tr>

                    
                    `;
                });
                $("#tbodyStatus").html(tbodyStatus);

            }
        })
    }
</script>