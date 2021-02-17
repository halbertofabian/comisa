
<?php

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
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/medios/medios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/medios/medios.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class MediosAjax
{
    public $imagenMultimedia;
    public $rutaMultimedia;
    public $mds_id;
    public $mds_path;
    public function ajaxSubirImagenes()
    {
        $imagenes = $this->imagenMultimedia;
        $ruta = $this->rutaMultimedia;
        $res = MediosControlador::ctrAgregarMedios($imagenes, $ruta);
        echo $res;
    }
    public function ajaxSubirImagenesSQL()
    {
        $imagenes = $this->imagenMultimedia;
        $res = MediosControlador::ctrAgregarMediosSQL($imagenes);
        echo json_encode($res, true);
    }
    public function ajaxListarImagenes()
    {

        $res = MediosModelo::mdlMostrarMedios();

        echo json_encode($res, true);
    }
    public function ajaxSizeFile()
    {
        $dir = DOCUMENT_ROOT . 'app/upload/' . CLIENTE_ID;
        if (!file_exists($dir)) {
            $sizeFile = '0 bytes';
        } else {
            //$sizeByte = filesize($dir);
            $sizeFile = get_folder_size($dir);
        }

        echo $sizeFile;
    }
    public function ajaxListarImagen()
    {


        $res = MediosModelo::mdlMostrarMedios($this->mds_id);
        $img = $res['mds_url'];
        $imgRoot = DOCUMENT_ROOT . '' . substr($img, 2, strlen(($img)));
        $imgUrl = HTTP_HOST . '' . substr($img, 2, strlen(($img)));

        //preArray($imgUrl);
        $imgdatos = getimagesize($imgUrl);
        //preArray($imgdatos);

        // $imgRoot = str_replace("$res[mds_url]dfghgfd", HTTP_HOST, DOCUMENT_ROOT.'');
        // preArray($imgRoot);
        //preArray(filesize(DOCUMENT_ROOT.'app/upload/000001/482770-2020-10-23-02-48-44.png'));
        $datos = array(
            'datosImg' => $res,
            'extras' => array(
                'mds_tipo' => $imgdatos['mime'],
                'mds_tamano' => FileSizeConvert(filesize($imgRoot)),
                'mds_dimensiones' => $imgdatos[0] . ' alto x ' . $imgdatos[1] . ' ancho',
                'mds_url' => $imgUrl,
                'mds_paht' => $imgRoot

            )
        );

        echo json_encode($datos, true);
    }

    public function ajaxEliminarMedio()
    {
        $res = MediosControlador::ctrEliminarMedios($this->mds_id, $this->mds_path);
        echo json_encode($res, true);
    }
}
if (isset($_FILES['file'])) {
    $multimedia = new MediosAjax();
    $multimedia->imagenMultimedia = $_FILES['file'];
    $multimedia->rutaMultimedia = CLIENTE_ID;
    $multimedia->ajaxSubirImagenes();
}

if (isset($_POST['uploadImg'])) {
    $multimedia = new MediosAjax();
    $multimedia->imagenMultimedia = $_POST['uploadImg'];
    $multimedia->ajaxSubirImagenesSQL();
}
if (isset($_POST['listarImagenes'])) {
    $multimedia = new MediosAjax();
    $multimedia->ajaxListarImagenes();
}
if (isset($_POST['sizeFile'])) {
    $multimedia = new MediosAjax();
    $multimedia->ajaxSizeFile();
}

if (isset($_POST['mostrarDatosImgen'])) {
    $multimedia = new MediosAjax();
    $multimedia->mds_id = $_POST['mds_id'];
    $multimedia->ajaxListarImagen();
}

if (isset($_POST['btnEliminarMedio'])) {
    $multimedia = new MediosAjax();
    $multimedia->mds_id = $_POST['mds_id'];
    $multimedia->mds_path = $_POST['mds_path'];
    $multimedia->ajaxEliminarMedio();
}
