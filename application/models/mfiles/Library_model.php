<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Library_model extends CI_Model {
    function saveLibrary($data){
      $this->db->insert('library',$data);
    }
    function getLibraryList(){
        $this->db->order_by('id','desc');
        $all = $this->db->get('library')->result_array();
        return $all;
      }
      function getLibraryDataById($id){
        $res = array();
        if(!empty($id)){
            $this->db->where('id',$id);
            $res = $this->db->get('library')->row_array();
        }
        return $res;
      }
      public function updateLibrary($data){
        if(!empty($data)){
            $this->db->where('id',$data['id']);
            $this->db->update('library',$data);
        }
    }
        public function delete_library($data)
        {
            if(!empty($data)){
                $this->db->where('id',$data['id']);
                $this->db->delete('library');
            }
        }

}