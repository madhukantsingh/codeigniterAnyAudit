

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emp_model extends CI_Model {
  function saveEmp($data){
    $this->db->insert('emp',$data);
  }

  function getEmpList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('emp')->result_array();
    return $all;
  }

  function getEmpDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('emp')->row_array();
    }
    return $res;
  }

  public function updateEmp($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('emp',$data);
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('emp');
    }
  }

}