<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Purna extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Load model
		//$this->load->model('Pdash_model');
	 }
	 public function index()
	{
		//$data['all_list'] = $this->Dashboard_model->getdashboardList();
		$this->load->view('pdashb');
	}
}