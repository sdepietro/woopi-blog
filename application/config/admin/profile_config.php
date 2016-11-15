<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$config['add_edit_rules'] = array(
    array(
        'field' => 'name',
        'label' => 'Nombre',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'last_name',
        'label' => 'Apellido',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'email',
        'label' => 'E-Mail',
        'rules' => 'required|xss_clean'
    )
    
);