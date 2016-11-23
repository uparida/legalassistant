<?php

class Lawyer_category_model extends CI_Model {

    private $table = "lawyer_category";

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

    public function getByLawyerId($id) {
        if ($id != FALSE) {
            $query = $this->db->get_where($this->table, array('lawyer' => $id));
            return $query;
        } else {
            return FALSE;
        }
    }

    public function getByCategoryName($name) {

        $this->db->select('*');
        $this->db->from('lawyer_category');
        $this->db->join('category', 'category.id = lawyer_category.category');
//        $this->db->where('questionnaire.category', 'category.id');
        $this->db->where('category.name', $name);
        return $this->db->get();
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
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function delete($id) {
        $this->db->delete($this->table, $id);
    }

    function deleteByLawyerId($lawyer_id) {

        $this->db->where_in('lawyer', $lawyer_id);
        $this->db->delete($this->table);
    }

    function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

}
?>
