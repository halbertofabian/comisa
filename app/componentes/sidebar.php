<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">MODULOS</li>
                <li>
                    <a href="<?php echo HTTP_HOST ?>" class="waves-effect">
                        <i class="fa fa-home"></i> <span> HOME </span>
                    </a>
                </li>
                <?php
                if ($_SESSION['session_usr']['usr_rol'] == "Administrador") {
                    $menu = AppControlador::obtnerMenuAdmin();
                } elseif ($_SESSION['session_usr']['usr_rol'] == "Jefe de cobranza") {
                    $menu = AppControlador::obtnerMenuGefeCobranza();
                }

                //preArray($menu);
                foreach ($menu as $key => $mu) :
                ?>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <?php echo $mu[0]['icon']; ?>
                            <span> <?php echo $mu[0]['label']; ?>
                                <span class="float-right menu-arrow">
                                    <i class="mdi mdi-chevron-right"></i>
                                </span>
                            </span>
                        </a>
                        <?php foreach ($mu[0]['modulos'] as $key => $li) : ?>
                            <ul class="submenu">
                                <li><a href="<?php echo HTTP_HOST . $li['href'] ?>"><?php echo $li['icon'] . $li['label'] ?></a></li>
                            </ul>
                        <?php endforeach; ?>
                    </li>
                <?php endforeach; ?>


            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>