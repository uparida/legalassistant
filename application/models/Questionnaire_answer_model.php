<?php

class Questionnaire_answer_model extends CI_Model {

    private $table = "questionnaire_answer";

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

    public function getByCategoryName($name) {

        $this->db->select('*');
        $this->db->from('questionnaire');
        $this->db->join('category', 'category.id = questionnaire.category');
//        $this->db->where('questionnaire.category', 'category.id');
        $this->db->where('category.name', $name);
        return $this->db->get();
    }

    public function getAll() {
        return $this->db->get($this->table)->result();
    }

//    function listall($limit = null, $search = '') {
//        $this->db->order_by('id', 'desc');
//        (!$limit == null) ? $this->db->limit($limit['start'], $limit['end']) : "";
//        return $this->db->get($this->table);
//    }

    function insert($data) {
//        if ($this->db->insert($this->table, $data))
//            return true;
//        else
//            return false;
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
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
