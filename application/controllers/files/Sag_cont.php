<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Sag_cont extends CI_Controller 
        {
			public function __construct()
            {
				// ini_set('display_errors', 1);
				// ini_set('display_startup_errors', 1);
				// error_reporting(E_ALL);
				parent::__construct();
		
				$this->load->model('Sag_model');
			}
            public function test(){
                $this->load->view('sag_view');
            }  
            public function test1(){
                $this->load->view('sag_contact');
            }
            public function index()
	        {
                //$data['all_list'] = $this->Dashboard_model->getdashboardList();
                $this->load->view('homev');
            }
            public function test2()
            {
                $this->load->view('subjects');

            }  
            public function test3(){
                $this->load->view('contv');
            }
                
            
        }
    ?>