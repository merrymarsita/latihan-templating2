<?php
defined('BASEPATH') or exit('No direct script access allowed');

class role_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function role($data)
    {
        return $data['role'] = $this->db->get('user_role')->result_array();
    }

    public function roleAccess($role_id)
    {
        /*$data['menu'] = $this->db->get('user_menu');
        return $data['menu']->result_array();*/
        $menu = $this->db->get('user_menu');
        return $menu->result_array();

        //$email = $this->db->get_where('user', ['email' => $email])
        //return $email->row_array();
        //return $this->db->get_where('user', ['email' => $email])->row_array();
        //return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
       
    }

    public function getIdUserRole($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        //$data['role'] =$this->db->get_where('user_role', ['id' => $role_id])->row_array();

        //return $this->db->get_wh
    }

    public function getUser_access_menu()
    {
        $query = $this->db->get('user_access_menu');
        return $query->result();
    }

    public function changeAccess()
    {
       /*$menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
        $this->db->insert('user_access_menu', $data);
    } else {
        $this->db->delete('user_access_menu', $data);
    }*/
    }
    
}
