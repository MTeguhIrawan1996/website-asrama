<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PindahKamarAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Penghuni_model', 'penghuni');
        $this->load->model('PindahKamar_model', 'pindah');
        $this->load->model('Kamar_model', 'kamar');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Penghuni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pindahkamar'] = $this->pindah->getDataPindahKamarAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pindahkamaradmin/index', $data);
        $this->load->view('templates/footer');
    }

    public function verifikasi($id, $penghuni, $kamar_sekarang, $kamar_baru, $no_kamar_baru)
    {
        $this->pindah->updateStatusVerifikasi($id);
        $this->kamar->updateKamarTambah1($kamar_sekarang);
        $this->kamar->updateKamarKurang1($kamar_baru);
        $this->penghuni->updatePenghuniKamar($penghuni, $kamar_baru, $no_kamar_baru);
        $this->session->set_flashdata('message', 'Verifikasi success');
        redirect('pindahkamaradmin');
    }

    public function hapus($id)
    {
        $this->pindah->batalDataPindah($id);
        $this->session->set_flashdata('message', 'Data pindah kamar berhasil dihapus');
        redirect('pindahkamaradmin');
    }
}
