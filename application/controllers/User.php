<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
        $this->load->model('Penghuni_model', 'penghuni');
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->user->getUserByEmail();
        $data['penghunikamar'] = $this->penghuni->getDataPenghuniKamarByEmail();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    //     public function edit()
    //     {
    //         $data['title'] = 'Profile';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //         $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    //         $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
    //         $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
    //         $this->form_validation->set_rules('semester', 'Semester', 'required|trim|numeric');
    //         $this->form_validation->set_rules('universitas', 'Universitas', 'required|trim');

    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             $this->load->view('user/edit', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             //cek jika ada gambar yang diupload
    //             $upload_img = $_FILES['image']['name'];

    //             if ($upload_img) {
    //                 $config['allowed_types'] = 'gif|jpg|png';
    //                 $config['max_size']     = '2048';
    //                 $config['upload_path'] = './assets/img/profile/';


    //                 $this->load->library('upload', $config);

    //                 if ($this->upload->do_upload('image')) {

    //                     $old_img = $data['user']['image'];
    //                     if ($old_img != 'default.jpg') {
    //                         unlink(FCPATH . 'assets/img/profile/' . $old_img);
    //                     }

    //                     $new_img = $this->upload->data('file_name');
    //                     $this->db->set('image', $new_img);
    //                 } else {
    //                     $this->session->set_flashdata('error',  'Data gagal diedit file gambar tidak sesuai');
    //                     redirect('user');
    //                 }
    //             }

    //             $this->user->editDataUser();
    //             $this->penghuni->editDataPenghuniKamar();
    //             $this->session->set_flashdata('message', 'Your Profile has been update');
    //             redirect('user');
    //         }
    //     }

    //     public function changePassword()
    //     {
    //         $data['title'] = 'Profile';
    //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //         $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    //         $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    //         $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/sidebar', $data);
    //             $this->load->view('templates/topbar', $data);
    //             $this->load->view('user/changepassword', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             $current_password = $this->input->post('current_password');
    //             $new_password = $this->input->post('new_password1');
    //             if (!password_verify($current_password, $data['user']['password'])) {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Current password!</div>');
    //                 redirect('user/changepassword');
    //             } else {
    //                 if ($current_password == $new_password) {
    //                     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
    //                     redirect('user/changepassword');
    //                 } else {
    //                     //pasword oke
    //                     $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    //                     $this->db->set('password', $password_hash);
    //                     $this->db->where('email', $this->session->userdata('email'));
    //                     $this->db->update('user');

    //                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Change!</div>');
    //                     redirect('user/changepassword');
    //                 }
    //             }
    //         }
    //     }
}
