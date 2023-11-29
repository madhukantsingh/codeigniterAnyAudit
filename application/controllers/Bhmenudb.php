<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bhmenudb extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Load model
		//$this->load->model('Dashboard_model');
	 }
	 public function index()
	{
		//$data['all_list'] = $this->Dashboard_model->getdashboardList();
		$this->load->view('bhmenuv');
	}
}