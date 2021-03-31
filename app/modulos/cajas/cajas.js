
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/01/2021 19:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


$("#formCerrarCaja").on("submit", function (e) {

    e.preventDefault();

    var copn_ingreso_efectivo = Number($("#copn_ingreso_efectivo").val())
    var copn_ingreso_banco = Number($("#copn_ingreso_banco").val())

    var total_efectivo_input = Number($("#copn_ingreso_efectivo").val())
    var total_efectivo_retiro = Number($("#copn_saldo").val())

    var usurio = $("#cja_responsable").html();

    var copn_saldo = total_efectivo_input - total_efectivo_retiro;



    swal({
        title: "¿Estás seguro de cerrar caja ahora?",
        text: "  EFECTIVO: " + copn_ingreso_efectivo + "\n BANCO: " + copn_ingreso_banco + "\n RETIRO DE CAJA: " + total_efectivo_retiro + "\n SALDO EN CAJA: " + copn_saldo,
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                swal("Guardar como...", {
                    content: {
                        element: "input",
                        attributes: {
                            type: "text",
                            value: "CAJA " + today + " U - " + usurio,
                        },
                    },
                })
                    .then((copn_registro) => {
                        if (copn_registro == "") {

                            toastr.error('Error', 'Guarda el corte con otro nombre...')

                        } else {

                            var datos = new FormData(this);

                            datos.append("btnCerrarCaja", true);
                            datos.append("copn_saldo", copn_saldo)
                            datos.append("copn_registro", copn_registro)
                            datos.append("copn_tipo_caja", 'CAJA_COBRANZA_G')





                            $.ajax({
                                type: "POST",
                                url: urlApp + 'app/modulos/cajas/cajas.ajax.php',
                                data: datos,
                                dataType: "json",
                                processData: false,
                                contentType: false,
                                beforeSend: function () {

                                },
                                success: function (res) {

                                    if (res.status) {
                                        swal({
                                            title: "Muy bien",
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

                        }
                    });





            }
        })
})

