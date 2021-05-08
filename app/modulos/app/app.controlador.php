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
            'fichas',
            'mi-caja',
            'comisiones',
            'reportes-caja',
            'sueldos',
            'gastos_gasolina',
            'reporte-gasolina',
            'reporte-gastos',
            'abonos',
            'listar-traspasos',
            
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
            'reportes-caja',
            'comisiones',
            'sueldos',
            'usuarios',
            'ingresos',
            'listar-gastos',
            'salir',
            'ver-caja',
            'reporte-gastos',
            'reporte-gasolina',
            'abonos',
            'reporte-ingresos',
            'kardex'
        );
    }
    public static function ObtenerListaBlancaGefeVentas()
    {
        return array(
            'flujo-caja',
            'mi-caja',
            'flujo-caja',
            'cajas',
            'reportes-caja',
            'comisiones',
            'sueldos',
            'usuarios',
            'ingresos',
            'listar-gastos',
            'salir',
            'gastos_gasolina',
            'reporte-gasolina',
            'reporte-gastos',
            'ver-caja',
            'abonos',
            'ventas',
            'reporte-ingresos',
            'kardex'
            
        );
    }

    public static function ObtenerListaBlancaAdministración()
    {
        return array(

            'mi-caja',
            'cajas',
            'reportes-caja',
            'comisiones',
            'sueldos',
            'usuarios',
            'ingresos',
            'listar-gastos',
            'salir',
            'caja-ventas',
            'caja-cobranza',
            'ver-caja',
            'reporte-gastos',
            'reporte-gasolina',
            'abonos',
            'ver-caja',
            'listar-traspasos',
            'kardex'
        );
    }

    public static function obtenerPerfiles()
    {
        return array(
            'Empleado',
            'Administrador',
            'Supervisor',
            'Vendedor',
            'Cobrador',
            'Jefe de cobranza',
            'Jefe de ventas',
            'Jefe administrativo'
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
                        
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar traspasos de mercancia',
                            'href' => 'listar-traspasos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar productos',
                            'href' => 'productos'
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
                            'label' => 'Mi caja',
                            'href' => 'mi-caja'
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
                    'label' => 'Compras',
                    'icon' => '<i class="link-icon fa fa-user"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Lista de compras',
                            'href' => 'compras'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Nueva compra',
                            'href' => 'compras/new'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '12' => array(
                [
                    'label' => 'Comisiones y sueldos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de comision',
                            'href' => 'comisiones/reporte'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Sueldos',
                            'href' => 'sueldos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Abonos',
                            'href' => 'abonos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '13' => array(
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
            '13' => array(
                [
                    'label' => 'Resumen',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de gasolina',
                            'href' => 'reporte-gasolina'
                        ]
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
                            'label' => 'Flujo de caja',
                            'href' => 'flujo-caja'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Lista de cajas / Nueva caja',
                            'href' => 'cajas'
                        ],

                        //Aqui más item de menu
                    ),
                ]
            ),
            '2' => array(
                [
                    'label' => 'Comisiones y sueldos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Comisiones',
                            'href' => 'comisiones'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Sueldos',
                            'href' => 'sueldos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Abonos',
                            'href' => 'abonos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '3' => array(
                [
                    'label' => 'Trabajadores',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar usuarios',
                            'href' => 'usuarios'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Alta de usuario',
                            'href' => 'usuarios/new'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '4' => array(
                [
                    'label' => 'Gestión de ingresos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar ingresos',
                            'href' => 'ingresos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de ingresos',
                            'href' => 'reporte-ingresos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '5' => array(
                [
                    'label' => 'Gestión de gastos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar gastos',
                            'href' => 'listar-gastos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de gastos',
                            'href' => 'reporte-gastos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
        );
    }

    public static function obtnerMenuGefeVentas()
    {
        return array(
            '1' => array(
                [
                    'label' => 'Ventas',
                    'icon' => '<i class="fas fa-funnel-dollar "></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(

                        [
                            'icon' => '',
                            'label' => 'Flujo de caja',
                            'href' => 'flujo-caja'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Lista de cajas / Nueva caja',
                            'href' => 'cajas'
                        ],
                        //Aqui más item de menu
                    ),
                ]
            ),
            '2' => array(
                [
                    'label' => 'Comisiones y sueldos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Comisiones',
                            'href' => 'comisiones'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Sueldos',
                            'href' => 'sueldos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Abonos',
                            'href' => 'abonos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '3' => array(
                [
                    'label' => 'Trabajadores',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar usuarios',
                            'href' => 'usuarios'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Alta de usuario',
                            'href' => 'usuarios/new'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '4' => array(
                [
                    'label' => 'Gestión de ingresos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar ingresos',
                            'href' => 'ingresos'
                        ],
                        
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de ingresos',
                            'href' => 'reporte-ingresos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '5' => array(
                [
                    'label' => 'Gestión de gastos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar gastos',
                            'href' => 'listar-gastos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de gastos',
                            'href' => 'reporte-gastos'
                        ]

                        // Aqui más item de menu
                    ),
                ]
            ),
            '6' => array(
                [
                    'label' => 'Resumen',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de gasolina',
                            'href' => 'reporte-gasolina'
                        ]
                        // Aqui más item de menu
                    ),
                ]
            ),
            
            '7' => array(
                [
                    'label' => 'Plantillas',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Crear plantilla de ventas',
                            'href' => 'ventas/crear-plantilla'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Cargar datos a plantilla',
                            'href' => 'ventas/cargar-plantilla'
                        ],
                        // Aqui más item de menu
                    ),
                ]
            ),
            
        );
    }
    public static function obtnerMenuGefeAdministracion()
    {
        return array(
            // '1' => array(
            //     [
            //         'label' => 'Cobranza',
            //         'icon' => '<i class="fas fa-funnel-dollar "></i>',
            //         'href' => '#home',
            //         'modulos' =>
            //         array(

            //             [
            //                 'icon' => '',
            //                 'label' => 'Flujo de caja',
            //                 'href' => 'flujo-caja'
            //             ],
            //             [
            //                 'icon' => '',
            //                 'label' => 'Lista de cajas / Nueva caja',
            //                 'href' => 'cajas'
            //             ],

            //             //Aqui más item de menu
            //         ),
            //     ]
            // ),
            '2' => array(
                [
                    'label' => 'Comisiones y sueldos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Comisiones',
                            'href' => 'comisiones'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Sueldos',
                            'href' => 'sueldos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '3' => array(
                [
                    'label' => 'Trabajadores',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar usuarios',
                            'href' => 'usuarios'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Alta de usuario',
                            'href' => 'usuarios/new'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '4' => array(
                [
                    'label' => 'Gestión de ingresos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar ingresos',
                            'href' => 'ingresos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '5' => array(
                [
                    'label' => 'Gestión de gastos',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar gastos',
                            'href' => 'listar-gastos'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '6' => array(
                [
                    'label' => 'Resumen',
                    'icon' => '<i class="link-icon fa fa-dollar"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Reporte de gasolina',
                            'href' => 'reporte-gasolina'
                        ]
                        // Aqui más item de menu
                    ),
                ]
            ),
        );
    }
}
