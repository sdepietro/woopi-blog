<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


$config['add_edit_rules'] = array(
    array(
        'field' => 'value',
        'label' => 'Valor',
        'rules' => 'required|xss_clean'
    )
    
);