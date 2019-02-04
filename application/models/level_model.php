<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Level_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->_table = 'level';
    }

    public function getData()
    {
        return $this->db->get($this->_table);
    }

    public function getComboData()
    {
        $query = $this->db->get($this->_table);

        $arr = array();

        $arr[-1] = '-- Pilih Level --';
        foreach ($query->result() as $row) {
            $arr[$row->levelId] = $row->levelNama;
        }

        return $arr;
    }
}
