

/**
 *  Desarrollador: 
 *  Fecha de creación: 12/05/2021 09:28
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

 $("#cts_buscar_cliente").on("change", function () {
    var cts_id = $(this).val()
    $(".content-cliente").removeClass('d-none')

    //buscarCliente(cts_id)
})

$("#btn_infPersonal").on("click", function () {
    if($("#dts-client").hasClass("d-none")){
        $("#dts-client").removeClass("d-none");
    }else{
        $("#dts-client").addClass("d-none");
    } 
    //buscarCliente(cts_id)
})

$("#btn_infconyug").on("click", function () {
    if($("#dts-conyug").hasClass("d-none")){
        $("#dts-conyug").removeClass("d-none");
    }else{
        $("#dts-conyug").addClass("d-none");
    } 
    //buscarCliente(cts_id)
})