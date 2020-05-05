<?php

class Home extends CI_controller
{
    public function index()
    {
        $data['icon'] = 'fa fa-home';
        $data['judul'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
