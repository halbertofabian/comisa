
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
            console.log(respuesta)


            var tblDatos = ""
            respuesta.forEach(pds => {
                var pds_sku = pds.pds_sku;
                var pds_sku = pds_sku.split("/");

                tblDatos += 
                    `
                        <tr>

                            <td>${pds.pds_nombre}<br>${pds_sku[0]}</td>
                            <td>${pds.pds_stok}</td>
                            <td><input type="number" class="form-control" value="1" /></td>
                            <td>
                                <button class="btn btn-primary">
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