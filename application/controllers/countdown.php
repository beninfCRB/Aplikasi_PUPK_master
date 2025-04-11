<?php
defined('BASEPATH') or exit('No direct script access allowed');

class countdown extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_token');
        $this->load->model('Model_ip');
        $this->load->model('Model_soal');
    }

    public function index()
    {
        $this->load->view('countdown/countdown');
    }
    public function match()
    {
        $data['token'] = $this->Model_token->getAllAktif();
        $data['ip'] = $this->Model_ip->descLastIp();

        $this->load->view('countdown/match',$data);
    }
}
