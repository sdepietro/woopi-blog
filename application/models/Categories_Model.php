<?php

Class Categories_Model extends CI_Model
{
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array())
    {

        $this->db->select('*');
        $this->db->from('categories');

        if (!empty($data['category_id'])) {
            $this->db->where('category_id', $data['category_id']);
            $this->db->limit(1);
        }

        $this->db->where('categories.deleted', NULL);

        $query = $this->db->get();

        //return
        if ($query->num_rows() > 0) {
            if (!empty($data['category_id'])) {
                return $query->row();
            } else {
                return $query->result();
            }
        } else {
            if (!empty($data['category_id'])) {
                return FALSE;
            } else {
                return array();
            }
        }
    }

    function edit($data, $category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
        return true;
    }

    function del($category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->delete('categories');
    }

    function add($data)
    {
        $this->db->insert('categories', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function get_only_content($data = array())
    {

        $this->db->select('categories.category_id,
                    categories.title,
                    categories.user_id,
                    categories.created_date,
                    categories.deleted');
        $this->db->from('categories');
        $this->db->join('post', 'categories.category_id = post.category_id', 'inner');


        $this->db->where('post.deleted', NULL);
        $this->db->where('categories.deleted', NULL);
        $this->db->group_by('categories.category_id');

        $query = $this->db->get();

        //return
        if ($query->num_rows() > 0) {

            return $query->result();

        } else {

            return array();
        }
    }


}
