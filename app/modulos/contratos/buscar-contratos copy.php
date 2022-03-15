<?php
cargarComponente('breadcrumb', '', 'Buscar contrato');
?>

<form id="formBuscarContratos" method="post">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="">Escribe el número de folio</label>
            <input type="text" name="crt_folio" id="crt_folio" class="form-control">
        </div>
        <div class="col-md-4">
            <input type="submit" class="btn btn-primary mt-4">
        </div>
    </div>
</form>


<fieldset >

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ctr_cliente">Nombre del cliente * </label>
                                <input type="text" name="ctr_cliente" id="ctr_cliente" class="form-control" required value="">
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-primary">REFERENCIA</h6>
                        </div>
                        <div class="form-group col-md-4">

                            <label for="ctr_nombre_ref_1">Nombre *</label>
                            <input type="text" name="ctr_nombre_ref_1" id="ctr_nombre_ref_1" class="form-control" required value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ctr_parentesco_ref_1">Parentesco *</label>
                            <input type="text" name="ctr_parentesco_ref_1" id="ctr_parentesco_ref_1" class="form-control" required value="">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="ctr_direccion_ref_1">Dirección *</label>
                            <input type="text" name="ctr_direccion_ref_1" id="ctr_direccion_ref_1" class="form-control" required value="">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="ctr_colonia_ref_1">Colonia *</label>
                            <input type="text" name="ctr_colonia_ref_1" id="ctr_colonia_ref_1" class="form-control" required value="">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="ctr_telefono_ref_1">Teléfono *</label>
                            <input type="text" name="ctr_telefono_ref_1" id="ctr_telefono_ref_1" class="form-control phone_mx" required value="">
                        </div>
                        <div class="form-group col-md-2 mt-4">
                            <a href="" class="btn btn-primary btn-block" id="btnRefe_1"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="ctr_folio">Número de folio *</label>
                            <input type="text" name="ctr_folio" id="ctr_folio" class="form-control" required value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="ctr_total">Total de venta *</label>
                            <input type="text" name="ctr_total" id="ctr_total" class="form-control inputN" required value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="ctr_enganche">Enganche *</label>
                            <input type="text" name="ctr_enganche" id="ctr_enganche" class="form-control inputN" required value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="ctr_pago_adicional">S/E CONTADO *</label>
                            <input type="text" name="ctr_pago_adicional" id="ctr_pago_adicional" class="form-control inputN" required value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ctr_fecha_contrato">Fecha de venta</label>
                            <input type="text" name="ctr_fecha_contrato" id="ctr_fecha_contrato" class="form-control" readonly value="">
                        </div>
                        <div class="form-group col-md-9">
                            <label for="ctr_nota">Nota</label>
                            <textarea name="ctr_nota" id="ctr_nota" cols="30" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody id="ctrBodyPds">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

</fieldset>

<div class="row">

    <div class="col-md-6">
        <div class="card copyable">
            <img src="" id="img_cliente" class="img-responsive img-fluid" width="100%">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card copyable">
            <img src="" id="img_comprobante" class="img-responsive img-fluid" width="100%">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card copyable">
            <img src="" id="img_cred_fro" class="img-responsive img-fluid" width="100%">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card copyable">
            <img src="" id="img_cred_tra" class="img-responsive img-fluid" width="100%">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card copyable">
            <img src="" id="img_fachada" class="img-responsive img-fluid" width="100%">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card copyable">
            <img src="" id="img_pagare" class="img-responsive img-fluid" width="100%">
        </div>
    </div>

</div>




<script>
    $("#formBuscarContratos").on("submit", function(e) {

        e.preventDefault();

        var datos = new FormData(this);
        datos.append("btnBuscarContratos", true);




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



                $("#ctr_cliente").val(res.ctr_cliente)
                $("#ctr_nombre_ref_1").val(res.ctr_nombre_ref_1)
                $("#ctr_parentesco_ref_1").val(res.ctr_parentesco_ref_1)
                $("#ctr_direccion_ref_1").val(res.ctr_direccion_ref_1)
                $("#ctr_colonia_ref_1").val(res.ctr_colonia_ref_1)
                $("#ctr_telefono_ref_1").val(res.ctr_telefono_ref_1)
                $("#btnRefe_1").attr("href","tel:"+res.ctr_telefono_ref_1)
               
                $("#ctr_folio").val(res.ctr_folio)
                $("#ctr_total").val(res.ctr_total)
                $("#ctr_enganche").val(res.ctr_enganche)
                $("#ctr_pago_adicional").val(res.ctr_pago_adicional)
                $("#ctr_fecha_contrato").val(res.ctr_fecha_contrato)
                $("#ctr_nota").val(res.ctr_nota)

                var productos = JSON.parse(res.ctr_productos)

                var ctrBodyPds = "";
                productos.forEach(pds => {
                    ctrBodyPds +=
                        `
                            <tr>
                            

                            <td>${pds.nombreProducto}</td>
                            <td>${pds.cantidad}</td>

                            
                            </tr>
                        `;

                });
                $("#ctrBodyPds").html(ctrBodyPds)
                // console.log(res.)

                var fotos = JSON.parse(res.ctr_fotos)

                console.log(fotos);

                $("#img_cliente").attr('src', fotos.img_cliente)
                $("#img_comprobante").attr('src', fotos.img_comprobante)
                $("#img_cred_fro").attr('src', fotos.img_cred_fro)
                $("#img_cred_tra").attr('src', fotos.img_cred_tra)
                $("#img_fachada").attr('src', fotos.img_fachada)
                $("#img_pagare").attr('src', fotos.img_pagare)



            }

        })

        $(".btn_img_cliente").on("click", function() {
            copiarAlPortapapeles('img_cliente')
        })

        function copiarAlPortapapeles(id_elemento) {

            // Crea un campo de texto "oculto"
            var aux = document.createElement("input");

            // Asigna el contenido del elemento especificado al valor del campo
            aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);

            // Añade el campo a la página
            document.body.appendChild(aux);

            // Selecciona el contenido del campo
            aux.select();

            // Copia el texto seleccionado
            document.execCommand("copy");

            // Elimina el campo de la página
            document.body.removeChild(aux);

        }


    })

    function SelectText(element) {
        var doc = document;
        if (doc.body.createTextRange) {
            var range = document.body.createTextRange();
            range.moveToElementText(element);
            range.select();
        } else if (window.getSelection) {
            var selection = window.getSelection();
            var range = document.createRange();
            range.selectNodeContents(element);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
    $(".copyable").click(function(e) {
        //Make the container Div contenteditable
        $(this).attr("contenteditable", true);
        //Select the image
        SelectText($(this).get(0));
        //Execute copy Command
        //Note: This will ONLY work directly inside a click listenner
        document.execCommand('copy');
        //Unselect the content
        window.getSelection().removeAllRanges();
        //Make the container Div uneditable again
        $(this).removeAttr("contenteditable");
        //Success!!
        toastr.success("Imagén copiada", 'Muy bien')
    });
</script>