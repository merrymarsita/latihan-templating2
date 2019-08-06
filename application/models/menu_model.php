<?php
defined('BASEPATH') or exit('No direct script access allowed');
class menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function queryMenu()
    {
        $role_id = $this->session->userdata('role_id');
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id', 'left');
        $this->db->where('user_access_menu.role_id', $role_id);
        $this->db->ORDER_BY('user_access_menu.menu_id', 'ASC');
        $menu = $this->db->get();
        return $menu->result_array();
        // var_dump($menu);
        // die();
    }
    public function subMenu($param_menu_id = null)
    {

        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $where = " menu_id = '" . $param_menu_id . "' AND is_active ='1'";
        $this->db->where($where);
        $submenu = $this->db->get();
        return $submenu->result_array();
    }
    
    public function menuManagemnet()
    {
        return $data['menu'] = $this->db->get('user_menu')->result_array();
    }

    public function insertMenu($menu)
    {
        return $data['menu'] = $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        
    }

    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function insertSubmenu($data)
    {
        return $data['user_sub_menu'] = $this->db->insert('user_sub_menu', $data);
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

        //return $this->db->get_where('user', ['email' => $email])->row_array();
    }

}
