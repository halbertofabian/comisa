
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
class MediosControlador
{
    public static function ctrAgregarMedios($datos, $ruta)
    {

        if (isset($datos['tmp_name']) && !empty($datos['tmp_name'])) {



            try {
                //code...


                list($ancho, $alto) = getimagesize($datos['tmp_name']);

                //preArray($datos);

                $imagenD = getimagesize($datos['tmp_name']);

                // preArray($imagenD);


                $nuevoAncho = $imagenD[0];
                $nuevoAlto = $imagenD[1];

                // $nuevoAncho = 500;
                // $nuevoAlto = 500;

                $directorio = DOCUMENT_ROOT . 'app/upload/' . $ruta;
                $dir = './app/upload/' . $ruta;


                if (!file_exists($directorio)) {
                    mkdir($directorio, 0755);
                }
                /*=============================================
			DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
			=============================================*/

                if ($datos["type"] == "image/jpeg") {

                    /*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                    $aleatoreo = mt_rand(100, 999999);
                    $nuevoNombre = $aleatoreo . '-' . date('Y-m-d-h-i-s') . '.jpeg';


                    $rutaMultimedia = $directorio . "/" . $nuevoNombre;
                    $dir = $dir . "/" . $nuevoNombre;

                    $origen = imagecreatefromjpeg($datos["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaMultimedia);
                }
                if ($datos["type"] == "image/png") {

                    /*=============================================
				GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/
                    $aleatoreo = mt_rand(100, 999999);

                    $nuevoNombre = $aleatoreo . '-' . date('Y-m-d-h-i-s') . '.png';


                    $rutaMultimedia = $directorio . "/" . $nuevoNombre;
                    $dir = $dir . "/" . $nuevoNombre;

                    $origen = imagecreatefrompng($datos["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaMultimedia);
                }

                return $dir;
            } catch (Exception $th) {
                return "";
            }
        }
    }
    public static function ctrAgregarMediosSQL($img)
    {
        $img = json_decode($img, true);
        foreach ($img as $key => $mds) {
            $datos = array(
                'mds_tipo' => 'image',
                'mds_nombre' => '',
                'mds_titulo' => '',
                'mds_texto_alternativo' => '',
                'mds_leyenda' => '',
                'mds_descripcion' => '',
                'mds_url' => $mds['foto'],
                'mds_fecha_subida' => date('Y-m-d h:i:s'),
                'mds_usuario_registro' => $_SESSION['session_usr']['usr_nombre'],
            );
            $AgregarImagenes = MediosModelo::mdlAgregarMedios($datos);
            //preArray($AgregarImagenes);
        }
        return true;
    }
    public function ctrActualizarMedios()
    {
    }
    public function ctrMostrarMedios()
    {
    }
    public static function ctrEliminarMedios($mds_id, $mds_path)
    {
        if (file_exists($mds_path)) {
            $eliminarMds = MediosModelo::mdlEliminarMedios($mds_id);
            if ($eliminarMds) {

                $eliminarPath = unlink($mds_path);

                if ($eliminarPath) {
                    return array(
                        'status' => true,
                        'mensaje' => 'Elemento eliminado con éxito',
                        'ruta' => HTTP_HOST . 'medios/new'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Ocurrio un error no esperado.',
                        'ruta' => HTTP_HOST . 'medios/new'
                    );
                }
            } else {

                return array(
                    'status' => false,
                    'mensaje' => 'Error de servidor, intenta de nuevo',
                    'ruta' => HTTP_HOST . 'medios/new'
                );
            }
        } else {
            return array(
                'status' => false,
                'mensaje' => '',
                'ruta' => HTTP_HOST . 'medios/new'
            );
        }
    }
}
