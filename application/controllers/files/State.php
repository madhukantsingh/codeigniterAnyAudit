<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('State_model');
	 }
	
	public function index()
	{
		$data['all_list'] = $this->State_model->getStateList();
		$this->load->view('state',$data);
	}
	public function addstate($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->State_model->getStateDataById($id);
			
		}
		$data['country_data'] = $this->State_model->getallCountries();
		// print_r ($data);
		$this->load->view('addstate',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->State_model->deleteState($delete_array);
		redirect('State/index');
	}
	public function save_state(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['state_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['state_name'] = $_POST['state_name'];
				$update_array['country_id'] = $_POST['country_id'];
				$update_array['status'] = $_POST['status'];
				$update_array['created_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->State_model->updateState($update_array);
				redirect('State/index');
			}else{
				$insert_array['state_name'] = $_POST['state_name'];
				$insert_array['country_id'] = $_POST['country_id'];
				$insert_array['status'] = $_POST['status'];
				
				$insert_array['created_at'] = date('Y-m-d H:i:s');
		
				$insert = $this->State_model->saveState($insert_array);
				redirect('State/index');
			}
			
		}
	}


	public function getStates(){

		//print_r($_POST);die;
		$c_id = $_POST['id'];

		$states = $this->State_model->getallStates($c_id);
		// print_r($states);die;
		//echo 'test';
		echo "<option value=''> --select--</option>";
		foreach($states as $state){
			echo "<option value='". $state['id']."'>".  $state['state_name']   ."</option>";
		}


	}
}
