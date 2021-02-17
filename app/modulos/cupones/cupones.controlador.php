
<?php
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
class CuponesControlador
{
    public  static function ctrAgregarCupones()
    {
        if (isset($_POST['btnCrearCupon'])) {

            // Validar Email
            // if ($_POST['cps_aply'] == "by_matricula") {

            //     $listaEmail = explode(",", $_POST['cps_aply_matricula']);
            //     foreach ($listaEmail as $key => $itemEmail) {
            //         if (!is_valid_email($itemEmail)) {
            //             return array(
            //                 'status' => false,
            //                 'mensaje' => 'Algún correo de la lista no es valido, verifique los datos'
            //             );
            //             break;
            //         }
            //     }
            // }

            if ($_POST['cps_tope'] == '') {
                $_POST['cps_tope'] = "-";
            }
            $_POST['cps_r_inscripcion'] = $_POST['cps_r_inscripcion'] == "" ? "0" : $_POST['cps_r_inscripcion'];
            $_POST['cps_r_examen'] = $_POST['cps_r_examen'] == "" ? "0" : $_POST['cps_r_examen'];
            $_POST['cps_r_guia'] = $_POST['cps_r_guia'] == "" ? "0" : $_POST['cps_r_guia'];
            $_POST['cps_r_incorporacion'] = $_POST['cps_r_incorporacion'] == "" ? "0" : $_POST['cps_r_incorporacion'];
            $_POST['cps_r_certificado'] = $_POST['cps_r_certificado'] == "" ? "0" : $_POST['cps_r_certificado'];
            $_POST['cps_r_semanas'] = $_POST['cps_r_semanas'] == "" ? "0" : $_POST['cps_r_semanas'];

            $cps_restricciones = array(
                'aply' => array(
                    'tipo' => $_POST['cps_aply'],
                    'data' => $_POST['cps_aply_matricula']
                ),
                'cupon' => array(
                    'cps_r_inscripcion' => $_POST['cps_r_inscripcion'],
                    'cps_r_examen' => $_POST['cps_r_examen'],
                    'cps_r_guia' => $_POST['cps_r_guia'],
                    'cps_r_incorporacion' => $_POST['cps_r_incorporacion'],
                    'cps_r_certificado' => $_POST['cps_r_certificado'],
                    'cps_r_semanas' => $_POST['cps_r_semanas']
                )
            );

            $_POST['cps_restricciones'] = json_encode($cps_restricciones, true);

            $_POST['cps_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['cps_fecha_registro'] = FECHA;

            $crearCupon = CuponesModelo::mdlAgregarCupones($_POST);

            if ($crearCupon) {
                return array(
                    'status' => true,
                    'mensaje' => 'Cupón creado con éxito listo para su uso',
                    'pagina' => HTTP_HOST . 'cupones'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Es probable que el código del cupón ya exista, intente con otro. De lo contrario contacte a soporte'
                );
            }
        }
    }
    public function ctrActualizarCupones()
    {
    }
    public function ctrMostrarCupones()
    {
    }
    public function ctrEliminarCupones()
    {
    }
}
