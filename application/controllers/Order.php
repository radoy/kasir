<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!isValidUser()) {
            redirect('auth/login');
        }

        //Load Model
        $this->load->model('order_model', 'daOrder');
        $this->load->model('order_detail_model', 'daOrderDetail');
        $this->load->model('masakan_model', 'daMasakan');
        $this->load->model('user_model', 'daUser');
    }

    public function index()
    {
        $data = array();

        $data['header'] = 'Daftar order ';
        $data['page'] = 'order/index';
        $data['dataOrder'] = $this->daOrder->getDataOrderActive();

        $this->load->view('template/container.php', $data);
    }

    public function create()
    {
        $data = array();

        if (is_posted()) {

            $dIntId = $this->daOrder->createData();

            if ($dIntId) {
                $this->session->set_flashdata('success_message', 'Data berhasil disimpan. Silahkan input masakan yang ingin dipesan');
                redirect('order/detail/' . $dIntId);
            } else {
                $this->daMasakan->set_flashdata('error_message', 'Data gagal disimpan.');
            }
        }

        $data['header'] = 'Tambah order baru';
        $data['page'] = 'order/create';
        $data['data'] = $this->daOrder->getData();
        $data['dataMasakan'] = $this->daMasakan->getComboDataMasakan();
        // Pelanggan ID Level = 3
        $data['dataUserCombo'] = $this->daUser->getComboDataByLevel(3);

        $this->load->view('template/container.php', $data);
    }

    public function detail($id)
    {
        $data = array();

        if (is_posted()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('jumlah_masakan', 'Porsi', 'trim|required');
            $this->form_validation->set_rules('masakan', 'Jenis makanan / minuman', 'greater_than[0]|required', array(
                'greater_than' => 'Jenis makanan / minuman harus dipilih',
            ));

            if ($this->form_validation->run()) {
                if ($this->daOrderDetail->createDataDetail($id)) {
                    $this->session->set_flashdata('success_message', 'Order berhasil ditambah.');
                } else {
                    $this->daMasakan->set_flashdata('error_message', 'Data gagal disimpan.');
                }

                redirect('order/detail/' . $id);
            }
        }

        $data['header'] = 'Tambah order baru';
        $data['page'] = 'order/detail';
        $data['dataOrder'] = $this->daOrder->getDataById($id);
        $data['dataOrderDetail'] = $this->daOrderDetail->getDataDetailByOrderId($id);
        $data['dataMasakan'] = $this->daMasakan->getComboDataMasakan();

        $this->load->view('template/container.php', $data);
    }

    public function cancel($id)
    {
        //Check order detail exist
        $orderDetail = $this->daOrderDetail->getDataDetailById($id);

        if ($orderDetail->num_rows() > 0) {
            if ($this->daOrderDetail->cancelOrderDetail($id)) {
                $this->session->set_flashdata('success_message', 'Order berhasil dicancel.');
            } else {
                $this->session->set_flashdata('error_message', 'Order berhasil dicancel.');
            }

            redirect('order/detail/' . $orderDetail->row()->orderDetailOrderId);
        }
    }
}
