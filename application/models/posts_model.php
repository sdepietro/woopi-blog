<?php

Class Posts_Model extends CI_Model {
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array()) {



        $this->db->select('post.post_id,
                        post.category_id,
                        post.date,
                        post.title,
                        post.text,
                        post.image,
                        post.user_id,
                        post.created_date,
                        post.date,
                        users.`name` as user_name,
                        users.last_name,
                        users.user_id,
                        categories.category_id,
                        categories.title as category_name');
        $this->db->from('post');
        $this->db->join('users', 'post.user_id = users.user_id', 'INNER');
        $this->db->join('categories', 'post.category_id = categories.category_id', 'INNER');

        if (!empty($data['post_id'])) {
            $this->db->where('post_id', $data['post_id']);
            $this->db->limit(1);
        }
        if (!empty($data['category_id'])) {
            $this->db->where('post.category_id', $data['category_id']);
        }

        if (!empty($data['page'])) {
            $postxpage = $this->config->item('post_per_page');
            $offset = ($data['page'] - 1) * $postxpage;
            $this->db->limit($postxpage, $offset);
            $this->db->order_by('date', 'desc');
        }


        $query = $this->db->get();

        //sd($this->db->last_query());
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
