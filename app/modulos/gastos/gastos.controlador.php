<?php

class GastosControlador
{
    public static function ctrCrearCategoria($categoria)
    {



        $crearCategoria = GastosModelo::mdlCrearCategoria(array(
            'gts_nombre' => $categoria['gts_nombre'],
            'gts_presupuesto' => str_replace(",", "", $categoria['gts_presupuesto'])
        ));


        if ($crearCategoria) {
            return array(
                'status' => true,
                'mensaje' => 'Registro creado con éxito'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, es probable que ya exista este registro'
            );
        }
    }

    public function ctrCrearGasto()
    {
        if (isset($_POST['btnGuardarGasto'])) {
            if ($_SESSION['session_usr']['usr_caja'] == 0) {
                AppControlador::msj('warning', '¡Ups!', 'Necesitas abrir caja para cobrar', HTTP_HOST . 'abrir-caja');
                return;
            }

            $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['tgts_id_corte'] = CortesControlador::crtConsultarUltimoCorte();
            $_POST['tgts_cantidad'] = str_replace(",", "", $_POST['tgts_cantidad']);
            $_POST['tgts_fecha_gasto'] = FECHA;

            $crearGasto = GastosModelo::mdlCrearGasto($_POST);

            if ($crearGasto) {
                AppControlador::msj('success', 'Muy bien', 'Gastos guardado', './listar-gastos');
            } else {
                AppControlador::msj('error', 'Ocurrio un error', 'No se pudo guardar el gasto, intente de nuevo', '');
            }
        }
    }

    public static function ctrEliminarGasto($tgts_id)
    {

        $eliminarGasto = GastosModelo::mdlEliminarGasto($tgts_id);


        if ($eliminarGasto) {
            return array(
                'status' => true,
                'mensaje' => 'Gasto eliminado con éxito',
                'pagina' => 'listar-gastos'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, vuelve a intentarlo',
                'pagina' => 'listar-gastos'

            );
        }
    }

    public static function ctrEliminarCategoria($gts_id)
    {

        $eliminarCategoria = GastosModelo::mdlEliminarCategoria($gts_id);


        if ($eliminarCategoria) {
            return array(
                'status' => true,
                'mensaje' => 'Gasto eliminado con éxito',
                'pagina' => 'categorias'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Esta categoría  esta relzacionada con algún gasto, primero elimine el gasto.',
                'pagina' => 'listar-gastos'

            );
        }
    }

    public  function ctrEditarNota($tabla, $campo, $valor, $pagina)
    {
        if (isset($_POST['btnEditarNota'])) {

            $actualizarNota = GastosModelo::mdlEditarNota($tabla, $campo, $_POST['nota'], $valor, $_POST['id']);

            if ($actualizarNota) {
                AppControlador::msj('success', 'Muy bien', 'Nota actualizada con éxito', $pagina);
            } else {
            }
        }
    }
}
