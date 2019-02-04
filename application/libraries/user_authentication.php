<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_authentication
{

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('user_model');
    }

    public function __call($method, $arguments)
    {
        if (!method_exists($this->CI->user_model, $method)) {
            throw new Exception('Undefined method User_authentication::' . $method . '() called');
        }

        return call_user_func_array(array($this->CI->user_model, $method), $arguments);
    }

    public function logout()
    {
        $this->CI->session->sess_destroy();
    }

    //role > 0
    public function isValidUser()
    {
        if ($this->CI->session->userdata('Login')) {
            if ($this->CI->session->userdata('Level') != "") {
                return true;
            }
        }

        return false;
    }

    //role Administrator
    public function isAdmin()
    {
        if ($this->CI->session->userdata('Login')) {
            if ($this->CI->session->userdata('Level') === "1") {
                return true;
            }
        }

        return false;
    }

    //role Kasir
    public function isKasir()
    {
        if ($this->CI->session->userdata('Login')) {
            if ($this->CI->session->userdata('Level') === "2") {
                return true;
            }
        }

        return false;
    }
}