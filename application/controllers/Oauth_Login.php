<?php

class Oauth_Login extends CI_Controller {

    public $user = "";

    public function __construct() {
        parent::__construct();

// Load facebook library and pass associative array which contains appId and secret key
        $this->load->library('facebook', array('appId' => '1264792600228692', 'secret' => '446bc3ee88d52701879bcaaa9d2b26a0'));

// Get user's login information
        $this->user = $this->facebook->getUser();


//        $app_id = "1264792600228692";
//        $app_secret = "446bc3ee88d52701879bcaaa9d2b26a0";
//        $facebook = new Facebook(array(
//            'appId' => $app_id,
//            'secret' => $app_secret,
//            'cookie' => true
//        ));
//
//        $this->load->library('facebook', $facebook);
// Get user's login information
//        $this->user = $this->facebook->getUser();
//        $config = array(
//            'appId' => '1264792600228692',
//            'secret' => '446bc3ee88d52701879bcaaa9d2b26a0'
//        );
//
//// Load facebook library and pass associative array which contains appId and secret key
//        $CI->load->library('facebook', $config);
//
//// Get user's login information
//        $this->user = $user_id = $CI->facebook->getUser();
    }

// Store user information and send to profile page
    public function index() {
        if ($this->user) {
            $data['user_profile'] = $this->facebook->api('/me?fields=id,name,gender,first_name,last_name,picture,email,location,birthday');

// Get logout url of facebook
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/oauth_login/logout'));
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

//            $lawyer['image'] = $data['user_profile']['picture'];
//            $lawyer['address'] = $data['user_profile']['location'];
//            $lawyer['password'] = $data['user_profile']['password'];
//            $this->lawyer_model->insert($lawyer);
// Send data to profile page
            $this->load->view('register_lawyer', $lawyer);
        } else {

// Store users facebook login url
            $data['login_url'] = $this->facebook->getLoginUrl(array("scope" => array("email", "user_location,user_birthday")));
            $this->load->view('login', $data);
        }
    }

// Logout from facebook
    public function logout() {

// Destroy session
        session_destroy();

// Redirect to baseurl
        redirect(base_url());
    }

}

?>
