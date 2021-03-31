#!/bin/bash
read -p "¿Cúal es el nombre del archivo? " file
read -p "¿Cúal es el nombre del módulo? " module

mkdir ${file}
mkdir ${file}/plugins

touch ../view/${file}.php

echo "<?php cargarview('$file'); ?>" >> ../view/${file}.php

touch ${file}/${file}.ajax.php
touch ${file}/${file}.modelo.php
touch ${file}/${file}.controlador.php
touch ${file}/${file}.js
touch ${file}/${file}.css
touch ${file}/${file}.php

DIA=`date +"%d/%m/%Y"`;
HORA=`date +"%H:%M"`;

echo "
/**
 *  Desarrollador: $USER
 *  Fecha de creación: $DIA $HORA
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
" >> ${file}/${file}.js 
echo "
/**
 *  Desarrollador: $USER
 *  Fecha de creación: $DIA $HORA
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
" >> ${file}/${file}.css


echo "
<?php

/**
 *  Desarrollador: $USER
 *  Fecha de creación: $DIA $HORA
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/${file}/${file}.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/${file}/${file}.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class ${module}Ajax
{
}
" >> ${module}/${module}.ajax.php

echo '
<?php
/**
 *  Desarrollador: '$USER'
 *  Fecha de creación: '$DIA' '$HORA'
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class' ${module}'Modelo
{
    public static function mdlAgregar'${module}'()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizar'${module}'()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrar'${module}'()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminar'${module}'()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}

' >> ${module}/${module}.modelo.php

echo "
<?php
/**
 *  Desarrollador: $USER
 *  Fecha de creación: $DIA $HORA
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ${module}Controlador
{
    public function ctrAgregar${module}()
    {
    }
    public function ctrActualizar${module}()
    {
    }
    public function ctrMostrar${module}()
    {
    }
    public function ctrEliminar${module}()
    {
    }
}
">> ${module}/${module}.controlador.php
 
echo "Modulo "${module}" creado con éxito"
