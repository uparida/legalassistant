<?php

class Client_model extends CI_Model {

    private $table = "client";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getById($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where('client', array('id' => $id));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function getIdByEmail($email) {
        if (!empty($email)) {
            $query = $this->db->get_where('client', array('email' => $email));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function getEmailByUsername($username) {
        if (!empty($username)) {
            $query = $this->db->get_where('client', array('username' => $username));
            return $query->row_array()['email'];
        } else {
            return FALSE;
        }
    }

    public function getEmailById($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where($this->table, array('id' => $id));
            return $query->row_array()['email'];
        } else {
            return FALSE;
        }
    }

    public function getByEmail($email) {
        if (!empty($email)) {
            $query = $this->db->get_where('client', array('email' => $email));

            if ($query->num_rows() > 0) {

                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function login($data) {

        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        return $this->db->get('client');
    }

    public function getAll() {
        return $this->db->get('client');
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('client', $data);
    }

    function updateuser($userid, $data) {

        $this->db->where('id', $userid);

        $this->db->update($this->table, $data);
    }

    function getuser($userid) {

        $this->db->where('id', $userid);

        return $this->db->get($this->table);
    }

    function checkusername($username) {

        $this->db->where('username', $username);

        return $this->db->get($this->table);
    }

}

?>
