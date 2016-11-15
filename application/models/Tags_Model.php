<?php

Class Tags_Model extends CI_Model {
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array()) {

        $this->db->select('*');
        $this->db->from('tags');

        if (!empty($data['tag_id'])) {
            $this->db->where('tag_id', $data['tag_id']);
            $this->db->limit(1);
        }
        if (!empty($data['name'])) {
            $this->db->where('name', $data['name']);
            $this->db->limit(1);
        }
        
        if (!empty($data['find_name'])) {
            $this->db->like('name', $data['find_name']);
        }

        $query = $this->db->get();

        //return
        if ($query->num_rows() > 0) {
            if (!empty($data['tag_id']) || !empty($data['name'])) {
                return $query->row();
            }
            else {
                return $query->result();
            }
        }
        else {
            if (!empty($data['tag_id']) || !empty($data['name'])) {
                return FALSE;
            }
            else {
                return array();
            }
        }
    }

    function edit($data, $tag_id) {
        $this->db->where('tag_id', $tag_id);
        $this->db->update('tags', $data);
        return true;
    }

    function asociate($data) {
        $this->db->insert('tags_post', $data);
        $insert_id = $this->db->insert_id();
        return true;
    }

    function delete_all_asociations($post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->delete('tags_post');
        return true;
    }

    function get_tags_post($post_id) {
        $this->db->select('tags.`name`,
                        tags.tag_id
                        FROM');
        $this->db->from('tags_post');
        $this->db->join('tags', 'tags_post.tag_id = tags.tag_id', 'inner');
        $this->db->where('post_id', $post_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();
        }
        else {
            return array();
        }
    }

    function del($tag_id) {
        $this->db->where('tag_id', $tag_id);
        $this->db->delete('tags');
        return true;
    }

    function add($data) {
        $this->db->insert('tags', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}
