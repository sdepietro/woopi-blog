<?php

Class Users_Model extends CI_Model {

    //Mallines
    function login($user, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $user);
        $this->db->where('password', $password);
        //$this->db->where('activado = 1');
        $this->db->limit(1);
        $query = $this->db->get();
        //print_r($this->db->last_query());
        if ($query->num_rows() == 1) {

            return $query->result();
        }
        else {

            return false;
        }
    }

    function get($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            return $row;
        }
        else {
            return FALSE;
        }
    }
 

    function get_permissions($user_id) {
        $sql = "SELECT
                permissions.permission_id,
                permissions.user_id,
                permissions.section_id,
                sections.name
                FROM
                permissions
                INNER JOIN sections ON permissions.section_id = sections.section_id
                WHERE `user_id` = '" . $user_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_sections() {
        $sql = "SELECT * FROM sections order by name asc";
        $query = $this->db->query($sql);
        $arraypermissions = $query->result();
        return $arraypermissions;
    }

    function cambiar_password($passwordnueva, $iduser) {
        $data = array(
            'password' => $passwordnueva
        );
        $this->db->where('user_id', $iduser);
        $this->db->update('users', $data);

        return TRUE;
    }

    function get_permission_by_section($user_id, $section_id) {
        $this->db->select('*');
        $this->db->from('permissions');
        $this->db->where('user_id = ' . "'" . $user_id . "'");
        $this->db->where('section_id = ' . "'" . $section_id . "'");
        //$this->db->where('activado = 1');
        $this->db->limit(1);

        $query = $this->db->get();
        //print_r($this->db->last_query());
        if ($query->num_rows() == 1) {

            $row = $query->row();
            return $row;
        }
        else {
            return FALSE;
        }
    }

    function listar_users() {

        $sql = "select * from users order by last_name asc";

        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query;
    }

    function listar_users_por_tipo($tipo_user_id, $empresa_id) {

        $sql = "select * from users where tipo_user_id = $tipo_user_id and empresa_id = $empresa_id order by last_name asc";

        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query;
    }

    function listar_users_con_permission($permission_id) {

        $sql = "SELECT
                *
                FROM
                users
                INNER JOIN permissions ON permissions.user_id = users.user_id
                WHERE
                permissions.section_id = $permission_id";

        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query;
    }

    function listar_users_con_permission_y_empresa($permission, $empresa_id) {

        $sql = "SELECT
                *
                FROM
                users
                INNER JOIN permissions ON permissions.user_id = users.user_id
                WHERE
                permissions.section_id = $permission AND
                permissions.permission = 1 AND
                users.empresa_id = $empresa_id";

        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query;
    }

    function listartodaslassections() {

        $sql = "select * from sections order by name asc";

        $query = $this->db->query($sql);
        //print_r($this->db->last_query());
        return $query;
    }

    function editar_user($iduseraeditar, $data) {

        $this->db->where('user_id', $iduseraeditar);
        $this->db->update('users', $data);


        return true;
    }

    function eliminar_todos_permissions($iduser) {

        $this->db->where('user_id', $iduser);
        $this->db->delete('permissions');
    }

    function isertar_permission($iduserinsertado, $idpermission, $valor) {
        $data = array(
            'user_id' => $iduserinsertado,
            'section_id' => $idpermission,
            'permission' => $valor
        );
        return $this->db->insert('permissions', $data);
    }

    function add($name, $last_name, $email, $password, $activation_code, $carrera) {
        $data = array(
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'last_name' => $last_name,
            'activation_code' => $activation_code,
            'enable' => "0");
        return $this->db->insert('users', $data);
    }

//-------------------------------------------------------------------------
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------





    function check_mail($data) {
        $this->db->select('mail');
        $this->db->from('users');
        $this->db->where('mail = ' . "'" . $data . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        // print_r($this->db->last_query());
        if ($query->num_rows() == 1) {
            return false;
        }
        else {
            return true;
        }
    }

    function check_password($data, $iduser) {
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('id = ' . "'" . $iduser . "'");
        $this->db->where('password = ' . "'" . $data . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        // print_r($this->db->last_query());
        if ($query->num_rows() == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    function check_user($data) {
        $this->db->select('nuser');
        $this->db->from('users');
        $this->db->where('nuser = ' . "'" . $data . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        // print_r($this->db->last_query());
        if ($query->num_rows() == 1) {
            return false;
        }
        else {
            return true;
        }
    }

    function activar_user($iduser) {
        $data = array(
            'activado' => '1'
        );
        $this->db->where('id', $iduser);
        $this->db->update('users', $data);

        /* $this->db->select('id');
          $this->db->where('id = ' . "'" . $iduser . "'");
          $this->db->update('log', $data);
          $this->db->limit(1); */

        //$query = $this->db->get();
        //echo $query;
        //  if ($query->num_rows() == 1) {
        return true;
        /* } else {
          return false;
          } */
    }

    //--------------------------------------------------------------------------------------------------------




    function confirm_registration($codigoactivacion, $iduser) {
        $this->db->select('codigoactivacion,mail');
        $this->db->from('users');
        $this->db->where('codigoactivacion = ' . "'" . $codigoactivacion . "'");
        $this->db->where('ID = ' . "'" . $iduser . "'");
        $this->db->limit(1);

        $query = $this->db->get();
        //echo $query;
        if ($query->num_rows() == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    function modificar_datos($iduser, $data) {
        $data = array(
            'name' => $name,
            'last_name' => $last_name,
            'cargo' => $cargo,
            'fechanacimiento' => $fechanacimiento,
            'descripcion' => $descripcion,
            'celular' => $celular
        );
        $this->db->where('id', $iduser);
        $this->db->update('users', $data);

        /* $this->db->select('id');
          $this->db->where('id = ' . "'" . $iduser . "'");
          $this->db->update('log', $data);
          $this->db->limit(1); */

        //$query = $this->db->get();
        //echo $query;
        //  if ($query->num_rows() == 1) {
        return true;
        /* } else {
          return false;
          } */
    }

}
