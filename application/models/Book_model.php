

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Book_model extends CI_Model {
  function saveBook($data){
    $this->db->insert('Book',$data);
  }

  function getBookList(){
    $this->db->order_by('id','desc');
    $all = $this->db->get('Book')->result_array();
    return $all;
  }

  function getBookDataById($id){
    $res = array();
    if(!empty($id)){
        $this->db->where('id',$id);
        $res = $this->db->get('Book')->row_array();
    }
    return $res;
  }

  public function updateBook($data)
  {
    if(!empty($data)){
        $this->db->where('id',$data['id']);
        $this->db->update('Book',$data);
    }
  } 
    public function delete($data)
    {
      if(!empty($data['id']))
      {
          $this->db->where('id',$data['id']);
          $this->db->delete('Book');
      } 
  
}

}