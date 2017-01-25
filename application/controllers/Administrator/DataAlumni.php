<?php

class DataAlumni extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('Administrator/Data_alumni_model');
        $this->load->library('session');
    }

    function index() {
        $this->load->helper('form');

        if(isset($this->session->userdata['logged_in'])) {
            $this->load->view('Administrator/dataAlumni');
        } else {
            $this->load->view('Administrator/login');
        }


    }

    public function ajax_list()
    {
        $list = $this->Data_alumni_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $alumni) {
            $no++;
            $jurusan = substr($alumni->jurusan_smk, strpos($alumni->jurusan_smk,"(")+1,strlen($alumni->jurusan_smk)-(strpos($alumni->jurusan_smk,"(")+2))." ".$alumni->kelas;
            $row = array();
            $row[] = $no;
            $row[] = $alumni->nama;
            $row[] = $jurusan;
            $row[] = $alumni->tahun_lulus;
            $row[] = $alumni->perguruan_tinggi;
            $row[] = $alumni->jenjang;
            $row[] = $alumni->jurusan_kuliah;
            $row[] = $alumni->jalur_masuk;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Detail" onclick="detail_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-list-alt"></i></a><br>
                    <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a><br>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_alumni_model->count_all(),
            "recordsFiltered" => $this->Data_alumni_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->Data_alumni_model->get_by_id($id);
        echo json_encode($data);
    }

//    public function ajax_add()
//    {
//        $data = array(
//            'firstName' => $this->input->post('firstName'),
//            'lastName' => $this->input->post('lastName'),
//            'gender' => $this->input->post('gender'),
//            'address' => $this->input->post('address'),
//            'dob' => $this->input->post('dob'),
//        );
//        $insert = $this->data_alumni_model->save($data);
//        echo json_encode(array("status" => TRUE));
//    }

    public function ajax_update()
    {
        $data = array(
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
            'motivasi' => $this->input->post('motivasi')
        );
        $this->Data_alumni_model->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->Data_alumni_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}

?>