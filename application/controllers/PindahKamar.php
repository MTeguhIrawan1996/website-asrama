<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PindahKamar extends CI_Controller
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
        $data['title'] = 'Pindah Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penghunikamar'] = $this->penghuni->getDataPenghuniKamarByEmail();
        $data['kamar'] = $this->kamar->getKamarTidakKosong();

        $this->form_validation->set_rules('id', 'ID', 'required|trim|is_unique[pindah_kamar.penghuni]', ['is_unique' => 'Anda sudah pernah mengajukan pindah kamar, harap hubungi pengurus asrama jika ingin mengajukan pindah kamar lagi']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('alasan', 'Alasan', 'required|trim');
        $this->form_validation->set_rules('kamar_sekarang', 'Kamar Sekarang', 'required|trim|differs[no_kamar]', ['differs' => 'Kamar tujuan tidak boleh sama dengan kamar sekarang']);
        $this->form_validation->set_rules('no_kamar', 'Kamar Tujuan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pindahkamar/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->pindah->tambahDataPindahKamar();
            $this->session->set_flashdata('message', 'Data pindah kamar telah dikirim harap tunggu verifikasi');
            redirect('pindahkamar/datapengajuanpindahkamar');
        }
    }

    public function dataPengajuanPindahKamar()
    {
        $data['title'] = 'Pindah Kamar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pindahkamar'] = $this->pindah->getDataPindahKamarByEmail();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pindahkamar/data-pengajuan-pindah-kamar', $data);
        $this->load->view('templates/footer');
    }

    public function batalPindahKamar($id)
    {
        $this->pindah->batalDataPindah($id);
        $this->session->set_flashdata('message', 'Pindah kamar dihapus!');
        redirect('pindahkamar/datapengajuanpindahkamar');
    }


    //ajax

    public function getKamarAjaxNoKamar()
    {
        $id = $this->input->post('no_kamar');
        $data = $this->pindah->getNoKamarByIdAjax($id);
        echo json_encode($data);
    }
}
