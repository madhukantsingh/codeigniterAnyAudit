<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Book extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Book_model');
	 }

	 public function index()
	 {
		$data['all_list'] = $this->Book_model->getBookList();
		 $this->load->view('Book',$data);
	}
	public function addbook($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Book_model->getBookDataById($id);
		}
		$this->load->view('addbook',$data);
	}
	public function delete($id=""){
		$delete_array["id"]=$id;
		$this->Book_model->delete($delete_array);
		redirect('Book/index');
	}
	
	public function save_book(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['bookname'])){

			if(!empty($_POST['edit_id'])){
				$update_array['bookname'] = $_POST['bookname'];
				$update_array['email'] = $_POST['email'];
				$update_array['price'] = $_POST['price'];
				$update_array['isbn'] = $_POST['isbn'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Book_model->updateBook($update_array);
				redirect('Book/index');
			}else{
				$insert_array['bookname'] = $_POST['bookname'];
				$insert_array['price'] = $_POST['price'];
				$insert_array['email'] = $_POST['email'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['isbn'] = $_POST['isbn'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert = $this->Book_model->saveBook($insert_array);
				redirect('Book/index');
			}
			
		}
	}

}