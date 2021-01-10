<?php

class User_model extends CI_Model
{
    public function sessSet($user, $token)
    {
		// set session
        $this->session->set_userdata(['user_logged' => $user, 'user_token' => $token]);
    }

    public function sessDestroy()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
    }

    public function getSessionToken()
    {
        return $this->session->userdata('user_token');
    }

    public function getSessionUser()
    {
        return $this->session->userdata('user_logged');
    }

    public function isLogin(){
        return $this->session->userdata('user_logged') !== null;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

}