<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kas_model', 'kas');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas'] = $this->kas->getKasMasukAll();
        $data['jumlah'] = $this->kas->getJumlahKasMasukAll();
        $data['kode'] = $this->kas->getKodeAcak();

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kas->tambahKasMasuk();
            $this->session->set_flashdata('message', 'Data kas masuk berhasil ditambahkan');
            redirect('keuangan');
        }
    }

    public function editKasMasuk($kode)
    {
        $data['title'] = 'Manajemen Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas'] = $this->kas->getKasMasukByKode($kode);

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kas->editDataKasMasuk();
            $this->session->set_flashdata('message', 'Edit Kas Masuk Success!');
            redirect('keuangan');
        }
    }

    public function hapusKasMasuk($kode)
    {
        $this->kas->hapusDataKasMasuk($kode);
        $this->session->set_flashdata('message', 'Delete kas masuk success!');
        redirect('keuangan');
    }

    // Kas Keluar
    public function kasKeluar()
    {
        $data['title'] = 'Manajemen Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas'] = $this->kas->getKasKeluarAll();
        $data['jumlah'] = $this->kas->getJumlahKasKeluarAll();
        $data['kode'] = $this->kas->getKodeAcakKeluar();

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/kas-keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kas->tambahKasKeluar();
            $this->session->set_flashdata('message', 'Data kas keluar berhasil ditambahkan');
            redirect('keuangan/kaskeluar');
        }
    }

    public function editKasKeluar($kode)
    {
        $data['title'] = 'Manajemen Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas'] = $this->kas->getKasKeluarByKode($kode);

        $this->form_validation->set_rules('kode', 'Kode', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('tgl', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('keuangan/edit-kas-keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->kas->editDataKasKeluar();
            $this->session->set_flashdata('message', 'Edit Kas Keluar Success!');
            redirect('keuangan/kaskeluar');
        }
    }

    public function hapusKasKeluar($kode)
    {
        $this->kas->hapusDataKasKeluar($kode);
        $this->session->set_flashdata('message', 'Delete kas Keluar success!');
        redirect('keuangan/kaskeluar');
    }

    // rekapitulasi
    public function rekapitulasi()
    {
        $data['title'] = 'Manajemen Keuangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas'] = $this->kas->getKasAll();
        $data['jumlah'] = $this->kas->getJumlahKasMasukAll();
        $data['jumlahk'] = $this->kas->getJumlahKasKeluarAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('keuangan/rekapitulasi', $data);
        $this->load->view('templates/footer');
    }
}
