
<?php
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
class AlmacenesControlador
{
    public function ctrAgregarAlmacenes()
    {
        if (isset($_POST['btnAgrearAlmacen'])) {
            startLoadButton();
            $_POST['ams_fecha_registro'] = FECHA;
            // $_POST['ams_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['ams_usuario_registro'] = 'Alberto Fabian';
            $crearAlamacen = AlmacenesModelo::mdlAgregarAlmacenes($_POST);
            if ($crearAlamacen) {
                AppControlador::msj('success', '¡Muy bien!', 'Almacén creado con éxito', HTTP_HOST . 'almacenes');
            } else {

                AppControlador::msj('error', '¡Error!', 'Parece que hubo un problema, intenta de nuevo');
            }
        }
    }
    public function ctrActualizarAlmacenes()
    {
    }
    public function ctrMostrarAlmacenes()
    {
    }
    public function ctrEliminarAlmacenes()
    {
    }

    
}
