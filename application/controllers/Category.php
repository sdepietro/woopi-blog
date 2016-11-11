<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Categories_Model');
        $this->load->model('Posts_Model');
        
    }

    public function index($category_id = null, $page = 1) {

        $category_id = (int) $category_id;
        if (empty($category_id)) {
            redirect(base_url());
        }

        $page = (int) $page;
        if (empty($page)) {
            redirect(base_url());
        }

        $data_config['page'] = $page;
        $data_config['category_id'] = $category_id;
        $data['posts_list'] = $this->Posts_Model->get($data_config);

        $data_config['page'] = $page + 1;
        $data_config['category_id'] = $category_id;
        $post_next = $this->Posts_Model->get($data_config);

        $data['category_id'] = $category_id;
        $data['show_next'] = (count($post_next) > 0) ? TRUE : FALSE;
        $data['page'] = $page;
        $data['categories_list'] = $this->Categories_Model->get();
        $data['main_content'] = "front/index/index_view";
        $this->load->view('front/template/template', $data);
    }

    public function page($category_id = null, $page = 1) {
        $this->index($category_id, $page);
    }

    public function id($category_id = null, $page = 1) {
        $this->index($category_id, $page);
    }

}
