<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function isValidUser()
{
    $obj = new User_authentication();
    return $obj->isValidUser();
}

function isAdmin()
{
    $obj = new User_authentication();
    return $obj->isAdmin();
}

function isKasir()
{
    $obj = new User_authentication();
    return $obj->isKasir();
}