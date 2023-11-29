<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productcompanies extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Productcompanies_model');
	 }

	 public function index()
	 {
		
		$data['all_list'] = $this->Productcompanies_model->getProductcompaniesList();
		 $this->load->view('productcompanies',$data);
	}
	public function addproductcompanies($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Productcompanies_model->getProductcompaniesDataById($id);
		}
		$data['product_names'] = $this->Productcompanies_model->getallProduct();
		// print_r ($data);
		
		$this->load->view('addproductcompanies',$data);
		}
	
	public function delete($id=""){
		$delete_array["id"]=$id;
	    $this->Productcompanies_model->delete($delete_array);
		redirect('Productcompanies/index');
	}
	
	public function save_productcompanies(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['product_id'])){

			if(!empty($_POST['edit_id'])){
				$update_array['product_id'] = $_POST['product_id'];
				$update_array['companyname'] = $_POST['companyname'];
				$update_array['status'] = $_POST['status'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Product_companies_model->updateProductcompanies($update_array);
				redirect('Productcompanies/index');
			}else{
				$insert_array['product_id'] = $_POST['product_id'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['companyname'] = $_POST['companyname'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert = $this->Productcompanies_model->saveProductcompanies($insert_array);
				redirect('Productcompanies/index');
			}
			
		}
	}
	// public function getProductcompanies(){

	// 	//print_r($_POST);die;
	// 	$c_id = $_POST['id'];

	// 	$product = $this->Productcompanies_model->getProductcompanies($c_id);
	// 	// print_r($states);die;
	// 	//echo 'test';
	// 	echo "<option value=''> --select-- </option>";
	// 	foreach($companyname as $product){
	// 		echo "<option value='". $product['id']."'>".  $product['product_id']   ."</option>";
	// 	}


	// }
}