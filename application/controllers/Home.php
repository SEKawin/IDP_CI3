<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('mydate'); //เปิดใช้งาน library mydate
        // Load database
    }
    public function index()
    {
        $name_role = $this->session->userdata('name_role');

        $this->load->view('templates/header');
        if ($name_role === 'HRD') :
            $this->load->view('home');
        else :
            $this->load->view('home');
        endif;
        $this->load->view('templates/footer');
    }

    public function mpdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf', [],true);
        $mpdf->AddPage('L'); // เพิ่มหน้าใหม่แบบแนวนอน
        
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        //$mpdf->Output('invoice.pdf','Dt will work as normal download
    }
}
