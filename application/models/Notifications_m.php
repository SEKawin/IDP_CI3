<?php defined('BASEPATH') or exit('No direct script access allowed');
class Notifications_m extends CI_Model
{
    public $account = 'account';
    public $competency_mapping = 'competency_mapping';
    //self competency
    public $self_competency_form = 'self_competency_form';
    public $approval_self_competency = 'approval_self_competency';
    //assessor competency
    public $assessor_competency_form = 'assessor_competency_form';
    public $approval_competency = 'approval_competency';

    //IDP PLAN FORM\
    public $idp_form = 'idp_idp_form';
    public $approval_idp_form = 'approval_idp_form';

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function noticy_self_competency($code)
    {
        $this->db->from($this->approval_self_competency);
        $this->db->where('approval_self_competency.mgr_code', $code);
        $this->db->where('approval_self_competency.mgr_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function noticy_assessor_competency($code)
    {
        $this->db->from($this->assessor_competency_form);
        $this->db->where('assessor_competency_form.assessor_code', $code);
        $this->db->where('assessor_competency_form.status_form', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function noticy_approval_competency($code)
    {
        $this->db->from($this->approval_competency);
        $this->db->where('approval_competency.mgr_code', $code);
        $this->db->where('approval_competency.mgr_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function noticy_idp_form_emp($code)
    {
        $this->db->from($this->approval_idp_form);
        $this->db->where('approval_idp_form.mgr_code', $code);
        $this->db->where('approval_idp_form.mgr_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function noticy_idp_form_mgr($code)
    {
        $this->db->from($this->approval_idp_form);
        $this->db->where('approval_idp_form.mgr_code', $code);
        $this->db->where('approval_idp_form.mgr_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function noticy_idp_form_gm($code)
    {
        $this->db->from($this->approval_idp_form);
        $this->db->where('approval_idp_form.gm_code', $code);
        $this->db->where('approval_idp_form.gm_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function noticy_idp_form_mgr_hrd($code)
    {
        $this->db->from($this->approval_idp_form);
        $this->db->where('approval_idp_form.mgr_hrd_code', $code);
        $this->db->where('approval_idp_form.mgr_hrd_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function noticy_idp_form_od($code)
    {
        $this->db->from($this->approval_idp_form);
        $this->db->where('approval_idp_form.od_code', $code);
        $this->db->where('approval_idp_form.od_status', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
