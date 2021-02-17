
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 22/10/2020 15:27
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/
$(".btnAddNuevo").on("click", function () {
    $(".card-upload-image").removeClass("d-none");
})
$(document).ready(function () {
    listarImagenes();

})


$(".btnAgregarImagen").on("click", function () {
    listarImagenesAgregar();
})


var arrayFiles = [];

dropzoneimg = new Dropzone(".multimediaFisica", {

    url: urlApp + "medios/",
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg, image/png",
    maxFilesize: 32, //2mb
    //maxFiles: 10, 	//maximo 10 archivos
    init: function () {

        this.on("addedfile", function (file) {

            arrayFiles.push(file);

            // console.log("arrayFiles", arrayFiles);

        })

        this.on("removedfile", function (file) {

            var index = arrayFiles.indexOf(file);

            arrayFiles.splice(index, 1);

            // console.log("arrayFiles", arrayFiles);

        })

    }

})

$(".btnSubirImagenesDropZone").on("click", function () {
    // alert("Si funciono")

    if (arrayFiles.length > 0) {
        var listaMultimedia = [];
        var finalFor = 0;
        for (let i = 0; i < arrayFiles.length; i++) {

            var datosMultimedia = new FormData();
            datosMultimedia.append("file", arrayFiles[i])

            $.ajax({
                url: urlApp + 'app/modulos/medios/medios.ajax.php',
                method: "POST",
                data: datosMultimedia,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $(".btnSubirImagenesDropZone").html("Enviando...")
                    $(".btnSubirImagenesDropZone").attr("disabled", true)

                },
                success: function (res) {
                    listaMultimedia.push({ "foto": res.substr(3) })
                    multimediaFisica = JSON.stringify(listaMultimedia)
                    if (multimediaFisica == null) {
                        toastr.warning('Intente de nuevo', 'Selecione al menos una imágen, para poder subir.')
                        return;
                    }
                    if ((finalFor + 1) == arrayFiles.length) {

                        // console.log(res)
                        // console.log(multimediaFisica)
                        agregarImagenes(multimediaFisica)


                        finalFor = 0;

                    }
                    finalFor++;
                    // $(".btnSubirImagenesDropZone").html(`<i class="fas fa-upload"></i> Subir imágenes`)
                    // $(".btnSubirImagenesDropZone").attr("disabled",false)


                }

            })

        }


    } else {
        toastr.warning('Intente de nuevo', 'Selecione al menos una imágen, para poder subir.')
        return;

    }
})

function agregarImagenes(img) {

    var datos = new FormData();
    datos.append("uploadImg", img)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/medios/medios.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".btnSubirImagenesDropZone").html("Enviando...")
            $(".btnSubirImagenesDropZone").attr("disabled", true)


        },
        success: function (res) {
            listarImagenes()
            arrayFiles.splice(0, arrayFiles.length)
            dropzoneimg.removeAllFiles(true);
            $(".card-upload-image").addClass("d-none");
            $(".btnSubirImagenesDropZone").html(`<i class="fas fa-upload"></i> Subir imágenes`)
            $(".btnSubirImagenesDropZone").attr("disabled", false)



        }
    })

}

function sizeFile() {

    var datos = new FormData();
    datos.append("sizeFile", true)
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/medios/medios.ajax.php',
        data: datos,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {


        },
        success: function (res) {
            // console.log(res)
            $(".text-s").html(`Espacio en disco duro: <strong> ${res} </strong> /2GB`)
        }
    })

}
function listarImagenes() {
    var datos = new FormData();
    datos.append("listarImagenes", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/medios/medios.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#listarImagenes").html('<p class="text-center">Cargando...</p>')

        },
        success: function (res) {

            var contenido = "";
            var resultCount = 0;
            res.forEach(mds => {
                contenido +=
                    `<div class="col-lg-3  col-xl-2 col-sm-4 col-6 mb-2">
                        <button class="btn" style="border: 1px solid #F1F1F1 ; border-radius: 10px;" onclick="viewImg(${mds.mds_id})" >
                            <img src="${urlApp + '' + mds.mds_url}" title="${mds.mds_titulo}"  alt="${mds.mds_texto_alternativo}" width="120" height="120" alt="">
                        </button>
                    </div>`;
                resultCount++;
            });
            $("#listarImagenes").html(contenido);
            $(".btnSubirImagenesDropZone").html(`<i class="fas fa-upload"></i> Subir imágenes`)
            $(".text-r").html(`Resultados: <strong>${resultCount}</strong>`)
            sizeFile()

            //console.log(res);

        }
    })

}

