<?php

Class Links_Model extends CI_Model
{
    /*
     * Obtenemos los datos de uno o varios
     */

    function get($data = array())
    {

        $this->db->select('*');
        $this->db->from('links');

        if (!empty($data['link_id'])) {
            $this->db->where('link_id', $data['link_id']);
            $this->db->limit(1);
        }

        $this->db->where('links.deleted', NULL);
        $this->db->order_by('links.link_id', 'ASC');

        $query = $this->db->get();

        //return
        if ($query->num_rows() > 0) {
            if (!empty($data['link_id'])) {
                return $query->row();
            } else {
                return $query->result();
            }
        } else {
            if (!empty($data['link_id'])) {
                return FALSE;
            } else {
                return array();
            }
        }
    }

    function edit($data, $link_id)
    {
        $this->db->where('link_id', $link_id);
        $this->db->update('links', $data);
        return true;
    }

    function del($link_id)
    {
        $this->db->where('link_id', $link_id);
        $this->db->delete('links');
    }

    function add($data)
    {
        $this->db->insert('links', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }


}
