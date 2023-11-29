<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contm extends CI_Model {
    function saveControllers($data){
      $this->db->insert('controllers',$data);
    }
    function getControllersList(){
        $this->db->order_by('id','desc');
        $all = $this->db->get('controllers')->result_array();
        return $all;
      }
      function getControllersDataById($id){
        $res = array();
        if(!empty($id)){
            $this->db->where('id',$id);
            $res = $this->db->get('controllers')->row_array();
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