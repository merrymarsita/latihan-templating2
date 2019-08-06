<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('products_model');
        $this->load->model('user_model');
        $this->load->model('menu_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index()
    {
        $data['title'] = "Master Products";
        $data['sub_menu'] = '';
        $data['user'] = $this->user_model->afterLogin();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/products/index',$data);
        
        $this->load->view('templates/footer');
    }

    function ambildata()
    {
        $dataProducts = $this->product_model->ambildata('products')->result();
        echo json_encode($dataProducts);
    }
}