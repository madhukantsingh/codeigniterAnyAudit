<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patients extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Patient_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->Patient_model->getpatientList();
		$this->load->view('patient',$data);
	}
	public function addpatient($id="")
	{
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Patient_model->getpatientListById($id);
		}
		$this->load->view('addpatient',$data);
	}

	
	public function save_patient(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['name'])){


			if(!empty($_POST['edit_id'])){
				$update_array['name'] = $_POST['name'];
				$update_array['age'] = $_POST['age'];
				$update_array['phonenumber'] = $_POST['phonenumber'];
				$update_array['from'] = $_POST['from'];
				$update = $this->Patient_model->updatePatient($update_array);
				redirect('Patients/index');
			}else{
				$insert_array['name'] = $_POST['name'];
				$insert_array['age'] = $_POST['age'];
				$insert_array['phonenumber'] = $_POST['phonenumber'];
				$insert_array['from'] = $_POST['from'];
				$insert = $this->Patient_model->savePatient($insert_array);
				redirect('Patients/index');
			}
			
		}
	} 
	public function deletePatient($id=''){
		$delete_array['id'] = $id;
		$delete = $this->Patient_model->deletePatient($delete_array);
				redirect('Patients/index');
	}
}
