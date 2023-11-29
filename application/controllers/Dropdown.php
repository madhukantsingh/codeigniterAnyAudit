<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Product_model');
		$this->load->model('Productcompanies_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->Dropdown_model->getDropdownList();
		$this->load->view('dropdown');
	}


	 public function adddropdown($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Dropdown_model->getDropdownDataById($id);
		}

		$data['product_data'] = $this->Productcompanies_model->getallProduct();
		
		$this->load->view('adddropdown',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Users_model->deleteDropdown($delete_array);
		redirect('Dropdown/index');
	}
	public function save_dropdown(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['username'])){

			if(!empty($_POST['edit_id'])){
				$update_array['username'] = $_POST['username'];
				$update_array['password'] = $_POST['password'];
				$update_array['status'] = $_POST['status'];
				$update_array['productname'] = $_POST['product_id'];
				$update_array['companyname'] = $_POST['productcompanies'];
				$update_array['email'] = $_POST['email'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Dropdown_model->updateDropdown($update_array);
				redirect('Dropdown/index');
			}else{
				$insert_array['username'] = $_POST['username'];
				$insert_array['password'] = $_POST['password'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['email'] = $_POST['email'];
				$insert_array['productname'] = $_POST['product_id'];
				$insert_array['companyname'] = $_POST['productcompanies'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert = $this->Dropdown_model->saveDropdown($insert_array);
				redirect('Dropdown/index');
			}
			
		}
	}
}
	
	