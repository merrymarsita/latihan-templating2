<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Office_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_offices_all()
    {
        $this->db->select('*');
        $this->db->from('offices');

        return $this->db->get()->result_array();
    }

    function insert_office($data)
    {
        $this->db->insert('offices', $data);
        return $this->db->insert_id();
    }

    public function get_offices_by_oc($officeCode){
        $this->db->select('*');
        $this->db->from('offices');
        $this->db->where('officeCode', $officeCode);

        return $this->db->get()->row_array();
    }

    public function update_offices_by_oc($officeCode, $arr_update){

        $this->db->where('officeCode', $officeCode);
        $this->db->update('offices', $arr_update);
        
        return 'Berhasil Update';
    }

    public function delete_offices_by_oc($officeCode)
    {
        $this->db->where('officeCode',$officeCode);
        $this->db->delete('offices');
    }
    
}
