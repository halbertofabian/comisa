<?php
class AppControlador
{
    public static function obtenerListaBlanca()
    {
        return array(
            'bienvenido',
            'usuarios',
            'salir',
            'productos',
            'medios',
            'pos',
            'alumnos',
            'configuracion',
            'paquetes',
            'inscripciones',
            'pagos',
            'cupones',
            'alumno',
            'gastos',
            'ingresos',
            'listar-gastos',
            'listar-ingresos',
            'categorias',
            'mi-perfil',
            'sucursales',
            'cortes',
            'cajas',
            'abrir-caja',
            'cerrar-caja',
            'informes',
            'clientes',
            'contratos',
            'almacenes',
            'compras',
            'traspasos'
        );
    }
    public static function obtenerListaBlancaAlumno()
    {
        return array(
            'bienvenido',
            'salir',
            'alumno',
            'mi-perfil'
        );
    }




    public static function msj($tipo, $titulo, $mensaje, $pagina = "")
    {

        if ($pagina == "") {
            echo
            '
            <script>    
                swal({
                    title: "' . $titulo . '",
                    text: "' . $mensaje . '",
                    icon: "' . $tipo . '",
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,

                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.history.back();
                    } else {
                        window.history.back();
                    }
                });
            </script> 
        ';
        } else {
            echo
            '
            <script> 
                swal({
                    title: "' . $titulo . '",
                    text: "' . $mensaje . '",
                    icon: "' . $tipo . '",
                    buttons: [false,"Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = "' . $pagina . '"
                    } else {
                        location.href = "' . $pagina . '"
                    }
                });
            </script> 
        ';
        }
    }



    //Menus
    public static function obtnerMenuAdmin()
    {
        return array(
            // '1' => array(
            //     [
            //         'label' => 'Home',
            //         'icon' => '<i class="link-icon fa fa-home"></i>',
            //         'href' => '#home',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '',
            //                 'label' => 'Bienvenido',
            //                 'href' => ''
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => '...',
            //                 'href' => ''
            //             ],
            //             //Aqui más item de menu
            //         ),
            //     ]
            // // ),
            // '2' => array(
            //     [
            //         'label' => 'Usuarios',
            //         'icon' => '<i class="link-icon fa fa-user-plus"></i>',
            //         'href' => '#usuarios',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '',
            //                 'label' => 'Nuevo usuario',
            //                 'href' => 'usuarios/new'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Listar usuarios',
            //                 'href' => 'usuarios'
            //             ],

            //             // Aqui más item de menu
            //         ),
            //     ]
            // ),
            // '3' => array(
            //     [
            //         'label' => 'Medios',
            //         'icon' => '<i class="link-icon fa fa-picture-o"></i>',
            //         'href' => '#medios',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '',
            //                 'label' => 'Añadir nuevo',
            //                 'href' => 'medios/new'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Biblioteca',
            //                 'href' => 'medios'
            //             ],

            //             // Aqui más item de menu
            //         ),
            //     ]
            // ),
            // '4' => array(
            //     [
            //         'label' => 'Inventario',
            //         'icon' => '<i class="link-icon fa fa-archive"></i>',
            //         'href' => '#inventario',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '',
            //                 'label' => 'Nuevo producto',
            //                 'href' => 'productos/new'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Listar productos',
            //                 'href' => 'productos'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Categorías',
            //                 'href' => 'categorias'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Etiquetas',
            //                 'href' => 'etiquetas'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Nueva compra',
            //                 'href' => 'compras/new'
            //             ],

            //             [
            //                 'icon' => '',
            //                 'label' => 'Baja de mercancia',
            //                 'href' => 'productos/baja'
            //             ],

            //             // Aqui más item de menu
            //         ),
            //     ]
            // ),

            // '5' => array(
            //     [
            //         'label' => 'POS',
            //         'icon' => '<i class="link-icon fa fa-barcode"></i>',
            //         'href' => '#pos',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '',
            //                 'label' => 'Abir caja',
            //                 'href' => 'pos'
            //             ],
            //             // Aqui más item de menu
            //         ),
            //     ]
            // ),


            '5' => array(
                [
                    'label' => 'Almacenes',
                    'icon' => '<i class="link-icon fa fa-amazon"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Nuevo producto',
                            'href' => 'productos/new'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Nueva compra de mercancia',
                            'href' => 'compras/new'
                        ],

                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Traspaso de mercancia',
                            'href' => 'traspasos/new'
                        ],
                        // Aqui más item de menu
                    ),
                ]
            ),

            '6' => array(
                [
                    'label' => 'Configuración',
                    'icon' => '<i class="link-icon fa fa-cog"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Almacenes',
                            'href' => 'almacenes'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Sucursales',
                            'href' => 'sucursales'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '7' => array(
                [
                    'label' => 'Softmor',
                    'icon' => '<i class="link-icon fa fa-github"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Servicios',
                            'href' => 'softmor/servicios'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),

            // Aqui más  menus
        );
    }
}
