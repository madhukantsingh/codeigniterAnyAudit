<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mandal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Mandal_model');
	 }
	
	public function index()
	{
		$data['all_list'] = $this->Mandal_model->getMandalList();
		$this->load->view('mandal',$data);
	}
	public function addmandal($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Mandal_model->getmandalDataById($id);
			
		}
		$data['district_data'] = $this->Mandal_model->getallDistrict();
		// print_r ($data);
		$this->load->view('addmandal',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Mandal_model->deleteMandal($delete_array);
		redirect('Mandal/index');
	}
	public function save_mandal(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['mandal_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['mandal_name'] = $_POST['mandal_name'];
				$update_array['district_id'] = $_POST['district_id'];
				$update_array['status'] = $_POST['status'];
				$update_array['created_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Mandal_model->updateMandal($update_array);
				redirect('Mandal/index');
			}else{
				$insert_array['mandal_name'] = $_POST['mandal_name'];
				$insert_array['district_id'] = $_POST['district_id'];
				$insert_array['status'] = $_POST['status'];
				
				$insert_array['created_at'] = date('Y-m-d H:i:s');
		
				$insert = $this->Mandal_model->saveMandal($insert_array);
				redirect('Mandal/index');
			}
			
		}
	}


	public function getMandals(){

		//print_r($_POST);die;
		$c_id = $_POST['id'];

		$states = $this->Mandal_model->getallMandals($c_id);
		// print_r($mandals);die;
		//echo 'test';
		echo "<option value=''> --select--</option>";
		foreach($mandals as $mandal){
			echo "<option value='". $mandal['id']."'>".  $mandal['mandal_name']   ."</option>";
		}


	}
}
