<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sections extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Sections_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->Sections_model->getSectionsList();
		$this->load->view('sections',$data);
	}
	
	public function addsection($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Sections_model->getSectionsListById($id);
		}
		$this->load->view('addsection',$data);
	}
	
	public function save_section(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['section_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['section_name'] = $_POST['section_name'];
				$update_array['description'] = $_POST['description'];
				$update_array['status'] = $_POST['status'];
				$update_array['Created_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Sections_model->updateSection($update_array);
				redirect('Sections/index');
			}else{
				$insert_array['section_name'] = $_POST['section_name'];
				$insert_array['description'] = $_POST['description'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert = $this->Sections_model->saveSections($insert_array);
				redirect('Sections/index');
			}
			
		}
	} 
	public function deletesection($id=''){
		$delete_array['id'] = $id;
		$delete = $this->Sections_model->deletesection($delete_array);
				redirect('Sections/index');
	}
}
