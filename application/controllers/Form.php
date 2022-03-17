<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('mydate'); //เปิดใช้งาน library mydate
        // Load database
    }
    public function jd_form()
    {
        $this->load->view('form/jd_form/form');
    }

    public function self_competency_form()
    {
        $this->load->view('form/self_competency/form');
    }

    public function competency_form()
    {
        $this->load->view('form/competency_form/form');
    }

    public function idp_form()
    {
        $this->load->view('form/idp_form/form');
    }
}
