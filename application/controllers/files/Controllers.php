<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Controllers extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Contm');
	 }
	 public function index()
	 {
		 $data['all_list'] = $this->Contm->getControllersList();
		 $this->load->view('contv',$data);
	 }
	 public function addcontroller($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Contm->getControllersDataById($id);
		}
		$this->load->view('addcontv',$data);
	}
	public function save_controller(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['controller_name'])){

			// if(!empty($_POST['edit_id'])){
			// 	$update_array['controller_name'] = $_POST['controller_name'];
			// 	$update_array['controller_desc'] = $_POST['controller_desc'];
			// 	// $update_array['storage'] = $_POST['storage'];
			// 	// $update_array['status'] = $_POST['status'];
			// 	// $update_array['updated_at'] = date('Y-m-d H:i:s');
			// 	$update_array['id'] = $_POST['edit_id'];
			// 	$update = $this->contm->updateControllers($update_array);
			// 	redirect('Controllders/index');
			 }
			else{
				$insert_array['controller_name'] = $_POST['controller_name'];
				$insert_array['controller_desc'] = $_POST['controller_desc'];
				// $insert_array['storage'] = $_POST['storage'];
				// $insert_array['status'] = $_POST['status'];
				// $insert_array['created_at'] = date('Y-m-d H:i:s');
				// $insert_array['updated_at'] = date('Y-m-d H:i:s');
				
				$insert = $this->Contm->saveControllers($insert_array);
				redirect('Controllers/index');
			}
			
		}
	}
	// public function delete_library($id = ''){
	// 	$delete_array['id'] = $id;
	// 	$delete = $this->Library_model->delete_library($delete_array);
	// 	ini_set('display_errors', 1);
	// 	ini_set('display_startup_errors', 1);
	// 	error_reporting(E_ALL);
	// 	redirect('Library/index');
	// }
