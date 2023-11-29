
						
<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Students extends CI_Controller {
			public function __construct(){
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);
				parent::__construct();
		
				$this->load->model('Students_model');
			}
			public function homepage(){
				$this->load->view('homme');
				// print "<pre>";
				// print_r($data);
				// exit;
			}
			public function facebook(){
				$this->load->view('face');
			}

			public function index()
			{
				 $data['all_list'] = $this->Students_model->getStudentList();
				//  print "<pre>";
				//  print_r($data);
				//  exit;
				$this->load->view('students', $data);
			}
			public function adstudents()
			{
				$this->load->view('adstudents');
			}
			public function submit()
			{
				$this->load->view('submit');
			}
			
			public function addstudent($id=""){
				$data = array();
				if(!empty($id)){
					$data['res_data'] = $this->Students_model->getstudentDataById($id);
				}
				// print"<pre>";
				// print_r($data);
				// exit;
				$this->load->view('adstudents',$data);
			}
			public function deletestudent($id)
			{	
				$this->Students_model->deletestudent($id);
				redirect('Students/index');
				// print "<pre>";
				// print_r($id);
				// exit;
			
			}
			public function save_student()
			{
			
				
				//  echo "<pre>";
			//  print_r($_POST); print_r($_FILES);
			 //exit;
				if(!empty($_POST['fullname'])){

					if(!empty($_POST['edit_id'])){
						
						$update_array['name'] = $_POST['fullname'];
						$update_array['branch'] = $_POST['branch'];
						$update_array['email'] = $_POST['email'];
						$update_array['password'] = $_POST['password'];
						$update_array['city'] = $_POST['city'];
						$update_array['phone'] = $_POST['phone'];
						$update_array['updated_at'] = date('Y-m-d H:i:s');
						$update_array['id'] = $_POST['edit_id'];
						$update_array['uploadedfile'] = $_POST['uploadedfile'];
						$update = $this->Students_model->updateStudent($update_array);
						
						redirect('Students/index');
					}else{


						if($_FILES['fileToUpload']['name']!='') {
							$files = $_FILES; 
							$FILES['fileToUpload']['name']= str_replace(' ', '',$_FILES['fileToUpload']['name']);
							$_FILES['fileToUpload']['type']= $files['fileToUpload']['type'];
							$_FILES['fileToUpload']['tmp_name']= $files['fileToUpload']['tmp_name'];
							$_FILES['fileToUpload']['error']= $files['fileToUpload']['error'];
							$_FILES['fileToUpload']['size']= $files['fileToUpload']['size'];
						
							$config['upload_path'] = 'uploads/';
							$config['allowed_types'] = '*';
							$config['max_size'] = '1048576';
							$config['remove_spaces'] = true;
							$config['overwrite'] = false;
							$config['max_width'] = '';
							$config['max_height'] = '';
						
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							$this->upload->do_upload('fileToUpload');
									
							$att = str_replace(' ', '_',$_FILES['fileToUpload']['name']);
							


						$insert_array['name'] = $_POST['fullname'];
						$insert_array['branch'] = $_POST['branch'];
						$insert_array['email'] = $_POST['email'];
						$insert_array['password'] = $_POST['password'];
						$insert_array['city'] = $_POST['city'];
						$insert_array['phone'] = $_POST['phone'];
						$insert_array['uploadedfile'] = $att; //$_POST['fileToUpload']['name'];
						$insert_array['created_at'] = date('Y-m-d H:i:s');
						//$insert_array['updated_at'] = date('Y-m-d H:i:s');
						$insert_array['created_by'] = 1;
						// print "<pre>";
						// print_r($insert_array);
						//exit;
						$insert = $this->Students_model->saveStudent($insert_array);
						redirect('Students/index'); 

					// 	$target_dir = "uploads/";
					// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					// $uploadOk = 1;
					// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					// // Check if image file is a actual image or fake image
					// //if(isset($_POST["submit"])) {
					// $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					// if($check !== false) {
					// 	echo "File is an image - " . $check["mime"] . ".";
					// 	$uploadOk = 1;
					// } else {
					// 	echo "File is not an image.";
					// 	$uploadOk = 0;
					// }
					// //}

					// // Check if file already exists
					// if (file_exists($target_file)) {
					// echo "Sorry, file already exists.";
					// $uploadOk = 0;
					// }

					// // Check file size
					// if ($_FILES["fileToUpload"]["size"] > 500000) {
					// echo "Sorry, your file is too large.";
					// $uploadOk = 0;
					// }

					// Allow certain file formats
					// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					// && $imageFileType != "gif" ) {
					// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					// $uploadOk = 0;
					// }

					// // Check if $uploadOk is set to 0 by an error
					// if ($uploadOk == 0) {
					// echo "Sorry, your file was not uploaded.";
					// // if everything is ok, try to upload file
					// } else {
					// if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					// 	echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
					// } else {
					// 	echo "Sorry, there was an error uploading your file.";
					// }
					// }


					// 	redirect('Students/index');
					// }
					
					// 	// $this->load->library('upload');
					// 	// $image = array();
					// 	// $ImageCount = count($_FILES['image_name']['name']);
					// 	// 	  $i;
					// 	// 		  $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
								  
					  
					// 	// 		  // File upload configuration
					// 	// 		  $uploadPath = '/images/';
					// 	// 		  $config['upload_path'] = $uploadPath;
					// 	// 		  $config['allowed_types'] = 'jpg|jpeg|png|gif';
					  
					// 	// 		  // Load and initialize upload library
					// 	// 		  $this->load->library('upload', $config);
					// 	// 		  $this->upload->initialize($config);
					  
					// 	// 		  // Upload file to server
					// 	// 		  if($this->upload->do_upload('file')){
					// 	// 			  // Uploaded file data
					// 	// 			  $imageData = $this->upload->data();
					// 	// 			   $uploadImgData[$i]['image_name'] = $imageData['file_name'];
					  
					// 	// 		  }
					// 	// 	  }
					// 	// 	   if(!empty($uploadImgData))
					// 	// 	   {
					// 	// 		  // Insert files data into the database
					// 	// 		  $this->pages_model->multiple_images($uploadImgData);              
					// 	// 	  }
					 }
						
					}
				
					
			
						}
			
					}
							}
			
		
	
	