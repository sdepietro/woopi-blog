<?php

Class Posts_Model extends CI_Model {
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array()) {

        $this->db->select('*');
        $this->db->from('post');

        if (!empty($data['post_id'])) {
            $this->db->where('post_id', $data['post_id']);
            $this->db->limit(1);
        }

        $query = $this->db->get();

        //return
        if ($query->num_rows() > 0) {
            if (!empty($data['post_id'])) {
                return $query->row();
            }
            else {
                return $query->result();
            }
        }
        else {
            if (!empty($data['post_id'])) {
                return FALSE;
            }
            else {
                return array();
            }
        }
    }

    function edit($data, $post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->update('post', $data);
        return true;
    }

    function del($post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->delete('post');
    }

    function add($data) {
        $this->db->insert('post', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}
