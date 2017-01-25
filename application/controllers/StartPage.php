<?php

class StartPage extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('startpage_model');
    }

    function index() {
        $this->load->helper('form');
        $this->load->view('startPage');
    }

    function register(){
        $data = array(
            'id' => '',
            'NIS' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'jurusan_smk' => $this->input->post('jurusan_smk'),
            'kelas' => $this->input->post('kelas'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
            'jenjang' => $this->input->post('jenjang'),
            'jurusan_kuliah' => $this->input->post('jurusan_kuliah'),
            'kota_domisili' => $this->input->post('kota_domisili'),
            'alamat_kos' => $this->input->post('alamat_kos'),
            'jalur_masuk' => $this->input->post('jalur_masuk'),
            'motivasi' => $this->input->post('motivasi'),
            'tanggal_isi' => date('Y:m:d')
        );

        if($this->startpage_model->register($data)){
            $msg = "YES";
        } else {
            $msg = "NO";
        }

        echo json_encode(array('msg' => $msg));

    }

    public function autoComplete(){
        // process posted form data
        $keyword = $this->input->get('name_startsWith');

        $data['response'] = 'false'; //Set default response
        $query = $this->startpage_model->autoComplete($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array(
                    'value' => $row->Nama_PT,
                    ''
                );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request

        }
    }
}

?>