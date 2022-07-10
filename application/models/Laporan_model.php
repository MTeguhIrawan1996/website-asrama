<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_model
{
    // laporan Penghuni
    public function getPenghuniBaru()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);
        $this->db->where('masa_kontrak !=', null);
        $this->db->where('semester >=', 1);
        $this->db->where('semester <=', 6);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPenghuniAkhir()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', 2);
        $this->db->where('masa_kontrak !=', null);
        $this->db->where('semester >=', 7);
        $this->db->where('semester <=', 100);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPindahKamar($id)
    {
        $this->db->select('pindah_kamar.id,name_penghuni,email_pindah,no_kamar_sekarang,no_kamar_baru,tgl_pindah,status,alasan');
        $this->db->from('pindah_kamar');
        $this->db->join('penghuni_kamar', 'pindah_kamar.penghuni=penghuni_kamar.id', 'left');
        $this->db->join('kamar', 'pindah_kamar.kamar_baru=kamar.id', 'left');
        $this->db->where('pindah_kamar.id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function getKamarKosong()
    {
        $this->db->where('kapasitas !=', 0);
        $result = $this->db->get('kamar');
        return $result->result_array();
    }

    public function getKamarPenuh()
    {
        $this->db->where('kapasitas', 0);
        $result = $this->db->get('kamar');
        return $result->result_array();
    }

    public function getDanaMasuk($tgl_awal, $tgl_akhir)
    {
        $this->db->where('jenis', 'masuk');
        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);
        $result = $this->db->get('kas');
        return $result->result_array();
    }

    public function getJumlahDanaMasukPer($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(jumlah) as total');
        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);

        return $this->db->get('kas')->row()->total;
    }

    public function getDanaKeluar($tgl_awal, $tgl_akhir)
    {
        $this->db->where('jenis', 'keluar');
        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);
        $result = $this->db->get('kas');
        return $result->result_array();
    }

    public function getJumlahDanaKeluarPer($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(keluar) as total');
        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);

        return $this->db->get('kas')->row()->total;
    }

    public function getRekapDana($tgl_awal, $tgl_akhir)
    {

        $this->db->where('tgl >=', $tgl_awal);
        $this->db->where('tgl <=', $tgl_akhir);
        $result = $this->db->get('kas');
        return $result->result_array();
    }

    public function getFasilitasRusak()
    {
        $this->db->where('kondisi', 'TLP');
        $result = $this->db->get('fasilitas');
        return $result->result_array();
    }

    public function getPembayaran($tgl_awal, $tgl_akhir)
    {
        $this->db->select('pembayaran.kode_bayar,pembayaran.tgl_masuk,penghuni_kamar,name_penghuni,email_penghuni_kamar,no_kamar_penghuni,tgl_jth_tmp,status,tgl_input_data,total,ket,denda,tgl_bayar');
        $this->db->from('pembayaran');
        $this->db->join('penghuni_kamar', 'pembayaran.penghuni_kamar=penghuni_kamar.id', 'left');
        $this->db->where('status', 1);
        $this->db->where('tgl_bayar >=', $tgl_awal);
        $this->db->where('tgl_bayar <=', $tgl_akhir);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCetakPembayaran($kode_bayar)
    {
        $this->db->select('pembayaran.kode_bayar,pembayaran.tgl_masuk,penghuni_kamar,name_penghuni,email_penghuni_kamar,no_kamar_penghuni,tgl_jth_tmp,status,tgl_input_data,total,ket,denda,tgl_bayar');
        $this->db->from('pembayaran');
        $this->db->join('penghuni_kamar', 'pembayaran.penghuni_kamar=penghuni_kamar.id', 'left');
        $this->db->where('status', 1);
        $this->db->where('kode_bayar', $kode_bayar);
        $query = $this->db->get();
        return $query->row_array();
    }
}
