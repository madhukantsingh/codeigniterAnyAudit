<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Client_model');
		$this->load->model('Mandal_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->Client_model->getClientList();
		$this->load->view('client',$data);
	}


	 public function addclient($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Client_model->getclientDataById($id);
		}

		
		$this->load->view('addclient',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Users_model->deleteClient($delete_array);
		redirect('Clients/index');
	}
	public function save_client(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['client_name'])){

			if(!empty($_POST['edit_id'])){
				$update_array['client_name'] = $_POST['client_name'];
				$update_array['status'] = $_POST['status'];
				$update_array['district_name'] = $_POST['district_id'];
				$update_array['mandal_name'] = $_POST['mandal'];
				$update_array['email'] = $_POST['email'];
				$update_array['mobile'] = $_POST['mobile'];
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Clients_model->updateClient($update_array);
				redirect('Clients/index');
			}else{
				$insert_array['client_name'] = $_POST['client_name'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['email'] = $_POST['email'];
				$insert_array['district_name'] = $_POST['district_id'];
				$insert_array['mandal_name'] = $_POST['mandal_id'];
				$insert_array['mobile'] = $_POST['mobile'];
				$insert = $this->Clients_model->saveClient($insert_array);
				redirect('Clients/index');
			}
			
		}
	}
}
	
	