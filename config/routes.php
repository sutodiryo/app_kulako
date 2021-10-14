<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'reg/reseller';
// $route['default_controller']    = 'ref';
$route['login']                 = 'auth/index';
$route['invoice']               = 'member/transaksi/invoice';


$route['affiliate']             = 'reg/affiliate/0';

$route['pembelian']             = 'ref/b/0/1';
$route['daftar']                = 'ref/b/0/1';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
