<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('menu_model');
        $this->load->model('user_model');
        $this->load->model('menu2_model');
        $this->load->model('employee_model');
        $this->load->model('office_model');
        $this->load->model('products_model');
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->user_model->afterLogin();
        $data['title'] = 'Master Office';
        
        /*$data_apa = $this->menu_model->queryMenu();
        echo "<pre>";
        print_r($data_apa);
        echo "</pre>"; */

        //$data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer'); 

        } 
        else {
            $menu = $this->input->post('menu');
            $data['user_menu'] = $this->menu_model->insertMenu($menu);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function employees()
    {
        $data['title'] = 'Master Employee';
        $data['sub_menu'] = '';
        $data['user'] = $this->user_model->afterLogin();

        $data_employees = $this->employee_model->get_employees_all();

        //Masukkan Data ke Array $data dengan nama key 'data_dari_database'
        $data['data_dari_database'] = $data_employees;
        //$data['employees'] = $this->master_model->insert_employees();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/employees/index', $data);
        $this->load->view('templates/footer');


    }

    public function insertEmployees()
    {
        $data['title'] = 'Add Employee';
        $data['user'] = $this->user_model->afterLogin();
        $data['employees'] = $this->employee_model->get_employees_all();
        $data['offices'] = $this->office_model->get_offices_all();
        $this->form_validation->set_rules('employeeNumber', 'EmployeeNumber', 'required|is_unique[employees.employeeNumber]|exact_length[4]');
        $this->form_validation->set_rules('lastName', 'LastName', 'required|trim');
        $this->form_validation->set_rules('firstName', 'FirstName', 'required|trim');
        $this->form_validation->set_rules('extension', 'Extension', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[employees.email]');
        $this->form_validation->set_rules('officeCode', 'OfficeCode', 'required|trim');
        $this->form_validation->set_rules('reportsTo', 'ReportsTo', 'required|trim');
        $this->form_validation->set_rules('jobTitle', 'JobTitle', 'required|trim');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/employees/v_add_employee', $data);
            $this->load->view('templates/footer'); 
        } else {
            //echo 'data berhasil ditambahkan';
            $data = [
                'employeeNumber' => $this->input->post('employeeNumber'),
                'lastName' => $this->input->post('lastName'),
                'firstName' => $this->input->post('firstName'),
                
            ];
            $this->employee_model->insert_employee($data);
            //$data['employees'] = $this->master_model->insert_employees($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New employee added!</div>');
            redirect('master/employees/index');
        }
    }
    
    public function editEmployees($employeeNumber)
    {
        $data['user'] = $this->user_model->afterLogin();
        $data['title'] = 'Edit Employee';
        $data['employees'] = $this->employee_model->get_employees_all();
        $data_employee = $this->employee_model->get_employees_by_en($employeeNumber);
        $data['offices'] = $this->office_model->get_offices_all();
        $data_employee_for_dropdown = $this->employee_model->get_employees_all();
        $data_office_for_dropdown = $this->office_model->get_offices_all();


        $data['data_employee'] = $data_employee;
        $data['data_employee_for_dropdown'] = $data_employee_for_dropdown;
        //$data['data_office'] = $data_office;
        $data['data_office_for_dropdown'] = $data_office_for_dropdown;
       
        $this->form_validation->set_rules('firstName', 'First Name', 'required|trim');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|trim');
        $this->form_validation->set_rules('extension', 'Extension', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('officeCode', 'Office Code', 'required|trim');
        $this->form_validation->set_rules('reportsTo', 'Reports To', 'required|trim');
        $this->form_validation->set_rules('jobTitle', 'Job Title', 'required|trim');

        if($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/employees/v_edit_employee', $data);
            $this->load->view('templates/footer');
        
        } else {

            $post = $this->input->post();

            $arr_update = array(
                'lastName' => $post['lastName'],
                'firstName' => $post['firstName'],
                'extension' => $post['extension'],
                'email' => $post['email'],
                'officeCode' => $post['officeCode'],
                'reportsTo' => $post['reportsTo'],
                'jobTitle' => $post['jobTitle']
            );
           
            $hasil = $this->employee_model->update_employees_by_en($employeeNumber, $arr_update);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employee has been updated!</div>');
            redirect('master/employees/index');
        }
        
    }

    public function deleteEmployees($employeeNumber)
    {
        $where = array('employeeNumber' => $employeeNumber);
        $this->employee_model->delete_employees_by_en($employeeNumber);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employee has been deleted!</div>');
        redirect('master/employees/index');
    }

    public function offices()
    {
        $data['title'] = 'Master Offices';
        $data['sub_menu'] = '';
        $data['user'] = $this->user_model->afterLogin();

        $data_offices = $this->office_model->get_offices_all();

        //Masukkan Data ke Array $data dengan nama key 'data_dari_database'
        $data['data_dari_database'] = $data_offices;
        //$data['employees'] = $this->master_model->insert_employees();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/offices/index', $data);
        $this->load->view('templates/footer');

    }

    public function insertOffices()
    {
        $data['title'] = 'Add Office';
        $data['user'] = $this->user_model->afterLogin();
        $data['offices'] = $this->office_model->get_offices_all();
        $this->form_validation->set_rules('officeCode', 'Office Code', 'required|is_unique[offices.officeCode]');
        $this->form_validation->set_rules('city', 'City', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('addressLine1', 'Address Line 1', 'required|trim');
        $this->form_validation->set_rules('addressLine2', 'Address Line 2', 'required|trim');
        $this->form_validation->set_rules('state', 'State', 'required|trim');
        $this->form_validation->set_rules('country', 'Country', 'required|trim');
        $this->form_validation->set_rules('postalCode', 'Postal Code', 'required|trim');
        $this->form_validation->set_rules('territory', 'Territory', 'required|trim');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/offices/v_add_office', $data);
            $this->load->view('templates/footer'); 
        } else {
            //echo 'data berhasil ditambahkan';
            $data = [
                'officeCode' => $this->input->post('officeCode'),
                'city' => $this->input->post('city'),
                'phone' => $this->input->post('phone'),
                'addressLine1' => $this->input->post('addressLine1'),
                'addressLine2' => $this->input->post('addressLine2'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
                'postalCode' => $this->input->post('postalCode'),
                'territory' => $this->input->post('territory')
            ];
            $this->office_model->insert_office($data);
            //$data['employees'] = $this->master_model->insert_employees($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New office added!</div>');
            redirect('master/offices/index');
        }
    }

    public function editOffices($officeCode)
    {
        $data['user'] = $this->user_model->afterLogin();
        $data['title'] = 'Edit Office';
        $data['offices'] = $this->office_model->get_offices_all();
        $data_office = $this->office_model->get_offices_by_oc($officeCode);

        $data['data_office'] = $data_office;
       
        $this->form_validation->set_rules('city', 'City', 'required|trim');

        if($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/offices/v_edit_office', $data);
            $this->load->view('templates/footer');
        
        } else {

            $post = $this->input->post();

            $arr_update = array(
                'city' => $post['city'],
                'phone' => $post['phone'],
                'addressLine1' => $post['addressLine1'],
                'addressLine2' => $post['addressLine2'],
                'state' => $post['state'],
                'country' => $post['country'],
                'postalCode' => $post['postalCode'],
                'territory' => $post['territory']
            );
           
            $hasil = $this->office_model->update_offices_by_oc($officeCode, $arr_update);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employee has been updated!</div>');
            redirect('master/offices/index');
        }
        
    }

    public function deleteOffices($officeCode)
    {
        $where = array('officeCode' => $officeCode);
        $this->office_model->delete_offices_by_oc($officeCode);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Employee has been deleted!</div>');
        redirect('master/offices/index');
    }

    public function ajax_get_products()
    {
        $data = $this->products_model->get_products_all();
        echo json_encode($data); 
        
    }

    public function insertProducts()
    {
        $data['title'] = 'Add Products';
        $data['user'] = $this->user_model->afterLogin();
        $data['products'] = $this->products_model->get_products_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/products/v_add_product', $data);
        $this->load->view('templates/footer');
        
       
    }

    public function ajax_insertProducts()
    {
        //die("masuk");
        $data = array(
            'productCode' => $this->input->post('productCode'),
            'productName' => $this->input->post('productName'),
            'productLine' => $this->input->post('productLine'),
            'productScale' => $this->input->post('productScale'),
            'productVendor' => $this->input->post('productVendor'),
            'productDescription' => $this->input->post('productDescription'),
            'quantityInStock' => $this->input->post('quantityInStock'),
            'buyPrice' => $this->input->post('buyPrice'),
            'MSRP' => $this->input->post('MSRP')
        );
        $data = $this->products_model->insert_product($data);
        //print_r($_POST);
       // echo json_encode($data);
        echo 'Berhasil';
        //redirect('products');
       
    }

    public function editProducts($productCode)
    {
        $data['user'] = $this->user_model->afterLogin();
        $data['title'] = 'Edit Product';
        $data['productCode'] = $productCode;
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/products/v_edit_product', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_editProducts()
    {
        $productCode = $this->input->post('productCode');
        
        $hasil = $this->products_model->get_products_by_pc($productCode);
        echo json_encode($hasil);
        
    }
    public function ajax_saveUpdateProducts()
    {
        $productCode = $this->input->post('productCode');
        $arr_updatex =  array(
            'productName' =>  $this->input->post('productName'),
            'productLine' => $this->input->post('productLine'),
            'productScale' => $this->input->post('productScale'),
            'productVendor' => $this->input->post('productVendor'),
            'productDescription' => $this->input->post('productDescription'),
            'quantityInStock' => $this->input->post('quantityInStock'),
            'buyPrice' => $this->input->post('buyPrice'),
            'MSRP' => $this->input->post('MSRP')
        );
        $hasil = $this->products_model->update_products_by_pc($productCode, $arr_updatex);
        //$hasil = $this->products_model->get_products_by_pc($productCode);
        echo json_encode($hasil);
        
    }


    public function ajax_updateProducts()
    {

        $productCode = $this->input->post('productCode');
        $productName = $this->input->post('productName');
        $productLine = $this->input->post('productLine');
        $productScale = $this->input->post('productScale');
        $productVendor = $this->input->post('productVendor');
        $productDescription = $this->input->post('productDescription');
        $quantityInStock = $this->input->post('quantityInStock');
        $buyPrice = $this->input->post('buyPrice');
        $MSRP = $this->input->post('MSRP');
        $hasil = $this->products_model->get_products_by_pc($productCode);
        echo json_encode($hasil);
    }

    function ajax_deleteProducts($productCode)
    {
        $data=$this->products_model->delete_products_by_p($productCode);
        echo json_encode($data);
    }

    public function ajax_get_employees()
    {
        $data = $this->employee_model->get_employees_all();
        echo json_encode($data); 
        
    }

    public function insertEmployee()
    {
        $data['title'] = 'Add Employee';
        $data['user'] = $this->user_model->afterLogin();
        $data['employees'] = $this->employee_model->get_employees_all();
        $data['offices'] = $this->office_model->get_offices_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/employee_ajax/v_add_employee', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_insertEmployee()
    {
        $data = array(
            'employeeNumber' => $this->input->post('employeeNumber'),
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'extension' => $this->input->post('extension'),
            'email' => $this->input->post('email'),
            'officeCode' => $this->input->post('officeCode'),
            'reportsTo' => $this->input->post('reportsTo'),
            'jobTitle' => $this->input->post('jobTitle')
        );
        $data = $this->employee_model->insert_employee($data);
       
       // echo json_encode($data);
        echo 'Berhasil';
       // redirect('employee_ajax');
       
    }

    public function edit_Employees($employeeNumber)
    {
        $data['user'] = $this->user_model->afterLogin();
        $data['title'] = 'Edit Eemployee';
        $data['employeeNumber'] = $employeeNumber;
        $data['offices'] = $this->office_model->get_offices_all();
        $data['employees'] = $this->employee_model->get_employees_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/employee_ajax/v_edit_employee', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_editEmployees()
    {
        $employeeNumber = $this->input->post('employeeNumber');
        
        $hasil = $this->employee_model->get_employees_by_en($employeeNumber);
        echo json_encode($hasil);
        
    }

    public function ajax_saveUpdateEmployees()
    {
        $employeeNumber = $this->input->post('employeeNumber');
        $arr_updatex =  array(
            'employeeNumber' =>  $this->input->post('employeeNumber'),
            'lastName' => $this->input->post('lastName'),
            'firstName' => $this->input->post('firstName'),
            'extension' => $this->input->post('extension'),
            'email' => $this->input->post('email'),
            'officeCode' => $this->input->post('officeCode'),
            'reportsTo' => $this->input->post('reportsTo'),
            'jobTitle' => $this->input->post('jobTitle')
        );
        $hasil = $this->employee_model->update_employees_by_en($employeeNumber, $arr_updatex);
        //$hasil = $this->products_model->get_products_by_pc($productCode);
        echo json_encode($hasil);
        
    }

    function ajax_deleteEmployees($employeeNumber)
    {

        $data = $this->employee_model->delete_employees_by_n($employeeNumber);
      

       // echo $data;
    }

    public function ajax_get_offices()
    {
        $data = $this->office_model->get_offices_all();
        echo json_encode($data); 
        
    }

    public function insertOffice()
    {
        $data['title'] = 'Add Office';
        $data['user'] = $this->user_model->afterLogin();
        $data['offices'] = $this->office_model->get_offices_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/office_ajax/v_add_office', $data);
        $this->load->view('templates/footer');
    }

    public function ajax_insertOffice()
    {
        $data = array(
            'officeCode' => $this->input->post('officeCode'),
            'city' => $this->input->post('city'),
            'phone' => $this->input->post('phone'),
            'addressLine1' => $this->input->post('addressLine1'),
            'addressLine2' => $this->input->post('addressLine2'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'postalCode' => $this->input->post('postalCode'),
            'territory' => $this->input->post('territory')
        );
        $data = $this->office_model->insert_office($data);
       
       // echo json_encode($data);
        echo 'Berhasil';
       // redirect('employee_ajax');
       
    }
}
