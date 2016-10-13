<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_Model');
        $this->load->model('Posts_Model');
        $this->load->model('Categories_Model');
        /* -------Bloque para chequear permisos--------- */
        $this->w_permissions->check_access($id_section = 1); //   @todo Revisar el ID de esta seccion
        //----------------------------------------------------
        $class = $this->router->fetch_class();
        $this->config->load('admin/' . $class . '_config', TRUE);
        $this->c_config = $this->config->item('add_edit_rules', 'admin/' . $class . '_config');
    }

    public function index() {

        $data['post_list'] = $this->Posts_Model->get();

        $data['main_content'] = "admin/posts/index";
        $this->load->view('admin/template/template', $data);
    }

    public function add($post_id = '') {

        if ($post_id != "") {
            $config = array(
                "post_id" => $post_id
            );
            $data['row'] = $this->Posts_Model->get($config);
        }
       
            $data['category_list'] = $this->Categories_Model->get();

        $data['main_content'] = "admin/posts/add_view";
        $this->load->view('admin/template/template', $data);
    }

    public function insert() { // crea o actualiza los datos de los especialistas
        $post_id = $this->input->post('post_id');
        $title = $this->input->post('title');
        $date = $this->input->post('date');
        $text = $this->input->post('text');
        $category_id = $this->input->post('category_id');
              
        $this->form_validation->set_rules($this->c_config);

        if (($this->form_validation->run() == TRUE)) {

            $data_update = array(
                'title' => $title,
                'date' => mysql_date($date),
                'text' => $text,
                'category_id' => $category_id,
                'user_id' => $this->session->userdata('user_id'),
            );

            if (empty($post_id)) {
                $data_update['created_date'] = mysql_date_time();
                $this->Posts_Model->add($data_update);
            }
            else {
            
                
                
                $this->Posts_Model->edit($data_update, $post_id);
            }
            redirect(panel_url('posts'));
        }
        else {

            if (isset($post_id) != null && $post_id != "") {
                $data ['post_id'] = $post_id;
            }

            $data['errors'] = validation_errors();

            $data['main_content'] = "admin/posts/add_view";
            $this->load->view('admin/template/template', $data);
        }
    }

}
