<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory_model extends CI_Model {
    
  function savesubcategory($data){
    $this->db->insert('subcategory',$data);
  }

  function getsubcategoryList(){
    // $this->db->order_by('id','desc');
    // $all = $this->db->get('subcategory')->result_array();

    $this->db->select('*');
    $this->db->from('subcategory');
    $this->db->join('category', 'category.id = subcategory.category_id');

    $all = $this->db->get()->result_array();

    return $all;
  }
 
  public function getallsubcategory($id){
    $this->db->where('category_id',$id);
     $subcategory = $this->db->get("subcategory")->result_array();
     return $subcategory;

  }
  function getsubcategoryDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('subcategory')->row_array();
    }
    return $res;
  }

  public function updatesubcategory($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('subcategory',$data);
    }
  }

  public function deletesubcategory($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('subcategory');
}
function getallcategory(){ 
 
  $all = $this->db->get('category')->result_array();
  return $all;
}



}