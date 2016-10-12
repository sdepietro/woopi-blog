<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Users_Model');
    }

    public function index() {

        if ($this->session->userdata('user_id')) {
            redirect('inicio', 'refresh');
        }

        $this->load->view('login/login'); //muestra ventana de login
    }

    public function iniciarsesion() {
       
        $user = $this->input->post('user');
        $password = $this->input->post('password');
        if ($user != "" && $password != "") {
            $password = md5($password); //@todo usar SHA1 y un SALT para darle mas seguridad al login
            $result = $this->Users_Model->login($user, $password); //ahi llamo a al metodo LOGIN del modelo Usuarios Model y comprubo si el user y la pass estan bien.
            if ($result) {
                //print_r($result);
                $sess_array = array();
                foreach ($result as $row) {
                    $sess_array = array(
                        'user_id' => $row->user_id,
                        'name' => $row->name,
                        'last_name' => $row->last_name,
                        'mail' => $row->email,
                        'lastactivity' => $row->last_activity,
                        'permissions' => $this->w_permissions->get_permisos($row->user_id)
                    );
                    $this->session->set_userdata($sess_array);
                }
                //$session_data = $this->session->userdata('user_valido'); //impacta la variable sesion en session data.
                redirect('inicio', 'refresh');
            }
            else {
                // echo "va por aca";
                $data['estilomsg'] = "alert-error";
                $data['estiloinputerrorlogin'] = "input-error";
                $data['user'] = $user;
                $data['mensajeerror'] = "El user o password son incorrectos.";
                $data['main_content'] = "inicio";
                $this->load->view('login/login', $data); //muestra ventana de login
                // echo "Error!!";
                // redirect('inicio', 'refresh');
            }
        }
        else {
            $data['estilomsg'] = "alert-error";
            $data['user'] = $user;
            $data['estiloinputerrorlogin'] = "input-error";
            $data['mensajeerror'] = "Debe llenar user y password.";
            $data['main_content'] = "inicio";
            $this->load->view('login/login', $data); //muestra ventana de login
        }
    }

    function logout() {
        $sess_array = array(
            'user_id',
            'user',
            'nombre',
            'apellido',
            'mail',
            'lastactivity',
            'empresa_id',
            'permisos'
        );
        foreach ($sess_array as $value) {

            $this->session->unset_userdata($value);
        }


        redirect('inicio', 'refresh');
    }

}
