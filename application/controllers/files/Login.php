<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Login_model');
		
	 }
	 public function index(){
		$this->load->view('loginpage');
	}
	public function checkuser(){
		//print "<pre>";
		///print_r($_POST);
		$data = $_POST;
		$res_data = $this->Login_model->checkdata($data);
		if(empty($res_data)){
			echo "invalid login details";	
			exit;
		}else{
			echo "sucessfully logged in";
			redirect('Sagsol/index');
		}
		
	} }

	


 

