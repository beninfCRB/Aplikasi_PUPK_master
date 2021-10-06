<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_ip');
    }

    public function showdata_ip()
    {
        if ($this->session->userdata('username') == NULL) {
            redirect('login');
        }

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Ip Address';
        $data['bc'] = 'Ujian Praktikum';
        $data['ip'] = $this->model_ip->show_ip();

        $this->load->view('main/header', $data);
        $this->load->view('main/sidebar', $data);
        $this->load->view('main/topbar', $data);
        $this->load->view('ip/ip', $data);
        $this->load->view('main/footer');
    }

    public function store_ip()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Ip Address';
        $data['bc'] = 'Ujian Praktikum';
        $data['last'] = $this->model_ip->last_ip();

        $this->form_validation->set_rules('nama_ip', 'ip', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('ip/tambah', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_ip->storeip();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('ip/showdata_ip');
        }
    }

    public function update_ip($kode)
    {
        $id = decrypt_url($kode);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Ip Address';
        $data['bc'] = 'Ujian Praktikum';
        $data['ip'] = $this->model_ip->getipid($id);

        $this->form_validation->set_rules('nama_ip', 'ip', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('main/header', $data);
            $this->load->view('main/sidebar', $data);
            $this->load->view('main/topbar', $data);
            $this->load->view('ip/update', $data);
            $this->load->view('main/footer');
        } else {
            $this->model_ip->updateip($id);
            $this->session->set_flashdata('flash', 'dirubah');
            redirect('ip/showdata_ip');
        }
    }

    public function hapus_ip($kode)
    {
        $id = decrypt_url($kode);

        $this->db->delete('ip', ['id_ip' => $id]);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('ip/showdata_ip');
    }
}
