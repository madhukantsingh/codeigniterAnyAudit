<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mylist extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		//$this->load->model('Usertypes_model');
	 }

	 public function index()
	 {
		// $data['all_list'] = $this->Usertypes_model->getUsertypeList();
		 $this->load->view('mylist');
	}
	
}