<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model {
  function saveState($data){
    $this->db->insert('states',$data);
  }

  function getStateList(){
    // $this->db->order_by('id','desc');
    // $all = $this->db->get('states')->result_array();

    $this->db->select('*');
    $this->db->from('states');
    $this->db->join('countries', 'countries.id = states.country_id');

    $all = $this->db->get()->result_array();

    return $all;
  }

  public function getallStates($id){
    $this->db->where('country_id ',$id);
     $states = $this->db->get("states")->result_array();
     return $states;

  }

  function getStateDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('states')->row_array();
    }
    return $res;
  }

  public function updateState($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('states',$data);
    }
  }

  public function deleteState($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('states');
}
function getallCountries(){ 
 
  $all = $this->db->get('countries')->result_array();
  return $all;
}

}