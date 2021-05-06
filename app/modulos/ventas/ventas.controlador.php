
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
    public function ctrbuscartipoCargarPlantilla()
    {
        if (isset($_POST)) {
            $datosexistentes = VentasModelo::mdlMostrarinfoPlantillasId($_POST['dvts_id_plantilla']);
            if ($datosexistentes) {
                return array(
                    'status' => true,
                    'info' => $datosexistentes
                );
            } else {
                $aux = "";
                $rol = "Vendedor";
                $usuarios = UsuariosModelo::mdlMostrarUsuarios($aux, $rol);
                return array(
                    'status' => false,
                    'info' => $usuarios
                );
            }
        }
    }

    public function ctrCargarinfoPlantilla()
    {
        if (isset($_POST)) {
            $aux = "";
            foreach ($_POST['vendedor'] as $key => $vds) {

                $data = array(
                    'dvts_id_vendedor' => $vds,
                    'dvts_sabado' => $_POST['sabado'][$key]  == ""  ? 0 :  $_POST['sabado'][$key],
                    'dvts_domingo' => $_POST['domingo'][$key]  == ""  ? 0 :  $_POST['domingo'][$key],
                    'dvts_lunes' => $_POST['lunes'][$key]  == ""  ? 0 :  $_POST['lunes'][$key],
                    'dvts_martes' => $_POST['martes'][$key]  == ""  ? 0 :  $_POST['martes'][$key],
                    'dvts_miercoles' => $_POST['miercoles'][$key]  == ""  ? 0 :  $_POST['miercoles'][$key],
                    'dvts_jueves' => $_POST['jueves'][$key]  == ""  ? 0 :  $_POST['jueves'][$key],
                    'dvts_viernes' => $_POST['viernes'][$key]  == ""  ? 0 :  $_POST['viernes'][$key],
                    'dvts_total' => $_POST['total'][$key]  == ""  ? 0 :  $_POST['total'][$key],
                    'dvts_id' => $_POST['dvts_id'][$key],
                    'dvts_id_plantilla' => $_POST['pvts_num_semana']
                );


                if ($_POST['dvts_id'][$key] == "") {
                    $insert = VentasModelo::mdlinsertarDatosPlantilla($data);
                    if ($insert) {
                        $aux = "insertado";
                    }
                } else {
                    $update = VentasModelo::mdlupdateDatosPlantilla($data);
                    if ($update) {
                        $aux = "actualizado";
                    }
                }
            }

            if ($aux == "insertado") {
                return array(
                    'status' => $aux,
                    'mensaje' => 'Se insertaron correctamente los datos',
                    'pagina' => HTTP_HOST . 'ventas/cargar-plantilla'
                );
            } elseif ($aux == "actualizado") {
                return array(
                    'status' => $aux,
                    'mensaje' => 'Se actualizaron correctamente los datos',
                    'pagina' => HTTP_HOST . 'ventas/cargar-plantilla'
                );
            }
        }
    }
}
