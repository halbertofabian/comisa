
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 10:46
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#formInscribirAlumno").on("submit", function (e) {

    e.preventDefault()
    var datos = new FormData(this)
    datos.append("btnInscribirAlumnos", true);
    $.ajax({

        url: urlApp + 'app/modulos/inscripciones/inscripciones.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {

            $('.btnInscribir').attr("disabled", true)
            $(".btnInscribir").html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
           Creando inscripción ... `);

        },
        success: function (res) {

            
            if (res.status) {
                toastr.success(res.mensaje, 'Muy bien!')
                

                $(".btnInscribir").html(`Redirigiendo a ${res.pagina}`);

                setTimeout(function () {
                    location.href = res.pagina
                }, 3000);
                // swal({
                //     title: "¡Muy bien!",
                //     text: res.mensaje,
                //     icon: "success",
                //     buttons: [false, "Continuar"],
                //     dangerMode: true,
                //     closeOnClickOutside: false,
                // })
                //     .then((willDelete) => {
                //         if (willDelete) {
                //             location.href = res.pagina
                //         } else {
                //             location.href = res.pagina
                //         }
                //     });
            } else {
                $('.btnInscribir').attr("disabled", false)

                $(".btnInscribir").html(`Inscribir`);
                toastr.error(res.mensaje, '¡Error!')
            }
        }
    })


})