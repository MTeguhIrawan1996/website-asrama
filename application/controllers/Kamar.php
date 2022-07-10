<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kamar_model', 'kamar');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamar'] = $this->kamar->getKamarAll();

        $this->form_validation->set_rules('no_kamar', 'Nomor Kamar', 'required|trim|is_unique[kamar.no_kamar]', ['is_unique' => 'Nomor kamar telah dipakai']);
        $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kamar/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kamar->tambahDataKamar();
            $this->session->set_flashdata('message', 'Data Kamar Berhasil ditambahkan');
            redirect('kamar');
        }
    }

    // public function getubahkamar()
    // {
    //     $this->load->model('Kamar_model', 'kamar');
    //     echo json_encode($this->kamar->getKamarById($_POST['id']));
    // }

    public function editKamar($id)
    {
        $data['title'] = 'Manajemen Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kamar'] = $this->kamar->getKamarById($id);

        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kamar/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kamar->editDataKamar();
            $this->session->set_flashdata('message', 'Edit kamar Success!');
            redirect('kamar');
        }
    }

    public function hapusKamar($id)
    {
        $this->kamar->hapusDataKamar($id);
        $this->session->set_flashdata('message', 'Delete kamar Success!');
        redirect('kamar');
    }
}
