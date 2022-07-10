<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghuni_model extends CI_model
{
    public function getPenghuniAll()
    {
        return $this->db->get_where('user')->result_array();
    }

    // penghuni belum diverifikasi
    public function getJumlahPenghuniV()
    {
        $this->db->select('COUNT(*)as total');
        $this->db->where('role_id', 2);
        $this->db->where('masa_kontrak', null);
        return $this->db->get('user')->row()->total;
    }

    public function getJumlahPenghuniD()
    {
        $this->db->select('COUNT(*)as total');
        $this->db->where('role_id', 2);
        $this->db->where('semester', null);
        return $this->db->get('user')->row()->total;
    }

    public function getPenghuniByRole()
    {
        $role_id = 2;
        $query = "SELECT `user`.*,`role`
                    FROM `user` LEFT JOIN `user_role`ON `user`.`role_id` = `user_role`.`id`
                     WHERE `user`.`role_id` = $role_id";
        return $this->db->query($query)->result_array();
    }

    public function getPenghuniByMk()
    {
        $this->db->select('user.*,role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id=user_role.id', 'left');
        $this->db->where('user.role_id', 2);
        $this->db->where('masa_kontrak !=', null);
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenghuniById($id)
    {
        $query = "SELECT `user`.*,`role`
                    FROM `user` LEFT JOIN `user_role`ON `user`.`role_id` = `user_role`.`id`
                     WHERE `user`.`id` = $id";
        return $this->db->query($query)->row_array();
    }


    public function editDataPenghuni()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'semester' => htmlspecialchars($this->input->post('semester', true)),
            'universitas' => htmlspecialchars($this->input->post('universitas', true)),
            'masa_kontrak' => htmlspecialchars($this->input->post('kontrak', true))
        ];

        $this->db->where(['id' => $this->input->post('id')]);
        $this->db->update('user', $data);
    }

    public function editDataPenghuniKamar()
    {
        $data = [
            'name_penghuni' => htmlspecialchars($this->input->post('name', true))

        ];

        $this->db->where(['penghuni' => $this->input->post('id')]);
        $this->db->update('penghuni_kamar', $data);
    }


    public function hapusDataPenghuni($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function updateStatusActive($id)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function updateStatusNonActive($id)
    {
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function updateKontrak()
    {
        $data = [
            'masa_kontrak' => htmlspecialchars($this->input->post('kontrak', true))
        ];

        $this->db->where(['id' => $this->input->post('id')]);
        $this->db->update('user', $data);
    }

    public function hapusKontrak($id)
    {
        $this->db->set('masa_kontrak', null);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function aturUlangsemester()
    {
        $this->db->set('semester', null);
        $this->db->update('user');
    }

    // Penghuni Kamar

    public function getPenghuniKamarAll()
    {
        $query = "SELECT `penghuni_kamar`.*,`name`,`email`,`no_kamar`,`kapasitas`
                    FROM `penghuni_kamar` LEFT JOIN `user`ON `penghuni_kamar`.`penghuni` = `user`.`id` LEFT JOIN `kamar`ON `penghuni_kamar`.`kamar` = `kamar`.`id`
                     ";
        return $this->db->query($query)->result_array();
    }

    public function getJumlahPenghuniKamar()
    {
        $this->db->select('COUNT(*)as total');
        return $this->db->get_where('penghuni_kamar')->row()->total;
    }

    public function getDataPenghuniKamarByEmail()
    {
        $data = [
            'email' => $this->session->userdata('email')
        ];
        $this->db->select('penghuni_kamar.id,name,email,no_kamar');
        $this->db->from('penghuni_kamar');
        $this->db->join('user', 'penghuni_kamar.penghuni=user.id', 'left');
        $this->db->join('kamar', 'penghuni_kamar.kamar=kamar.id', 'left');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambahDataPenghuniKamar()
    {
        $data = [
            'penghuni' => htmlspecialchars($this->input->post('id')),
            'name_penghuni' => htmlspecialchars($this->input->post('name')),
            'email_penghuni' => htmlspecialchars($this->input->post('email')),
            'kamar' => htmlspecialchars($this->input->post('id_kamar')),
            'no_kamar_penghuni' => htmlspecialchars($this->input->post('no_kamar')),
            'tgl_masuk' => htmlspecialchars($this->input->post('date_created'))
        ];
        $this->db->insert('penghuni_kamar', $data);
    }

    public function updatePenghuniKamar($penghuni, $kamar_baru, $no_kamar_baru)
    {
        $this->db->set('no_kamar_penghuni', $no_kamar_baru);
        $this->db->set('kamar', $kamar_baru);
        $this->db->where('id', $penghuni);
        $this->db->update('penghuni_kamar');
    }

    public function hapusDataPenghuniKamar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penghuni_kamar');
    }

    //AJAX
    public function getUserByEmailAjax($email)
    {

        $data = [
            'email' => $email
        ];
        $hsl = $this->db->get_where('user', $data);
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $tampil) {
                $hasil = array(
                    'id' => $tampil->id,
                    'name' => $tampil->name,
                    'email' => $tampil->email,
                    'semester' => $tampil->semester,
                    'universitas' => $tampil->universitas,
                    'date_created' => $tampil->date_created,
                );
            }
        }
        return $hasil;
    }

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

    public function getPenghuniKamarByEmailAjax($email)
    {
        $data = [
            'email_penghuni' => $email
        ];
        $hsl = $this->db->get_where('penghuni_kamar', $data);
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $tampil) {
                $hasil = array(
                    'id' => $tampil->id,
                    'name_penghuni' => $tampil->name_penghuni,
                    'no_kamar_penghuni' => $tampil->no_kamar_penghuni,
                    'tgl_masuk' => $tampil->tgl_masuk
                );
            }
        }
        return $hasil;
    }
}
