<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Main extends CI_Controller {

    function __construct() {
        // Construct the parent class

        parent::__construct();
        $this->load->helper('url');
//        echo "hello";
//        $this->load->view('home');
    }

    function view_home() {
        $this->load->library('facebook', array('appId' => '1264792600228692', 'secret' => '446bc3ee88d52701879bcaaa9d2b26a0'));

        $this->user = $this->facebook->getUser();

        $data['login_url'] = $this->facebook->getLoginUrl(array("scope" => array("email", "user_location,user_birthday"), "redirect_uri" => "http://localhost/legalassistance/index.php/callback"));

        $this->load->view('home', $data);
    }

    function view_client_questionnaire() {
        $this->load->view('client_questionnaire');
    }

    function view_abaut_us() {
        $this->load->view('about-us');
    }

    function view_register_lawyer() {
        $this->load->view('register_lawyer');
    }

    function view_lawyer_list() {
        $this->load->view('lawyer_list');
    }

    function view_client_questionnaire2() {
//        $data = array();
//        $data['category'] = $category;
        $this->load->model('questionnaire_model');
//        $data['questionnaire'] = $this->questionnaire_model->getByCategoryName($category)->result();
//        print_r($data['questionnaire']);
//        exit;

        $this->load->view('client_questionnaire2');
    }

    function view_lawyer_login() {
        $this->load->library('facebook', array('appId' => '1264792600228692', 'secret' => '446bc3ee88d52701879bcaaa9d2b26a0'));

        $this->user = $this->facebook->getUser();

        $data['login_url'] = $this->facebook->getLoginUrl(array("scope" => array("email", "user_location,user_birthday"), "redirect_uri" => "http://localhost/legalassistance/index.php/callback"));
        $this->load->view('lawyer_login', $data);
        return;
    }

    function view_client_login() {

        $this->load->view('client_login');
    }

    function callback() {
        $this->load->model('lawyer_model');
        $this->load->library('facebook', array('appId' => '1264792600228692', 'secret' => '446bc3ee88d52701879bcaaa9d2b26a0'));
        $this->user = $this->facebook->getUser();
        if ($this->user) {

            $data['user_profile'] = $this->facebook->api('/me?fields=id,name,gender,first_name,last_name,picture,email,location,birthday');

            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/oauth_login/logout'));

            if ($this->lawyer_model->getByEmail($data['user_profile']['email']) == TRUE) {
                $data = array();
//                $data['message'] = "Already registered";
                $this->load->view('backdoor/main', $data);
                return;
            }
            $this->load->model('lawyer_model');
            $lawyer = array();

            $lawyer['firstname'] = $data['user_profile']['first_name'];
            $lawyer['lastname'] = $data['user_profile']['last_name'];
            if (!empty($data['user_profile']['middle_name'])) {
                $lawyer['middlename'] = $data['user_profile']['middle_name'];
            }
            if (!empty($data['user_profile']['birthday'])) {
                $lawyer['dob'] = $data['user_profile']['birthday'];
            }
            if (!empty($data['user_profile']['gender'])) {
                $lawyer['gender'] = $data['user_profile']['gender'];
            }
            if (!empty($data['user_profile']['email'])) {
                $lawyer['email'] = $data['user_profile']['email'];
            }
            if (!empty($data['user_profile']['location'])) {
                $lawyer['address'] = $data['user_profile']['location'];
            }
            if (!empty($data['user_profile']['picture'])) {
                $lawyer['image'] = $data['user_profile']['picture'];
            }
            $this->load->view('register_lawyer', $lawyer);
        }
    }

    function index() {
        $this->view_home();
    }

}

?>
