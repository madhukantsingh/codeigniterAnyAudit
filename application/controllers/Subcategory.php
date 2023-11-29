<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		 $this->load->model('Subcategory_model');
	 }
	
	public function index()
	{
		$data['all_list'] = $this->Subcategory_model->getsubcategoryList();
		$this->load->view('subcategory',$data);
	}

	public function addsubcategory($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Subcategory_model->getsubcategoryDataById($id);
			
 		}
        $data['all_categories'] = $this->Subcategory_model->getallcategory();
		// print_r ($data);
		$this->load->view('addsubcategory',$data);
    }
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Subcategory_model->deletesubcategory($delete_array);
		redirect('subcategory/index');
	}
	public function save_subcategory(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['subcategory'])){

			//if(!empty($_POST['edit_id'])){
				// $update_array['subcategory'] = $_POST['subcategory'];
				// $update_array['category_id'] = $_POST['category_id'];
				// $update_array['created_at'] = date('Y-m-d H:i:s');
				// $update_array['id'] = $_POST['edit_id'];
				// $update = $this->Subcategory_model->updatesubcategory($update_array);
				// redirect('subcategory/index');
			//}else{
				$insert_array['subcategory'] = $_POST['subcategory'];
				$insert_array['category_id'] = $_POST['category_id'];
				
				
				$insert_array['created_at'] = date('Y-m-d H:i:s');
		
				$insert = $this->Subcategory_model->savesubcategory($insert_array);
				redirect('subcategory/index');
			//}
			
		}
	}


	public function getSubcategory(){

		//print_r($_POST);die;
		$c_id = $_POST['id'];

		$subcategorys = $this->Subcategory_model->getallsubcategory($c_id);
		// print_r($subcategorys);die;
		//echo 'test';
		echo "<option value=''> --select--</option>";
		foreach($subcategorys as $subcategory){
			echo "<option value='". $subcategory['id']."'>".  $subcategory['subcategory']   ."</option>";
		}


	}
}    
 