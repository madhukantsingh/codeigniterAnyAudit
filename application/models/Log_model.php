<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Log_model extends CI_Model {
  function saveLogin($data){
    $this->db->insert('users',$data);
  }
  function checkdata($data){
    //$this->db->order_by('id','desc');
    //$all = $this->db->get('users')->result_array();
    //return $all;
   // $this->db->select('users.*,countries.country_name,states.state_name');
    // print_r($data);
    $this->db->where('email',$data['email']);
    $this->db->where('password',$data['password']);
    $results = $this->db->get("users")->row_array();
    // echo $this->db->last_query();die;
    return $results;
  }
}