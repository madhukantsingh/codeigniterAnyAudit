

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {
  function saveProduct($data){
    $this->db->insert('product',$data);
  }

  function getProductList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('product')->result_array();
    return $all;
  }

  function getProductDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('product')->row_array();
    }
    return $res;
  }

  public function updateProduct($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('product',$data);
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('product');
    }
  }
}
