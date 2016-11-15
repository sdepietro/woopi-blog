<?php

Class Configs_Model extends CI_Model {
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array()) {



        $this->db->select('*');
        $this->db->from('configs');

        if (!empty($data['config_id'])) {
            $this->db->where('config_id', $data['config_id']);
            $this->db->limit(1);
        }
        
        $query = $this->db->get();

        
        if ($query->num_rows() > 0) {
            if (!empty($data['config_id'])) {
                return $query->row();
            }
            else {
                return $query->result();
            }
        }
        else {
            if (!empty($data['config_id'])) {
                return FALSE;
            }
            else {
                return array();
            }
        }
    }

    function edit($data, $config_id) {
        $this->db->where('config_id', $config_id);
        $this->db->update('configs', $data);
        return true;
    }

    function del($config_id) {
        $this->db->where('config_id', $config_id);
        $this->db->delete('configs');
    }

    function add($data) {
        $this->db->insert('configs', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}
