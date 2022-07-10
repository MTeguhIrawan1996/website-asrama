<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Fasilitas_model', 'fasilitas');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Fasilitas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['fasilitas'] = $this->fasilitas->getFasilitasAll();

        $this->form_validation->set_rules('kode_fasilitas', 'Kode Fasilitas', 'required|trim|is_unique[fasilitas.kode_fasilitas]', ['is_unique' => 'Kode ini sudah digunakan']);
        $this->form_validation->set_rules('nama', 'Nama Fasilitas', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('penyedia', 'Penyedia', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('fasilitas/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->fasilitas->tambahDataFasilitas();
            $this->session->set_flashdata('message', 'Data Fasilitas Berhasil ditambahkan');
            redirect('fasilitas');
        }
    }

    public function edit()
    {
        $kode_fasilitas = $this->input->get('kode_fasilitas');
        $data['title'] = 'Manajemen Fasilitas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['fasilitas'] = $this->fasilitas->getKamarByKode($kode_fasilitas);

        $this->form_validation->set_rules('nama', 'Nama Fasilitas', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('penyedia', 'Penyedia', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('fasilitas/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->fasilitas->editDataFasilitas();
            $this->session->set_flashdata('message', 'Edit fasilitas Success!');
            redirect('fasilitas');
        }
    }

    public function hapus()
    {
        $kode_fasilitas = $this->input->get('kode_fasilitas');
        $this->fasilitas->hapus($kode_fasilitas);
        $this->session->set_flashdata('message', 'Delete fasilitas Success!');
        redirect('fasilitas');
    }
}
