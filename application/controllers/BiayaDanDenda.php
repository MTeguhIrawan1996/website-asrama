<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BiayaDanDenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran Asrama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['biayadenda'] = $this->pembayaran->getBiayaDendaAll();

        $this->form_validation->set_rules('denda', 'Denda', 'required|trim');
        $this->form_validation->set_rules('_biaya', 'Biaya', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('biayadandenda/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->pembayaran->tambahDataBiayaDenda();
            $this->session->set_flashdata('message', 'Data biaya & denda berhasil ditambahkan');
            redirect('biayadandenda');
        }
    }

    public function hapus()
    {

        $this->pembayaran->hapusDataBiayaDenda();
        $this->session->set_flashdata('message', 'Delete Data success!');
        redirect('biayadandenda');
    }
}
