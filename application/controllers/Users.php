<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Users_model');
		$this->load->model('State_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->Users_model->getUserList();
		$this->load->view('user',$data);
	}


	 public function adduser($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Users_model->getUserDataById($id);
		}

		$data['country_data'] = $this->State_model->getallCountries();
		
		$this->load->view('adduser',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Users_model->deleteUser($delete_array);
		redirect('Users/index');
	}
	public function save_user(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['user_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['user_name'] = $_POST['user_name'];
				$update_array['password'] = $_POST['password'];
				$update_array['status'] = $_POST['status'];
				$update_array['country_name'] = $_POST['country_id'];
				$update_array['state_name'] = $_POST['state'];
				$update_array['email'] = $_POST['email'];
				$update_array['mobile'] = $_POST['mobile'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Users_model->updateUser($update_array);
				redirect('Users/index');
			}else{
				$insert_array['user_name'] = $_POST['user_name'];
				$insert_array['password'] = $_POST['password'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['email'] = $_POST['email'];
				$insert_array['country_name'] = $_POST['country_id'];
				$insert_array['state_name'] = $_POST['state'];
				$insert_array['mobile'] = $_POST['mobile'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert = $this->Users_model->saveUser($insert_array);
				redirect('Users/index');
			}
			
		}
	}
}
	
	