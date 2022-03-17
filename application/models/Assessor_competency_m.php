<?php
class Assessor_competency_m extends CI_Model
{
	public $account = 'account';
	public $account_of_role = 'account_of_role';
	public $account_role = 'account_role';
	public $assessor_competency_form = 'assessor_competency_form';
	public $approval_competency = 'approval_competency';
	public $self_competency_form = 'self_competency_form';

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
		$name_role = $this->session->userdata('name_role');

		// $this->db->select('id,years,emp_code,status_form,create_on');
		$this->db->from($this->assessor_competency_form);
		$this->db->where('assessor_competency_form.emp_code', $code);
		$this->db->order_by('assessor_competency_form.create_on', 'DESC');
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
	// ผู้ประเมิน
	private function _get_datatables_query_assessor()
	{
		$code = $this->session->userdata('code');
		$name_role = $this->session->userdata('name_role');

		if ($name_role == 'ADMIN') :
			$this->db->from($this->assessor_competency_form);
			$this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'left');
			$this->db->join($this->account, 'account.code = assessor_competency_form.emp_code', 'left');
			$this->db->order_by('approval_competency.mgr_status', 'ASC');
		else :
			$this->db->from($this->assessor_competency_form);
			$this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'left');
			$this->db->join($this->account, 'account.code = assessor_competency_form.emp_code', 'left');
			$this->db->where('assessor_competency_form.assessor_code', $code);
			$this->db->order_by('approval_competency.mgr_status', 'ASC');
		endif;
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

	public function get_datatables_assessor()
	{
		$this->_get_datatables_query_assessor();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_assessor()
	{
		$this->_get_datatables_query_assessor();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// ผู้อนุมัติต้นสังกัด
	private function _get_datatables_query_approval()
	{
		$code = $this->session->userdata('code');
		$name_role = $this->session->userdata('name_role');

		if ($name_role == 'ADMIN') :
			$this->db->select('account.code,account.salutation,account.firstname_th,account.position,account.lastname_th,department_title,department_code,
					assessor_competency_form.self_form_id,assessor_competency_form.years,assessor_competency_form.emp_code,
					assessor_competency_form.status_form,assessor_competency_form.create_on,
					approval_competency.mgr_status');
			$this->db->from($this->assessor_competency_form);
			$this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'left');
			$this->db->join($this->account, 'account.code = assessor_competency_form.emp_code', 'left');
			$this->db->order_by('approval_competency.mgr_status', 'ASC');
		elseif ($name_role == 'MANAGER') :
			$this->db->select('account.code,account.salutation,account.firstname_th,account.position,account.lastname_th,department_title,department_code,
					assessor_competency_form.self_form_id,assessor_competency_form.years,assessor_competency_form.emp_code,
					assessor_competency_form.status_form,assessor_competency_form.create_on,
					approval_competency.mgr_status');
			$this->db->from($this->assessor_competency_form);
			$this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'left');
			$this->db->join($this->account, 'account.code = assessor_competency_form.emp_code', 'left');
			$this->db->where('approval_competency.mgr_code', $code);
			$this->db->order_by('approval_competency.mgr_status', 'ASC');
		endif;
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

	public function get_datatables_approval()
	{
		$this->_get_datatables_query_approval();

		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_approval()
	{
		$this->_get_datatables_query_approval();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->assessor_competency_form);
		return $this->db->count_all_results();
	}
	// Server Side Table

	public function update_competency_form($form_id, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes, $status_form)
	{
		$this->db->set('core_competency', $core_competency);
		$this->db->set('manage_competency', $manage_competency);
		$this->db->set('knowledge', $knowledge);
		$this->db->set('skill', $skill);
		$this->db->set('personal_attributes', $personal_attributes);
		$this->db->set('status_form', $status_form);
		$this->db->where('self_form_id', $form_id);
		$this->db->update($this->assessor_competency_form);
		return $this->db->affected_rows();
	}

	public function view_approval_competency($form_id)
	{
		$this->db->select('	
			idp_assessor_competency_form.self_form_id,		
			idp_assessor_competency_form.years,		
			idp_self_competency_form.core_competency as self_cc_competency,
			idp_self_competency_form.manage_competency as self_mc_competency,
			idp_self_competency_form.knowledge as self_knowledge,
			idp_self_competency_form.skill as self_skill,
			idp_self_competency_form.personal_attributes as self_personal_attributes,
			idp_assessor_competency_form.core_competency,
			idp_assessor_competency_form.manage_competency,
			idp_assessor_competency_form.knowledge,
			idp_assessor_competency_form.skill,
			idp_assessor_competency_form.personal_attributes,
			');
		$this->db->from($this->assessor_competency_form);
		$this->db->join($this->self_competency_form, 'self_competency_form.id = assessor_competency_form.self_form_id', 'Left');
		$this->db->join($this->approval_competency, 'approval_competency.competency_form_id = assessor_competency_form.self_form_id', 'Left');
		$this->db->where('assessor_competency_form.self_form_id', $form_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function view_assessor_competency($form_id)
	{
		$this->db->from($this->assessor_competency_form);
		$this->db->where('id', $form_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function view_competency_by_code($code, $years)
	{
		$this->db->from($this->assessor_competency_form);
		$this->db->join($this->approval_competency, 'assessor_competency_form.self_form_id = approval_competency.competency_form_id', 'LEFT');
		$this->db->where('emp_code', $code);
		$this->db->where('years', $years);
		$query = $this->db->get();
		return $query->result();
	}

	public function form_maker($form_id)
	{
		$this->db->select("account.code,account.firstname_th,account.lastname_th,account.position,
			account.department_code,account.department_title,
			assessor_competency_form.create_on");
		$this->db->from($this->assessor_competency_form);
		$this->db->join($this->account, 'assessor_competency_form.emp_code = account.code', 'left');
		$this->db->where('assessor_competency_form.self_form_id', $form_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function form_assessor($form_id)
	{
		$this->db->select("account.code,account.firstname_th,account.lastname_th,account.position,
			account.department_code,account.department_title,
			assessor_competency_form.create_on");
		$this->db->from($this->assessor_competency_form);
		$this->db->join($this->account, 'assessor_competency_form.assessor_code = account.code', 'left');
		$this->db->where('assessor_competency_form.self_form_id', $form_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function check_approval_competency($form_id)
	{
		$this->db->select("account.code,account.firstname_th,account.lastname_th,
			approval_competency.competency_form_id,approval_competency.mgr_code,approval_competency.mgr_status,
			approval_competency.create_on");
		$this->db->from($this->approval_competency);
		$this->db->join($this->account, 'approval_competency.mgr_code = account.code', 'left');
		$this->db->where('approval_competency.competency_form_id', $form_id);
		$query = $this->db->get();
		return $query->result();
	}
}
