<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginn extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Loginn_model');
	 }

	 public function index()
	 {
		//$data['all_list'] = $this->Book_model->getBookList();
		 $this->load->view('login');
	}

public function checkuser()
 {

    $data= $_POST;
    $res_data = $this->Loginn_model->checkdate($data);
    if(empty($res_data)){
		
        echo "invalid login details";
        exit;

    }else{
        echo "sucessfully logged in";
        redirect('Book /index');
    }
 }
}
