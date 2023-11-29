<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Modelm');
	 }
	 public function index()
	 {
		 $data['all_list'] = $this->Modelm->getModelList();
		 $this->load->view('modelv',$data);
	 }
	 public function addmodel($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Modelm->getModelDataById($id);
		}
		$data['controller_names'] =  $this->Modelm->getcontrollernames();

		$this->load->view('addmodelv',$data);
	}
	public function save_Model(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		//if(!empty($_POST['model_name'])){

			// if(!empty($_POST['edit_id'])){
			// 	$update_array['controller_name'] = $_POST['controller_name'];
			// 	$update_array['controller_desc'] = $_POST['controller_desc'];
			// 	// $update_array['storage'] = $_POST['storage'];
			// 	// $update_array['status'] = $_POST['status'];
			// 	// $update_array['updated_at'] = date('Y-m-d H:i:s');
			// 	$update_array['id'] = $_POST['edit_id'];
			// 	$update = $this->contm->updateControllers($update_array);
			// 	redirect('Controllders/index');
			// }
			//else{
				$insert_array['model_name'] = $_POST['model_name'];
				$insert_array['model_desc'] = $_POST['model_desc'];
				$insert_array['controller_id'] = $_POST['controller_id'];
				// $insert_array['storage'] = $_POST['storage'];
				// $insert_array['status'] = $_POST['status'];
				// $insert_array['created_at'] = date('Y-m-d H:i:s');
				// $insert_array['updated_at'] = date('Y-m-d H:i:s');
				
				$insert = $this->Modelm->saveModel($insert_array);
				redirect('Model/index');
			//}
			
		}
		public function getmodels(){

			//print_r($_POST);die;
			$c_id = $_POST['id'];
	
			$models = $this->Modelm->getallModel($c_id);
			// print_r($states);die;
			//echo 'test';
			echo "<option value=''> --select--</option>";
			foreach($models as $model){
				echo "<option value='". $model['id']."'>".  $model['model_name']   ."</option>";
			}
	
	
		}
	}
	// public function delete_library($id = ''){
	// 	$delete_array['id'] = $id;
	// 	$delete = $this->Library_model->delete_library($delete_array);
	// 	ini_set('display_errors', 1);
	// 	ini_set('display_startup_errors', 1);
	// 	error_reporting(E_ALL);
	// 	redirect('Library/index');
	// }
