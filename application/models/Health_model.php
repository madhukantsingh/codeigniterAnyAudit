<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Health_model extends CI_Model 
{
  function hospital($data){
    $this->db->insert('hospital',$data);
  }
}?>  


