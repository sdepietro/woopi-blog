<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_Model');
        /* -------Bloque para chequear permisos--------- */
        $this->w_permissions->check_access($id_section = 1); //   
        //----------------------------------------------------
    }

    public function index() {
        $data['widgets'] = array();
        $data['main_content'] = "admin/dashboard/index";
        $this->load->view('admin/template/template', $data);
    }

}
