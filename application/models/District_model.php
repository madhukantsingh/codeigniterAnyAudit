<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class District_model extends CI_Model {
  function saveDistrict($data){
    $this->db->insert('district',$data);
  }

  function getDistrictList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('district')->result_array();
    return $all;
  }
  function getDistrictDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('district')->row_array();
    }
    return $res;
  }

  public function updateDistrict($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('district',$data);
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('district');
    }
  }

}