<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Links extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_Model');
        $this->load->model('Links_Model');
        /* -------Bloque para chequear permisos--------- */
        $this->w_permissions->check_access($id_section = 1); //   @todo Revisar el ID de esta seccion
        //----------------------------------------------------
        $class = $this->router->fetch_class();
        $this->config->load('admin/' . $class . '_config', TRUE);
        $this->c_config = $this->config->item('add_edit_rules', 'admin/' . $class . '_config');
    }

    public function index() {

        $data['links_list'] = $this->Links_Model->get();

        $data['main_content'] = "admin/links/index";
        $this->load->view('admin/template/template', $data);
    }

    public function add($link_id = '') {

        if ($link_id != "") {
            $config = array(
                "link_id" => $link_id
            );
            $data['row'] = $this->Links_Model->get($config);
        }
       

        $data['main_content'] = "admin/links/add_view";
        $this->load->view('admin/template/template', $data);
    }

    public function insert() { // crea o actualiza los datos de los especialistas
        $link_id = $this->input->post('link_id');
        $title = $this->input->post('title');
        $url = $this->input->post('url');

        $this->form_validation->set_rules($this->c_config);

        if (($this->form_validation->run() == TRUE)) {

            $data_update = array(
                'title' => $title,
                'url' => $url,
                'user_id' => $this->session->userdata('user_id'),
            );

            if (empty($link_id)) {
                $data_update['created_date'] = mysql_date_time();
                $this->Links_Model->add($data_update);
            }
            else {
                $this->Links_Model->edit($data_update, $link_id);
            }
            redirect(panel_url('links'));
        }
        else {

            if (isset($link_id) != null && $link_id != "") {
                $data ['link_id'] = $link_id;
            }

            $data['errors'] = validation_errors();

            $data['main_content'] = "admin/links/add_view";
            $this->load->view('admin/template/template', $data);
        }
    }

    public function del($id)
    {
        $data_update = array(
            'deleted' => date("Y-m-d H:i:s"),
        );
        $this->Links_Model->edit($data_update, $id);
        redirect(panel_url('links'));
    }

}
