<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productcom extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		//$this->load->model('Users_model');
		//$this->load->model('State_model');
	 }
	 public function index()
	{
		//$data['all_list'] = $this->Users_model->getUserList();
		$this->load->view('user',$data);
	}
}