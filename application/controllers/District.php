<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class District extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('District_model');
	 }
     public function index()
     { 
        $data['all_list'] = $this->District_model->getDistrictList();
         $this->load->view('district',$data);
         }
     public function adddistrict($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->District_model->getDistrictDataById($id);
		}
		$this->load->view('adddistrict',$data);
	
	}
	  public function delete($id=""){
		$delete_array["id"]=$id;
		$this->District_model->delete($delete_array);
		redirect('District/index');
	    }
	
     public function save_district(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['district_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['district_name'] = $_POST['district_name'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->District_model->updateDistrict($update_array);
				redirect('District/index');
			}else{
				$insert_array['district_name'] = $_POST['district_name'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');

				$insert = $this->District_model->saveDistrict($insert_array);
				redirect('District/index');
			}
			
		}
	}

}  