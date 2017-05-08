<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class News extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Posts_Model');

        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get()
    {
        $data_config['limit'] = get_w_config_value("limit_api_news");

        $posts_list = $this->Posts_Model->get($data_config);

        foreach ($posts_list as &$post) {
            $post->text = substr(strip_tags($post->text), 0, 200) . '...';
            $post->image = base_url('assets/img/posts/') . $post->image;
        }


        $this->set_response($posts_list, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
    }

}
