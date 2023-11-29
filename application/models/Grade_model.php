<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grade_model extends CI_Model {
  function saveGrade($data){
    $this->db->insert('grades',$data);
  }

  function getGradeList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('grades')->result_array();
    return $all;
  }

  function getGradeDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('grades')->row_array();
    }
    return $res;
  }

  public function updateGrade($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('grades',$data);
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('grades');
    }
  }

}