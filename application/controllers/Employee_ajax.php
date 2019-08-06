<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_ajax extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('employee_model');
        $this->load->model('products_model');
        $this->load->model('user_model');
        $this->load->model('menu_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index()
    {
        $data['title'] = "Master Employee Ajax";
        $data['sub_menu'] = '';
        $data['user'] = $this->user_model->afterLogin();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/employee_ajax/index',$data);
        
        $this->load->view('templates/footer');
    }

    function ambildata()
    {
        $dataEmployees = $this->employee_model->ambildata('employees')->result();
        echo json_encode($dataEmployees);
    }
}