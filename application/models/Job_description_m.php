<?php
class Job_description_m extends CI_Model
{
	public $job_description_form = 'job_description_form';
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

		if ($name_role == 'ADMIN') :
			$this->db->from($this->job_description_form);
			// $this->db->where('job_description_form.emp_code', $code);
			$this->db->order_by('job_description_form.create_no', 'DESC');
		else :
			$this->db->from($this->job_description_form);
			$this->db->where('job_description_form.emp_code', $code);
			$this->db->order_by('job_description_form.create_no', 'DESC');
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

	public function count_all()
	{
		$this->db->from($this->job_description_form);
		return $this->db->count_all_results();
	}
	// Server Side Table

	public function add_jd_form($data)
	{
		$this->db->insert($this->job_description_form, $data);
		return $this->db->insert_id();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->job_description_form);
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->job_description_form);
	}
}
