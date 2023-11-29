<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bhcnmc extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Contm');
		$this->load->model('Modelm');
		$this->load->model('Bhcnmm');

	 }
	 public function index()
	{
		$data['all_list'] = $this->Bhcnmm->getcnmList();
		$this->load->view('cnmv',$data);
	}


	 public function addcnm($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Bhcnmm->getcnmDataById($id);
		}

		$data['controller_names'] = $this->Modelm->getallcont();
		
		$this->load->view('addcnmv',$data);
	}
	// public function delete($id=""){
	// 	$delete_array['id'] = $id;
	// 	$delete = $this->Users_model->deleteUser($delete_array);
	// 	redirect('Users/index');
	// }
	public function save_Cnm(){
		// echo 'hii';die;
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		// if(!empty($_POST['user_name'])){

		// 	if(!empty($_POST['edit_id'])){
		// 		$update_array['user_name'] = $_POST['user_name'];
		// 		$update_array['password'] = $_POST['password'];
		// 		$update_array['status'] = $_POST['status'];
		// 		$update_array['country_name'] = $_POST['country_id'];
		// 		$update_array['state_name'] = $_POST['state'];
		// 		$update_array['email'] = $_POST['email'];
		// 		$update_array['mobile'] = $_POST['mobile'];
		// 		$update_array['updated_at'] = date('Y-m-d H:i:s');
		// 		$update_array['id'] = $_POST['edit_id'];
		// 		$update = $this->Users_model->updateUser($update_array);
		// 		redirect('Users/index');
			// }
			// else{
				$insert_array['controller_name'] = $_POST['controller_id'];
				$insert_array['model_name'] = $_POST['model_name'];
				$insert_array['description'] = $_POST['model_desc'];
				// $insert_array['created_at'] = date('Y-m-d H:i:s');
				// $insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert = $this->Bhcnmm->saveCnm($insert_array);
				redirect('Bhcnmc/index');
			// }
			
		// }
	}
}
	
	