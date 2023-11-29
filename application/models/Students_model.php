<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_model extends CI_Model {
  function saveStudent($data){
    $this->db->insert('sag_tab',$data);
  }

  function getStudentList(){
    $this->db->order_by('id');
    $all = $this->db->get('sag_tab')->result_array();
    // echo $this->db->last_query();
    return $all;
  }

  function getstudentDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('sag_tab')->row_array();
        // echo $this->db->last_query();
    }
    return $res;
  }
  // public function multiple_images($image = array()){

  //   return $this->db->insert_batch('profile_images',$image);
  //           }

  public function updateStudent($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('sag_tab',$data);
    }
  }
  public function deletestudent($id)
  {
    if(!empty($id))
    {
        $this->db->where('id',$id);
        $this->db->delete('sag_tab');
                
    }
  }
} 