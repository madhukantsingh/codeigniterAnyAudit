<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dropdown_model extends CI_Model {
  function saveUser($data){
    $this->db->insert('dropdown',$data);
  }

  function getDropdownList(){
    //$this->db->order_by('id','desc');
    //$all = $this->db->get('users')->result_array();
    //return $all;
    $this->db->select('dropdown.*,product.name,productcompanies.companyname');
    $this->db->from('dropdown');
    $this->db->join('product', 'product.id = product.name','left');
    $this->db->join('productcompanies', 'productcompanies.id = dropdown.companyname', 'left');
    

    $all = $this->db->get()->result_array();

    return $all; 
  }

  function getDropdownDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('dropdown')->row_array();
       
    }
    return $res;
  }

  public function updateDropdown($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('dropdown',$data);
    }
  }

  public function deleteDropdown($data){
        $this->db->where('id',$data['id']);
        $this->db->delete('dropdown');
  }
}