
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 22/11/2020 04:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#formAccesoUsuarioSucursal").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnAccesoSucursalUsr", true);

    $.ajax({

        url: urlApp + 'app/modulos/configuracion/configuracion.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
        },
        success: function (res) {

            if (res.status) {

                toastr.success(res.mensaje, 'Muy bien!')

            } else {
                toastr.error(res.mensaje, '¡Error!')
                setTimeout(function () {
                    location.href = res.pagina
                }, 1000);

            }


        }
    })

})