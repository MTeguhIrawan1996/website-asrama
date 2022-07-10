<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Laporan_model', 'laporan');
    }

    public function penghuniBaru()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Laporan Penghuni Perkuliahan Baru';
        $data['penghuni'] = $this->laporan->getPenghuniBaru();

        $html = $this->load->view('laporan/penghuni-baru', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-Penghuni.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function penghuniAkhir()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Laporan Penghuni Perkuliahan Akhir';
        $data['penghuni'] = $this->laporan->getPenghuniAkhir();

        $html = $this->load->view('laporan/penghuni-akhir', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-Penghuni.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function pindahKamar($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Laporan Pengajuan Pindah Kamar';
        $data['penghuni'] = $this->laporan->getPindahKamar($id);

        $html = $this->load->view('laporan/pindah-kamar', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-PindahKamar.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function kamarTersedia()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Laporan Kamar Tersedia';
        $data['kamar'] = $this->laporan->getKamarKosong();

        $html = $this->load->view('laporan/kamar-kosong', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-KamarKosong.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // kamar penuh
    public function kamarPenuh()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Laporan Kamar Penuh';
        $data['kamar'] = $this->laporan->getKamarPenuh();

        $html = $this->load->view('laporan/kamar-penuh', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-KamarPenuh.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // Laporan dana masuk
    public function danaMasuk()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/periode-dana-masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_prosesDanaMasuk();
        }
    }

    private function _prosesDanaMasuk()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan Kas Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dMasuk'] = $this->laporan->getDanaMasuk($tgl_awal, $tgl_akhir);
        $data['total'] = $this->laporan->getJumlahDanaMasukPer($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $html = $this->load->view('laporan/dana-masuk', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-DanaMasuk.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // laporan dana keluar
    public function danaKeluar()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/periode-dana-keluar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_prosesDanaKeluar();
        }
    }

    private function _prosesDanaKeluar()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan Kas Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dKeluar'] = $this->laporan->getDanaKeluar($tgl_awal, $tgl_akhir);
        $data['total'] = $this->laporan->getJumlahDanaKeluarPer($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $html = $this->load->view('laporan/dana-keluar', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-DanaKeluar.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function rekapDana()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/periode-rekapitulasi-dana', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_prosesRekapitulasiDana();
        }
    }

    private function _prosesRekapitulasiDana()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan Rekap Kas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['rekap'] = $this->laporan->getRekapDana($tgl_awal, $tgl_akhir);
        $data['total'] = $this->laporan->getJumlahDanaMasukPer($tgl_awal, $tgl_akhir);
        $data['totalk'] = $this->laporan->getJumlahDanaKeluarPer($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $html = $this->load->view('laporan/rekap-dana', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-RekapDana.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // fasilitas
    public function fasilitasrusak()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Laporan';
        $data['fasilitas'] = $this->laporan->getFasilitasRusak();

        $html = $this->load->view('laporan/fasilitas-rusak', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-FasilitasRusak.pdf', \Mpdf\Output\Destination::INLINE);
    }

    // pembayaran
    public function pembayaran()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'required|trim');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/periode-pembayaran', $data);
            $this->load->view('templates/footer');
        } else {
            $this->_prosesPembayaran();
        }
    }

    private function _prosesPembayaran()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $data['title'] = 'Laporan Pembayaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pembayaran'] = $this->laporan->getPembayaran($tgl_awal, $tgl_akhir);
        $data['tglawal'] = $this->input->post('tgl_awal');
        $data['tglakhir'] = $this->input->post('tgl_akhir');

        $html = $this->load->view('laporan/pembayaran', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Laporan-Pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function cetakPembayaran()
    {

        $kode_bayar = $this->input->get('kode_bayar');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Lembar Bukti Pembayaran Asrama';
        $data['pembayaran'] = $this->laporan->getCetakPembayaran($kode_bayar);

        $html = $this->load->view('laporan/cetak-pembayaran', $data, true);


        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('Bukti-Pembayaran.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
