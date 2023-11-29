<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Log_model');
		
	 }
	 public function index(){
		$this->load->view('Log');
	}
	public function checkuser(){
		//print "<pre>";
		///print_r($_POST);
		$data = $_POST;
		$res_data = $this->Log_model->checkdata($data);
		if(empty($res_data)){
			echo "invalid login details";
            redirect('log/index');	
		
		}else{
			echo "sucessfully logged in";
			redirect('Dashboard/index');
		}
		
	} }