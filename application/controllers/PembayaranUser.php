<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Riwayat Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembayaran'] = $this->pembayaran->getPembayaranUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaranuser/index', $data);
        $this->load->view('templates/footer');
    }
}
