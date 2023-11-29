<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emp extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Emp_model');
	 }

	 public function index()
	 {
		 $data['all_list'] = $this->Emp_model->getEmpList();
		 $this->load->view('emp',$data);
	}
    public function addemp($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Emp_model->getEmpDataById($id);
		}
		$this->load->view('addemp',$data);
	}
	public function delete($id=""){
		$delete_array["id"]=$id;
	    $this->Emp_model->delete($delete_array);
		redirect('Emp/index');
	}
	
	public function save_emp(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['name'] = $_POST['name'];
				$update_array['email'] = $_POST['email'];
				$update_array['salary'] = $_POST['salary'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Emp_model->updateEmp($update_array);
				redirect('Emp/index');
			}else{
				$insert_array['name'] = $_POST['name'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['email'] = $_POST['email'];
				$insert_array['salary'] = $_POST['salary'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert = $this->Emp_model->saveEmp($insert_array);
				redirect('Emp/index');
			}
			
		}
	}

	
}