
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 02/12/2020 17:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


$(".cps_aply_ok").on("click", function () {
    $("#cps_aply_matricula").removeClass("d-none");
    $("#cps_aply_matricula").attr("required", true);


})

$(".cps_aply").on("click", function () {
    $("#cps_aply_matricula").addClass("d-none");
    $("#cps_aply_matricula").attr("required", false);
})

$("#formAgregarCupones").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnCrearCupon", true);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/cupones/cupones.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res)

            if (res.status) {

                swal({
                    title: "¡Muy bien!",
                    text: res.mensaje,
                    icon: "success",
                    buttons: [false, "Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = res.pagina
                        } else {
                            location.href = res.pagina
                        }
                    });

            } else {
                toastr.error(res.mensaje, 'Error')
            }

        }
    })
})