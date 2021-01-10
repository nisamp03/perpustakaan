<?php

class Login extends CI_Controller
{
    var $api ="";
    function __construct()
    {
        parent::__construct();
        $this->api="http://localhost/rest-server/server/api";
        $this->load->model("user_model");
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    function index()
    {
        // Jika sudah ada session
        if($this->user_model->isLogin()) redirect(site_url('/'));

        // jika form login disubmit
        if($this->input->post()){
            $datas = array(
                'username'           => $this->input->post('username'),
                'password'           => $this->input->post('password')); 
            $data = json_decode($this->curl->simple_post($this->api . '/auth/login', $datas, array(CURLOPT_BUFFERSIZE => 10)));
            
            if (isset($data->{'token'})) {
                $this->user_model->sessSet($datas['username'], $data->{'token'});
                redirect(base_url());
            } else {
                $this->session->set_flashdata('loginError', 'Invalid Login');
                redirect(site_url('login'));
            }

        } else {

            // tampilkan halaman login
            $this->load->view("buku/v_login");
        }
    }

    function logout()
    {
        // hancurkan semua sesi
        $this->user_model->sessDestroy();
        redirect(site_url('login'));
    }
}