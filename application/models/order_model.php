<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->_table = 'order';
    }

    public function getData()
    {
        return $this->db->get($this->_table);
    }

    public function getDataOrderActive()
    {
        return $this->db
            ->join('user', 'orderUserId = userId', 'inner')
            ->where('orderStatus', 'o')->get($this->_table);
    }

    public function getDataById($id)
    {
        return $this->db
            ->join('user', 'orderUserId = userId', 'inner')
            ->where('orderId', $id)->get($this->_table);
    }

    public function getDataDetailByOrderId($id)
    {
        return $this->db
            ->join('masakan', 'orderDetailMasakanId = masakanId', 'inner')
            ->where('orderDetailOrderId', $id)->get('order_detail');
    }

    public function getDataDetailById($id)
    {
        return $this->db->where('orderDetailId', $id)->get('order_detail');
    }

    public function createData()
    {
        //Setting up data
        $data = array(
            'orderNoMeja' => $this->input->post('meja', TRUE),
            'orderTanggal' => date('Y-m-d h:i'),
            'orderUserId' => $this->input->post('user', TRUE),
            'orderStatus' => 'o');

        $this->db->insert($this->_table, $data);

        return $this->db->insert_id();
    }

    public function createDataDetail($orderId)
    {
        //Setting up data
        $data = array(
            'orderDetailOrderId' => $orderId,
            'orderDetailMasakanId' => $this->input->post('masakan', TRUE),
            'orderDetailKeterangan' => $this->input->post('keterangan_detail', TRUE),
            'orderDetailPorsi' => $this->input->post('jumlah_masakan', TRUE),
            'orderDetailStatus' => 'o');

        $this->db->insert('order_detail', $data);

        return $this->db->insert_id();
    }

    public function cancelOrderDetail($id)
    {
        //Setting up data
        $data = array('orderDetailStatus' => 'c');

        return $this->db->where('orderDetailId', $id)->update('order_detail', $data);
    }
}
