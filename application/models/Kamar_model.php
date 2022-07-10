<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar_model extends CI_model
{
    public function getKamarAll()
    {
        return $this->db->get_where('kamar')->result_array();
    }

    public function getKamarById($id)
    {
        $data = [
            'id' => $id
        ];
        return $this->db->get_where('kamar', $data)->row_array();
    }

    public function getKamarTidakKosong()
    {
        $query = "SELECT `kamar`.*
                    FROM `kamar`
                     WHERE `kamar`.`kapasitas` != 0";
        return $this->db->query($query)->result_array();
    }

    public function updateKamarKurang()
    {
        $id = $this->input->post('id_kamar');
        $query = "UPDATE kamar SET kapasitas=kapasitas-1 WHERE id = $id";
        $this->db->query($query);
    }

    public function updateKamarKurang1($kamar_baru)
    {
        $query = "UPDATE kamar SET kapasitas=kapasitas-1 WHERE id = $kamar_baru";
        $this->db->query($query);
    }

    public function updateKamarTambah($kamar)
    {
        $query = "UPDATE kamar SET kapasitas=kapasitas+1 WHERE id = $kamar";
        $this->db->query($query);
    }

    public function updateKamarTambah1($kamar_sekarang)
    {
        $query = "UPDATE kamar SET kapasitas=kapasitas+1 WHERE id = $kamar_sekarang";
        $this->db->query($query);
    }


    public function tambahDataKamar()
    {
        $data = [
            'no_kamar' => htmlspecialchars($this->input->post('no_kamar')),
            'kapasitas' => htmlspecialchars($this->input->post('kapasitas'))
        ];
        $this->db->insert('kamar', $data);
    }

    public function editDataKamar()
    {
        $data = [
            'no_kamar' => htmlspecialchars($this->input->post('no_kamar', true)),
            'kapasitas' => htmlspecialchars($this->input->post('kapasitas', true))
        ];
        $this->db->where(['id' => $this->input->post('id')]);
        $this->db->update('kamar', $data);
    }

    public function hapusDataKamar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kamar');
    }
}
