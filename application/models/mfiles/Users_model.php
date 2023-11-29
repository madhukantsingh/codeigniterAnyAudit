<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
  function saveUser($data){
    $this->db->insert('users',$data);
  }

  function getUserList(){
    //$this->db->order_by('id','desc');
    //$all = $this->db->get('users')->result_array();
    //return $all;
    $this->db->select('users.*,countries.country_name,states.state_name');
    $this->db->from('users');
    $this->db->join('countries', 'countries.id = users.country_name','left');
    $this->db->join('states', 'states.id = users.state_name', 'left');
    

    $all = $this->db->get()->result_array();

    return $all; 
  }

  function getUserDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('users')->row_array();
       
    }
    return $res;
  }

  public function updateUser($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('users',$data);
    }
  }

  public function deleteUser($data){
        $this->db->where('id',$data['id']);
        $this->db->delete('users');
  }
}