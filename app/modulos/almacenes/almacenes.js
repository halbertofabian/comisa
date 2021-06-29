
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/02/2021 12:50
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

// $("#formConsultarTraspasoRegreso").on("submit", function (e) {

//     e.preventDefault();

//     var datos = new FormData(this);
//     datos.append("btnConsultarNumeroTraspaso", true);

//     $.ajax({
//         url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: "json",
//         beforeSend: function () {
//             startLoadButton()
//         },
//         success: function (res) {

//             console.log(res)

//         }
//     })

// })


$(".btnSincronizarInventario").on("click", function () {
    var datos = new FormData();


    datos.append("btnSincronizarInventario", true);
    datos.append("tps_num_traspaso", $("#tps_num_traspaso_1").val())


    $.ajax({
        url: urlApp + 'app/modulos/almacenes/almacenes.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {


            stopLoadButton("Consultar")
            toastr.success(res.mensaje, "¡Muy bien!")
            setTimeout(function () {
                window.location.href = urlApp+'almacenes/entradas';
            }, 2000);

        }
    })
})