<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modelm extends CI_Model {
    function saveModel($data){
      $this->db->insert('Model',$data);
    }
    function getModelList(){
      // $this->db->order_by('id','desc');
      // $all = $this->db->get('states')->result_array();
  
      $this->db->select('*');
      $this->db->from('model');
      $this->db->join('controllers', 'controllers.id = model.controller_id');
  
      $all = $this->db->get()->result_array();
  
      return $all;
    }
      // function getModelList(){
      //   $this->db->order_by('id','desc');
      //   $all = $this->db->get('model')->result_array();
      //   return $all;
      // }
      public function getallModel($id){
        $this->db->where('controller_id ',$id);
         $m = $this->db->get("model")->result_array();
         return $m;
    
      }
      public function getcontrollernames(){
         $c = $this->db->get("controllers")->result_array();
         return $c;
    
      }
      function getModelDataById($id){
        $res = array();
        if(!empty($id)){
            $this->db->where('id',$id);
            $res = $this->db->get('model')->row_array();
        }
        return $res;
      }
      function getallcont(){ 
 
        $all = $this->db->get('controllers')->result_array();
        return $all;
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