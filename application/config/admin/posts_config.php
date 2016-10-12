<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$config['add_edit_rules'] = array(
    array(
        'field' => 'title',
        'label' => 'Título',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'date',
        'label' => 'Fecha',
        'rules' => 'required|xss_clean'
    ),
    array(
        'field' => 'text',
        'label' => 'Contenido',
        'rules' => 'xss_clean'
    )
    
);