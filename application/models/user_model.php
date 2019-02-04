<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->_table = 'user';
    }

    //return user valid or not
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username) || empty($password)) {
            return FALSE;
        }

        $query = $this->db
            ->where('userLogin', $username)
            ->get($this->_table);

        if ($query->num_rows() == 1) {
            $row = $query->row();

            $password = md5($password);

            if ($row->userPassword === $password) {

                $session_data = array(
                    'Id' => $row->userId,
                    'Login' => $row->userLogin,
                    'FullName' => $row->userName,
                    'Level' => $row->userLevelId
                );

                $this->session->set_userdata($session_data);
                return TRUE;
            }
        }

        return FALSE;
    }

    public function getData()
    {
        return $this->db
            ->join('level', 'levelId = userLevelId', 'inner')
            ->get($this->_table);
    }

    public function getDataById($id)
    {
        return $this->db->where('userId', $id)->get($this->_table);
    }

    public function getDataByUserLogin($id)
    {
        return $this->db->where('userLogin', $id)->get($this->_table);
    }

    public function writeData($where)
    {
        //Setting up data
        $data = array(
            'userName' => $this->input->post('nama', TRUE),
            'userLogin' => $this->input->post('username', TRUE),
            'userPassword' => $this->input->post('password', TRUE),
            'userLevelId' => $this->input->post('level', TRUE));

        if (isset($data['userPassword'])) {
            $data['userPassword'] = md5($data['userPassword']);
        }

        if ($where === 0) {
            return $this->db->insert($this->_table, $data);
        } else {
            $this->db->where($where);
            return $this->db->update($this->_table, $data);
        }
    }

    public function writeDataProfil()
    {
        //Setting up data
        $data = array('userName' => $this->input->post('nama', TRUE));

        if ($this->input->post('password', TRUE)) {
            $data['userPassword'] = md5($this->input->post('password', TRUE));
        }

        $where = array('userId' => $this->session->userdata('Id'));
        return $this->db->where($where)->update($this->_table, $data);
    }

//delete user
    public function deleteData($id)
    {
        $this->db->where('usId', $id);
        return $this->db->delete($this->_table);
    }

//is user exist
    public function isUserExist($username)
    {
        $this->db->where('usLogin', $username);

        return $this->db->get($this->_table);
    }

//change password
    public function changePassword($userId, $data)
    {
        $this->db->where('usLogin', $userId);
        return $this->db->update($this->_table, $data);
    }

    public function checkUsername($username, $current_username = FALSE)
    {
        $this->db->select('userLogin')->from('user')->where('userLogin', $username);

        if ($current_username) {
            $this->db->where('userLogin !=', $current_username);
        }

        if ($this->db->count_all_results() > 0)
            return true;

        return false;
    }

}