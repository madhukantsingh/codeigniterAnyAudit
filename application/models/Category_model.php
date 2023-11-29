<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
  function saveCategory($data){
    $this->db->insert('category',$data);
  }

  function getCategoryList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('category')->result_array();
    return $all;
  }
  
  function getCategoryDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('category')->row_array();
    }
    return $res;
  }

  public function updateCategory($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('category',$data);
    }
  }

  public function deleteCategory($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('category');
}
}