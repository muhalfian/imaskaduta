<?php

class Coba extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('data_alumni_model', 'alumni');
    }

    function index()
    {
        $this->load->helper('form');
        $this->load->view('coba');
    }
}