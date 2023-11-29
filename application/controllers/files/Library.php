<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Library extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Library_model');
	 }
	 public function index()
	 {
		 $data['all_list'] = $this->Library_model->getLibraryList();
		 $this->load->view('library',$data);
	 }
	 public function addlibrary($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Library_model->getLibraryDataById($id);
		}
		$this->load->view('addlibrary',$data);
	}
	public function save_library(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['bookname'])){

			if(!empty($_POST['edit_id'])){
				$update_array['bookname'] = $_POST['bookname'];
				$update_array['author'] = $_POST['author'];
				$update_array['storage'] = $_POST['storage'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Library_model->updateLibrary($update_array);
				redirect('Library/index');
			}else{
				$insert_array['bookname'] = $_POST['bookname'];
				$insert_array['author'] = $_POST['author'];
				$insert_array['storage'] = $_POST['storage'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				
				$insert = $this->Library_model->saveLibrary($insert_array);
				redirect('Library/index');
			}
			
		}
	}
	public function delete_library($id = ''){
		$delete_array['id'] = $id;
		$delete = $this->Library_model->delete_library($delete_array);
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		redirect('Library/index');
	}
}