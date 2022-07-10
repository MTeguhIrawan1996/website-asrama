<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PindahKamar_model extends CI_model
{

    public function getDataPindahKamarAll()
    {

        $this->db->select('pindah_kamar.id,pindah_kamar.penghuni,name_penghuni,email_pindah,kamar_sekarang,no_kamar_sekarang,kamar_baru,no_kamar_baru,tgl_pindah,status,email_pindah');
        $this->db->from('pindah_kamar');
        $this->db->join('penghuni_kamar', 'pindah_kamar.penghuni=penghuni_kamar.id', 'left');
        $this->db->join('kamar', 'pindah_kamar.kamar_baru=kamar.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJumlahPindahKamar()
    {
        $this->db->select('COUNT(*)as total');
        $this->db->where('status', 0);
        return $this->db->get('pindah_kamar')->row()->total;
    }

    public function tambahDatapindahKamar()
    {
        $data = [
            'penghuni' => htmlspecialchars($this->input->post('id')),
            'email_pindah' => htmlspecialchars($this->input->post('email')),
            'kamar_sekarang' => htmlspecialchars($this->input->post('id_kamar_sekarang')),
            'no_kamar_sekarang' => htmlspecialchars($this->input->post('kamar_sekarang')),
            'kamar_baru' => htmlspecialchars($this->input->post('id_kamar')),
            'no_kamar_baru' => htmlspecialchars($this->input->post('no_kamar')),
            'tgl_pindah' => time(),
            'alasan' => htmlspecialchars($this->input->post('alasan')),
            'status' => 0
        ];
        $this->db->insert('pindah_kamar', $data);
    }

    public function getDataPindahKamarByEmail()
    {
        $data = [
            'email_pindah' => $this->session->userdata('email')
        ];
        $this->db->select('pindah_kamar.id,name_penghuni,email_pindah,no_kamar_sekarang,no_kamar_baru,tgl_pindah,status');
        $this->db->from('pindah_kamar');
        $this->db->join('penghuni_kamar', 'pindah_kamar.penghuni=penghuni_kamar.id', 'left');
        $this->db->join('kamar', 'pindah_kamar.kamar_baru=kamar.id', 'left');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function batalDataPindah($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pindah_kamar');
    }

    public function updateStatusVerifikasi($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('pindah_kamar');
    }

    // ajax
    public function getNoKamarByIdAjax($id)
    {
        $data = [
            'no_kamar' => $id
        ];
        $hsl = $this->db->get_where('kamar', $data);
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $tampil) {
                $hasil = array(
                    'id' => $tampil->id,
                    'no_kamar' => $tampil->no_kamar,
                    'kapasitas' => $tampil->kapasitas
                );
            }
        }
        return $hasil;
    }
}
