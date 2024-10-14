<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        // check_operator_fakultas_Hukum();
        // check_operator_fakultas();
        // check_not_login();
    }

    public function index()
    {
            $this->load->view('error/error');
    }
}