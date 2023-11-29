<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sections_model extends CI_Model {
  function saveSections($data){
    $this->db->insert('sections',$data);
  }

  function getSectionsList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('sections')->result_array();
    return $all;
  }

  function getSectionsListById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('sections')->row_array();
    }
    return $res;
  }

  public function updateSection($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('sections',$data);
        //echo $this->db>last_query();
    }
  }
  public function deletesection($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->delete('sections');
        //echo $this->db>last_query();
    }
  }



}