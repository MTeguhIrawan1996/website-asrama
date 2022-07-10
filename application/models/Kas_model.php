<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_model extends CI_model
{
    public function getKasAll()
    {
        return $this->db->get_where('kas')->result_array();
    }

    public function getKasMasukAll()
    {
        $data = [
            'jenis' => 'masuk'
        ];
        return $this->db->get_where('kas', $data)->result_array();
    }

    public function getKasKeluarAll()
    {
        $data = [
            'jenis' => 'keluar'
        ];
        return $this->db->get_where('kas', $data)->result_array();
    }

    public function getKasMasukByKode($kode)
    {
        $data = [
            'kode' => $kode
        ];
        return $this->db->get_where('kas', $data)->row_array();
    }

    public function getKasKeluarByKode($kode)
    {
        $data = [
            'kode' => $kode
        ];
        return $this->db->get_where('kas', $data)->row_array();
    }

    public function getJumlahKasMasukAll()
    {
        $this->db->select('SUM(jumlah) as total');
        return $this->db->get('kas')->row()->total;
    }

    public function getJumlahKasKeluarAll()
    {
        $this->db->select('SUM(keluar) as total');
        return $this->db->get('kas')->row()->total;
    }


    public function getKodeAcak()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode,4)) AS kd_max FROM kas WHERE DATE (tgl_input_data)=CURDATE() ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'M' . date('dmy') . $kd . '';
    }

    public function getKodeAcakKeluar()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode,4)) AS kd_max FROM kas WHERE DATE (tgl_input_data)=CURDATE() ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'K' . date('dmy') . $kd . '';
    }


    public function tambahKasMasuk()
    {
        $data = [
            'kode' => htmlspecialchars($this->input->post('kode')),
            'keterangan' => htmlspecialchars($this->input->post('ket')),
            'tgl' => htmlspecialchars($this->input->post('tgl')),
            'jumlah' => htmlspecialchars($this->input->post('jumlah')),
            'jenis' => masuk,
            'tgl_input_data' => date('Y-m-d')
        ];
        $this->db->insert('kas', $data);
    }

    public function tambahKasKeluar()
    {
        $data = [
            'kode' => htmlspecialchars($this->input->post('kode')),
            'keterangan' => htmlspecialchars($this->input->post('ket')),
            'tgl' => htmlspecialchars($this->input->post('tgl')),
            'jenis' => keluar,
            'keluar' => htmlspecialchars($this->input->post('jumlah')),
            'tgl_input_data' => date('Y-m-d')
        ];
        $this->db->insert('kas', $data);
    }

    public function hapusDataKasMasuk($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('kas');
    }

    public function hapusDataKasKeluar($kode)
    {
        $this->db->where('kode', $kode);
        $this->db->delete('kas');
    }

    public function editDataKasMasuk()
    {
        $data = [
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'tgl' => htmlspecialchars($this->input->post('tgl', true)),
            'jumlah' => htmlspecialchars($this->input->post('jumlah', true))
        ];
        $this->db->where(['kode' => $this->input->post('kode')]);
        $this->db->update('kas', $data);
    }

    public function editDataKasKeluar()
    {
        $data = [
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'tgl' => htmlspecialchars($this->input->post('tgl', true)),
            'keluar' => htmlspecialchars($this->input->post('jumlah', true))
        ];
        $this->db->where(['kode' => $this->input->post('kode')]);
        $this->db->update('kas', $data);
    }
}
