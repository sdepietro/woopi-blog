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

        $data['errors'] = $this->session->flashdata('errors');

        $data['category_list'] = $this->Categories_Model->get();

        $data['main_content'] = "admin/posts/add_view";
        $this->load->view('admin/template/template', $data);
    }

    public function insert() { // crea o actualiza los datos de los especialistas
        $errors = "";

        $post_id = $this->input->post('post_id');
        $title = $this->input->post('title');
        $date = $this->input->post('date');
        $text = $this->input->post('text');
        $category_id = $this->input->post('category_id');

        
        sd($_POST);
        
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
                $post_id = $this->Posts_Model->add($data_update);
            }
            else {
                $this->Posts_Model->edit($data_update, $post_id);
            }

            if (!empty($_FILES['post_image']['name'])) {
                $name = $_FILES['post_image']['name'];
                $v = explode(".", $name);
                $ext = end($v);
                $ext = ($ext == "jpeg") ? "jpg" : $ext; //si es jpeg lo renombramos a jpg
                $new_name = sha1($post_id . "post_image") . "." . $ext; //Generamos el nombre único de la imagen

                $config_upload = array(
                    'upload_path' => './assets/img/posts/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,
                    'max_size' => "2000KB",
                    'max_height' => "8000",
                    'max_width' => "8000",
                    'file_name' => $new_name
                );

                $this->load->library('upload', $config_upload);

                if (!$this->upload->do_upload('post_image')) {
                    $errors .=$this->upload->display_errors();
                }
                else {
                    $data_update = array(
                        "image" => $new_name
                    );

                    $this->Posts_Model->edit($data_update, $post_id);
                }
            }

            if (empty($errors)) {
                redirect(panel_url('posts'));
            }
        }

        $errors .= validation_errors();

        $post_id = empty($post_id) ? "" : $post_id;

        $this->session->set_flashdata('errors', $errors);

        redirect(panel_url('posts/add/' . $post_id));
    }

}
