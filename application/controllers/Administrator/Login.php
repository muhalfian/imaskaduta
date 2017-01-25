<?php

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('Administrator/User_model');
        $this->load->library('session');
    }

    function index() {
        $this->load->helper('form');
        $this->load->view('Administrator/login');
    }

    function Logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('Administrator/Login');
    }

    function CekLogin() {
        $data = array(
          'email' => $this->input->post('email'),
          'password' => md5($this->input->post('pass'))
        );

        if($result = $this->User_model->cek($data)){

            $session_array = array(
                'nama' => $result->nama,
                'email' => $result->email
            );

            $this->session->set_userdata('logged_in', $session_array);

            redirect('Administrator/DataAlumni');

        } else {
            redirect('Administrator/Login');
        }
    }

//    public function ajax_list()
//    {
//        $list = $this->data_alumni_model->get_datatables();
//        $data = array();
//        $no = $_POST['start'];
//        foreach ($list as $alumni) {
//            $no++;
//            $row = array();
//            $row[] = $no;
//            $row[] = $alumni->NIS;
//            $row[] = $alumni->nama;
//            $row[] = $alumni->kelas;
//            $row[] = $alumni->tahun_lulus;
//            $row[] = $alumni->perguruan_tinggi;
//            $row[] = $alumni->jurusan_kuliah;
//            $row[] = $alumni->jalur_masuk;
//
//            //add html for action
//            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Detail" onclick="detail_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-list-alt"></i> </a>
//                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
//                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
//
//            $data[] = $row;
//        }
//
//        $output = array(
//            "draw" => $_POST['draw'],
//            "recordsTotal" => $this->data_alumni_model->count_all(),
//            "recordsFiltered" => $this->data_alumni_model->count_filtered(),
//            "data" => $data,
//        );
//        //output to json format
//        echo json_encode($output);
//    }


}

?>