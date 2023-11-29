<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bharathlogin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Blogm');
		
	 }
	 public function index(){
		$this->load->view('bhloginv');
	}
	public function checkuser(){
		//print "<pre>";
		///print_r($_POST);
		$data = $_POST;
		$res_data = $this->Blogm->checkdata($data);
		if(empty($res_data)){
			echo "invalid login details";	
			exit;
		}else{
			echo "sucessfully logged in";
			redirect('Bhmenudb/index');
		}
		
	} }

	


 

