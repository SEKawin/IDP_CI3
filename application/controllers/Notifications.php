<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Notifications extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== true) :
            redirect('login');
        endif;
        // Load database
        $this->load->model('notifications_m', 'notifications_m');
    }

    public function noticy_self_competency()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->noticy_self_competency($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function notify_competency()
    {
        $code = $this->session->userdata('code');

        $num[] = $this->notifications_m->noticy_assessor_competency($code);
        $num[] = $this->notifications_m->noticy_approval_competency($code);
        $num = array_sum($num);
        echo json_encode($num);
        exit;
    }


    public function noticy_assessor_competency()
    {
        $code = $this->session->userdata('code');

        $getAlerts = $this->notifications_m->noticy_assessor_competency($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function noticy_approval_competency()
    {
        $code = $this->session->userdata('code');

        $getAlerts = $this->notifications_m->noticy_approval_competency($code);
        echo json_encode($getAlerts);
        exit;
    }


    public function notify_idp()
    {
        $code = $this->session->userdata('code');

        $num[] = $this->notifications_m->noticy_idp_form_mgr($code);
        $num[] = $this->notifications_m->noticy_idp_form_gm($code);
        $num[] = $this->notifications_m->noticy_idp_form_mgr_hrd($code);
        $num[] = $this->notifications_m->noticy_idp_form_od($code);

        $num = array_sum($num);

        echo json_encode($num);
        exit;
    }

    public function noticy_idp_form_mgr()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->noticy_idp_form_mgr($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function noticy_idp_form_gm()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->noticy_idp_form_gm($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function noticy_idp_form_mgr_hrd()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->noticy_idp_form_mgr_hrd($code);
        echo json_encode($getAlerts);
        exit;
    }

    public function noticy_idp_form_od()
    {
        $code = $this->session->userdata('code');
        $getAlerts = $this->notifications_m->noticy_idp_form_od($code);
        echo json_encode($getAlerts);
        exit;
    }
}
