<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas_model extends CI_model
{
    public function getFasilitasAll()
    {
        return $this->db->get_where('fasilitas')->result_array();
    }

    public function getKamarByKode($kode_fasilitas)
    {
        $data = [
            'kode_fasilitas' => $kode_fasilitas
        ];
        return $this->db->get_where('fasilitas', $data)->row_array();
    }

    public function tambahDataFasilitas()
    {
        $data = [
            'kode_fasilitas' => htmlspecialchars($this->input->post('kode_fasilitas')),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'penyedia' => htmlspecialchars($this->input->post('penyedia')),
            'kondisi' => htmlspecialchars($this->input->post('kondisi')),
            'tgl_masuk' => htmlspecialchars($this->input->post('tgl_masuk'))

        ];
        $this->db->insert('fasilitas', $data);
    }

    public function editDataFasilitas()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'lokasi' => htmlspecialchars($this->input->post('lokasi')),
            'penyedia' => htmlspecialchars($this->input->post('penyedia')),
            'kondisi' => htmlspecialchars($this->input->post('kondisi')),
            'tgl_masuk' => htmlspecialchars($this->input->post('tgl_masuk'))
        ];
        $this->db->where(['kode_fasilitas' => $this->input->post('kode_fasilitas')]);
        $this->db->update('fasilitas', $data);
    }

    public function hapus($kode_fasilitas)
    {
        $this->db->where('kode_fasilitas', $kode_fasilitas);
        $this->db->delete('fasilitas');
    }
}
