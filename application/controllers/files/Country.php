<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Country_model');
	 }
	
	public function index()
	{
		$data['all_list'] = $this->Country_model->getCountryList();
		$this->load->view('country',$data);
	}
	public function addcountry($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Country_model->getCountryDataById($id);
			// print_r($data);
		}
		$this->load->view('addcountry',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Country_model->deleteCountry($delete_array);
		redirect('Country/index');
	}
	public function save_country(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['country_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['country_name'] = $_POST['country_name'];
				$update_array['status'] = $_POST['status'];
				$update_array['created_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Country_model->updateCountry($update_array);
				redirect('Country/index');
			}else{
				$insert_array['country_name'] = $_POST['country_name'];
		
				$insert_array['status'] = $_POST['status'];
				
				$insert_array['created_at'] = date('Y-m-d H:i:s');
		
				$insert = $this->Country_model->saveCountry($insert_array);
				redirect('Country/index');
			}
			
		}
	}
}
