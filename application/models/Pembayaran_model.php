<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_model
{
    public function getPembayaranAll()
    {
        $this->db->select('pembayaran.kode_bayar,pembayaran.tgl_masuk,penghuni_kamar,name_penghuni,email_penghuni_kamar,no_kamar_penghuni,tgl_jth_tmp,status,tgl_input_data,total,ket,denda,tgl_bayar');
        $this->db->from('pembayaran');
        $this->db->join('penghuni_kamar', 'pembayaran.penghuni_kamar=penghuni_kamar.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBiayaDendaAll()
    {
        return $this->db->get_where('biaya')->result_array();
    }

    public function getPembayaranUser()
    {
        $data = [
            'email_penghuni_kamar' => $this->session->userdata('email'),
            'status' => 1
        ];
        $this->db->select('pembayaran.kode_bayar,tgl_jth_tmp,status,total,denda,tgl_bayar');
        $this->db->from('pembayaran');
        $this->db->join('penghuni_kamar', 'pembayaran.penghuni_kamar=penghuni_kamar.id', 'left');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKodeAcak()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode_bayar,4)) AS kd_max FROM pembayaran WHERE DATE (tgl_input_data)=CURDATE() ");
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
        return 'KP' . date('dmy') . $kd . '';
    }

    public function tambahDataPembayaran()
    {
        $data = [
            'kode_bayar' => htmlspecialchars($this->input->post('kode_bayar')),
            'penghuni_kamar' => htmlspecialchars($this->input->post('penghuni_kamar')),
            'email_penghuni_kamar' => htmlspecialchars($this->input->post('email')),
            'tgl_masuk' => htmlspecialchars($this->input->post('date_created')),
            'status' => 0,
            'tgl_input_data' => date('Y-m-d')
        ];
        $this->db->insert('pembayaran', $data);
    }

    public function tambahDataBiayaDenda()
    {

        $this->db->set('denda', htmlspecialchars($this->input->post('denda')));
        $this->db->set('_biaya', htmlspecialchars($this->input->post('_biaya')));
        $this->db->update('biaya');
    }

    public function updateTglJthTmp()
    {
        $data = [
            'tgl_jth_tmp' => htmlspecialchars($this->input->post('tgljthtmp', true))
        ];

        $this->db->where(['kode_bayar' => $this->input->post('kode_bayar')]);
        $this->db->update('pembayaran', $data);
    }

    public function getDetailPembayaran($kode_bayar, $tgl_jth_tmp)
    {
        // Mengambil biaya di tabel biaya
        $query = $this->db->get_where('biaya')->result();
        foreach ($query as $row11) {
            $d = $row11->denda;
            $b = $row11->_biaya;

            // menghitung denda jika tgl bayar - tgl jth tempo hasilnya lebih besar dari nol maka denda
            $int_tgl = strtotime($tgl_jth_tmp);
            $tgl_bayar = date('Y-m-d');
            $int_bayar = strtotime($tgl_bayar);
            $sls = $int_bayar - $int_tgl;
            if ($sls > 0) {
                // denda
                $total = $d + $b;
                $denda = $d;
            } else {
                // tidak denda
                $total = 0 + $b;
                $denda = 0;
            }
            $this->db->set('ket', 'Biaya Retribusi');
            $this->db->set('tgl_bayar', date('Y-m-d'));
            $this->db->set('denda', $denda);
            $this->db->set('total', $total);
            $this->db->where('kode_bayar', $kode_bayar);
            $this->db->update('pembayaran');
            return $total;
        }
    }

    public function getDetailBiaya($kode_bayar)
    {
        $data = [
            'kode_bayar' => $kode_bayar
        ];
        $this->db->select('pembayaran.kode_bayar,name_penghuni,email_penghuni_kamar,tgl_jth_tmp,tgl_bayar,denda,ket');
        $this->db->from('pembayaran');
        $this->db->join('penghuni_kamar', 'pembayaran.penghuni_kamar=penghuni_kamar.id', 'left');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function updatePembayaranLunas()
    {
        $this->db->set('status', 1);
        $this->db->where(['kode_bayar' => $this->input->post('kode_bayar')]);
        $this->db->update('pembayaran');
    }

    public function tambahKasMasuk()
    {
        $data = [
            'kode' => htmlspecialchars($this->input->post('kode_masuk')),
            'keterangan' => htmlspecialchars($this->input->post('ket')),
            'tgl' => date('Y-m-d'),
            'jumlah' => htmlspecialchars($this->input->post('jmlh')),
            'jenis' => masuk,
            'tgl_input_data' => date('Y-m-d')

        ];
        $this->db->insert('kas', $data);
    }

    public function hapusDataPembayaran($kode_bayar)
    {
        $this->db->where('kode_bayar', $kode_bayar);
        $this->db->delete('pembayaran');
    }

    public function hapusDataBiayaDenda()
    {
        $this->db->set('denda', 0);
        $this->db->set('_biaya', 0);
        $this->db->update('biaya');
    }
}
