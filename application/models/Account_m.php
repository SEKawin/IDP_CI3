<?php
class Account_m extends CI_Model
{
	public $account = 'account';
	public $account_of_role = 'account_of_role';
	public $account_role = 'account_role';

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_acc_by_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->account, 1);
		return $query->row();
	}
	public function validate_login_db($username, $password)
	{
		$username = $this->security->xss_clean($username);
		$password = $this->security->xss_clean($password);

		$this->db->from($this->account);
		$this->db->join($this->account_of_role, 'account_of_role.account_code = idp_account.code', 'LEFT');
		$this->db->join($this->account_role, 'idp_account_role.id = account_of_role.role_id', 'LEFT');
		$this->db->where('idp_account.username', $username);
		$this->db->where('idp_account.password', $password);
		$query = $this->db->get();
		return $query;
	}

	public function validate_login($username, $password)
	{
		$username = $this->security->xss_clean($username);
		$password = $this->security->xss_clean($password);

		$this->db->where('idp_account.username', $username);
		$this->db->where('idp_account.password', $password);
		$query = $this->db->get($this->account, 1);
		return $query;
	}
	public function get_all_account()
	{
		$query = $this->db->where('role', 'EMPLOYEE');
		$query = $this->db->get($this->account);
		return $query->result();
	}

	// User Manage
	public function list_office()
	{
		$this->db->select('office_code,office_title');
		$this->db->from($this->account);
		$this->db->group_by('office_code,office_title');
		$query = $this->db->get();
		return $query->result();
	}

	public function list_department()
	{
		$this->db->select('department_code,department_title');
		$this->db->from($this->account);
		$this->db->group_by('department_code,department_title');
		$query = $this->db->get();
		return $query->result();
	}

	public function list_division()
	{
		$this->db->select('division_code,division_title');
		$this->db->from($this->account);
		$this->db->group_by('division_code,division_title');
		$query = $this->db->get();
		return $query->result();
	}

	public function list_section()
	{
		$this->db->select('section_code,section_title');
		$this->db->from($this->account);
		$this->db->group_by('section_code,section_title');
		$query = $this->db->get();
		return $query->result();
	}
	// User Manage

	public function get_role($account_code)
	{
		$this->db->from($this->account_of_role);
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'LEFT');
		$this->db->where('account_of_role.account_code', $account_code);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_account_code($emp_code)
	{
		$this->db->from($this->account);
		$this->db->where('account.code', $emp_code);
		$query = $this->db->get();
		return $query->result();
	}

	public function save_account($data)
	{
		$this->db->insert($this->account, $data);
		return $this->db->insert_id();
	}

	public function update_account($where, $data)
	{
		$this->db->update($this->account, $data, $where);
		return $this->db->affected_rows();
	}

	public function get_hrd()
	{
		$this->db->from($this->account);
		$this->db->join($this->account_of_role, 'account.code = account_of_role.account_code', 'INNER');
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'INNER');
		$this->db->where('account_role.name_role', 'HRD');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_hrd_mgr()
	{
		$this->db->from($this->account);
		$this->db->join($this->account_of_role, 'account.code = account_of_role.account_code', 'LEFT');
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'INNER');
		$this->db->where('account_role.name_role', 'MANAGER_HRD');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_hrd_manager()
	{
		$this->db->from($this->account);
		$this->db->join($this->account_of_role, 'account.code = account_of_role.account_code', 'INNER');
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'INNER');
		$this->db->where('account_role.name_role', 'OD');
		$query = $this->db->get();
		return $query->result();
	}

	function is_exist($code, $role)
	{
		$this->db->from($this->account);
		$this->db->join($this->account_of_role, 'account_of_role.account_code = account.code', 'LEFT');
		$this->db->where('account_of_role.role_id', $role);
		$this->db->like('account.code', $code);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function check_role($code)
	{
		$this->db->from($this->account_of_role);
		$this->db->join($this->account_role, 'account_role.id = account_of_role.role_id', 'INNER');
		$this->db->where('account_of_role.account_code', $code);
		$query = $this->db->get();
		return $query->result();
	}
}
