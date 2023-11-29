<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subjects_model extends CI_Model {
  function saveSubject($data){
    $this->db->insert('sagsol',$data);
  }

  function getSubjectList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('sagsol')->result_array();
    return $all;
  }

  function getSubjectDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('sagsol')->row_array();
    }
    return $res;
  }

  public function updateSubject($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('sagsol',$data);
    }
  }

}