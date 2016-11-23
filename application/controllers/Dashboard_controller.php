<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('lawyer_model');
        $this->load->model('cases_model');
//        $this->load->view('login');
//        $this->container = 'login';
    }

//    public function index() {
//        $this->load->view('welcome_message');
//    }

    function index() {
//        echo "id : " . $this->session->userdata('user_id');
//        echo "username : " . $this->session->userdata('username');




        $data['heading'] = 'Dashboard';

        $this->load->view('backdoor/main', $data);
    }

    public function view_cases() {
        $this->load->view('backdoor/cases');
    }

    public function view_cases_edit() {

        $this->load->view('backdoor/cases-edit');
    }

    public function view_cases_view() {

        $this->load->view('backdoor/cases-view');
    }

    public function view_profile() {

        $this->load->view('backdoor/profile');
    }

    public function view_profile_edit() {

        $this->load->view('backdoor/profile-edit');
    }

    public function view_welcome() {

        $this->load->view('backdoor/welcome');
    }

    public function view_account_edit() {

        $this->load->view('backdoor/account-edit');
    }

    public function view_content() {
        $this->load->view('backdoor/dashboard');
    }

    public function view_search() {
        $this->load->view('backdoor/search');
    }

    function search($category_name) {

//        if ($this->session->userdata('user_id') == '') {
//            redirect('login', 'location');
//        } else {
        $data['heading'] = 'Search';
        $data['page'] = '';
        $data['category_name'] = $category_name;
        $data['contents'] = $this->cases_model->getByCategoryName($category_name);

        $this->load->view('backdoor/cases-search', $data);
//        }
    }

    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('home', 'location');
    }

    function change_username() {
        $id = $this->session->userdata('user_id');

        if ($this->session->userdata('user_id') != '') {
//            $userid = $this->session->userdata('user_id');

            if ($this->input->post('action') && $this->input->post('action') == 'submit') {
                $this->form_validation->set_rules('username ', 'Username ', 'trim|alpha_dash');
                if ($this->form_validation->run() == FALSE) {
                    echo validation_errors();
                    exit();
                } else {

                    $query = $this->lawyer_model->checkusername($this->input->post('username'));

                    if ($query->num_rows() > 0) {

                        echo "Username already exists";
                        $query->free_result();
                        exit();
                    }

                    $value['details']['username'] = $this->input->post('username');
//                    echo "id" . $id;
                    $this->lawyer_model->updateuser($id, $value['details']);

                    echo "yes";
                    exit;
                }
            }
        } else {

            echo "Please login with your username and password";
        }
    }

    function change_password() {
        if ($this->session->userdata('user_id') != '') {
            $userid = $this->session->userdata('user_id');

            if ($this->input->post('action') && $this->input->post('action') == 'submit') {
//                $this->form_validation->set_rules('opass ', 'Old Password ', 'trim|required|xss_clean');
//                $this->form_validation->set_rules('npass ', 'New Password ', 'trim|required|xss_clean');
//                $this->form_validation->set_rules('cpass ', 'Confirm Password ', 'trim|required|xss_clean|matches[npass]');
//                if ($this->form_validation->run() == FALSE) {
//                    echo validation_errors();
//                    exit();
//                } else {
                $query = $this->lawyer_model->getuser($userid);
                if ($query->num_rows() > 0) {
                    $row = $query->row();
                    if ($row->password != $this->input->post('opass')) {
                        echo 'Your old password is incorrect';
                        exit();
                    } elseif ($this->input->post('npass') != $this->input->post('cpass')) {
                        echo 'New password and confirm password doesnot match';
                        exit();
                    } else {
                        $value['details']['password'] = $this->input->post('npass');

                        $this->lawyer_model->updateuser($userid, $value['details']);
                        echo "yes";
                        exit;
                    }
//                    }
                }
            }
        } else {

            echo "Please login with your username and password";
        }
    }

}
