
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 04/05/2021 11:16
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class VentasControlador
{
    public function ctrAgregarVentas()
    {
    }
    public function ctrActualizarVentas()
    {
    }
    public function ctrMostrarVentas()
    {
    }
    public function ctrEliminarVentas()
    {
    }

    public function ctrCrearPlantilla()
    {
        if (isset($_POST)) {
            $_POST['pvts_usr_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $creado = VentasModelo::mdlCrearPlantilla($_POST);

            if ($creado) {
                return array(
                    'status' => true,
                    'mensaje' => 'Se creo la plantilla',
                    'pagina' => HTTP_HOST . 'ventas/cargar-plantilla'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo crear la plantilla, intenta de nuevo.',
                    'pagina' => HTTP_HOST . 'ventas/crear-plantilla'
                );
            }
        }
    }
}
