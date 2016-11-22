<?php

class AddProductModel extends CI_Model {

    public function insert_product($data) {
      return $this->db->insert('products', $data);
    }

    public function get_product(){
       $this->db->select("*");
       $this->db->from('products');
       $query = $this->db->get();

       return $query->result();
    }

    public function get_product_data($id){
       $this->db->select("*");
       $this->db->from('products');
       $this->db->where("id = $id");
       $query = $this->db->get();

       return $query->result_array();
    }

}

 ?>
