<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('check_active'))
{

    function check_active($actual_controller)
    {
        $ci   = & get_instance();

        if($ci->router->fetch_class() == $actual_controller){
            echo ' active ';
        }
        
    }

}