<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
  
    public $jobTitle;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get_employees_all(){
        $this->db->select('*');
        $this->db->from('employees');

        return $this->db->get()->result_array();
    }

    public function get_employees_by_en($employeeNumber){
        $this->db->select('*');
        $this->db->from('employees');
        $this->db->where('employeeNumber', $employeeNumber);

        return $this->db->get()->row_array();
    }

    public function update_employees_by_en($employeeNumber, $arr_update){

        $this->db->where('employeeNumber', $employeeNumber);
        $this->db->update('employees', $arr_update);
        
        return 'Berhasil Update';
    }

    public function insert_employee($data)
    {
        $this->db->insert('employees', $data);
        return $this->db->insert_id();
    }

    public function delete_employees_by_en($employeeNumber)
    {
        $this->db->where('employeeNumber',$employeeNumber);
        $this->db->delete('employees');
    }
    
    function delete_employees_by_n($employeeNumber){
       
        $this->db->where('employeeNumber',$employeeNumber);
        $this->db->delete('employees');

        return 'ok';
    }
}
