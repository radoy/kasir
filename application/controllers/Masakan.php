<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!isValidUser()) {
            redirect('login');
        }

        //Load Model
        $this->load->model('masakan_model', 'daMasakan');
    }

    public function index()
    {
        $data = array();

        $data['header'] = 'Daftar Masakan';
        $data['page'] = 'masakan/index';
        $data['data'] = $this->daMasakan->getData();

        $this->load->view('template/container.php', $data);
    }

    public function create()
    {
        $data = array();

        if (is_posted()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required');

            if ($this->form_validation->run()) {
                if ($this->daMasakan->writeData()) {
                    $this->session->set_flashdata('success_message', 'Data berhasil disimpan.');
                } else {
                    $this->daMasakan->set_flashdata('error_message', 'Data gagal disimpan.');
                }

                redirect('masakan');
            }
        }

        $data['header'] = 'Tambah Masakan';
        $data['page'] = 'masakan/create';
        $data['dataMasakanCombo'] = $this->daMasakan->getComboData();

        $this->load->view('template/container.php', $data);
    }

    public function update($id)
    {
        $data = array();

        if (is_posted()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required');

            if ($this->form_validation->run()) {
                if ($this->daMasakan->writeData($id)) {
                    $this->session->set_flashdata('success_message', 'Data berhasil disimpan.');
                } else {
                    $this->daMasakan->set_flashdata('error_message', 'Data gagal disimpan.');
                }

                redirect('masakan');
            }
        }

        $data['header'] = 'Update Masakan';
        $data['page'] = 'masakan/update';
        $data['dataMasakan'] = $this->daMasakan->getDataById($id);
        $data['dataMasakanCombo'] = $this->daMasakan->getComboData();

        $this->load->view('template/container.php', $data);
    }
}
