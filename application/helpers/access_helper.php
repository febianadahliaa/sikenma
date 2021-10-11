<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('roleId');
        $menu = $ci->uri->segment(1);

        if ($menu == NULL) {
            base_url();
        } else {
            $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
            $menu_id = $queryMenu['menu_id'];

            $userAccess = $ci->db->get_where('user_access_menu', [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);

            if ($userAccess->num_rows() < 1) {
                redirect('auth/blocked');
            }
        }
    }
}
