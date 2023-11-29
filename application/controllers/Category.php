<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('category_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->category_model->getCategoryList();
		// print_r($data['all_list']);die;
		$this->load->view('Category',$data);
	}
	public function addCategory($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->category_model->getCategoryDataById($id);
		}
		$this->load->view('addCategory',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->category_model->deleteCategory($delete_array);
		redirect('Category/index');
	}
	public function save_Category(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['category'])){

			if(!empty($_POST['edit_id'])){
				$update_array['category'] = $_POST['category'];
				$update_array['discription'] = $_POST['discription'];
				$update_array['created_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->category_model->updateCategory($update_array);
				redirect('Category/index');
			}else{
				$insert_array['category'] = $_POST['category'];
				$insert_array['discription'] = $_POST['discription'];
		        $insert_array['created_at'] = date('Y-m-d H:i:s');
	            $insert = $this->category_model->saveCategory($insert_array);
				redirect('Category/index');
				
			}
		}
	}
}
