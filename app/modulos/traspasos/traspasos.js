
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/02/2021 10:36
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#tps_ams_id_origen").on("change", function () {

    var tps_ams_id_origen = $("#tps_ams_id_origen").val()

    var datos = new FormData();
    datos.append("tps_ams_id_origen", tps_ams_id_origen)
    datos.append("btnBuscarProductosAlmacenOrigin", true)


    $.ajax({

        url: urlApp + 'app/modulos/traspasos/traspasos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {


        },
        success: function (respuesta) {
            // console.log(respuesta)


            var tblDatos = ""
            respuesta.forEach(pds => {
                var pds_sku = pds.pds_sku;
                var pds_sku = pds_sku.split("/");

                tblDatos +=
                    `
                        <tr>
                            <td id="pname${pds_sku[0]}">${pds.pds_nombre}<br>/${pds_sku[0]}</td>
                            <td  style="display:none;" id="CatProduct${pds_sku[0]}">${pds.pds_categoria}</td>
                            <td id="pdisponible${pds_sku[0]}">${pds.pds_stok}</td>
                            <td><input type="number" id="cpasar${pds_sku[0]}" class="form-control" value="1" /></td>
                            <td>
                                <button type="button" id="btn${pds_sku[0]}" class="btn btn-primary btnCambioMerca" value="${pds_sku[0]}">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </button>

                            </td>

                        </tr>
                    `;

            });

            $(".scan-ams-origen").removeClass("d-none")

            $("#tblAmsOrigen").html(tblDatos)


        }
    })

})

var myArray = [];
var sumaproductos = "";

$(".tblAms tbody ").on("click", ".btnCambioMerca", function () {

    var audio = document.getElementById("audio");

    var idp = $(this).val();

    var pname = $("#pname" + idp).text();
    var pdisponible = $("#pdisponible" + idp).text();
    var cpasar = $("#cpasar" + idp).val();
    var CatProduct = $("#CatProduct" + idp).text();

    var tbodytraspaso = "";



    if (Number(pdisponible) >= Number(cpasar) && Number(cpasar) > 0) {
        // $(this).attr("disabled", true);
        // $(this).removeClass("btn-primary");
        // $(this).addClass("btn-secondary");

        var productoArray = { id: idp, nombre: pname, categoria: CatProduct, cantidad: cpasar };
        //console.log(productoArray)

        tbodytraspaso +=
            `
                        <tr id="filaPcambiado${idp}">

                            <td id="">${pname}</td>
                           
                            <td id="addcant${idp}">${cpasar}</td>
                            <td>
                                <button type="button" class="btn btn-danger btnDeleteCambio" value="${idp}" >
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            </td>

                        </tr>
                    `;
        

        posicion = myArray.findIndex(produc => produc.id === idp);
        if (posicion == -1) {
            myArray.push(productoArray);

            //console.log(myArray);
            $("#tbodoytraspaso").append(tbodytraspaso);
            $("#tps_lista_productos").val(JSON.stringify(myArray));
            sumarCantidadProduc(cpasar);
        } else {
            //console.log("sumar");
            var val1 = myArray[posicion].cantidad;
            var nuevoVal = Number(val1) + Number(cpasar);
            if (pdisponible >= nuevoVal) {
                myArray[posicion].cantidad = nuevoVal;
                //Arreglo de los productos que van almacenar
                $("#tps_lista_productos").val(JSON.stringify(myArray));
                var CPA = $("#addcant" + idp).text();
                $("#addcant" + idp).text(Number(CPA) + Number(cpasar));
                sumarCantidadProduc(cpasar);

            } else {
                toastr.warning("El stok es menor a la cantidad que desea traspasar", "ADVERTENCIA")
            }
        }

        audio.play();
    }
    else {
        toastr.warning("El stok es menor a la cantidad que desea traspasar", "ADVERTENCIA")
    }

});

//Suma del total de los productos a traspasar;
function sumarCantidadProduc(numerop) {
    sumaproductos = Number(sumaproductos) + Number(numerop)
        $("#suma_pds").val(sumaproductos);
  }
  function restarCantidadProduc(numerop) {
      var cantidadActual=$("#suma_pds").val();
      console.log(cantidadActual);
      console.log(numerop);

        $("#suma_pds").val(Number(cantidadActual)-Number(numerop));
  }

