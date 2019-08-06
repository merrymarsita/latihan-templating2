<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('user_model');
        $this->load->model('role_model');
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->user_model->afterLogin();
        $data['title'] = 'Dashboard';
        /*$data_apa = $this->menu_model->queryMenu();
        echo "<pre>";
        print_r($data_apa);
        echo "</pre>"; */
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {  
        $data['user'] = $this->user_model->afterLogin();
        $data['user_role'] = $this->role_model->role($data);
        $data['title'] = 'Role';
        /*$data_apa = $this->menu_model->queryMenu();
        echo "<pre>";
        print_r($data_apa);
        echo "</pre>"; */
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['user'] = $this->user_model->afterLogin();
        //$data['user_role'] = $this->menu_model->roleAccess($role_id);
        //$user_role = $this->menu_model->roleAccess($role_id);
        //$data['email'] = $this->menu_model-roleAccess($role_id);

        $data['role'] = $this->role_model->getIdUserRole($role_id);
        //$data['role'] =$this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $data['title'] = 'Role Access';
        $this->db->where('id !=', 1);
        //$data['menu'] = $this->db->get('user_menu')->result_array(); 
        $data['menu'] = $this->role_model->roleAccess($role_id);

        /*$data_apa = $this->menu_model->queryMenu();
        echo "<pre>";
        print_r($data_apa);
        echo "</pre>"; */
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        //
        $data['query'] = $this->role_model->getUser_access_menu();
        
        $menu_id = $this->input->post('menuId');
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
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success"
        role="alert">Access Changed!</div');
    }
}
