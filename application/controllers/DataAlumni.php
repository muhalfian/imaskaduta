<?php

class DataAlumni extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('data_alumni_model','alumni');
    }

    function index() {
        $this->load->helper('form');
        $this->load->view('dataAlumni');
    }

    public function ajax_list()
    {
        $list = $this->alumni->get_datatables();
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
//            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
//                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$alumni->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->alumni->count_all(),
            "recordsFiltered" => $this->alumni->count_filtered(),
            "data" => $data
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->alumni->get_by_id($id);
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
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'dob' => $this->input->post('dob'),
        );
        $this->alumni->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($id)
    {
        $this->alumni->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}

?>