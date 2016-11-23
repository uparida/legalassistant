<?php

class Lawyer_model extends CI_Model {

    private $table = "lawyer";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getById($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where('lawyer', array('id' => $id));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function getNameById($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where($this->table, array('id' => $id));
            return $query->row_array()['email'];
        } else {
            return FALSE;
        }
    }

    public function getByEmail($email) {
        if (!empty($email)) {
            $query = $this->db->get_where('lawyer', array('email' => $email));

            if ($query->num_rows() > 0) {

                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function getByCategoryName($name) {

        $this->db->select('lawyer.id,lawyer.username,lawyer.firstname,lawyer.email,lawyer.address,lawyer.contact,lawyer.dob,lawyer.middlename,lawyer.lastname,lawyer.gender,lawyer.image,lawyer.rate,lawyer.description');
        $this->db->from('lawyer');
        $this->db->join('lawyer_category', 'lawyer.id = lawyer_category.lawyer');
        $this->db->join('category', 'category.id = lawyer_category.category');

//        $this->db->where('questionnaire.category', 'category.id');
        $this->db->where('category.name', $name);
        return $this->db->get();
    }

    public function getAll($id) {
        return $this->db->get('lawyer');
    }

    public function login($data) {

        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        return $this->db->get('lawyer');
    }

    function listall($limit = null, $search = '') {
        $this->db->order_by('id', 'desc');
        (!$limit == null) ? $this->db->limit($limit['start'], $limit['end']) : "";
        return $this->db->get('lawyer');
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function delete($id) {
        $this->db->delete('iws_traveller', $id);
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('lawyer', $data);
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
