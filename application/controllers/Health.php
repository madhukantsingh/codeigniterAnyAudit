<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health  extends CI_Controller {   
		
			public function __construct(){
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				parent::__construct();
		
				$this->load->model('Health_model');
			}
	public function hospital()
	{
       
		$this->load->view('dept');
	}

	// public function hospital()
	// {
       
	// 	$this->load->view('loin');
	// }
    public function save_login()
	{
		//echo "<pre>";print_r($_POST);//exit;

		$data = array(
			'email'=>$_POST['email_1'], //$this->input->post('email_1'),
			'password'=>$_POST['passquddus'],
			'created_at'=>date('Y-m-d H:i:s'),
		);
		$result = $this->db->insert('sag_tab',$data);
		//echo $result;exit;
		if($result) {
			echo "Successfully Inserted";
			redirect('Students/addstudent'); //classname/functionname
		}
		if(!empty($_POST['fullname']))
				{

					if(!empty($_POST['edit_id'])){
						// print "<pre>";
						// print_r($_POST);
						// exit;
						$update_array['name'] = $_POST['fullname'];
						$update_array['branch'] = $_POST['branch'];
						$update_array['email_id'] = $_POST['email'];
						$update_array['password'] = $_POST['password'];
						$update_array['city'] = $_POST['city'];
						$update_array['updated_at'] = date('Y-m-d H:i:s');
						$update_array['id'] = $_POST['edit_id'];
						$update = $this->Students_model->updateStudent($update_array);
						redirect('Students/index');
					}
					else
					{
						$insert_array['name'] = $_POST['fullname'];
						$insert_array['branch'] = $_POST['branch'];
						$insert_array['email_id'] = $_POST['email'];
						$insert_array['password'] = $_POST['password'];
						$insert_array['city'] = $_POST['city'];
						$insert_array['created_at'] = date('Y-m-d H:i:s');
						$insert_array['updated_at'] = date('Y-m-d H:i:s');
						$insert_array['created_by'] = 1;
						$insert = $this->Students_model->saveStudent($insert_array);
						redirect('Students/index');
					}
					
				}
		
	}
    
}
