
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		// Load model
		$this->load->model('Users_model');
		$this->load->model('State_model');
	 }
	 public function index()
	{
		$data['all_list'] = $this->Users_model->getUserList();
		$this->load->view('user',$data);
	}


	 public function adduser($id=""){
		$data = array();
		if(!empty($id)){
			$data['res_data'] = $this->Users_model->getUserDataById($id);
			
		}

		$data['country_data'] = $this->State_model->getallCountries();
		
		$this->load->view('adduser',$data);
	}
	public function delete($id=""){
		$delete_array['id'] = $id;
		$delete = $this->Users_model->deleteUser($delete_array);
		redirect('Users/index');
	}
	public function save_user(){
		//echo "<pre>"; print_r($_FILES); die;
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		if(!empty($_POST['user_name'])){


			if(!empty($_POST['edit_id'])){
				$update_array['user_name'] = $_POST['user_name'];
				$update_array['password'] = $_POST['password'];
				$update_array['status'] = $_POST['status'];
				$update_array['country_name'] = $_POST['country_name'];
				$update_array['state_name'] = $_POST['state'];
				$update_array['email'] = $_POST['email'];
				$update_array['mobile'] = $_POST['mobile'];
				$update_array['updated_at'] = date('Y-m-d H:i:s');
				$update_array['file'] =  $_FILES["file"]["name"];
				$update_array['id'] = $_POST['edit_id'];
				$update = $this->Users_model->updateUser($update_array);
				redirect('Users/index');
			}else{
				$insert_array['user_name'] = $_POST['user_name'];
				$insert_array['password'] = $_POST['password'];
				$insert_array['status'] = $_POST['status'];
				$insert_array['email'] = $_POST['email'];
				$insert_array['country_name'] = $_POST['country_name'];
				$insert_array['state_name'] = $_POST['state'];
				$insert_array['mobile'] = $_POST['mobile'];
				$insert_array['created_at'] = date('Y-m-d H:i:s');
				$insert_array['updated_at'] = date('Y-m-d H:i:s');
				$insert_array['file'] = $_FILES["file"]["name"];
				
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["file"]["name"]);
				//echo "<pre>"; print_r($target_file); die;
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				  $check = getimagesize($_FILES["file"]["tmp_name"]);
				  //echo "<pre>"; print_r($check); die;
				  if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				  } else {
					echo "File is not an image.";
					$uploadOk = 0;
				  }
				}
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				  }
				  
				  // Check file size
				  if ($_FILES["file"]["size"] > 500000) {
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
					if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
					  echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
					} else {
					  echo "Sorry, there was an error uploading your file.";
					}
				  }
				
				
				//echo "<pre>"; print_r($insert_array);die;
				$insert = $this->Users_model->saveUser($insert_array);
				redirect('Users/index');
			}
			
		}
	}
}
?>
	
	