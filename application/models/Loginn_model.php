

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loginn_model extends CI_Model {
  function saveLogin($data){
    $this->db->insert('usertypes',$data);
  }

 function checkdate($data){
  $this->db->where('email',$data['email']);
  $this->db->where('password',$data['password']);
  $results = $this->db->get("usertypes")->row_array();
  return $results;
 }
}