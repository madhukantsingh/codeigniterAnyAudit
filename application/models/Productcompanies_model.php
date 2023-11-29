

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productcompanies_model extends CI_Model {
  function saveProductcompanies($data){
    $this->db->insert('productcompanies',$data);
  }

  function getProductcompaniesList(){
    // $this->db->order_by('id','desc');
    // $all = $this->db->get('productcompanies')->result_array();
    $this->db->select('*');
    $this->db->from('productcompanies');
    $this->db->join('product', 'product.id = productcompanies.product_id');

    $all = $this->db->get()->result_array();

    return $all;
   
  }
  public function getallProductCompanies($id){
    $this->db->where('product_id ',$id);
     $product = $this->db->get("productcompanies")->result_array();
     return $product;

  }


  function getProductcompaniesDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('productcompanies')->row_array();
    }
    return $res;
  }

  public function updateProductcompanies($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('productcompanies',$data);
    }
  }
  public function delete($data){
    if(!empty($data['id'])){
      $this->db->where('id',$data['id']);
      $this->db->delete('productcompanies');
    }
  }
  function getallProduct(){ 
		$all = $this->db->get('product')->result_array();
		return $all;
	  }
}