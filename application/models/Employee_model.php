<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model {
  function saveEmployee($data){
    $this->db->insert('emp',$data);
  }

  function getEmployeeList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('emp')->result_array();
    return $all;
  }

  function getEmployeeDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('emp')->row_array();
    }
    return $res;
  }
  
  public function updateEmployee($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('emp',$data);
       // echo $this->db->last_query();die;
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('emp');
    }


}
}