<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blogm extends CI_Model {
  function saveLogin($data){
    $this->db->insert('bhsignup',$data);
  }
  function checkdata($data){
    //$this->db->order_by('id','desc');
    //$all = $this->db->get('users')->result_array();
    //return $all;
   // $this->db->select('users.*,countries.country_name,states.state_name');
    // print_r($data);
    $this->db->where('email',$data['email']);
    $this->db->where('password',$data['password']);
    $results = $this->db->get("bhsignup")->row_array();
    // echo $this->db->last_query();
    return $results;
  }
}

