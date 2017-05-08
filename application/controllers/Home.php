<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_Model');
        $this->load->model('Posts_Model');
        $this->load->model('Links_Model');
    }

    public function index($page = 1)
    {

        $data_config['page'] = $page;
        $data['posts_list'] = $this->Posts_Model->get($data_config);

        $data_config['page'] = $page + 1;
        $post_next = $this->Posts_Model->get($data_config);

        $data['show_next'] = (count($post_next) > 0) ? TRUE : FALSE;
        $data['page'] = $page;

        $data['categories_list'] = $this->Categories_Model->get_only_content();
        $data['links_list'] = $this->Links_Model->get();
        $data['main_content'] = "front/index/index_view";
        $this->load->view('front/template/template', $data);
    }

    public function page($page = 1)
    {
        $this->index($page);
    }

}
