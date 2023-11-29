<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model

		$this->load->model('product_model');
		$this->load->model('Subcategory_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->product_model->getproductList();
		$this->load->view('product',$data);
	}


	 public function addproduct($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->product_model->getproductDataById($id);
		}

		$data['catogories'] = $this->Subcategory_model->getallcategory();
		
		$this->load->view('addproduct',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->product_model->delete($delete_array);
		redirect('product/index');
	}
		 
	 public function index()
	 {
		 $data['all_list'] = $this->Product_model->getProductList();
		 $this->load->view('product',$data);
	}
	public function addproduct($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Product_model->getProductDataById($id);
		}
		$this->load->view('addproduct',$data);
	}
	public function delete($id=""){
		$delete_array["id"]=$id;
	    $this->Product_model->delete($delete_array);
		redirect('Product/index');
	}
	

	public function save_product(){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		if(!empty($_POST['category_id'])){

			if(!empty($_POST['edit_id'])){
				$update_array['category'] = $_POST['category_id'];
				$update_array['subcategory'] = $_POST['subcategory'];
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->product_model->updateproduct($update_array);
				redirect('Product/index');
			}else{
				$insert_array['category'] = $_POST['category_id'];
				$insert_array['subcategory'] = $_POST['subcategory'];
				$insert_array['file'] = $_FILES['fileToUpload']['name'];
                $insert = $this->product_model->saveproduct($insert_array);
				//redirect('Product/index');
		


			// print_r($_FILES);die;
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			// echo $taget_file;die;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if image file is a actual image or fake image
			// if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
			// }

			// Check if file already exists
			if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
			}

			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
			}

		}
			redirect('Product/index');
		}
	}

		// if(!empty($_POST['name'])){

		// 	if(!empty($_POST['edit_id'])){
		// 		$update_array['name'] = $_POST['name'];
		// 		$update_array['description'] = $_POST['description'];
		// 		$update_array['status'] = $_POST['status'];
		// 		$update_array['updated_at'] = date('Y-m-d H:i:s');
		// 		$update_array['id'] = $_POST['edit_id'];
		// 		$update = $this->Product_model->updateProduct($update_array);
		// 		redirect('Product/index');
		// 	}else{
		// 		$insert_array['name'] = $_POST['name'];
		// 		$insert_array['status'] = $_POST['status'];
		// 		$insert_array['description'] = $_POST['description'];
		// 		$insert_array['created_at'] = date('Y-m-d H:i:s');
		// 		$insert_array['updated_at'] = date('Y-m-d H:i:s');
		// 		$insert = $this->Product_model->saveProduct($insert_array);
		// 		redirect('Product/index');
		// 	}
			
		// }
}

