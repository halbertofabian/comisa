
<?php

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
include_once '../../../config.php';


require_once DOCUMENT_ROOT . 'app/lib/phpMailer/Exception.php';
require_once DOCUMENT_ROOT . 'app/lib/phpMailer/PHPMailer.php';
require_once DOCUMENT_ROOT . 'app/lib/phpMailer/SMTP.php';
require_once DOCUMENT_ROOT . 'app/lib/phpqrcode/qrlib.php';

require_once DOCUMENT_ROOT . 'app/modulos/configuracion/configuracion.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/configuracion/configuracion.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
require_once DOCUMENT_ROOT . 'app/lib/PHPExcel/Classes/PHPExcel/IOFactory.php';




class UsuariosAjax
{
    public $usr_id;
    public $usr_rol;
    public $usr_searh;
    public function ajaxEliminarUsuario()
    {
        $eliminarVenta = UsuariosControlador::ctrEliminarUsuario($this->usr_id);
        echo json_encode($eliminarVenta);
    }

    public function ajaxImportarProductos()
    {

        $respuesta = UsuariosControlador::ctrImportarProductosExcel();
        echo json_encode($respuesta, true);
    }
    public function ajaxActivarUsuarios()
    {
        $respuesta = UsuariosControlador::ctrActivarUsuarioViaEmail();
        echo json_encode($respuesta, true);
    }

    public function ajaxListarUsuarios()
    {
        $respuesta = UsuariosModelo::mdlMostrarUsuarios('', $this->usr_rol);
        echo json_encode($respuesta, true);
    }

    public function ajaxListarAlumnos()
    {
        $respuesta = UsuariosModelo::mdlMostrarAlumnosBySuc();
        echo json_encode($respuesta, true);
    }

    public function ajaxListarUsuariosById()
    {
        $respuesta = UsuariosModelo::mdlMostrarUsuarios($this->usr_id, $this->usr_rol, $this->usr_searh);
        echo json_encode($respuesta, true);
    }

    public function ajaxListarUsuarioByID()
    {
        $respuesta = UsuariosModelo::mdlMostrarUsuarios($this->usr_id, $this->usr_rol, $this->usr_searh);


        if ($respuesta['usr_caja'] != 0) {


            $sincronizacion = array(
                'nombre_suc' => $_SESSION['session_suc']['scl_nombre'],
                'url_suc' => HTTP_HOST,
                'scl_direccion' => $_SESSION['session_suc']['scl_direccion'],
                'scl_horario' => $_SESSION['session_suc']['scl_horario'],
                'scl_rfc' => $_SESSION['session_suc']['scl_rfc'],
                'infovendedor' => array(
                    'idusr' => $respuesta['usr_id'],
                    'nombre' => $respuesta['usr_nombre'],
                    'camioneta' => "",
                    'caja_abierta' => $respuesta['usr_caja']
                ),
            );

            $sin_json = json_encode(array($sincronizacion), true);

            $dir = DOCUMENT_ROOT . "media/qr/";
            if (!file_exists($dir))
                mkdir($dir, 0777, true);
            $filename = $dir . 'QR' . $respuesta['usr_caja'] . '.png';
            $tamano = 10;
            $level = 'H';
            $frameSize = 3;
            // $contenido = json_encode(array($informacionQR), true);


            QRcode::png($sin_json, $filename, $level, $tamano, $frameSize);
        }

        

        echo json_encode($respuesta, true);
    }


    public function ajaxAgreagarUsuarios()
    {
        $respuesta = UsuariosControlador::ctrAgregarUsuariosAjax();
        echo json_encode($respuesta, true);
    }
}
if (isset($_POST['btnEliminarUsuario'])) {
    $eliminarUsuario = new UsuariosAjax();
    $eliminarUsuario->usr_id = $_POST['usr_id'];
    $eliminarUsuario->ajaxEliminarUsuario();
}

if (isset($_POST['btnImportarProductos'])) {
    $impotarProductos = new UsuariosAjax();
    $impotarProductos->ajaxImportarProductos();
}

if (isset($_POST['btnActivarUsuario'])) {
    $activarUsuarios = new UsuariosAjax();
    $activarUsuarios->ajaxActivarUsuarios();
}

// if (isset($_POST['btnListarAlumnos'])) {
//     $listarUsuarios = new UsuariosAjax();
//     $listarUsuarios->usr_rol = $_POST['usr_rol'];
//     $listarUsuarios->ajaxListarUsuarios();
// }
if (isset($_POST['btnListarAlumnos'])) {
    $listarUsuarios = new UsuariosAjax();
    $listarUsuarios->ajaxListarAlumnos();
}

if (isset($_POST['btnBuscarAlumno'])) {
    $listarUsuarios = new UsuariosAjax();
    $listarUsuarios->usr_id = $_POST['usr_id'];
    $listarUsuarios->usr_rol = $_POST['usr_rol'];
    $listarUsuarios->usr_searh = $_POST['usr_searh'];
    $listarUsuarios->ajaxListarUsuariosById();
}
if (isset($_POST['btnGuardarUsuario'])) {
    $agregarUsuario = new UsuariosAjax();
    $agregarUsuario->ajaxAgreagarUsuarios();
}

if (isset($_POST['btnBuscarUsuarios'])) {
    $buscarUsuario = new UsuariosAjax();
    $buscarUsuario->usr_id = $_POST['usr_id'];
    $buscarUsuario->ajaxListarUsuarioByID();
}
