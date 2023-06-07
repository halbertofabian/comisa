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
            'contratos',
            'clientes-mal-historial',
            'clientes',
            'importar-clientes-mal-historial',
            'new-mal-historial',
            'edit-cliente-mal-historial',
            'autorizar-cobranza'


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
    public static function obtenerListaBlancaAgenteLLamadas()
    {
        return array(
            'contratos',
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
            'kardex',
            'contratos',
            'clientes-mal-historial',
            'clientes',
            'importar-clientes-mal-historial',
            'new-mal-historial',
            'edit-cliente-mal-historial',
            'cobranza',
            'autorizar-pagos',
            'historial-ficha',
            'autorizar-cobranza'
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
            'kardex',
            'traspasos',
            'listar-traspasos',
            'contratos',
            'clientes-mal-historial',
            'clientes',
            'importar-clientes-mal-historial',
            'new-mal-historial',
            'almacenes',
            'traspasos',
            'productos',
            'compras',
            'listar-contratos',
            'edit-cliente-mal-historial',

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
            'kardex',
            'almacenes',
            'traspasos',
            'productos',
            'compras',
            'contratos',
            'clientes-mal-historial',
            'clientes',
            'importar-clientes-mal-historial',
            'new-mal-historial',
            'edit-cliente-mal-historial',
            'cobranza',
            'historial-ficha',
            'autorizar-cobranza'
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
            'Jefe administrativo',
            'Agente de llamadas',
            'Baja de usuario'
        );
    }
    public static function obtenerListaBlancaCobrador()
    {
        return array(
            'contratos',
            'salir'
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
            '6' => array(
                [
                    'label' => 'Clientes',
                    'icon' => '<i class="fa fa-users" aria-hidden="true"></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                            'label' => 'Clientes con mal historial',
                            'href' => 'clientes-mal-historial'
                        ],
                        [
                            'icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                            'label' => 'Lista blanca',
                            'href' => 'clientes/lista-blanca'
                        ],
                        [
                            'icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                            'label' => 'Lista negra',
                            'href' => 'clientes/lista-negra'
                        ],
                        //Aqui más item de menu
                    ),
                ]
            ),
            '7' => array(
                [

                    'label' => 'Contratos',
                    'icon' => '<i class="fa fa-file-text-o "></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Registrar contrato',
                            'href' => 'contratos/registrar-contrato'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gestión de contratos',
                            'href' => 'contratos/listar'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Listar todos los contratos',
                            'href' => 'contratos/todos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Enrutar cuentas',
                            'href' => 'contratos/enrutar-cuentas'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gestión de status',
                            'href' => 'contratos/gestion-status'
                        ],
                        //Aqui más item de menu
                    ),
                ]
            ),
            '1' => array(
                [
                    'label' => 'Cobranza',
                    'icon' => '<i class="fa fa-dollar"></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(

                        [
                            'icon' => '',
                            'label' => 'Autorizar cobranza',
                            'href' => 'autorizar-cobranza'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Pagos por autorizar',
                            'href' => 'cobranza/autorizar-pagos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Historial de fichas',
                            'href' => 'historial-ficha/'
                        ],

                        [
                            'icon' => '',
                            'label' => 'Flujo de caja',
                            'href' => 'flujo-caja'
                        ],
                        // [
                        //     'icon' => '',
                        //     'label' => 'Lista de cajas / Nueva caja',
                        //     'href' => 'cajas'
                        // ],
                        [
                            'icon' => '',
                            'label' => 'Enrutar cuentas',
                            'href' => 'cobranza/actualizar-saldos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Descargar ruta',
                            'href' => 'cobranza/ruta'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Estado de cuenta',
                            'href' => 'cobranza/estado-cuenta'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Status',
                            'href' => 'cobranza/status'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Rendimiento',
                            'href' => 'cobranza/rendimiento'
                        ],
                        // [
                        //     'icon' => '',
                        //     'label' => 'Ingresos',
                        //     'href' => 'cobranza/ingresos'
                        // ],
                        // [
                        //     'icon' => '',
                        //     'label' => 'Gastos',
                        //     'href' => 'cobranza/gastos'
                        // ],

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
                    'icon' => '<i class="fa fa-shopping-bag"></i>',
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

            '10' => array(
                [

                    'label' => 'Contratos',
                    'icon' => '<i class="fa fa-file-text-o "></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Registrar contrato',
                            'href' => 'contratos/registrar-contrato'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gestión de contratos',
                            'href' => 'contratos/listar'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Listar todos los contratos',
                            'href' => 'contratos/todos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Enrutar cuentas',
                            'href' => 'contratos/enrutar-cuentas'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gestión de status',
                            'href' => 'contratos/gestion-status'
                        ],
                        //Aqui más item de menu
                    ),
                ]
            ),
            '9' => array(
                [
                    'label' => 'Clientes',
                    'icon' => '<i class="fa fa-users" aria-hidden="true"></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                            'label' => 'Clientes con mal historial',
                            'href' => 'clientes-mal-historial'
                        ],
                        [
                            'icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                            'label' => 'Lista blanca',
                            'href' => 'clientes/lista-blanca'
                        ],
                        [
                            'icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                            'label' => 'Lista negra',
                            'href' => 'clientes/lista-negra'
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

            // '7' => array(
            //     [
            //         'label' => 'Plantillas',
            //         'icon' => '<i class="link-icon fa fa-dollar"></i>',
            //         'href' => '#softMarket',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
            //                 'label' => 'Crear plantilla de ventas',
            //                 'href' => 'ventas/crear-plantilla'
            //             ],
            //             [
            //                 'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
            //                 'label' => 'Cargar datos a plantilla',
            //                 'href' => 'ventas/cargar-plantilla'
            //             ],
            //             // Aqui más item de menu
            //         ),
            //     ]
            // ),
            '8' => array(
                [
                    'label' => 'Inventario',
                    'icon' => '<i class="link-icon fa fa-exchange"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Pre-registro',
                            'href' => 'almacenes/preregistro-mercancia'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar pre-registros',
                            'href' => 'almacenes/listar-pre-registros'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar mercancia',
                            'href' => 'almacenes/listar-mercancia'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar inventario',
                            'href' => 'almacenes/total-mercancia'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Asignar productos',
                            'href' => 'almacenes/registrar-almacenes'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Registrar modelos',
                            'href' => 'productos/registrar-modelos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Registrar nuevo almacen',
                            'href' => 'almacenes'
                        ],
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
                            'label' => 'Salida de mercancía',
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
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Agregar series',
                            'href' => 'productos/agregar_series'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Importar productos',
                            'href' => 'productos/importar'
                        ],

                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Exportar productos',
                            'href' => 'export/exportar-productos.php'
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
            '10' => array(
                [

                    'label' => 'Contratos',
                    'icon' => '<i class="fa fa-file-text-o "></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Registrar contrato',
                            'href' => 'contratos/registrar-contrato'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gestión de contratos',
                            'href' => 'contratos/listar'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Listar todos los contratos',
                            'href' => 'contratos/todos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Enrutar cuentas',
                            'href' => 'contratos/enrutar-cuentas'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gestión de status',
                            'href' => 'contratos/gestion-status'
                        ],
                        //Aqui más item de menu
                    ),
                ]
            ),
            '1' => array(
                [
                    'label' => 'Cobranza',
                    'icon' => '<i class="fa fa-dollar"></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(

                        [
                            'icon' => '',
                            'label' => 'Autorizar cobranza',
                            'href' => 'autorizar-cobranza'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Pagos por autorizar',
                            'href' => 'cobranza/autorizar-pagos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Historial de fichas',
                            'href' => 'historial-ficha/'
                        ],

                        // [
                        //     'icon' => '',
                        //     'label' => 'Flujo de caja',
                        //     'href' => 'flujo-caja'
                        // ],
                        [
                            'icon' => '',
                            'label' => 'Lista de cajas / Nueva caja',
                            'href' => 'cajas'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Enrutar cuentas',
                            'href' => 'cobranza/actualizar-saldos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Descargar ruta',
                            'href' => 'cobranza/ruta'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Estado de cuenta',
                            'href' => 'cobranza/estado-cuenta'
                        ],

                        [
                            'icon' => '',
                            'label' => 'Status',
                            'href' => 'cobranza/status'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Rendimiento',
                            'href' => 'cobranza/rendimiento'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Ingresos',
                            'href' => 'cobranza/ingresos'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Gastos',
                            'href' => 'cobranza/gastos'
                        ],

                        //Aqui más item de menu
                    ),
                ]
            ),
            '9' => array(
                [
                    'label' => 'Clientes',
                    'icon' => '<i class="fa fa-users" aria-hidden="true"></i>',
                    'href' => '#home',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-user-times" aria-hidden="true"></i>',
                            'label' => 'Clientes con mal historial',
                            'href' => 'clientes-mal-historial'
                        ],
                        [
                            'icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                            'label' => 'Lista blanca',
                            'href' => 'clientes/lista-blanca'
                        ],
                        [
                            'icon' => '<i class="fa fa-list" aria-hidden="true"></i>',
                            'label' => 'Lista negra',
                            'href' => 'clientes/lista-negra'
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
            // '7' => array(
            //     [
            //         'label' => 'Flujo de mercancia',
            //         'icon' => '<i class="link-icon fa fa-exchange" aria-hidden="true"></i>
            //         ',
            //         'href' => '#softMarket',
            //         'modulos' =>
            //         array(
            //             [
            //                 'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
            //                 'label' => 'Entradas',
            //                 'href' => 'almacenes/entradas'
            //             ],
            //             [
            //                 'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
            //                 'label' => 'Salidas',
            //                 'href' => 'traspasos/new'
            //             ],

            //             // Aqui más item de menu
            //         ),
            //     ]
            // ),
            '8' => array(
                [
                    'label' => 'Inventario',
                    'icon' => '<i class="link-icon fa fa-exchange"></i>',
                    'href' => '#softMarket',
                    'modulos' =>
                    array(

                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Pre-registro',
                            'href' => 'almacenes/preregistro-mercancia'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar pre-registros',
                            'href' => 'almacenes/listar-pre-registros'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar mercancia',
                            'href' => 'almacenes/listar-mercancia'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Listar inventario',
                            'href' => 'almacenes/total-mercancia'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Asignar productos',
                            'href' => 'almacenes/registrar-almacenes'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Registrar modelos',
                            'href' => 'productos/registrar-modelos'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Registrar nuevo almacen',
                            'href' => 'almacenes'
                        ],
                        [
                            'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                            'label' => 'Lista de inventario',
                            'href' => 'almacenes/listar-inventario'
                        ],
                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Nuevo producto',
                        //     'href' => 'productos/new'
                        // ],
                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Nueva compra de mercancia',
                        //     'href' => 'compras/new'
                        // ],

                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Salida de mercancía',
                        //     'href' => 'traspasos/new'
                        // ],

                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Listar traspasos de mercancia',
                        //     'href' => 'listar-traspasos'
                        // ],
                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Listar productos',
                        //     'href' => 'productos'
                        // ],
                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Agregar series',
                        //     'href' => 'productos/agregar_series'
                        // ],
                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Importar productos',
                        //     'href' => 'productos/importar'
                        // ],

                        // [
                        //     'icon' => '<i class="fa fa-circle-o" aria-hidden="true"></i>',
                        //     'label' => 'Exportar productos',
                        //     'href' => 'export/exportar-productos.php'
                        // ],

                        // Aqui más item de menu
                    ),
                ]
            ),
        );
    }
    public static function obtnerMenuCobrador()
    {
        return array(
            '1' => array(
                [

                    'label' => 'Contratos',
                    'icon' => '<i class="fa fa-file-text-o "></i>',
                    'href' => 'contratos/enrutar-cuentas',
                    'modulos' =>  array(
                        [
                            'icon' => '',
                            'label' => 'Enrutar cuentas',
                            'href' => 'contratos/enrutar-cuentas'
                        ],
                    )
                ]
            ),
        );
    }
    public static function obtnerMenuAgenteLLamadas()
    {
        return array(
            '1' => array(
                [

                    'label' => 'Centro de llamadas',
                    'icon' => '<i class="fa fa-file-text-o "></i>',
                    'href' => '#',
                    'modulos' =>  array(
                        [
                            'icon' => '',
                            'label' => 'Listar contratos',
                            'href' => 'contratos/listar'
                        ],
                    )
                ]
            ),
        );
    }
    public static function listarEtiquetas()
    {
        return array(
            1 => array(
                'status' => 'LOCALIZAR',
                'etiqueta' => 'LZR',
                'actividad' => 'INACTIVA',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/location.png',
            ),
            2 => array(
                'status' => 'CHECAR CONTRATO',
                'etiqueta' => 'CCT',
                'actividad' => 'PENDIENTE',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/checar-contrato.png',
            ),
            3 => array(
                'status' => 'SERVICIOS',
                'etiqueta' => 'SRV',
                'actividad' => 'PENDIENTE',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/servicios.png',
            ),
            4 => array(
                'status' => 'RECOGER',
                'etiqueta' => 'RCG',
                'actividad' => 'INACTIVA',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/recoger.png',
            ),
            5 => array(
                'status' => 'SUPERVISAR',
                'etiqueta' => 'SPR',
                'actividad' => 'INACTIVA',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/supervisar.png',
            ),
            6 => array(
                'status' => 'TRASPASO A OTRA RUTA',
                'etiqueta' => 'TRT',
                'actividad' => 'INACTIVA',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/traspasos.png',
            ),
            7 => array(
                'status' => 'SEG. EN LLAMADAS',
                'etiqueta' => 'SLS',
                'actividad' => 'PENDIENTE',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/llamadas.png',
            ),
            8 => array(
                'status' => 'CONVENIOS',
                'etiqueta' => 'CVS',
                'actividad' => 'PENDIENTE',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/convenio.png',
            ),
            9 => array(
                'status' => 'FALLECIDAS',
                'etiqueta' => 'FLS',
                'actividad' => 'INACTIVA',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/fallecidas.png',
            ),
            10 => array(
                'status' => 'JURIDICO',
                'etiqueta' => 'JDC',
                'actividad' => 'INACTIVA',
                'color' => '',
                'icono' => HTTP_HOST . 'app/assets/iconos/juridico.png',
            ),

        );
    }

    public static function listarSucursalesTux()
    {
        return array(
            '1' => array(
                'scl_nombre' => 'COMISA TUXTEPEC OAXACA',
                'scl_url' => 'https://tuxtepec-comisa.softmor.com/'
            ),
            '2' => array(
                'scl_nombre' => 'COMISA TIERRA BLANCA',
                'scl_url' => 'https://tierrablanca-comisa.softmor.com/'
            ),
            '3' => array(
                'scl_nombre' => 'COMISA COSAMALOAPAN',
                'scl_url' => 'https://cosamaloapan-comisa.softmor.com/'
            ),
        );
    }
    public static function listarAlmacenesTux()
    {
        $almacenes = AlmacenesModelo::mdlMostrarAlmacenesByTipoDestino();
        $datos = array();
        foreach($almacenes as $ams){
            if($ams['ams_nombre'] == 'COMISA TUXTEPEC OAXACA'){
                $dato = array(
                    'ams_id' => $ams['ams_id'],
                    'ams_nombre' => $ams['ams_nombre'],
                    'scl_url' => 'https://tuxtepec-comisa.softmor.com/'
                );
            }
            if($ams['ams_nombre'] == 'COMISA TIERRA BLANCA'){
                $dato = array(
                    'ams_id' => $ams['ams_id'],
                    'ams_nombre' => $ams['ams_nombre'],
                    // 'scl_url' => 'https://tierrablanca-comisa.softmor.com/'
                    'scl_url' => 'https://pruebas-comisa.softmor.com/'
                );
            }
            if($ams['ams_nombre'] == 'COMISA COSAMALOAPAN'){
                $dato = array(
                    'ams_id' => $ams['ams_id'],
                    'ams_nombre' => $ams['ams_nombre'],
                    'scl_url' => 'https://cosamaloapan-comisa.softmor.com/'
                );
            }
            
            array_push($datos, $dato);
        }
        return $datos;
    }

    public static function separarNumeros($input) {
        // Eliminar caracteres especiales como paréntesis y espacios
        $input = preg_replace('/[^0-9]/', '', $input);
    
        $grupos = str_split($input, 10); // Dividir el input en grupos de 10 dígitos
    
        $numerosSeparados = implode(', ', $grupos); // Convierte el array de grupos en una cadena separada por comas
    
        return $numerosSeparados;
    }
    
}
