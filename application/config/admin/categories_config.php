<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$config['add_edit_rules'] = array(
    array(
        'field' => 'title',
        'label' => 'Título',
        'rules' => 'required|xss_clean'
    ),
    
    
);