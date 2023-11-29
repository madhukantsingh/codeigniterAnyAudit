<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bhcnmm extends CI_Model {
  function saveCnm($data){
    $this->db->insert('cnm',$data);
  }

  function getcnmList(){
    //$this->db->order_by('id','desc');
    //$all = $this->db->get('users')->result_array();
    //return $all;
    $this->db->select('cnm.*,controllers.controller_name,model.model_name');
    $this->db->from('cnm');
    $this->db->join('controllers', 'controllers.id = cnm.controller_name','left');
    $this->db->join('model', 'model.id = cnm.model_name', 'left');
    

    $all = $this->db->get()->result_array();

    return $all; 
  }

  function getcnmDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('cnm')->row_array();
       
    }
    return $res;
  }

//   public function updatecnm($data){
//     if(!empty($data)){
//         $this->db->where('id',$data['id']);
//         $this->db->update('users',$data);
//     }
//   }

//   public function deleteUser($data){
//         $this->db->where('id',$data['id']);
//         $this->db->delete('users');
//   }
 }