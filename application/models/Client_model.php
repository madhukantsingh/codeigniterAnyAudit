<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model {
  function saveClient($data){
    $this->db->insert('clients',$data);
  }

  function getClientList(){
    //$this->db->order_by('id','desc');
    //$all = $this->db->get('users')->result_array();
    //return $all;
    $this->db->select('clients.*,district.district_name,mandal.mandal_name');
    $this->db->from('clients');
    $this->db->join('district', 'district.id = clients.client_name','left');
    $this->db->join('mandal', 'mandal.id = clients.mandal_name', 'left');
    

    $all = $this->db->get()->result_array();

    return $all; 
  }

  function getClientDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('clients')->row_array();
       
    }
    return $res;
  }

  public function updateClient($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('clients',$data);
    }
  }

  public function deleteClient($data){
        $this->db->where('id',$data['id']);
        $this->db->delete('clients');
  }
}