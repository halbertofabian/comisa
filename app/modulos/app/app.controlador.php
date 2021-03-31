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
            'traspasos',
            'flujo-caja',
            'cuentas',
            'mi-flujo-caja',
            'fichas'
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
    public static function ObtenerListaBlancaGefeCobranza()
    {
        return array(
            'flujo-caja',
            'mi-caja',
            'flujo-caja',
            'cajas',
            'salir'
        );
    }

    public static function obtenerPerfiles()
    {
        return array(
            'Administrador',
            'Supervisor',
            'Vendedor',
            'Cobrador',
            'Jefe de cobranza',
            'Jefe de ventas'
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

            '4' => array(
                [
                    'label' => 'Gastos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#gastos',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Nuevo gasto',
                            'href' => 'gastos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Listar gastos',
                            'href' => 'listar-gastos'
                        ],
                        // Aqui más item de menu
                    ),
                ]
            ),
            '5' => array(
                [
                    'label' => 'Ingresos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#gastos',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Nuevo ingreso',
                            'href' => 'ingresos'
                        ],
                        // Aqui más item de menu
                    ),
                ]
            ),


            '6' => array(
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

            '7' => array(
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
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Usuarios',
                            'href' => 'usuarios'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '8' => array(
                [
                    'label' => 'Caja',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Crear nueva caja',
                            'href' => 'cajas'
                        ],


                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Flujo de caja',
                            'href' => 'flujo-caja'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar cortes',
                            'href' => 'cortes'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),

            '9' => array(
                [
                    'label' => 'Cuentas',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Crear nueva cuenta',
                            'href' => 'cuentas/new'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar cuentas',
                            'href' => 'cuentas'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Movimientos de cuenta',
                            'href' => 'cuentas/movimientos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),

            '10' => array(
                [
                    'label' => 'Fichas de cobro',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Ficha de cobro',
                            'href' => 'fichas/cobrador/'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),

            '11' => array(
                [
                    'label' => 'Nuevo menu',
                    'icon' => '<i class="link-icon fa fa-user"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Ficha de cobro',
                            'href' => 'fichas/cobrador/'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),

            // Aqui más  menus
        );
    }

    public static function obtnerMenuGefeCobranza()
    {
        return array(
            '1' => array(
                [
                    'label' => 'Cobranza',
                    'icon' => '<i class="fas fa-funnel-dollar "></i>',  
                    'href' => '#home',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Mi caja',
                            'href' => 'mi-caja'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Flujo de caja',
                            'href' => 'flujo-caja'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Registrar nueva caja',
                            'href' => 'cajas'
                        ],
                        //Aqui más item de menu
                    ),
                ]
            ),
        );
    }
}
