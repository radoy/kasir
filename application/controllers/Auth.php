<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //Load Model
        $this->load->model('user_model', 'daUser');
        $this->load->model('level_model', 'daLevel');

        $this->_container = 'template/container';
        $this->_header = 'Manajemen Pengguna';
    }

    public function login()
    {
        if (!isValidUser()) {
            $data = array();

            if (is_posted()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('username', 'Username', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_message('required', '%s tidak boleh kosong');

                if ($this->form_validation->run() == TRUE) {
                    if ($this->user_authentication->login()) {
                        redirect('beranda', 'location');
                    } else {
                        $this->session->set_flashdata('system_message', 'Kombinasi username dan password yang anda masukkan tidak cocok, silahkan dicoba lagi.');
                        redirect('auth/login');
                    }
                }
            }

            $data['header'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            redirect('welcome', 'location');
        }
    }

    public function logout()
    {
        $obj = new User_authentication();
        $obj->logout();

        redirect('auth/login', 'location');
    }

    public function user_list()
    {
        if (!isAdmin()) redirect('auth/login');

        $data = array();

        $data['header'] = $this->_header;
        $data['page'] = 'auth/user_list';
        $data['data'] = $this->daUser->getData();

        //Load view
        $this->load->view($this->_container, $data);
    }

    public function user_form($id = 0)
    {
        if (!isAdmin()) redirect('auth/login');

        $data = array();

        if (is_posted()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('level', 'Level', 'greater_than[0]|required', array(
                'greater_than' => 'Level harus dipilih',
            ));
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username');

            if ($id == 0)
                $this->form_validation->set_rules('password', 'Password', 'trim|required');

            $this->form_validation->set_message('required', '%s tidak boleh kosong.');

            if ($this->form_validation->run()) {
                if ($this->daUser->writeData($id)) {
                    $this->session->set_flashdata('success_message', 'Data berhasil disimpan.');
                } else {
                    $this->session->set_flashdata('error_message', 'Data gagal disimpan.');
                }

                redirect('auth/user_list');
            }
        }

        $data['header'] = $this->_header;
        $data['page'] = 'auth/user_form';
        $data['data'] = $this->daUser->getDataById($id);
        $data['dataLevelCombo'] = $this->daLevel->getComboData();

        //Load view
        $this->load->view($this->_container, $data);
    }

    public function check_username($username)
    {
        $us_login = $this->daUser->checkUsername($username, $this->input->post('clogin'));

        if ($us_login) :
            $this->form_validation->set_message('check_username', 'Username sudah digunakan.');
            return FALSE;
        endif;

        return TRUE;
    }

    public function user_identity()
    {
        if (!isValidUser()) redirect('login');

        $data = array();
        $isProcess = FALSE;

        if (is_posted()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');

            if ($this->input->post('password', TRUE) ||
                $this->input->post('cpassword', TRUE)) {

                $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
                $this->form_validation->set_rules('cpassword', 'Konfirmasi Password', 'trim|required');
            }

            $this->form_validation->set_message('required', '%s tidak boleh kosong.');
            $this->form_validation->set_message('matches', 'Password dan konfirmasi password tidak sama.');

            if ($this->form_validation->run()) {
                if ($this->daUser->writeDataProfil()) {
                    $this->session->set_flashdata('success_message', 'Data berhasil disimpan.');
                } else {
                    $this->session->set_flashdata('error_message', 'Data gagal disimpan.');
                }

                redirect('auth/user_identity');
            }
        }

        $data['header'] = 'Profil';
        $data['page'] = 'auth/user_identity';
        $data['data'] = $this->daUser->getDataByUserLogin($this->session->userdata('Login'));

        //Load view
        $this->load->view($this->_container, $data);
    }

}