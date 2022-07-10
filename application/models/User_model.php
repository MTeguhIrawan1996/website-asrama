<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{

    public function getUserByEmail()
    {
        $data = [
            'email' => $this->session->userdata('email')
        ];
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id=user_role.id', 'left');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function editDataUser()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'semester' => htmlspecialchars($this->input->post('semester', true)),
            'universitas' => htmlspecialchars($this->input->post('universitas', true))
        ];
        $this->db->where(['email' => $this->input->post('email')]);
        $this->db->update('user', $data);
    }
}
