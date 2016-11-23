<?php

class Cases_model extends CI_Model {

    private $table = "cases";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getById($id) {
//        if ($id != FALSE) {
//            $query = $this->db->get_where($this->table, array('id' => $id));
//            return $query->row_array();
//        } else {
//            return FALSE;
//        }
        $this->db->where('id', $id);
        $data = $this->db->get($this->table);
        $cases = $data->result();
        $singlerow;
        foreach ($cases as &$case) {
//            echo "case id : " . $case->id;
            $case->answers = $this->getAnswersByCase($case->id, $case->lawyer);
            return $case;
        }
//        print_r($cases);
//        exit;
//        return $cases;
    }

    public function getTotalCompletedCase($id) {
        $this->db->where('lawyer', $id);
        $this->db->where('status', 'CLOSED');
        $data = $this->db->get($this->table);
        return $data;
    }

    public function getByCategoryName($name, $lawyeId) {
        $this->db->where('category', $name);
        $this->db->where('lawyer', $lawyeId);
        $this->db->order_by("cases.id", "desc");

        $data = $this->db->get($this->table);
        $cases = $data->result();
        foreach ($cases as &$case) {
            $case->answers = $this->getAnswersByCase($case->id, $case->lawyer);
        }
        return $cases;
    }

    public function getAllByLawyer($lawyer_id) {
        $this->db->where('lawyer', $lawyer_id);
        $this->db->order_by("cases.id", "desc");
//        $this->db->order_by("cases.status", "desc");
//        $this->db->order_by("cases.status", 'OPENED', 'CLOSED', 'UNDER-REVIEW', 'CANCELLED');
        $data = $this->db->get($this->table);

        $cases = $data->result();
        foreach ($cases as &$case) {
//            echo "case id : " . $case->id;
            $case->answers = $this->getAnswersByCase($case->id, $case->lawyer);
        }
//        print_r($cases);
//        exit;
        return $cases;
//        print_r($data);
//        exit;
    }

    public function getAllByClient($client_email) {
		
        $this->db->where('client', $client_email);
        $this->db->order_by("cases.id", "desc");
        $data = $this->db->get($this->table);

        $cases = $data->result();

        foreach ($cases as &$case) {
//            echo "case id : " . $case->id;

            $case->answers = $this->getAnswersByCase($case->id, $case->lawyer);
        }

        return $cases;
//        print_r($data);
//        exit;
    }

    public function getAnswersByCase($id, $lawyer_id) {

        $this->db->select('questionnaire_answer.answer, questionnaire.question,lawyer.email');
        $this->db->from('lawyer_questionnaire_answer');
        $this->db->join('questionnaire_answer', 'lawyer_questionnaire_answer.questionnaire_answer = questionnaire_answer.id');
        $this->db->join('questionnaire', 'questionnaire_answer.questionnaire = questionnaire.id');

        $this->db->join('cases', 'cases.id = lawyer_questionnaire_answer.cases');
        $this->db->join('lawyer', 'lawyer.id = cases.lawyer');
        $this->db->where('lawyer_questionnaire_answer.cases', $id);
        $this->db->where('lawyer_questionnaire_answer.lawyer', $lawyer_id);
        $data = $this->db->get();
        return $data->result();
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
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    function delete($id) {
        $this->db->delete($this->table, $id);
    }

    function update($id, $data) {
        $this->db->where('id ', $id);
        $this->db->update($this->table, $data);
    }

}

?>
