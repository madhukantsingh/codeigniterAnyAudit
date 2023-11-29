<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bhloginc extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Bhloginm');
	 }
	 public function index()
	 {
		 $data['all_list'] = $this->Bhloginm->getBhlogincList();
		 $this->load->view('bhlv',$data);
	 }
	 public function addsignup($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Bhloginm->getBhlogincDataById($id);
		}
		$this->load->view('bhloginv',$data);
	}
	public function save_signup(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		// if(!empty($_POST['email'])){

			// if(!empty($_POST['edit_id'])){
			// 	$update_array['controller_name'] = $_POST['controller_name'];
			// 	$update_array['controller_desc'] = $_POST['controller_desc'];
			// 	// $update_array['storage'] = $_POST['storage'];
			// 	// $update_array['status'] = $_POST['status'];
			// 	// $update_array['updated_at'] = date('Y-m-d H:i:s');
			// 	$update_array['id'] = $_POST['edit_id'];
			// 	$update = $this->contm->updateControllers($update_array);
			// 	redirect('Controllders/index');
			//  }
			// else{
				// print_r($_POST);die;
				$insert_array['email'] = $_POST['email'];
				$insert_array['password'] = $_POST['password'];
				$insert_array['reenter_password'] = $_POST['reenter_password'];
				// $insert_array['storage'] = $_POST['storage'];
				// $insert_array['status'] = $_POST['status'];
				// $insert_array['created_at'] = date('Y-m-d H:i:s');
				// $insert_array['updated_at'] = date('Y-m-d H:i:s');
				
				$insert = $this->Bhloginm->saveBhloginc($insert_array);
				redirect('Bharathlogin/index');
		}
			
	}
	
	// public function delete_library($id = ''){
	// 	$delete_array['id'] = $id;
	// 	$delete = $this->Library_model->delete_library($delete_array);
	// 	ini_set('display_errors', 1);
	// 	ini_set('display_startup_errors', 1);
	// 	error_reporting(E_ALL);
	// 	redirect('Library/index');
	 
