<?php

class Categories_model extends CI_Model {

    private $table = "category";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getById($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where($this->table, array('id' => $id));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function getNameById($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where($this->table, array('id' => $id));
            return $query->row_array()['name'];
        } else {
            return FALSE;
        }
    }

    public function getByCategoryName($name) {
        if ($id != FALSE) {
            $query = $this->db->get_where($this->table, array('name' => $name));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function getAll() {
        return $this->db->get('category')->result();
    }

//    function listall($limit = null, $search = '') {
//        $this->db->order_by('id', 'desc');
//        (!$limit == null) ? $this->db->limit($limit['start'], $limit['end']) : "";
//        return $this->db->get($this->table);
//    }

    function insert($data) {
        if ($this->db->insert($this->table, $data))
            return true;
        else
            return false;
    }

    function delete($id) {
        $this->db->delete($this->table, $id);
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

}

?>
