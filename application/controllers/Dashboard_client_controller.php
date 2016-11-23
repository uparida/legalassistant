<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_client_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('client_model');
    }

    function index() {

        $data['heading'] = 'Client Dashboard';

        $this->load->view('backdoor/client/main', $data);
    }

    public function view_profile() {

        $this->load->view('backdoor/client/profile');
    }

    public function view_cases() {
        $this->load->view('backdoor/client/cases');
    }

    public function view_account_edit() {

        $this->load->view('backdoor/client/account-edit');
    }

    public function view_content() {
        $this->load->view('backdoor/client/dashboard');
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

                    $query = $this->client_model->checkusername($this->input->post('username'));

                    if ($query->num_rows() > 0) {

                        echo "Username already exists";
                        $query->free_result();
                        exit();
                    }

                    $value['details']['username'] = $this->input->post('username');
//                    echo "id" . $id;
                    $this->client_model->updateuser($id, $value['details']);

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
                $query = $this->client_model->getuser($userid);
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

                        $this->client_model->updateuser($userid, $value['details']);
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
