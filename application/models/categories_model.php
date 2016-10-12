<?php

Class Categories_Model extends CI_Model {
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array()) {

        $this->db->select('*');
        $this->db->from('categories');

        if (!empty($data['category_id'])) {
            $this->db->where('category_id', $data['category_id']);
            $this->db->limit(1);
        }

        $query = $this->db->get();

        //return
        if ($query->num_rows() > 0) {
            if (!empty($data['category_id'])) {
                return $query->row();
            }
            else {
                return $query->result();
            }
        }
        else {
            if (!empty($data['category_id'])) {
                return FALSE;
            }
            else {
                return array();
            }
        }
    }

    function edit($data, $category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
        return true;
    }

    function del($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('categories');
    }

    function add($data) {
        $this->db->insert('categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}
