
<?php
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
class InscripcionesControlador
{
    public static  function ctrAgregarInscripciones()
    {
        if (isset($_POST['btnInscribirAlumnos'])) {


            $dtl_pagos = json_decode($_POST['ins_costos'], 2);

            $_POST['fpg_inscripcion'] =  $dtl_pagos['costo_inscripcion'];
            $_POST['fpg_examen'] =  $dtl_pagos['costo_examen'];
            $_POST['fpg_guia'] =  $dtl_pagos['costo_guia'];
            $_POST['fpg_incorporacion'] =  $dtl_pagos['costo_incorporacion'];
            $_POST['fpg_certificado'] =  $dtl_pagos['costo_certificado'];
            $_POST['fpg_semana'] =  $dtl_pagos['costo_semana'];
            $_POST['fpg_numero_semana'] =  $dtl_pagos['duracion_semana'];

            $_POST['fpg_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];

            $_POST['fpg_liga'] = "";


            $crearInscripcion = InscripcionesModelo::mdlAgregarInscripciones($_POST);

            if ($crearInscripcion) {
                $ruta = InscripcionesModelo::mdlMostrarUltimaInscripcionAlumno($_POST['ins_alumno']);
                return array(
                    'status' => true,
                    'mensaje' => 'Inscripción creada, a continuación completa tu pago',
                    'pagina' => HTTP_HOST . 'inscripciones/fichas/' . $ruta['fpg_id']
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Se produjo un error, intenta de nuevo',
                    'pagina' => ''
                );
            }
        }
    }
    public function ctrActualizarInscripciones()
    {
    }
    public function ctrMostrarInscripciones()
    {
    }
    public function ctrEliminarInscripciones()
    {
    }
}
