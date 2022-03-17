<?php
class Approval_m extends CI_Model
{
	public $self_competency_form = 'self_competency_form';
	public $assessor_competency_form = 'assessor_competency_form';
	public $idp_form = 'idp_idp_form';

	public $approval_self_competency = 'approval_self_competency';
	public $approval_competency = 'approval_competency';
	public $approval_idp_form = 'approval_idp_form';

	public $organ_chart = 'idp_organ_chart';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
	// Self-Competency Form
	public function add_approval_self_competency($self_form_id, $mgr_code)
	{
		$this->db->set('self_form_id', $self_form_id);
		$this->db->set('mgr_code', $mgr_code);
		$this->db->set('mgr_status', 0);
		$this->db->insert($this->approval_self_competency);
	}

	public function self_competency_form_approval($self_form_id, $mgr_status)
	{
		$this->db->set('mgr_status', $mgr_status);
		$this->db->set('create_on', 'NOW()', FALSE);
		$this->db->where('self_form_id', $self_form_id);
		$this->db->update($this->approval_self_competency);
		return $this->db->affected_rows();
	}
	// Self-Competency Form

	// Competency Form
	public function add_approval_competency_form($form_id, $mgr_code)
	{
		$this->db->set('competency_form_id', $form_id);
		$this->db->set('mgr_code', $mgr_code);
		$this->db->set('mgr_status', 0);
		$this->db->insert($this->approval_competency);
	}

	public function competency_form_approval($form_id, $mgr_status, $mgr_code)
	{
		$this->db->set('mgr_status', $mgr_status);
		$this->db->set('mgr_code', $mgr_code);
		$this->db->set('create_on', 'NOW()', FALSE);
		$this->db->where('competency_form_id', $form_id);
		$this->db->update($this->approval_competency);
		return $this->db->affected_rows();
	}
	// Competency Form

	// IDP PLAN FORM
	public function add_approval_idp_plan_form($idp_form_id, $mgr_code)
	{
		$date = date("Y-m-d");
		$this->db->set('idp_form_id', $idp_form_id);
		$this->db->set('mgr_code', $mgr_code);
		$this->db->set('mgr_create_on', $date);
		$this->db->insert($this->approval_idp_form);
		return $this->db->insert_id();
	}

	public function update_approval_idp_plan_form($idp_form_id, $mgr_code)
	{
		$date = date("Y-m-d");
		$this->db->set('mgr_code', $mgr_code);
		$this->db->set('mgr_create_on', $date);
		$this->db->set('gm_code', null);
		$this->db->set('gm_status', null);
		$this->db->set('gm_create_on', null);

		$this->db->set('mgr_hrd_code', null);
		$this->db->set('mgr_hrd_status', null);
		$this->db->set('mgr_hrd_create_on', null);

		$this->db->set('od_code', null);
		$this->db->set('od_status', null);
		$this->db->set('od_create_on', null);

		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function organ_chart($mgr_code)
	{
		$this->db->where('mgr_code', $mgr_code);
		$query = $this->db->get($this->organ_chart);
		return $query->result();
	}

	public function idp_approval_mgr($idp_form_id, $mgr_status, $code)
	{
		$date = date("Y-m-d");
		$this->db->set('mgr_status', $mgr_status);
		$this->db->set('mgr_create_on', $date);
		$this->db->set('gm_code', $code);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function idp_approval_mgr2($idp_form_id, $mgr_status)
	{
		$date = date("Y-m-d");
		$this->db->set('mgr_status', $mgr_status);
		$this->db->set('mgr_create_on', $date);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function idp_approval_gm($idp_form_id, $gm_status, $code)
	{
		$date = date("Y-m-d");
		$this->db->set('gm_status', $gm_status);
		$this->db->set('gm_create_on', $date);
		$this->db->set('mgr_hrd_code', $code);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function idp_approval_gm2($idp_form_id, $gm_status)
	{
		$date = date("Y-m-d");
		$this->db->set('gm_status', $gm_status);
		$this->db->set('gm_create_on', $date);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function idp_approval_mgr_hrd($idp_form_id, $mgr_hrd_status, $code)
	{
		$date = date("Y-m-d");
		$this->db->set('mgr_hrd_status', $mgr_hrd_status);
		$this->db->set('mgr_hrd_create_on', $date);
		$this->db->set('od_code', $code);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function idp_approval_mgr_hrd2($idp_form_id, $mgr_hrd_status)
	{
		$date = date("Y-m-d");
		$this->db->set('mgr_hrd_status', $mgr_hrd_status);
		$this->db->set('mgr_hrd_create_on', $date);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function idp_approval_od($idp_form_id, $od_status)
	{
		$date = date("Y-m-d");
		$this->db->set('od_status', $od_status);
		$this->db->set('od_create_on', $date);
		$this->db->where('idp_form_id', $idp_form_id);
		$this->db->update($this->approval_idp_form);
		return $this->db->affected_rows();
	}

	public function update_idp_form($idp_form_id, $status_idp_form,$remark)
	{
		$this->db->set('status_idp_form', $status_idp_form);
		$this->db->set('remark', $remark);
		$this->db->where('competency_form_id', $idp_form_id);
		$this->db->update($this->idp_form);
		return $this->db->affected_rows();
	}
	// IDP PLAN FORM
}
