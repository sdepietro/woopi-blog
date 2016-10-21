<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Categories_Model');
        $this->load->model('Posts_Model');
    }

    public function index($post_id = null) {
        $post_id = (int) $post_id;
        if (empty($post_id)) {
            redirect(base_url());
        }

        $data_config['post_id'] = $post_id;
        $data['post'] = $this->Posts_Model->get($data_config);

        $data['categories_list'] = $this->Categories_Model->get();
        $data['main_content'] = "front/post/id_view";
        $this->load->view('front/template/template', $data);
    }

    public function id($post_id = null) {
        $this->index($post_id);
    }

}
