<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *  Ejemplo de como cargar un dropdown
 */
if (!function_exists('get_w_config'))
{

    function get_w_config()
    {
        $CI = & get_instance();

        $CI->db->select('*');
        $CI->db->from('configs');
        $query = $CI->db->get();
        $array_configs = $query->result();

        $result = array();

        foreach ($array_configs as $row)
        {
            $result[$row->key] = $row->value;
        }

        $CI->w_config = $result;
    }

    function get_w_config_value($key)
    {
        $CI = & get_instance();

        if (empty($CI->w_config))
        {
            $config = get_w_config();
        }
        $return = "";
        if (!empty($CI->w_config[$key]))
        {
            $return = $CI->w_config[$key];
        }

        return $return;
    }

}
