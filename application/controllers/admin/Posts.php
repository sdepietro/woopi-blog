<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
        $this->load->model('Posts_Model');
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
     * Listado de posts
     */

    public function index()
    {
        $data['post_list'] = $this->Posts_Model->get();
        $data['main_content'] = "admin/posts/index";
        $this->load->view('admin/template/template', $data);
    }

    /*
     * Formulario de carga de post nuevo y de edición
     */

    public function add($post_id = '')
    {

        if ($post_id != "") {
            $config = array(
                "post_id" => $post_id
            );
            $post = $this->Posts_Model->get($config);

            //$tags = $this->Tags_Model->get_tags_post($post_id);

           /* $tags_array = array();
            foreach ($tags as $tag) {
                $tags_array[] = $tag->name;
            }*/


            //$data['tags'] = implode(",", $tags_array);
            $data['row'] = $post;
        } else {
            $data['tags'] = "";
        }


        $data['errors'] = $this->session->flashdata('errors');

        $data['category_list'] = $this->Categories_Model->get();


        $data['main_content'] = "admin/posts/add_view";
        $this->load->view('admin/template/template', $data);
    }

    /*
     * Guardamos los datos del formulario
     */

    public function insert()
    {
        $errors = "";

        $post_id = $this->input->post('post_id');
        $title = $this->input->post('title');
        $date = $this->input->post('date');
        $text = $this->input->post('text');
        $tags = $this->input->post('tags');
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
                $post_id = $this->Posts_Model->add($data_update);
            } else {
                $this->Posts_Model->edit($data_update, $post_id);
            }

            $tags = explode(",", $tags);

            $this->Tags_Model->delete_all_asociations($post_id);

            foreach ($tags as $tag) {
                if ($tag == "") {
                    continue;
                }
                $config_data = array(
                    'name' => $tag
                );

                //Buscamos el tag por el nombre.
                $tag_db = $this->Tags_Model->get($config_data);
                if (empty($tag_db)) {
                    $tag_id = $this->Tags_Model->add($config_data);
                } else {
                    $tag_id = $tag_db->tag_id;
                }

                //Asociamos los tags
                $data_asociate = array(
                    'tag_id' => $tag_id,
                    'post_id' => $post_id,
                );
                $this->Tags_Model->asociate($data_asociate);
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

                //Si la imagen no se sube correctamente
                if (!$this->upload->do_upload('post_image')) {
                    $errors .= $this->upload->display_errors(); //Generamos el error
                } else {
                    $data_update = array(
                        "image" => $new_name
                    );
                    $this->Posts_Model->edit($data_update, $post_id); //Si se sube bien, actualizamos el nombre de la imagen
                }
            }

            if (empty($errors)) {
                redirect(panel_url('posts')); //Si no hay errores, redirigimos al listado
            }
        }

        //Si llega hasta aca es porque hay un error en la carga de imagenes.
        $errors .= validation_errors();
        $post_id = empty($post_id) ? "" : $post_id;
        $this->session->set_flashdata('errors', $errors);
        redirect(panel_url('posts/add/' . $post_id));
    }


    public function del($post_id)
    {
        $data_update = array(
            'deleted' => date("Y-m-d H:i:s"),
        );
        $this->Posts_Model->edit($data_update, $post_id);
        redirect(panel_url('posts'));
    }

    public function getTags($name = "")
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');

        $config_data = array(
            'find_name' => $name
        );

        //Buscamos el tag por el nombre.
        $tags = $this->Tags_Model->get($config_data);

        $tags_array = array();
        foreach ($tags as $tag) {
            $tags_array[] = $tag->name;
        }

        echo json_encode($tags_array);
    }

}
