<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function is_posted()
{
    return (!empty($_POST)) ? TRUE : FALSE;
}

function numberFormat($pIntValue, $pIntDecimal = 2)
{
    return number_format($pIntValue, $pIntDecimal, ',', '.');
}