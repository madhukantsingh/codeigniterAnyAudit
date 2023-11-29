<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model {
  function saveCountry($data){
    $this->db->insert('countries',$data);
  }

  function getCountryList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('countries')->result_array();
    return $all;
  }

  function getCountryDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('countries')->row_array();
    }
    return $res;
  }

  public function updateCountry($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('countries',$data);
    }
  }

  public function deleteCountry($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('countries');
}
}