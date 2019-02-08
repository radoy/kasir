<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_detail_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->_table = 'order_detail';
    }

    public function getDataDetailByOrderId($id)
    {
        return $this->db
            ->join('masakan', 'orderDetailMasakanId = masakanId', 'inner')
            ->where('orderDetailOrderId', $id)->get($this->_table);
    }

    public function getDataDetailById($id)
    {
        return $this->db->where('orderDetailId', $id)->get($this->_table);
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

        $this->db->insert($this->_table, $data);

        return $this->db->insert_id();
    }

    public function cancelOrderDetail($id)
    {
        //Setting up data
        $data = array('orderDetailStatus' => 'c');

        return $this->db->where('orderDetailId', $id)->update($this->_table, $data);
    }
}
