<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{

    function __construct()//este constructor es el constructor principal del objeto
    {
        parent::__construct(); //est linea hace que se puedan heredar las propiedades de la clase loguin.
        $this->load->model('Users_Model');

        $class = $this->router->fetch_class();
        $this->config->load('admin/' . $class . '_config', TRUE);
        $this->c_config = $this->config->item('add_edit_rules', 'admin/' . $class . '_config');
    }

    public function index()
    {
        $data['errors'] = $this->session->flashdata('errors');

        $data['row'] = $this->Users_Model->get($this->session->userdata('user_id'));
        $data['main_content'] = "admin/profile/index";
        $this->load->view('admin/template/template', $data);
    }


    public function insert()
    {
        $this->form_validation->set_rules($this->c_config);

        $last_name = $this->input->post('last_name');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $repassword = $this->input->post('repassword');
        if (!empty($password)) {
            if ($password != $repassword) {
                $errors = "Las Passwords no coinciden";
                $this->session->set_flashdata('errors', $errors);

                redirect(panel_url('profile'));
            }
        }


        if (($this->form_validation->run() == TRUE)) {
            $data_usuario = array(
                'name' => $name,
                'email' => $email,
                'last_name' => $last_name,
            );

            if (!empty($password)) {
                $data_usuario['password'] = md5($password);
            }

            $this->Users_Model->editar_user($this->session->userdata('user_id'), $data_usuario);

            redirect(panel_url('posts'));
        } else {
            $errors = validation_errors();
            $this->session->set_flashdata('errors', $errors);

            redirect(panel_url('profile'));
        }


    }
}
