
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

            $aux = "";
            $rol = "Vendedor";
            $usuarios = UsuariosModelo::mdlMostrarUsuarios($aux, $rol);
            //Sacar fecha para saber la suma por semana
            $dtsplantilla=VentasModelo::mdlMostrarPlantillaById($_POST['dvts_id_plantilla']);
            $sumdebe=GastosModelo::mdlMostrarSumDebeAllUsr($dtsplantilla['pvts_fecha_inicio']."T00:00",$dtsplantilla['pvts_fecha_fin']."T23:59");
            

            
            $newArrayCompuesto=[];
            $x=0;
            foreach ($usuarios as $key => $usr) {
            $tdebe=GastosModelo::mdlMostrarSumDebeUsr($usr['usr_id'],$dtsplantilla['pvts_fecha_inicio']."T00:00",$dtsplantilla['pvts_fecha_fin']."T23:59");
          
        
            if($tdebe['sumadbe']>0){
                $x=$tdebe['sumadbe'];
            }
            array_push($newArrayCompuesto,array(
                "usr_id" =>$usr['usr_id'],
                "usr_nombre"=>$usr['usr_nombre'],
                "usr_deuda_int"=>$usr['usr_deuda_int'],
                "sumadeuda"=>$x,
                "usr_deuda_ext"=>$usr['usr_deuda_ext'],
            ));

            }


            if ($datosexistentes) {
                return array(
                    'status' => true,
                    'info' => $datosexistentes,
                    'info2'=> $newArrayCompuesto
                );
            } else {
                $aux = "";
                $rol = "Vendedor";
                $usuarios = UsuariosModelo::mdlMostrarUsuarios($aux, $rol);
                return array(
                    'status' => false,
                    'info' => $usuarios,
                    'info2'=> $newArrayCompuesto
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

    public function ctrMostrarKardex()
    {   
        $aux="";
        $_POST['igs_usuario_responsable'] =$_POST['usuario_responsable'];
        $_POST['igs_fecha_inicio'] =$_POST['fecha_inicio'];
        $_POST['igs_fecha_fin'] =$_POST['fecha_fin'];

        $_POST['tgts_usuario_responsable'] =$_POST['usuario_responsable'];
        $_POST['gts_fecha_inicio'] =$_POST['fecha_inicio'];
        $_POST['gts_fecha_fin'] =$_POST['fecha_fin'];

        if ($_POST['usuario_responsable'] > 0 ) {
            $respuesta1 = IngresosModelo::mdlMostrarResumenIngresosId($_POST);
            $respuesta2 = GastosModelo::mdlMostrarResumenGastosx($_POST);
            $aux="1";

        } else {
            $respuesta1 = IngresosModelo::mdlMostrarResumenIngresosAll($_POST);
            $respuesta2 = GastosModelo::mdlMostrarResumenGastosall($_POST);
            $aux="1";
           
        }
            if ($aux!="") {
                return array(
                    'status' => true,
                    'mensaje' => 'bien',
                    'ingresos'=> $respuesta1,
                    'gastos'=> $respuesta2,

                
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Algo fallo, intenta de nuevo.',
                    
                );
            } 
    }

}
