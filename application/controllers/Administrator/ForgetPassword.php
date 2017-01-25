<?php

class ForgetPassword extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->model('administrator/user_model');
        $this->load->model('administrator/data_alumni_model');
    }

    function index() {
        $this->load->helper('form');
        $this->load->view('administrator/forgetPassword');
    }

    public function ajax_generate_password(){
        $email = $this->input->post('email');
        $data_email = $this->data_alumni_model->get_by_email($email);
        if(isset($data_email)){

            $data = array(
                "id" => '',
                "email" => $email,
                "password" => $this->randomPassword()
            );

           $this->user_model->save($data);


//            echo json_encode(array("status" => FALSE, "password"=>$this->randomPassword()));
            echo json_encode(array("status" => TRUE));
        }
        else
            echo json_encode(array("status" => FALSE));
    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }



}

?>