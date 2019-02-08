<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masakan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->_table = 'masakan';
    }

    public function getData()
    {
        return $this->db->get($this->_table);
    }

    public function getDataById($id)
    {
        return $this->db->where('masakanId', $id)->get($this->_table);
    }

    public function getComboData()
    {
        $arr[1] = 'Makanan';
        $arr[2] = 'Minuman';

        return $arr;
    }

    // Tipe 1 = Makanan
    // Tipe 2 = Minuman
    public function getComboDataMasakan($tipe = 0)
    {
        if ($tipe > 0) {
            $this->db->where('masakanTipe', $tipe);
        }

        $query = $this->db->where('masakanStatus', 1)->order_by('masakanTipe, masakanNama')->get($this->_table);

        $arr = array();

        $arr[-1] = '-- Silahkan pilih salah satu --';
        foreach ($query->result() as $row) {
            $arr[$row->masakanId] = $row->masakanNama;
        }

        return $arr;
    }

    public function writeData($id = 0)
    {
        //Setting up data
        $data = array(
            'masakanNama' => $this->input->post('nama', TRUE),
            'masakanHarga' => $this->input->post('harga', TRUE),
            'masakanStatus' => $this->input->post('status', TRUE) ? $this->input->post('status', TRUE) : 0,
            'masakanTipe' => $this->input->post('tipe', TRUE));

        if ($id === 0) {
            return $this->db->insert($this->_table, $data);
        } else {
            return $this->db->where('masakanId', $id)->update($this->_table, $data);
        }
    }
}
