<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pembayaran_model', 'pembayaran');
        $this->load->model('Penghuni_model', 'penghuni');
        $this->load->model('Kas_model', 'kas');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran Asrama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembayaran'] = $this->pembayaran->getPembayaranAll();
        $data['kode_bayar'] = $this->pembayaran->getKodeAcak();
        $data['penghunik'] = $this->penghuni->getPenghuniKamarAll();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('name', 'nama', 'required|trim');
        $this->form_validation->set_rules('no_kamar', 'No Kamar', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pembayaran/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->pembayaran->tambahDataPembayaran();
            $this->session->set_flashdata('message', 'Data Pembayaran Berhasil ditambahkan');
            redirect('pembayaran');
        }
    }

    public function addTglJthTmp()
    {
        $this->pembayaran->updateTglJthTmp();
        $this->session->set_flashdata('message', 'Tanggal jatuh tempo add');
        redirect('pembayaran');
    }

    public function detailBayar()
    {
        $data['title'] = 'Pembayaran Asrama';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kode'] = $this->kas->getKodeAcak();

        $kode_bayar = $this->input->get('kode_bayar');
        $tgl_jth_tmp = $this->input->get('tgl_jth_tmp');
        $data['total'] = $this->pembayaran->getDetailPembayaran($kode_bayar, $tgl_jth_tmp);
        $data['detailbiaya'] = $this->pembayaran->getDetailBiaya($kode_bayar);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pembayaran/detail-bayar', $data);
        $this->load->view('templates/footer');
    }

    public function lunas()
    {
        $this->pembayaran->updatePembayaranLunas();
        $this->pembayaran->tambahKasMasuk();
        $this->session->set_flashdata('message', 'Pembayaran berhasil dilunasi!');
        redirect('pembayaran');
    }

    public function hapusPembayaran()
    {
        $kode_bayar = $this->input->get('kode_bayar');
        $this->pembayaran->hapusDataPembayaran($kode_bayar);
        $this->session->set_flashdata('message', 'Delete pembayaran success!');
        redirect('pembayaran');
    }

    // ajax
    public function getPenghuniKamarAjax()
    {
        $email = $this->input->post('email');
        $data = $this->penghuni->getPenghuniKamarByEmailAjax($email);
        echo json_encode($data);
    }
}
