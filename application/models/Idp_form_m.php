<?php
class Idp_form_m extends CI_Model
{
	public $account = 'account';
	public $idp_form = 'idp_idp_form';
	public $approval_idp_form = 'approval_idp_form';
	public $self_competency_form = 'self_competency_form';
	public $assessor_competency_form = 'assessor_competency_form';

	public $column_order = array(null, 'years', 'emp_code'); //set column field database for datatable orderable
	public $column_search = array('years', 'emp_code'); //set column field database for datatable searchable

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	// Server Side Table
	private function _get_datatables_query()
	{
		$code = $this->session->userdata('code');

		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->where('idp_idp_form.emp_code', $code);
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
				{
					$this->db->group_end();
				}
				//close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{

			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// Datatable Mgr
	private function _get_datatables_query_mgr()
	{
		$code = $this->session->userdata('code');

		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->join($this->account, 'account.code = idp_idp_form.emp_code', 'LEFT');
		$this->db->where('approval_idp_form.mgr_code', $code);
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
				{
					$this->db->group_end();
				}
				//close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{

			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables_mgr()
	{
		$this->_get_datatables_query_mgr();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_mgr()
	{
		$this->_get_datatables_query_mgr();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// Datatable AGM/GM
	private function _get_datatables_query_gm()
	{
		$code = $this->session->userdata('code');

		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->join($this->account, 'account.code = idp_idp_form.emp_code', 'LEFT');
		$this->db->where('approval_idp_form.gm_code', $code);
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
				{
					$this->db->group_end();
				}
				//close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{

			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables_gm()
	{
		$this->_get_datatables_query_gm();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_gm()
	{
		$this->_get_datatables_query_gm();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// Datatable MGR HRDprivate function _get_datatables_query()
	private function _get_datatables_query_mgr_hrd()
	{
		$code = $this->session->userdata('code');

		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->join($this->account, 'account.code = idp_idp_form.emp_code', 'LEFT');
		$this->db->where('approval_idp_form.mgr_hrd_code', $code);

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
				{
					$this->db->group_end();
				}
				//close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{

			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables_mgr_hrd()
	{
		$this->_get_datatables_query_mgr_hrd();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_mgr_hrd()
	{
		$this->_get_datatables_query_mgr_hrd();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// Datatable GM OD
	private function _get_datatables_query_od()
	{
		$code = $this->session->userdata('code');

		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->join($this->account, 'account.code = idp_idp_form.emp_code', 'LEFT');
		$this->db->where('approval_idp_form.od_code', $code);
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
				{
					$this->db->group_end();
				}
				//close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{

			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables_od()
	{
		$this->_get_datatables_query_od();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_od()
	{
		$this->_get_datatables_query_od();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->idp_form);
		return $this->db->count_all_results();
	}

	public function check_approval()
	{
		$query = $this->db->get($this->approval_idp_form);
		return $query->result();
	}

	public function create_idp_plan_form($form_id, $years, $emp_code)
	{
		$this->db->set('competency_form_id', $form_id);
		$this->db->set('years', $years);
		$this->db->set('emp_code', $emp_code);
		$this->db->insert($this->idp_form);
		return $this->db->affected_rows();
	}

	public function update_idp_plan_form($idp_form_id, $status_idp_form, $idp_cc, $idp_mc, $idp_know, $idp_skill, $idp_perattr)
	{
		$date = date("Y-m-d");
		$this->db->set('idp_cc', $idp_cc);
		$this->db->set('idp_mc', $idp_mc);
		$this->db->set('idp_know', $idp_know);
		$this->db->set('idp_skill', $idp_skill);
		$this->db->set('idp_perattr', $idp_perattr);
		$this->db->set('status_idp_form', $status_idp_form);
		$this->db->set('create_on', $date);
		$this->db->where('competency_form_id', $idp_form_id);
		$this->db->update($this->idp_form);
		return $this->db->affected_rows();
	}

	public function view_idp_plan_form($idp_form_id)
	{
		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->where('idp_idp_form.competency_form_id', $idp_form_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function view_idp_plan_by_code($code,$years)
	{
		$this->db->from($this->idp_form);
		$this->db->join($this->approval_idp_form, 'approval_idp_form.idp_form_id = idp_idp_form.competency_form_id', 'LEFT');
		$this->db->where('idp_idp_form.emp_code', $code);
		$this->db->where('idp_idp_form.years', $years);
		$query = $this->db->get();
		return $query->result();
	}

	public function competency_form($form_id)
	{
		$this->db->select('	
			idp_assessor_competency_form.self_form_id,		
			idp_assessor_competency_form.years,		
			idp_self_competency_form.cc_result as self_cc_result,
			idp_self_competency_form.mc_result as self_mc_result,
			idp_self_competency_form.know_result as self_know_result,
			idp_self_competency_form.skill_result as self_skill_result,
			idp_self_competency_form.perattr_result as self_perattr_result,
			idp_assessor_competency_form.cc_result,
			idp_assessor_competency_form.mc_result,
			idp_assessor_competency_form.know_result,
			idp_assessor_competency_form.skill_result,
			idp_assessor_competency_form.perattr_result,
			');
		$this->db->from($this->assessor_competency_form);
		$this->db->join($this->self_competency_form, 'self_competency_form.id = assessor_competency_form.self_form_id', 'Left');
		$this->db->where('assessor_competency_form.self_form_id', $form_id);
		$query = $this->db->get();
		return $query->result();
	}
}
