<?php
defined('BASEPATH') or exit('No direct script access allowed');
class menu2_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function menuManagemnet()
    {
        return $data['menu'] = $this->db->get('user_menu')->result_array();
    }
    
    
}
