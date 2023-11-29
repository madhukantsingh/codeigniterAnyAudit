<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subjects extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Subjects_model');
	 }

	 public function index()
	 {
		 $data['all_list'] = $this->Subjects_model->getSubjectList();
		 $this->load->view('subjects',$data);
	 }

	public function addsubject($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Subjects_model->getSubjectDataById($id);
		}
		$this->load->view('addsubject',$data);
	}
	
	public function save_subject(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['subject_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['subject_name'] = $_POST['subject_name'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Subjects_model->updateSubject($update_array);
				redirect('Subjects/index');
			}else{
				$insert_array['subject_name'] = $_POST['subject_name'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert_array['created_by'] = 1;
				$insert = $this->Subjects_model->saveSubject($insert_array);
				redirect('Subjects/index');
			}
			
		}
	}
}
