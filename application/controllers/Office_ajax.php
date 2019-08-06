<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Office_ajax extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('office_model');
        $this->load->model('user_model');
        $this->load->model('menu_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index()
    {
        $data['title'] = "Master Office Ajax";
        $data['sub_menu'] = '';
        $data['user'] = $this->user_model->afterLogin();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/office_ajax/index',$data);
        
        $this->load->view('templates/footer');
    }

    function ambildata()
    {
        $dataOffices = $this->office_model->ambildata('offices')->result();
        echo json_encode($dataOffices);
    }
}