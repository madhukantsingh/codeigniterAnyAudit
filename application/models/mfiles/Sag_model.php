<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sag_model extends CI_Model 
{
  function sag_view($data){
    $this->db->insert('sag_tab',$data);
  }
}?>  