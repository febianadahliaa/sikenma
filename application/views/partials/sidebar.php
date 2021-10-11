<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIKENMA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU (BASED ON USER ROLE) -->
    <?php
    $role_id = $this->session->userdata('roleId');
    $queryMenu = "SELECT user_menu.menu_id, menu
                        FROM user_menu JOIN user_access_menu
                        ON user_menu.menu_id = user_access_menu.menu_id
                        WHERE user_access_menu.role_id = $role_id
                        AND user_menu.is_active = 1
                        ORDER BY user_access_menu.menu_id ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= str_replace('_', ' ', $m['menu']); ?>
        </div>

        <!-- QUERY SUBMENU -->
        <?php
        $menuId = $m['menu_id'];
        $querySubMenu = "SELECT *
                                FROM user_sub_menu
                                WHERE menu_id = $menuId
                                AND is_active = 1
                            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- LOOPING SUBMENU -->
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($subMenuName == $sm['sub_menu_name']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['sub_menu_name']; ?></span>
                </a>
                </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>



        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item"> -->
        <!-- atau class="nav-item" -->
        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> -->
        <!-- <i class="fas fa-fw fa-cog"></i> -->
        <!-- <span>Components</span> -->
        <!-- </a> -->
        <!-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"> -->
        <!-- <div class="bg-white py-2 collapse-inner rounded"> -->
        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
        <!-- <a class="collapse-item" href="buttons.html">Buttons</a> -->
        <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
        <!-- </div> -->
        <!-- </div> -->
        <!-- </li> -->



        <li class="nav-item">
            <a class="nav-link logout" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-power-off"></i>
                <span>Logout</span>
            </a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->