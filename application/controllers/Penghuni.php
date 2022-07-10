<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghuni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Penghuni_model', 'penghuni');
        $this->load->model('Kamar_model', 'kamar');
    }

    // Penghuni Baru

    public function index()
    {
        $data['title'] = 'Manajemen Penghuni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penghuni'] = $this->penghuni->getPenghuniByRole();

        // $this->form_validation->set_rules('no_kamar', 'Nomor Kamar', 'required|trim|is_unique[kamar.no_kamar]', ['is_unique' => 'Nomor kamar telah dipakai']);
        // $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required|trim');

        // if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penghuni/index', $data);
        $this->load->view('templates/footer');
        // } else {
        //     $this->kamar->tambahDataKamar();
        //     $this->session->set_flashdata('message', 'Data Kamar Berhasil ditambahkan');
        //     redirect('kamar');
        // }
    }

    public function editPenghuni($id)
    {
        $data['title'] = 'Manajemen Penghuni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['penghuni'] = $this->penghuni->getPenghuniById($id);

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim');
        $this->form_validation->set_rules('universitas', 'Universitas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penghuni/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->penghuni->editDataPenghuni();
            $this->penghuni->editDataPenghuniKamar();
            $this->session->set_flashdata('message', 'Data has been update');
            redirect('penghuni');
        }
    }

    public function hapusPenghuni($id)
    {
        $data['user'] = $this->penghuni->getPenghuniById($id);
        $old_img = $data['user']['image'];

        $this->penghuni->hapusDataPenghuni($id);
        $this->session->set_flashdata('message', 'Delete Penghuni Success!');
        if ($old_img != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_img);
            redirect('penghuni');
        } else {
            redirect('penghuni');
        }
    }

    public function active($id)
    {
        $this->penghuni->updateStatusActive($id);
        $this->session->set_flashdata('message', 'Akun Active');
        redirect('penghuni');
    }

    public function nonActive($id)
    {
        $this->penghuni->updateStatusNonActive($id);
        $this->session->set_flashdata('message', 'Akun NonActive');
        redirect('penghuni');
    }

    public function addKontrak()
    {
        $this->penghuni->updateKontrak();
        $this->session->set_flashdata('message', 'Kontrak add');
        redirect('penghuni');
    }

    public function hapusKontrak($id)
    {
        $this->penghuni->hapusKontrak($id);
        $this->session->set_flashdata('message', 'Kontrak dihapus');
        redirect('penghuni');
    }

    public function aturUlang()
    {
        $this->penghuni->aturUlangsemester();
        $this->session->set_flashdata('message', 'Data semester diatur ulang');
        redirect('penghuni');
    }

    // Penghuni Kamar

    public function penghuniKamar()
    {
        $data['title'] = 'Manajemen Penghuni';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->penghuni->getPenghuniByMk();
        $data['penghuni'] = $this->penghuni->getPenghuniKamarAll();
        $data['kamar'] = $this->kamar->getKamarTidakKosong();
        $this->form_validation->set_rules('id', 'Email', 'required|trim|is_unique[penghuni_kamar.penghuni]', ['is_unique' => 'Penghuni ini telah memiliki kamar!']);
        $this->form_validation->set_rules('no_kamar', 'Kamar', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penghuni/penghuni-kamar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->penghuni->tambahDataPenghuniKamar();
            $this->kamar->updateKamarKurang();
            $this->session->set_flashdata('message', 'Data Penghuni Kamar Berhasil ditambahkan');
            redirect('penghuni/penghunikamar');
        }
    }

    public function hapusPenghuniKamar($id, $kamar)
    {
        $this->penghuni->hapusDataPenghuniKamar($id);
        $this->kamar->updateKamarTambah($kamar);
        $this->session->set_flashdata('message', 'Data Penghuni Kamar Berhasil dihapus');
        redirect('penghuni/penghunikamar');
    }

    // public function tambah()
    // {

    //     $this->penghuni->tambahDatapenghuni();
    //     $this->session->set_flashdata('message', 'Data Penghuni Kamar Berhasil ditambahkan');
    //     redirect('penghuni/penghunikamar');
    // }

    //AJAX
    public function getPenghuniAjax()
    {
        $email = $this->input->post('email');
        $data = $this->penghuni->getUserByEmailAjax($email);
        echo json_encode($data);
    }


    public function getKamarAjaxNoKamar()
    {
        $id = $this->input->post('no_kamar');
        $data = $this->penghuni->getNoKamarByIdAjax($id);
        echo json_encode($data);
    }
}
