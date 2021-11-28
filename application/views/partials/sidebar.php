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
    <hr class="sidebar-divider mb-0">

    <!-- QUERY MENU (BASED ON USER ROLE) -->
    <?php
    $role_id = $this->session->userdata('roleId');
    $queryMenu = "SELECT user_menu.menu_id, menu, icon, collapse
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

        <?php if ($menuName == $m['menu']) : ?>
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#<?= $m['collapse']; ?>" aria-expanded="true" aria-controls="<?= $m['collapse']; ?>">
                <?php else : ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= $m['collapse']; ?>" aria-expanded="true" aria-controls="<?= $m['collapse']; ?>">
                <?php endif; ?>
                <i class="<?= $m['icon']; ?>"></i>
                <span><?= str_replace('_', ' ', $m['menu']); ?></span>
                </a>

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
                <?php if ($menuName == $m['menu']) : ?>
                    <div id="<?= $m['collapse']; ?>" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <?php else : ?>
                        <div id="<?= $m['collapse']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <?php endif; ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php foreach ($subMenu as $sm) : ?>
                                <?php if ($subMenuName == $sm['sub_menu_name']) : ?>
                                    <a class="collapse-item active" href="<?= base_url($sm['url']); ?>">
                                    <?php else : ?>
                                        <a class="collapse-item" href="<?= base_url($sm['url']); ?>">
                                        <?php endif; ?>
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <?= $sm['sub_menu_name']; ?>
                                        </a>
                                    <?php endforeach; ?>
                        </div>
                        </div>
            </li>
            <hr class="sidebar-divider mt-1 mb-0">
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link logout" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-power-off"></i>
                <span>Logout</span>
            </a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline mt-3">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->