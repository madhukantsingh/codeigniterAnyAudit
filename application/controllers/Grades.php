<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Grades extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Grade_model');
	 }
     public function index()
     { 
        $data['all_list'] = $this->Grade_model->getGradeList();
         $this->load->view('grade',$data);
     }
     public function addgrades($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Grade_model->getGradeDataById($id);
		}
		$this->load->view('addgrades',$data);
	
	}
	  public function delete($id=""){
		$delete_array["id"]=$id;
		$this->Grade_model->delete($delete_array);
		redirect('Grades/index');
	    }
	
     public function save_grades(){
        
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['name'] = $_POST['name'];
				$update_array['grades'] = $_POST['grades'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Grade_model->updateGrade($update_array);
				redirect('Grades/index');
			}else{
				$insert_array['name'] = $_POST['name'];
                $insert_array['grades'] = $_POST['grades'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');

				$insert = $this->Grade_model->saveGrade($insert_array);
				redirect('Grades/index');
			}
			
		}
	}

}
    