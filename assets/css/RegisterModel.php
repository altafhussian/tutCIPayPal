<?php

class RegisterModel extends CI_Model {

    public function insert_users($data) {
      $this->load->database();
      return $this->db->insert('users', $data);
    }

    public function get_users($id){
       $this->db->select("*");
       $this->db->from('users');
       $this->db->where("id = $id");
       $query = $this->db->get();

       return $query->result();
    }
    
}

 ?>
