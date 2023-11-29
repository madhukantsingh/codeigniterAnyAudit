<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bhloginm extends CI_Model {
    function saveBhloginc($data){
      $this->db->insert('bhsignup',$data);
    }
    function getBhlogincList(){
        $this->db->order_by('id','desc');
        $all = $this->db->get('bhsignup')->result_array();
        return $all;
      }
      function getBhlogincDataById($id){
        $res = array();
        if(!empty($id)){
            $this->db->where('id',$id);
            $res = $this->db->get('bhsignup')->row_array();
        }
        return $res;
      }
    //   public function updateControllers($data){
    //     if(!empty($data)){
    //         $this->db->where('id',$data['id']);
    //         $this->db->update('controllers',$data);
    //     }
    // }
    //     public function delete_Controllers($data)
    //     {
    //         if(!empty($data)){
    //             $this->db->where('id',$data['id']);
    //             $this->db->delete('controllers');
    //         }
    //     }

}