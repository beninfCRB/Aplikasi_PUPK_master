<?php
defined('BASEPATH') or exit('No direct script access allowed');

class myprofile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_myprofile');
    }

    public function index()
    {
        if ($this->session->userdata('username') == false) {
            redirect('login');
        }

        $data['title'] = 'Myprofile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $pwd_old = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('myprofile', $data);
            $this->load->view('main/footer');
        } else {
            $pwd = $this->input->post('password-old');
            if (password_verify($pwd, $pwd_old['password'])) {
                $this->model_myprofile->ubah();
                $this->session->set_flashdata('flash', 'Diubah');
                redirect('myprofile/index');
            } else {
                $this->session->set_flashdata('flash', 'Gagal');
                redirect('myprofile/index');
            }
        }
    }
}
