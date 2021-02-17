
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 27/11/2020 01:39
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class PaquetesControlador
{
    public function ctrAgregarPaquetes()
    {
        if (isset($_POST['btnAgregarPaquete'])) {
            $costos_paquete = array(
                'duracion_semana' => $_POST['pqt_duracion_semana'],
                'costo_semana' => str_replace(",", "", $_POST['pqt_costo_semana']),
                'descripcion_semana' => $_POST['pqt_costo_semana_descripcion'],

                'costo_inscripcion' => str_replace(",", "", $_POST['pqt_costo_inscripcion']),
                'descripcion_inscripcion' => $_POST['pqt_descripcion_inscripcion'],

                'costo_guia' => str_replace(",", "", $_POST['pqt_costo_guia']),
                'descripcion_guia' => $_POST['pqt_descripcion_guia'],

                'costo_examen' => str_replace(",", "", $_POST['pqt_costo_examen']),
                'descripcion_examen' => $_POST['pqt_descripcion_examen'],

                'costo_incorporacion' => str_replace(",", "", $_POST['pqt_costo_incorporacion']),
                'descripcion_incorporacion' => $_POST['pqt_descripcion_incorporacion'],

                'costo_certificado' => str_replace(",", "", $_POST['pqt_costo_certificado']),
                'descripcion_certificado' => $_POST['pqt_descripcion_certificado'],
            );

            $_POST['pqt_duracion'] = $_POST['pqt_duracion'] . ' ' . $_POST['pqt_duracion_tiempo'];
            $_POST['pqt_costo'] = json_encode($costos_paquete, true);

            $_POST['pqt_sku'] = str_replace(' ', '_', $_POST['pqt_sku']);

            $crearPaquete = PaquetesModelo::mdlAgregarPaquetes($_POST);


            if ($crearPaquete) {

                AppControlador::msj('success', '¡Muy bien!', 'Paquete creado con éxito', HTTP_HOST . 'paquetes');
            } else {
                AppControlador::msj('error', '¡Mal!', 'Este paquete no se creo,es probable que el SKU ya exista intente de nuevo');
            }
        }
    }
    public function ctrActualizarPaquetes()
    {
        if (isset($_POST['btnEditarPaquete'])) {
            $costos_paquete = array(
                'duracion_semana' => $_POST['pqt_duracion_semana'],
                'costo_semana' => str_replace(",", "", $_POST['pqt_costo_semana']),
                'descripcion_semana' => $_POST['pqt_costo_semana_descripcion'],

                'costo_inscripcion' => str_replace(",", "", $_POST['pqt_costo_inscripcion']),
                'descripcion_inscripcion' => $_POST['pqt_descripcion_inscripcion'],

                'costo_guia' => str_replace(",", "", $_POST['pqt_costo_guia']),
                'descripcion_guia' => $_POST['pqt_descripcion_guia'],

                'costo_examen' => str_replace(",", "", $_POST['pqt_costo_examen']),
                'descripcion_examen' => $_POST['pqt_descripcion_examen'],

                'costo_incorporacion' => str_replace(",", "", $_POST['pqt_costo_incorporacion']),
                'descripcion_incorporacion' => $_POST['pqt_descripcion_incorporacion'],

                'costo_certificado' => str_replace(",", "", $_POST['pqt_costo_certificado']),
                'descripcion_certificado' => $_POST['pqt_descripcion_certificado'],
            );

            $_POST['pqt_duracion'] = $_POST['pqt_duracion'] . ' ' . $_POST['pqt_duracion_tiempo'];
            $_POST['pqt_costo'] = json_encode($costos_paquete, true);

            $_POST['pqt_sku'] = str_replace(' ', '_', $_POST['pqt_sku']);

            $guardarCambios = PaquetesModelo::mdlActualizarPaquetes($_POST);


            if ($guardarCambios) {

                AppControlador::msj('success', '¡Muy bien!', 'Cambios guardados con éxito', HTTP_HOST . 'paquetes');
            } else {
                AppControlador::msj('error', '¡Mal!', 'Este paquete no se guardo, intente de nuevo');
            }
        }
    }
    public function ctrMostrarPaquetes()
    {
    }
    public static function ctrEliminarPaquetes()
    {
        if (isset($_POST['btnEliminarPaquete'])) {
            $eliminarPaquete = PaquetesModelo::mdlEliminarPaquetes($_POST['pqt_sku']);

            if ($eliminarPaquete) {
                return array(
                    'status' => true,
                    'mensaje' => 'Paquete eliminado',
                    'pagina' => HTTP_HOST . 'paquetes'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Ocurrio un error al intentar eliminar este paquete, intentalo de nuevo',
                    'pagina' => HTTP_HOST . 'paquetes'
                );
            }
        }
    }
}
