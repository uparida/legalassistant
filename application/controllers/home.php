<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Home extends REST_Controller {

    private $site_email = 'wani2810@gmail.com';

    function __construct() {
        // Construct the parent class
//        echo "hello";
        parent::__construct();

        $this->load->helper('url');
//        $this->view_home();
    }

    function hello_get() {
        $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
        ];
        $this->load->model('lawyer_model');
        $this->response($users, REST_Controller::HTTP_OK);
    }

    function get_questionnaire_get() {

        $data = array();
        $this->load->model('questionnaire_model');
        $category = $this->get('category');

        $query = $this->questionnaire_model->getByCategoryName($category);
        if ($query->num_rows() > 0) {
            $this->response($query->result(), REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed'],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function get_lawyer_profile_get() {

        $data = array();
        $this->load->model('lawyer_model');

        $query = $this->lawyer_model->getuser($this->session->userdata('user_id'));
        if ($query->num_rows() > 0) {
            $this->response($query->row(), REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed'],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function get_client_profile_get() {

        $data = array();
        $this->load->model('client_model');

        $query = $this->client_model->getuser($this->session->userdata('user_id'));
        if ($query->num_rows() > 0) {
            $this->response($query->row(), REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed'],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function lawyer_list_get() {

        $this->load->model('lawyer_model');
        $this->load->model('lawyer_category_model');
        $this->load->model('categories_model');
        $this->load->model('cases_model');
        $category = $this->get('category');

        $query = $this->lawyer_model->getByCategoryName($category);


        if ($query->num_rows() > 0) {
            $lawyers = $query->result();
            foreach ($lawyers as &$row) {
                $result = $this->cases_model->getTotalCompletedCase($row->id);
                $categoryResult = $this->lawyer_category_model->getByLawyerId($row->id);
                $total = $result->num_rows();

                $row->case_completed = $total;
                $categoryList = "";
                foreach ($categoryResult->result() as $cat) {

                    $category_name = $this->categories_model->getNameById($cat->category);
//                    array_push($categoryList, $category_name);
                    $categoryList = $categoryList . " " . $category_name;
                }
                $row->specialities = $categoryList;
            }
            $this->response($lawyers, REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed'],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function send_email_lawyer($from, $to, $subject, $message, $login = false) {



//        $message = $this->input->post('message');


        $this->email->set_mailtype('html');
        $this->email->from($from);
        $this->email->to($to);

        $this->email->subject('Contact from ' . $from);

        $message2;
        if ($login) {
            $message2 = '<br> <table border="0" bgcolor="#dbeceb" cellpadding="10" cellspacing="10" >
                            <th><h2>Enquiry Information<br></h2></th>

									<tr><td><strong>Email Address:</strong></td><td>' . $from . '</td></tr>
                                                                            <tr><td><strong>Subject:</strong></td><td>' . $subject . '</td></tr>
									<tr><td><strong>Q&A :</strong></td><td>' . $message . '</td></tr></table>';
        } else {
            $message2 = '<br> <table border="0" bgcolor="#dbeceb" cellpadding="10" cellspacing="10" >
                            <th><h2>' . $subject . '<br></h2></th><tr><td>' . $message . '</tr></td></table>';
        }

        $this->email->message($message2);

        if ($this->email->send()) {




            return "sent email";
        }
        return "not sent email";
    }

    function send_email_login($from, $to, $subject, $message) {



//        $message = $this->input->post('message');


        $this->email->set_mailtype('html');
        $this->email->from($from);
        $this->email->to($to);

        $this->email->subject('Contact from ' . $from);



        $message2 = '<br> <table border="0" bgcolor="#dbeceb" cellpadding="10" cellspacing="10" >
                            <th><h2>' . $subject . '<br></h2></th><tr><td>' . $message . '</tr></td></table>';


        $this->email->message($message2);

        if ($this->email->send()) {




            return "sent email";
        }
        return "not sent email";
    }

    function get_category_lawyer_get() {

        $this->load->model('lawyer_category_model');
        $lawyerId = $this->session->userdata('user_id');

        $query = $this->lawyer_category_model->getByLawyerId($lawyerId);


        if ($query->num_rows() > 0) {
            $this->response($query->result(), REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed', 'id' => $lawyerId],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function do_upload($fileToBeUpload) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1500;
        $config['max_height'] = 1000;

        $this->load->library('upload');
        $this->upload->initialize($config);


        if (!$this->upload->do_upload('myFile')) {
            $error = array('error' => $this->upload->display_errors());
            echo "error to upload";
            return FALSE;
//            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo $data['upload_data']['file_name'];
            return FALSE;
//            exit;
//            $this->load->view('upload_success', $data);
        }
    }

    function lawyer_register_post() {
        $this->load->model('lawyer_model');
        if ($this->lawyer_model->getByEmail($this->post('email')) == TRUE) {
            $message = [
                ['message' => 'already registered'],
            ];
            $this->set_response($message, REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('lawyer_model');
        $this->load->model('lawyer_category_model');

        $selectedCategories = $this->post('categories');
        $date = str_replace('/', '-', $this->post('dob'));
//        echo date('Y-m-d', strtotime($date));
        $parseDate = date('Y-m-d', strtotime($date));
        $lawyer = [

            'firstname' => $this->post('firstName'),
            'lastname' => $this->post('lastName'),
            'middlename' => $this->post('middleName'),
            'contact' => $this->post('contact'),
            'address' => $this->post('address'),
            'email' => $this->post('email'),
            'rate' => $this->post('rate'),
            'dob' => $parseDate,
            'username' => $this->post('username'),
            'description' => $this->post('description'),
            'password' => $this->post('password'),
            'gender' => $this->post('gender'),
            'image' => $this->post('imageName')
        ];

//        if (!empty($this->post('imageData'))) {
//            $data = str_replace('data:image/png;base64, ', '', $this->post('imageData'));
//            $data = str_replace('data:image/jpg;base64, ', '', $data);
//            $data = str_replace('data:image/JPG;base64, ', '', $data);
//            $data = str_replace('data:image/PNG;base64, ', '', $data);
//            $data = str_replace('data:image/jpeg;base64, ', '', $data);
//            $data = str_replace('data:image/gif;base64, ', '', $data);
//            $data = str_replace(' ', '+', $data);
//            echo "data : ";
//            echo $data;
//            $data = base64_decode($data);
//            $success = file_put_contents($file, $data);
//        } else {
//            $success = file_get_contents($this->post('imageLink'));
//        }
        if (!empty($this->post('imageData'))) {
            $data = str_replace('data:image/png;base64,', '', $this->post('imageData'));
            $data = str_replace('data:image/jpg;base64,', '', $data);
            $data = str_replace('data:image/JPG;base64,', '', $data);
            $data = str_replace('data:image/PNG;base64,', '', $data);
            $data = str_replace('data:image/jpeg;base64,', '', $data);
            $data = str_replace('data:image/gif;base64,', '', $data);
            $data = str_replace(' ', '+', $data);

            $data = base64_decode($data);
        } else {
            $data = file_get_contents($this->post('imageLink'));
        }


        $file = 'uploads/' . $this->post('imageName');
        $success = file_put_contents($file, $data);


//        $file = 'uploads/' . $this->post('imageName');


        if ($success > 0) {
            $newId = $this->lawyer_model->insert($lawyer);
            $user = $this->lawyer_model->getById($newId);


            for ($i = 0; $i < sizeof($selectedCategories); $i++) {
                $lawyer_category = ['category' => $selectedCategories[$i], 'lawyer' => $newId];
                $this->lawyer_category_model->insert($lawyer_category);
            }
//            foreach ($user->result() as $row) {
//                $userdata = array('user_id' => $row->id, 'username' => $row->username);
//                $this->session->set_userdata($userdata);
//            }
            $userdata = array('user_id' => $user['id'], 'email' => $user['email']);
            $this->session->set_userdata($userdata);

            $this->set_response($lawyer, REST_Controller::HTTP_CREATED);
        } else {
            $this->set_response($lawyer, REST_Controller::HTTP_NOT_FOUND);
        }


//        $fileToBeUpload = $this->post('imageData');
//        if ($this->do_upload($fileToBeUpload) == FALSE) {
//            $this->set_response($lawyer, REST_Controller::HTTP_NOT_FOUND);
//            return;
//        };
//        exit;
        // CREATED (201) being the HTTP response code
    }

    function client_submit_answers_post() {

        $this->load->model('questionnaire_answer_model');
        $answer = array();
        for ($i = 0; $i < 3; $i++) {
            $answer[$i] = [

                'client' => $this->post('email'),
                'answer' => $this->post('answer')[$i],
                'questionnaire' => $this->post('questionnaire')[$i]['id'],
            ];

            $this->questionnaire_answer_model->insert($answer[$i]);
        }

        $this->set_response($answer, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    function lawyer_profile_edit_post() {

        $this->load->model('lawyer_model');
        $lawyer = array();

        $date = str_replace('/', '-', $this->post('dob'));
        $parseDate = date('Y-m-d', strtotime($date));
        $lawyer = [

            'firstname' => $this->post('firstName'),
            'lastname' => $this->post('lastName'),
            'middlename' => $this->post('middleName'),
            'contact' => $this->post('contact'),
            'address' => $this->post('address'),
            'rate' => $this->post('rate'),
            'dob' => $parseDate,
            'description' => $this->post('description'),
            'gender' => $this->post('gender')
        ];

        $this->lawyer_model->update($this->session->userdata('user_id'), $lawyer);


        $this->set_response($lawyer, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    function edit_case_post() {

        $this->load->model('cases_model');
        $this->load->model('lawyer_model');
        $case = array();


//        $case['id'] = $this->post('caseId');
        $case['status'] = $this->post('status');

//        exit;
        $message = [
            ['message' => 'success'],
        ];
        $this->cases_model->update($this->post('caseId'), $case);
        $case = $this->cases_model->getById($this->post('caseId'));
        $lawyerEmail = $this->lawyer_model->getNameById($case->lawyer);
        $msg = "Your case has been updated to : " . $case->status .
                " by Lawyer : " . $lawyerEmail;
        $this->send_email_lawyer($this->site_email, $case->client, 'Enquiry for case', $msg);
//        echo($msg);
//        $case['id'] = $this->post('caseId');
        $this->set_response(['message' => 'success'], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    function lawyer_category_edit_post() {

        $this->load->model('lawyer_category_model');
        $this->lawyer_category_model->deleteByLawyerId($this->session->userdata('user_id'));
        $selectedCategories = $this->post('categories');
        for ($i = 0; $i < sizeof($selectedCategories); $i++) {
            $lawyer_category = ['category' => $selectedCategories[$i], 'lawyer' => $this->session->userdata('user_id')];
            $this->lawyer_category_model->insert($lawyer_category);
        }

        $message = [
            ['message' => 'success'],
        ];


//        $case['id'] = $this->post('caseId');
        $this->set_response(['message' => 'success'], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    function lawyer_contact_post() {

        $this->load->model('cases_model');
        $this->load->model('questionnaire_answer_model');
        $this->load->model('lawyer_questionnaire_answer_model');
        $this->load->model('client_model');
        $this->load->model('lawyer_model');
        $count = sizeof($this->post('lawyerIdList'));
        for ($i = 0; $i < $count; $i++) {

            $data = [

                'client' => $this->post('client'),
                'lawyer' => $this->post('lawyerIdList')[$i],
                'category' => $this->post('category'),
                'description' => $this->post('description'),
            ];
            $insert_id = $this->cases_model->insert($data);
            $questionaire_answer_msg = "";
            if ($insert_id > 0) {
                if ($i == 0) {



                    $answer = array();
                    $question_answer_ids = array();
                    for ($k = 0; $k < 3; $k++) {
                        $answer[$k] = [
//                    'cases' => $insert_id,
                            'client' => $this->post('client'),
                            'answer' => $this->post('answer')[$k],
                            'questionnaire' => $this->post('questionnaire')[$k]['id'],
                        ];

                        $questionaire_answer_msg = $questionaire_answer_msg . $this->post('questionnaire')[$k]['question'] . "<br> - " . $this->post('answer')[$k] . "<br><hr>";
                        $question_answer_ids[$k] = $this->questionnaire_answer_model->insert($answer[$k]);
                    }

//                print_r($answer);
                }
            }
            $lawyer_email = $this->lawyer_model->getNameById($this->post('lawyerIdList')[$i]);
            $this->send_email_lawyer($this->post('client'), $lawyer_email, 'Enquiry for case', $questionaire_answer_msg);
            $this->send_email_lawyer($lawyer_email, $this->post('client'), 'Enquiry for case', $questionaire_answer_msg);


            if (!is_null($question_answer_ids)) {

                $lawyer_questionnaire_answer = array();
                for ($j = 0; $j < 3; $j++) {
                    $lawyer_case[$j] = [
//                    'cases' => $insert_id,
                        'lawyer' => $this->post('lawyerIdList')[$i],
                        'questionnaire_answer' => $question_answer_ids[$j],
                        'cases' => $insert_id,
                    ];

                    $this->lawyer_questionnaire_answer_model->insert($lawyer_case[$j]);
                }
            }
        }
        $randomString = $this->generate_random_string();

        $client = ['email' => $this->post('client'), 'username' => $this->post('client'), 'password' => $randomString];
        $user;
        $checkEmail = $this->client_model->getByEmail($this->post('client'));
        if ($checkEmail == TRUE) {
            $user = $this->client_model->getIdByEmail($this->post('client'));
            $message = [
                ['message' => 'already registered'],
            ];
        } else {
            $client_id = $this->client_model->insert($client);
            $user = $this->client_model->getById($client_id);
            $message = [
                ['message' => 'Please check your email for password !!'],
            ];

            $msg = "Your password is : " . $randomString;
            $sent = $this->send_email_login($this->site_email, $this->post('client'), 'Login information', $msg);
//            $sent = $this->send_email_login('razee.2thou13@gmail.com', 'rajyalaxmimaharzan@gmail.com', 'Login information', $msg);
//            echo $sent . "-" . $msg;
        }
        $userdata = array('user_id' => $user['id'], 'email' => $user['email']);
        $this->session->set_userdata($userdata);


        $this->set_response($message, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
    }

    function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function lawyer_login_post() {

        $this->load->model('lawyer_model');

        $lawyer = [


            'username' => $this->post('username'),
            'password' => $this->post('password')
        ];
        $result = $this->lawyer_model->login($lawyer);
        if ($result->num_rows() > 0) {
            $message = [
                ['message' => 'success'],
            ];
            foreach ($result->result() as $row) {
                $userdata = array('user_id' => $row->id, 'email' => $row->email);
                $this->session->set_userdata($userdata);
            }


            $this->set_response($message, REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed'],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function client_login_post() {

        $this->load->model('client_model');

        $client = [


            'username' => $this->post('username'),
            'password' => $this->post('password')
        ];
        $result = $this->client_model->login($client);
        if ($result->num_rows() > 0) {
            $message = [
                ['message' => 'success'],
            ];
            foreach ($result->result() as $row) {

                $userdata = array('user_id' => $row->id, 'email' => $row->email);
                $this->session->set_userdata($userdata);
            }


            $this->set_response($message, REST_Controller::HTTP_OK);
        } else {
            $message = [
                ['message' => 'failed'],
            ];
            $this->set_response($message, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function login() {
        $this->load->view('login');
    }

    function get_categories_get() {

        $this->load->model('categories_model');
        $categories = $this->categories_model->getAll();
        $this->response($categories, REST_Controller::HTTP_OK);
    }

    function get_case_get() {

        $this->load->model('cases_model');
        $cases = $this->cases_model->getById($this->get('caseId'));

        $this->response($cases, REST_Controller::HTTP_OK);
    }

    function session_get() {



        $this->response($this->session->userdata, REST_Controller::HTTP_OK);
    }

    function get_cases_get() {

        $this->load->model('cases_model');
        $cases = $this->cases_model->getAllByLawyer($this->session->userdata('user_id'));

        $this->response($cases, REST_Controller::HTTP_OK);
    }

    function get_client_cases_get() {
        $this->load->model('cases_model');
        $this->load->model('client_model');
        $email = $this->client_model->getEmailByUsername($this->session->userdata('email'));

        $cases = $this->cases_model->getAllByClient($email);

        $this->response($cases, REST_Controller::HTTP_OK);
    }

    function get_cases_search_get() {

        $this->load->model('cases_model');

        $cases = $this->cases_model->getByCategoryName($this->get('selectedCategory'), $this->session->userdata('user_id'));

        $this->response($cases, REST_Controller::HTTP_OK);
    }

    function view_home() {
        $this->load->view('home

            ');
    }

    function login_post() {

    }

}

?>
