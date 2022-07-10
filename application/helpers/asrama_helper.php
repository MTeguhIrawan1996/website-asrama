<?php

//metode ketika login user tidak bisa mangakses method yg tidak sesuai dengan role loginnya
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAcces = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($userAcces->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

//ketika sudah login dan ingin mengakses url yang berada diluar login tanpa logout maka akan di tendang
function goToDefaultPage()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') == 1) {
        redirect('admin');
    } else if ($ci->session->userdata('role_id') == 2) {
        redirect('user');
    } else if ($ci->session->userdata('role_id') == 3) {
        redirect('kabag');
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
