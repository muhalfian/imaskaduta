<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Startpage_model extends CI_Model
{
    var $table = 'data_alumni';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function register($data)
    {
        var_dump($data);

        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function autoComplete($keyword){

        $this->db->select('Nama_PT')->from('universitas');
        $this->db->like('Nama_PT',$keyword,'after');
        $query = $this->db->get();

        return $query->result();
    }
}