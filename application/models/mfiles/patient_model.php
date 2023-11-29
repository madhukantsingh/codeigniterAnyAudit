<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model {
  function savePatient($data){
    $this->db->insert('patient',$data);
  }

  function getpatientList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('patient')->result_array();
    return $all;
  }

  function getpatientListById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('patient')->row_array();
    }
    return $res;
  }
  
  public function updatePatient($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('patient',$data);
        //echo $this->db>last_query();
    }
  }
  public function deletePatient($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->delete('patient');
        //echo $this->db>last_query();
    }
  }
}