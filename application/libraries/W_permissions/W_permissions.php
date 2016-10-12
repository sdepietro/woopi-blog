<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Vixnet VN_Permissions library, users restrict access.
 *
 * @copyright 2014 Vixnet Technologies
 * @license -
 * @version Release: 1.0
 * @link http://vixnet.estoes.me
 */
class W_Permissions {

    private $ci;
    var $id_usuario = 0;
    var $section    = null;
    var $user_info  = array();

    function __construct()
    {
        $this->ci = & get_instance();
        //Seteamos el id del usuario
        if ($this->ci->session->userdata('usuario_id'))
        {
            $this->id_usuario = $this->ci->session->userdata('usuario_id');
        }
        //Obtenemos la sección en la que se encuentra
        $this->section   = $this->ci->router->fetch_class();
        //Obtenemos la información del usuario
        $this->user_info = $this->ci->session->userdata('user_info');
        $this->ci->load->model('Users_Model');
    }

    //Chequeamos que los permisos del usuario para esa seccion.
    function check_access($id_section)
    {
        if (is_array($this->ci->session->userdata('permissions')))//Comprobamos que tenga un array de permisos
        {
            //Comprobamos que tenga permisos en las secciones
            if (!in_array($id_section, $this->ci->session->userdata('permissions')))
            {
                redirect(base_url('errors/access_denied'));
            }
        }
        else
        {
            redirect(panel_url('login'));
        }
    }

    //Chequeamos que los permisos del usuario para esa seccion.
    function show_section($id_section)
    {
        if (is_array($this->ci->session->userdata('permissions')))//Comprobamos que tenga un array de permisos
        {
            //Comprobamos que tenga permisos en las secciones
            if (in_array($id_section, $this->ci->session->userdata('permissions')))
            {
                $return = true;
            }
            else
            {
                $return = FALSE;
            }
        }
        else
        {
            $return = FALSE;
        }
        return $return;
    }

    /**
     * Obtenemos los permisos del usuario segun el rol
     *
     * @param -
     * @return -
     */
    function get_permisos($usuario_id)
    {
        $permisos       = $this->ci->Users_Model->get_permissions($usuario_id);
        $array_permisos = array();

        foreach ($permisos as $permiso)
        {
            $array_permisos[] = $permiso->section_id;
        }
        return $array_permisos;
    }

}

/* End of file w_permissions.php */