<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_Model');
        $this->load->model('Categories_Model');
        /* -------Bloque para chequear permisos--------- */
        $this->w_permissions->check_access($id_section = 1); //   @todo Revisar el ID de esta seccion
        //----------------------------------------------------
        $class = $this->router->fetch_class();
        $this->config->load('admin/' . $class . '_config', TRUE);
        $this->c_config = $this->config->item('add_edit_rules', 'admin/' . $class . '_config');
    }

    public function index() {

        $data['categories_list'] = $this->Categories_Model->get();

        $data['main_content'] = "admin/categories/index";
        $this->load->view('admin/template/template', $data);
    }

    public function add($category_id = '') {

        if ($category_id != "") {
            $config = array(
                "category_id" => $category_id
            );
            $data['row'] = $this->Categories_Model->get($config);
        }
       

        $data['main_content'] = "admin/categories/add_view";
        $this->load->view('admin/template/template', $data);
    }

    public function insert() { // crea o actualiza los datos de los especialistas
        $category_id = $this->input->post('category_id');
        $title = $this->input->post('title');
              
        $this->form_validation->set_rules($this->c_config);

        if (($this->form_validation->run() == TRUE)) {

            $data_update = array(
                'title' => $title,
                'user_id' => $this->session->userdata('user_id'),
            );

            if (empty($category_id)) {
                $data_update['created_date'] = mysql_date_time();
                $this->Categories_Model->add($data_update);
            }
            else {
            
                
                
                $this->Categories_Model->edit($data_update, $category_id);
            }
            redirect(panel_url('categories'));
        }
        else {

            if (isset($category_id) != null && $category_id != "") {
                $data ['category_id'] = $category_id;
            }

            $data['errors'] = validation_errors();

            $data['main_content'] = "admin/categories/add_view";
            $this->load->view('admin/template/template', $data);
        }
    }

    public function del($id)
    {
        $data_update = array(
            'deleted' => date("Y-m-d H:i:s"),
        );
        $this->Categories_Model->edit($data_update, $id);
        redirect(panel_url('categories'));
    }

}