function listarImagenesAgregar() {
    var datos = new FormData();
    datos.append("listarImagenes", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/medios/medios.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#listarImagenesAgregar").html('<p class="text-center">Cargando...</p>')

        },
        success: function (res) {

            var contenido = "";
            var resultCount = 0;
            res.forEach(mds => {
                contenido +=
                    `<div class="col-lg-4  col-xl-3 col-sm-6 col-6 mb-2">
                        <button class="btn" style="border: 1px solid #F1F1F1 ; border-radius: 10px;" onclick="addImg('${mds.mds_url}')" >
                            <img src="${urlApp + '' + mds.mds_url}" title="${mds.mds_titulo}"  alt="${mds.mds_texto_alternativo}" width="140" height="140" alt="">
                        </button>
                    </div>`;
                resultCount++;
            });
            $("#listarImagenesAgregar").html(contenido);
            // $(".btnSubirImagenesDropZone").html(`<i class="fas fa-upload"></i> Subir imágenes`)
            $(".text-r").html(`Resultados: <strong>${resultCount}</strong>`)
            sizeFile()

            //console.log(res);

        }
    })

}

$(".btnEliminarImagenPath").on("click", function () {
    var mds_path = $(this).attr("mds_path");
    alert(mds_paht);
})

function viewImg(mds_id) {
    // alert(mds)
    $('#mdlViewImg').modal('show')

    var datos = new FormData();
    datos.append("mds_id", mds_id)
    datos.append("mostrarDatosImgen", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/medios/medios.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {
            console.log(res)

            $("#mds_url").html(res.datosImg.mds_url)
            $("#mds_nombre").html(res.datosImg.mds_nombre)
            $("#mds_url").html(res.extras.mds_url)
            $("#mds_tipo").html(res.extras.mds_tipo)
            $("#mds_tamano").html(res.extras.mds_tamano)
            $("#mds_dimensiones").html(res.extras.mds_dimensiones)
            $("#mds_fecha_subida").html(res.datosImg.mds_fecha_subida)
            $("#mds_usuario_registro").html(res.datosImg.mds_usuario_registro)

            $("#mds_img_url").attr("src", res.extras.mds_url)
            $("#container-delete").html(`
            <div class="alert alert-danger">
                <button class="btn btn-link text-danger btnEliminarImagenPath" onclick=btnEliminarImg("${res.extras.mds_paht}","${res.datosImg.mds_id}")>Borrar permanentemente</button>
            </div>`);

        }
    })



}

function btnEliminarImg(mds_path, mds_id) {
    // alert(mds_id);

    swal({
        title: "¿Estas seguro de querer eliminar este archivo?",
        text: "Estas a punto de eliminar permanentemente este elemento de tu cuenta. \n Esta acción es irreversible",
        icon: "warning",
        buttons: ['Cancelar', 'Si, eliminar de mi cuenta'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("mds_path", mds_path)
                datos.append("mds_id", mds_id)
                datos.append("btnEliminarMedio", true)

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/medios/medios.ajax.php',
                    data: datos,
                    cache: false,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $("#container-delete").html(`
                        <div class="alert alert-danger">
                            <button class="btn btn-link text-danger btnEliminarImagenPath">Eliminando...</button>
                        </div>`);
                        $(".btnEliminarImagenPath").attr("disabled", true);


                    },
                    success: function (res) {

                        if (res.status) {
                            toastr.success('Muy bien', res.mensaje)
                            $('#mdlViewImg').modal('hide')
                            listarImagenes()


                        } else {

                        }

                    }
                })


            } else {

            }
        });
}

function addImg(mds_url) {
    $("#pds_imagen_portada_muestra").attr("src", urlApp + mds_url)
    $("#pds_imagen_portada").val(urlApp+mds_url)
    $('#mdlAgregarImagen').modal('hide')


}



