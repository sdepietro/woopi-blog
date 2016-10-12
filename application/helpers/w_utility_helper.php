<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *  Ejemplo de como cargar un dropdown
 */
if (!function_exists('panel_url')) {

    function panel_url($uri = null) {
        if (empty($uri)) {
            return base_url() . 'admin/';
        }
        else {
            return base_url() . 'admin/' . $uri;
        }
    }

}

if (!function_exists('spanish_date')) {

    function spanish_date($date) {
        return date("d-m-Y", strtotime($date));
    }

}

if (!function_exists('mysql_date')) {

    function mysql_date($date = "") {
        if(empty($date)){
            $date = date("d-m-Y");
        }
        return date("Y-m-d", strtotime($date));
    }

}

if (!function_exists('mysql_date_time')) {

    function mysql_date_time($date = "") {
        if(empty($date)){
            $date = date("d-m-Y H:i:s");
        }
        return date("Y-m-d", strtotime($date));
    }

}