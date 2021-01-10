<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('User_model','user');
    }

    

    public function login_post()
    {
        $u = $this->post('username'); 
        $p = sha1($this->post('password')); 
        $q = array('username' => $u); 
        $kunci = $this->config->item('thekey');
        $invalidLogin = ['status' => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'Username dan Password Salah']; 
        $val = $this->user->get_user($q)->row(); 
        if($this->user->get_user($q)->num_rows() == 0){$this->response($invalidLogin, 
                REST_Controller::HTTP_NOT_FOUND);}
		$match = $val->password;   
        if($p == $match){  
        	$token['id'] = $val->id;  
            $token['username'] = $u;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + 60*60*1; 
            $output['Status'] = REST_Controller::HTTP_OK;
            $output['Username'] = $u;
            $output['expiry'] = $token['exp'];
            $output['token'] = JWT::encode($token,$kunci ); 
            $this->set_response($output, REST_Controller::HTTP_OK); 
        }
        else {
            $this->set_response($invalidLogin, REST_Controller::HTTP_NOT_FOUND); 
        }
    }

}
