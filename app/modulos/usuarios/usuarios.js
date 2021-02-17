
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/10/2020 11:57
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

listarUsurios();

$(".tablaUsuarios tbody").on("click", "button.btnEliminarUsuario", function () {
    var usr_id = $(this).attr("usr_id");

    swal({
        title: "¿Seguro de querer eliminar este usuario?",
        text: "El usuario con número " + usr_id + " será eliminado y todo lo relacionado, es decir también las ventas realizados con este vendedor. ¿Deseas continuar?",
        icon: "warning",
        buttons: ["No, cancelar", "Si, eliminar usuario con número " + usr_id],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("btnEliminarUsuario", true);
                datos.append("usr_id", usr_id);

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
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
                            swal({
                                title: "Error",
                                text: res.mensaje,
                                icon: "error",
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

                        }


                    }
                });
            }
        });

})



$("#formImportarProductos").on("submit", function (e) {
    e.preventDefault()

    var excel = $("#input_file").val()

    if (excel == "") {
        return swal("Error", "Seleccione un archivo excel", "error");
    }


    swal({
        title: "¿Estas seguro de querer importar la lista de alumnos?",
        text: "Asegurate de tener el archivo con los requerimientos solicitados",
        icon: "info",
        buttons: ["Calcelar", "Si, importar lista"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData()

                var files = $("#input_file")[0].files[0]

                datos.append("btnImportarProductos", true)
                datos.append("archivoExcel", files)


                $.ajax({

                    url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                        $(".btnImportarProductos").attr("disabled", true)
                        $(".btnImportarProductos").removeClass("btn-success")
                        $(".btnImportarProductos").addClass("btn-secondary")
                        $(".btnImportarProductos").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="sr-only">Loading...</span> 
                        Importando alumnos ...`);


                    },
                    success: function (respuesta) {
                        $(".btnImportarProductos").attr("disabled", false)
                        $(".btnImportarProductos").addClass("btn-success")
                        $(".btnImportarProductos").removeClass("btn-secondary")
                        $(".btnImportarProductos").html(`<i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Importar alumnos`);

                        if (respuesta.status) {

                            swal({
                                title: respuesta.mensaje,
                                text: "Se registraron " + respuesta.insert + " alumnos \n Se actualizaron " + respuesta.update + " alumnos ",
                                icon: "success",
                                buttons: [false, "Ver lista"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./alumnos"
                                    } else {
                                        window.location.href = "./alumnos"

                                    }
                                })

                        } else {

                            swal({
                                title: "Error",
                                text: respuesta.mensaje,
                                icon: "error",
                                buttons: [false, "Intentar de nuevo"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./alumnos"
                                    } else {
                                        window.location.href = "./alumnos"

                                    }
                                })

                        }

                    }
                })
            }
        });
})


$("#show_users_table").change("click", function () {

    // alert("Hola mundo");

    if ($("#show_users_table").is(':checked')) {
        $(".pds_action_user").prop("checked", true)

        // $(".tablaUsuarios").removeClass("tablas")

    } else {
        $(".pds_action_user").prop("checked", false)
    }




})


$(".btnMandarEmailActivacion").on("click", function () {
    var usr_nombre = $(this).attr('usr_nombre')
    var usr_correo = $(this).attr('usr_correo')

    var datos = new FormData()

    datos.append('btnActivarUsuario', true)
    datos.append('usr_nombre', usr_nombre)
    datos.append('usr_correo', usr_correo)
    $.ajax({

        url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
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
                toastr.success('¡Muy bien!', res.mensaje)
            } else {
                toastr.error('¡Error!', res.mensaje)
            }

        },
    })


})


function listarUsurios(rol = "Alumno") {
    var datos = new FormData()

    datos.append('btnListarAlumnos', true)
    datos.append('usr_rol', rol)

    $.ajax({

        url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
        },
        success: function (res) {

            res.forEach(element => {

                $('#usr_alumno').prepend(`<option value='${element.usr_id}' >   ${element.usr_nombre} ${element.usr_app} ${element.usr_apm} <strong> ${element.usr_matricula} </strong> </option>`);

            });

        },
    })


}

$("#formAgregarAlumno").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this)

    datos.append('btnGuardarUsuario', true)
    $.ajax({

        url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
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
                toastr.success('¡Muy bien!', res.mensaje)
                $('#mdlAgregarAlumno').modal('hide')
                $('#usr_alumno option').remove();
                listarUsurios();
                $("#usr_alumno option:selected").last().val()
                buscarAlumnoById('', 'Alumno', true)
                // var usr_alumno = $("#usr_alumno").val()
                // buscarAlumnoById(usr_alumno)
            } else {
                toastr.error('¡Error!', res.mensaje)
            }

        }
    })

})

$("#usr_alumno").on("change", function () {
    var usr_alumno = $("#usr_alumno").val()
    buscarAlumnoById(usr_alumno)
})

$(".btn-load-info-alumno").on("click", function () {
    var usr_alumno = $("#usr_alumno").val()
    buscarAlumnoById(usr_alumno)
})



function buscarAlumnoById(id = "", rol = "Alumno", usr_searh = false) {

    var datos = new FormData()

    datos.append('btnBuscarAlumno', true)
    datos.append('usr_id', id)
    datos.append('usr_rol', rol)
    datos.append('usr_searh', usr_searh)

    $.ajax({

        url: urlApp + 'app/modulos/usuarios/usuarios.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            $(".div-info-alumno").addClass("d-none")
            $(".div-info-alumno").addClass("bg-gradient-info")

            $(".div_load").html(`<div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>`);

        },
        success: function (res) {
            $(".div_load").html(``);
            $(".div-info-alumno").removeClass("d-none")
            $('#usr_nombre').html(res.usr_nombre)
            $('#usr_matricula').html(res.usr_matricula)
            $('#usr_correo').html(res.usr_correo)
            setTimeout(function () {
                $(".div-info-alumno").removeClass("bg-gradient-info")
            }, 2000);
        },
    })
}