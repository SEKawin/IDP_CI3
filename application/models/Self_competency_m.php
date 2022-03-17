<?php
class Self_competency_m extends CI_Model
{
	public $account = 'account';
	public $competency_mapping = 'competency_mapping';
	public $self_competency_form = 'self_competency_form';
	public $approval_self_competency = 'approval_self_competency';
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
		$name_role = $this->session->userdata('name_role');

		$this->db->select('id,years,emp_code,status,create_on');
		$this->db->from($this->self_competency_form);
		$this->db->where('self_competency_form.emp_code', $code);
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

	private function _get_datatables_query_approval()
	{
		$code = $this->session->userdata('code');
		$name_role = $this->session->userdata('name_role');

		if ($name_role == 'ADMIN') :
			$this->db->select('account.code,account.salutation,account.firstname_th,account.position,account.lastname_th,department_title,department_code,
					self_competency_form.id,self_competency_form.years,self_competency_form.emp_code,self_competency_form.status,self_competency_form.create_on');
			$this->db->from($this->self_competency_form);
			$this->db->join($this->approval_self_competency, 'approval_self_competency.self_form_id = self_competency_form.id', 'left');
			$this->db->join($this->account, 'account.code = self_competency_form.emp_code', 'left');
			$this->db->order_by('approval_self_competency.mgr_status', 'ASC');
		elseif ($name_role == 'MANAGER') :
			$this->db->select('account.code,account.salutation,account.firstname_th,account.position,account.lastname_th,department_title,department_code,
					self_competency_form.id,self_competency_form.years,self_competency_form.emp_code,self_competency_form.status,self_competency_form.create_on');
			$this->db->from($this->self_competency_form);
			$this->db->join($this->approval_self_competency, 'approval_self_competency.self_form_id = self_competency_form.id', 'left');
			$this->db->join($this->account, 'account.code = self_competency_form.emp_code', 'left');
			$this->db->where('approval_self_competency.mgr_code', $code);
			$this->db->order_by('approval_self_competency.mgr_status', 'ASC');
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
		$this->db->from($this->self_competency_form);
		return $this->db->count_all_results();
	}
	// Server Side Table

	public function get_competency_mapping($position)
	{
		$this->db->from($this->competency_mapping);
		$this->db->where('position', $position);
		$query = $this->db->get();
		return $query->result();
	}
	public function add_self_competency($years, $emp_code, $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes)
	{

		$this->db->set('years', $years);
		$this->db->set('emp_code', $emp_code);
		$this->db->set('core_competency', $core_competency);
		$this->db->set('manage_competency', $manage_competency);
		$this->db->set('knowledge', $knowledge);
		$this->db->set('skill', $skill);
		$this->db->set('personal_attributes', $personal_attributes);
		$this->db->insert($this->self_competency_form);
		return $this->db->insert_id();
	}

	//นำข้อมูล Competency ลงในผู้ประเมิน
	public function add_assessor_competency_form($self_form_id, $years, $emp_code, $assessor_code,  $core_competency, $manage_competency, $knowledge, $skill, $personal_attributes)
	{
		$this->db->set('self_form_id', $self_form_id);
		$this->db->set('years', $years);
		$this->db->set('emp_code', $emp_code);
		$this->db->set('assessor_code', $assessor_code);
		$this->db->set('core_competency', $core_competency);
		$this->db->set('manage_competency', $manage_competency);
		$this->db->set('knowledge', $knowledge);
		$this->db->set('skill', $skill);
		$this->db->set('personal_attributes', $personal_attributes);
		$this->db->insert($this->assessor_competency_form);
		return $this->db->insert_id();
	}
	//นำข้อมูล Competency ลงในผู้ประเมิน

	public function view_self_competency_form_by_id($id)
	{
		$this->db->from($this->self_competency_form);
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}


	public function view_self_competency_form_by_code($code, $years)
	{
		$this->db->from($this->self_competency_form);
		$this->db->join($this->approval_self_competency, 'approval_self_competency.self_form_id = self_competency_form.id', 'LEFT');
		$this->db->where('emp_code', $code);
		$this->db->where('years', $years);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function check_form_maker($id)
	{
		$this->db->select("account.code,account.firstname_th,account.lastname_th,account.position,
		account.department_code,account.department_title,
		self_competency_form.create_on");
		$this->db->from($this->self_competency_form);
		$this->db->join($this->account, 'self_competency_form.emp_code = account.code', 'left');
		$this->db->where('self_competency_form.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function check_approval_self_competency($id)
	{
		$this->db->select("account.code,account.firstname_th,account.lastname_th,
		approval_self_competency.self_form_id,approval_self_competency.mgr_code,approval_self_competency.mgr_status,
		approval_self_competency.create_on");
		$this->db->from($this->approval_self_competency);
		$this->db->join($this->account, 'approval_self_competency.mgr_code = account.code', 'left');
		$this->db->where('approval_self_competency.self_form_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function form_approval_mgr($self_form_id, $mgr_status)
	{
		$this->db->set('mgr_status', $mgr_status);
		$this->db->set('create_on', 'NOW()', FALSE);
		$this->db->where('self_form_id', $self_form_id);
		$this->db->update($this->approval_self_competency);
		return $this->db->affected_rows();
	}

	public function update_self_competency_form($self_form_id, $status)
	{
		$this->db->set('status', $status);
		$this->db->where('id', $self_form_id);
		$this->db->update($this->self_competency_form);
		return $this->db->affected_rows();
	}
}
