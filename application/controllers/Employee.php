<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
	$this->load->model('Employee_model');
    }
    public function index()
    {
      $data['all_list'] = $this->Employee_model->getEmployeeList();
        $this->load->view('employ',$data);
    }
   public function addemployee($id=""){
      $data = array();
      if(!empty($id)){
        $data['res_data'] = $this->Employee_model->getEmployeeDataById($id);
      }
      $this->load->view('addemployee',$data);
    }
    public function delete($id=""){
      $delete_array["id"]=$id;
      $this->Employee_model->delete($delete_array);
      redirect('Employee/index');
        }
    
       public function save_emp(){
       //  print_r($_POST);DIE; 
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      if(!empty($_POST['name'])){
  
        if(!empty($_POST['edit_id'])){
          $update_array['name'] = $_POST['name'];
          $update_array['email'] = $_POST['email'];
          $update_array['mobile'] = $_POST['mobile'];
          $update_array['status'] = $_POST['status'];
          $update_array['updated_at'] = date('Y-m-d H:i:s');
          $update_array['id'] = $_POST['edit_id'];
          $update = $this->Employee_model->updateEmployee($update_array);
          redirect('Employee/index');
        }else{
            $insert_array['name'] = $_POST['name'];
            $insert_array['email'] = $_POST['email'];
            $insert_array['mobile'] = $_POST['mobile'];
            $insert_array['status'] = $_POST['status'];
            $insert_array['created_at'] = date('Y-m-d H:i:s');
            $insert_array['updated_at'] = date('Y-m-d H:i:s');
            $insert = $this->Employee_model->saveEmployee($insert_array);
            redirect('Employee/index');
        }
        
      }
    }
    
    
}   