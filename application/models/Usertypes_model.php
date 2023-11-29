

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usertypes_model extends CI_Model {
  function saveUsertypes($data){
    $this->db->insert('usertypes',$data);
  }

  function getUsertypeList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('usertypes')->result_array();
    return $all;
  }

  function getUsertypeDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('usertypes')->row_array();
    }
    return $res;
  }

  public function updateUsertype($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('usertypes',$data);
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('usertypes');
    }
  }

}