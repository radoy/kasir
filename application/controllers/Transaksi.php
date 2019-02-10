<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

        $data['header'] = 'Daftar order - transaksi ';
        $data['page'] = 'transaksi/index';
        $data['dataOrder'] = $this->daOrder->getData();

        $this->load->view('template/container.php', $data);
    }

    public function bayar($id)
    {
        $data = array();
        $dataOrder = $this->daOrder->getDataByIdWithTotal($id);

        if (is_posted()) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('jumlah_bayar', 'Jumlah bayar', 'greater_than_equal_to['. $dataOrder->row()->totalHarga . ']|required', array(
                'greater_than_equal_to' => 'Jumlah bayar harus pas atau lebih besar dari total harga',
            ));

            if ($this->form_validation->run()) {
                if ($this->daOrder->makePayment($id)) {
                    $this->session->set_flashdata('success_message', 'Transaksi berhasil dilakukan.');
                } else {
                    $this->session->set_flashdata('error_message', 'Transaksi gagal.');
                }

                redirect('transaksi');
            }
        }

        $data['header'] = 'Order detail';
        $data['page'] = 'transaksi/bayar';
        $data['dataOrder'] = $dataOrder;
        $data['dataOrderDetail'] = $this->daOrderDetail->getDataDetailByOrderId($id);
        $data['dataMasakan'] = $this->daMasakan->getComboDataMasakan();

        $this->load->view('template/container.php', $data);
    }

    public function detail($id)
    {
        $data = array();
        $data['header'] = 'Order detail';
        $data['page'] = 'transaksi/detail';
        $data['dataOrder'] = $this->daOrder->getDataByIdWithTotal($id);
        $data['dataOrderDetail'] = $this->daOrderDetail->getDataDetailByOrderId($id);
        $data['dataMasakan'] = $this->daMasakan->getComboDataMasakan();

        $this->load->view('template/container.php', $data);
    }
}
