<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Configs extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
        $this->load->model('Configs_Model');
        $this->load->model('Categories_Model');
        $this->load->model('Tags_Model');
        /* -------Bloque para chequear permisos--------- */
        $this->w_permissions->check_access($id_section = 1); //   @todo Revisar el ID de esta seccion
        //----------------------------------------------------
        $class = $this->router->fetch_class();
        $this->config->load('admin/' . $class . '_config', TRUE);
        $this->c_config = $this->config->item('add_edit_rules', 'admin/' . $class . '_config');
    }

    /*
     * Listado de configs
     */

    public function index()
    {
        $data['configs_list'] = $this->Configs_Model->get();
        
        
        get_w_config();
        
        $data['main_content'] = "admin/configs/index";
        $this->load->view('admin/template/template', $data);
    }

    /*
     * Formulario de carga de post nuevo y de edición
     */

    public function add($config_id)
    {

        if ($config_id != "")
        {
            $config = array(
                "config_id" => $config_id
            );
            $config = $this->Configs_Model->get($config);

            $data['row'] = $config;
        }
        else
        {
            $data['tags'] = "";
        }

        $data['errors'] = $this->session->flashdata('errors');

        $data['configs_list'] = $this->Categories_Model->get();

        $data['main_content'] = "admin/configs/add_view";
        $this->load->view('admin/template/template', $data);
    }

    /*
     * Guardamos los datos del formulario
     */

    public function insert()
    { // crea o actualiza los datos de los especialistas
        $errors = "";
        
        $config_id = $this->input->post('config_id');
        if (empty($config_id))
        {
            redirect(panel_url('configs'));
        }
        $value = $this->input->post('value');

        $this->form_validation->set_rules($this->c_config);

        if (($this->form_validation->run() == TRUE))
        {

            $data_update = array(
                'value' => $value,
            );

            $this->Configs_Model->edit($data_update, $config_id);

            if (empty($errors))
            {
                redirect(panel_url('configs')); //Si no hay errores, redirigimos al listado
            }
        }

        //Si llega hasta aca es porque hay un error en la carga de imagenes.
        $errors .= validation_errors();
        $post_id = empty($config_id) ? "" : $config_id;
        $this->session->set_flashdata('errors', $errors);
        redirect(panel_url('configs/add/' . $config_id));
    }

}
