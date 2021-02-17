
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 28/10/2020 14:27
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$(document).ready(function () {
    listarCategoriasPrductos()
})


$("#ctg_buscar_categoria").keyup(function () {
    var ctg_nombre = $(this).val()
    listarCategoriasPrductos(ctg_nombre)
})

function listarCategoriasPrductos(ctg_nombre = "") {
    var datos = new FormData()
    datos.append('btnListarCategoria', true);
    datos.append('ctg_nombre', ctg_nombre);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/categorias/categorias.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#pds_categoria-content").html(`<div class="spinner-border mt-5" role="status">
            <span class="sr-only">Loading...</span>
          </div>`);

        },
        success: function (res) {
            var contenido = "";
            res.forEach(ctg => {

                contenido += `<br><label class="btn btn-light text-center">
                                <input type="checkbox" name="pds_categoria[]" id="pds_categoria"  value="${ctg.ctg_nombre}"> ${ctg.ctg_nombre}
                            </label>`;


            });
            $("#pds_categoria-content").removeClass("text-center");
            $("#pds_categoria-content").html(contenido);
        }
    })
}


$("#btnClickAgregarCategoria").click(function () {
    $("#pds_categoria_text").attr("type", "text")
    $("#pds_categoria_text").attr("autofocus", true)
    $(".btnClickAgregarCategoria").removeClass("d-none")

    //alert("Hola mundo");

})

$(".btnClickAgregarCategoria").click(function () {

    var datos = new FormData()
    var ctg_nombre = $("#pds_categoria_text").val();
    datos.append("ctg_nombre", ctg_nombre)
    datos.append("ctg_categoria_padre", "1")
    datos.append("btnAgregarCategoria", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/categorias/categorias.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
        },
        success: function (res) {
            if (res) {

                contenido = `<br><label class="btn btn-light text-center">
                                <input type="checkbox" name="pds_categoria[]" id="pds_categoria" checked  value="${ctg_nombre}"> ${ctg_nombre}
                            </label>`;

                $("#pds_categoria-content").append(contenido)
                $("#pds_categoria_text").attr("type", "hidden")

                $("#pds_categoria_text").val("")



            } else {
                toastr.error('Error', 'Categoría repetida')

            }
        }

    })

})