$(".tblAmsDestino tbody ").on("click", ".btnDeleteCambio", function () {
    var id = $(this).val();
    //*Restar productos a la cnatidad total */
    var cantidadRestar=$("#addcant"+id).text();
    restarCantidadProduc(cantidadRestar);
    //*** */
    //$("#btn" + id).removeClass("btn-secondary");
    //$("#btn" + id).addClass("btn-primary");
    // $("#btn" + id).attr("disabled", false);
    var pos = myArray.findIndex(produc => produc.id === id)
    //console.log(pos);
    myArray.splice(pos, 1);
    //console.log(myArray);
    $(this).closest('tr').remove();
    $("#tps_lista_productos").val(JSON.stringify(myArray));
    //alert(id);

});


$("#form_traspaso_product").on("submit", function (e) {
    e.preventDefault();

    nt = $("#tps_num_traspaso").val();
    tp = $("#tps_tipo").val();
    Aorigen = $("#tps_ams_id_origen").val();
    Adestino = $("#tps_ams_id_destino").val();
    usrecibe = $("#tps_user_id_receptor").val();
    pdts = $("#tps_lista_productos").val();

    var errormsj = "";

    if (nt == "") {
        errormsj = "Ingrese un numero de traspaso valido \n";
    }
    if (tp == "") {
        errormsj = "Necesita seleccionar un tipo\n";
    }
    if (Aorigen == "") {
        errormsj = "Necesita seleccionar un almacen de origien \n";
    }
    if (Adestino == "") {
        errormsj = "Necesita seleccionar un almacen destino \n";
    }

    if (usrecibe == "") {
        errormsj = "Necesita seleccionar al usuario que recibe \n";
    }
    if (pdts == "") {
        errormsj = "Necesita seleccionar al menos un producto \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }

    var datos = new FormData(this);
    datos.append("btnTraspasar", true);
    $.ajax({
        url: urlApp + 'app/modulos/traspasos/traspasos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            startLoadButton()
        },
        success: function (respuesta) {
            stopLoadButton()
            // console.log(respuesta)
            if (respuesta.status) {
                toastr.success(respuesta.mensaje, "¡Muy bien!")
                window.open(respuesta.pagina, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=200,left=200,width=1250,height=700");
                location.href =respuesta.paginaInicio ;
            }
            else {
                stopLoadButton("Intentar de nuevo")
                toastr.error(respuesta.mensaje, "¡Error!")
                location.href =respuesta.paginaInicio ;
            }

        }
    })
})

$("#buscadorP").on("keyup", function () {
    var teclasoltada = $(this).val();
    var tps_ams_id_origen = $("#tps_ams_id_origen").val();
    var datos = new FormData();
    datos.append("inputTexto", true);
    datos.append("teclasoltada", teclasoltada);
    datos.append("tps_ams_id_origen", tps_ams_id_origen);


    $.ajax({
        url: urlApp + 'app/modulos/traspasos/traspasos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            
        },
        success: function (respuesta) {
            // console.log(respuesta)
            var tblDatos = ""
            respuesta.forEach(pds => {
                var pds_sku = pds.pds_sku;
                var pds_sku = pds_sku.split("/");

                tblDatos +=
                    `
                        <tr>
                            <td id="pname${pds_sku[0]}">${pds.pds_nombre}<br>${pds_sku[0]}</td>
                            <td  style="display:none;" id="CatProduct${pds_sku[0]}">${pds.pds_categoria}</td>
                            <td id="pdisponible${pds_sku[0]}">${pds.pds_stok}</td>
                            <td><input type="number" id="cpasar${pds_sku[0]}" class="form-control" value="1" /></td>
                            <td>
                                <button id="btn${pds_sku[0]}" class="btn btn-primary btnCambioMerca" value="${pds_sku[0]}">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </button>
                            </td>

                        </tr>
                    `;

            });

            $("#tblAmsOrigen").html(tblDatos)

        }
    })



});