<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{
    
        public function get_products_all()
        {
            $data = $this->db->query("SELECT * FROM products");
            return $data->result_array();
        }
    
        public function insert_product($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    public function delete_products_by_pc($productCode)
    {
        $this->db->where('productCode',$productCode);
        $this->db->delete('products');
    }
    
    public function get_products_by_pc($productCode){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('productCode', $productCode);

        return $this->db->get()->row_array();
    }

    public function update_products_by_pc($productsCode, $arr_update){

        $this->db->where('productCode', $productsCode);
        $this->db->update('products', $arr_update);
        
        return 'Berhasil Update';
    }

    function delete_products_by_p($productCode){
        $hasil=$this->db->query("DELETE FROM products WHERE productCode='$productCode'");
        return $hasil;
    }
   
}