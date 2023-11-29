<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mandal_model extends CI_Model {
  function saveMandal($data){
    $this->db->insert('mandal',$data);
  }

  function getMandalList(){
     //$this->db->order_by('id','desc');
     //$all = $this->db->get('mandal')->result_array();

    $this->db->select('*');
    $this->db->from('mandal');
    $this->db->join('district', 'district.id = mandal.district_id');

    $all = $this->db->get()->result_array();

    return $all;
  }

  public function getallMandals($id){
    $this->db->where('district_id ',$id);
     $states = $this->db->get("mandal")->result_array();
     return $mandals;

  }

  function getMandalDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('mandal')->row_array();
    }
    return $res;
  }

  public function updateMandal($data){
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('mandal',$data);
    }
  }

  public function deletemandal($data){
    $this->db->where('id',$data['id']);
    $this->db->delete('mandal');
}
function getallDistrict(){ 
 
  $all = $this->db->get('district')->result_array();
  return $all;
}

}