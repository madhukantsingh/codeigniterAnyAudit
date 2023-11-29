<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Facebook extends CI_Controller 
        {
			public function __construct(){
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);
				parent::__construct();
		
				$this->load->model('Facebook_model');
			}
			public function register(){
				$this->load->view('regis');
				// print "<pre>";
				// print_r($data);
				// exit;
			}
            public function adduser($id=""){
				$data = array();
				if(!empty($id)){
					$data['res_data'] = $this->Facebook_model->getregisDataById($id);
				}
				// print"<pre>";
				// print_r($data);
				// exit;
				$this->load->view('adstudents',$data);
			}
			public function deletestudent($id)
			{
				$this->Students_model->deletestudent($id);
				redirect('Students/index');
				// print "<pre>";
				// print_r($id);
				// exit;
			
			}
        
			public function save_student()
			{
			
				
				// print "<pre>";
				// print_r($_POST);
				// exit;
				if(!empty($_POST['fullname'])){

					if(!empty($_POST['edit_id'])){
						
						$update_array['name'] = $_POST['fullname'];
						$update_array['branch'] = $_POST['branch'];
						$update_array['email'] = $_POST['email'];
						$update_array['password'] = $_POST['password'];
						$update_array['city'] = $_POST['city'];
						$update_array['phone'] = $_POST['phone'];
						$update_array['updated_at'] = date('Y-m-d H:i:s');
						$update_array['id'] = $_POST['edit_id'];
						$update_array['uploadedfile'] = $_POST['uploadedfile'];
						$update = $this->Students_model->updateStudent($update_array);
						
						redirect('Students/index');
					}else{
						$insert_array['name'] = $_POST['fullname'];
						$insert_array['branch'] = $_POST['branch'];
						$insert_array['email'] = $_POST['email'];
						$insert_array['password'] = $_POST['password'];
						$insert_array['city'] = $_POST['city'];
						$insert_array['phone'] = $_POST['phone'];
						$insert_array['uploadedfile'] = $_POST['uploadedfile'];
						$insert_array['created_at'] = date('Y-m-d H:i:s');
						$insert_array['updated_at'] = date('Y-m-d H:i:s');
						$insert_array['created_by'] = 1;
						$insert = $this->Students_model->saveStudent($insert_array);
			// public function facebook(){
			// 	$this->load->view('face');
		
                }
                }
            }
        }
    