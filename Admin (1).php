<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		is_logged_in(); // Helper
		$this->load->library('form_validation');
		$this->load->model('admin/akses_model', 'akses');
    }

    public function index(){
       	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';
		$data['sub_menu'] = '';
	   
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
		$this->load->view('admin/admin/index', $data);
		$this->load->view('admin/templates/footer');
	}

	//----- Setting Access
	
	public function role(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Setting Akses';
        $data['sub_menu'] = 'Role';
        
        // Config Database
        $data['data_role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/akses/role', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $post = $this->input->post();
            $this->db->insert('user_role', $post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Conratulation!, Your Add Role
                                        </div>');
            redirect('admin/role');    
        }
        
        
    }

    public function roleDelete($id){
        //echo $id;
		if($id){
			$this->db->delete('user_role', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete Akses Role
										</div>');
			redirect('admin/role');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('admin/role');
		}
    }

    // Role Akses User
    public function aksesUserRole(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Setting Akses';
        $data['sub_menu'] = 'Role Akses User';
        
        // Config Database
        $data['data_role_menu'] = $this->akses->getRoleMenu();
        $data['arr_role'] = $this->akses->getRole();
        $data['arr_menu'] = $this->akses->getMenu();

        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu Header', 'required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/akses/aksesuserrole', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $post = $this->input->post();
            $this->db->insert('user_access_menu', $post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Conratulation!, Your Add Role Akses Menu
                                        </div>');
            redirect('admin/aksesUserRole');
        }
    }

    public function aksesRoleDelete($id){
        //echo $id;
		if($id){
			$this->db->delete('user_access_menu', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete Akses Role Menu
										</div>');
			redirect('admin/aksesUserRole');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('admin/aksesUserRole');
		}
	}

	// User Management
	public function userManagement(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Setting Akses';
        $data['sub_menu'] = 'User Management';
        
        // Config Database
        $data['data_user'] = $this->akses->getUser();
        

        //$this->form_validation->set_rules('role_id', 'Role', 'required');
        //$this->form_validation->set_rules('menu_id', 'Menu Header', 'required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/akses/usermanagement', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $post = $this->input->post();
            $this->db->insert('user_access_menu', $post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Conratulation!, Your Add Role Akses Menu
                                        </div>');
            redirect('admin/userManagement');
        }
	}

	public function userManagementDelete($id){
        //echo $id;
		if($id){
			$this->db->delete('user', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete User
										</div>');
			redirect('admin/userManagement');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('admin/userManagement');
		}
    }
    
    public function employees(){
        $this->load->model('Employees_model');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Master Employees';
        $data['sub_menu'] = '';

        //Ambil Data Dari Model, masukkan ke variable $data_employees
        $data_employees = $this->Employees_model->get_employees_all();

        //Masukkan Data ke Array $data dengan nama key 'data_dari_database'
        $data['data_dari_database'] = $data_employees;

        

        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
		$this->load->view('admin/employees/index', $data);
		$this->load->view('admin/templates/footer');
    }

    //editEmployees/1

    public function editEmployees($employeeNumber){
        $this->load->model('Employees_model');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Employees';
        $data['sub_menu'] = '';

        //Ambil data dari databaes dengan Employee Number 
        $data_employee = $this->Employees_model->get_employees_by_en($employeeNumber);

        $data_employee_for_dropdown = $this->Employees_model->get_employees_all();


        $data['data_employee'] = $data_employee;
        $data['data_employee_for_dropdown'] = $data_employee_for_dropdown;
        
        $this->form_validation->set_rules('firstName', 'First Name', 'trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/employees/v_edit_employee', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $post = $this->input->post();
            


            $arr_update = array(
                'firstName' => $post['firstName'],
                'reportsTo' => $post['reportsTo']
            );

            $hasil = $this->Employees_model->update_employees_by_en($employeeNumber, $arr_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Congratulation! Data has Been Updated
										</div>');
			redirect('admin/employees');

        }
    }

    public function ajax_hitungLuas(){
        $panjang = $this->input->post('var_ajax_panjang');
        $lebar = $this->input->post('var_ajax_lebar');

        $luas = $panjang * $lebar;

        echo $luas;
    }
	
	
}